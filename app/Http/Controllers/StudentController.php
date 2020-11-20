<?php

namespace App\Http\Controllers;

use App\Models\BookLoan;
use App\Models\Student;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use Validator;

class StudentController extends Controller
{
    public function login(Request $request)
    {
        # validate
        $rule = [
            'email' => 'required',
            'password' => 'required|min:6',
        ];
        $message = [
            'email.required' => 'Email không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu ít nhất 6 ký tự',
        ];
        $validator = Validator::make($request->all(), $rule, $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $email = $request->get('email');
            $password = $request->get('password');
            if (Auth::guard('students')->attempt(['email' => $email, 'password' => $password])) {
                $status = Student::select('status')->where('email', $email)->first()->status;
                // dd($status);
                if ($status == 1) {
                    $id = Auth::guard('students')->id();
                    return redirect()->route('dashboard', ['id' => $id]);
                } else {
                    $request->session()->flash('status', 'Tài khoản của bạn đã bị khóa. Liên hệ Admin để được hỗ trợ');
                    Auth::guard('students')->logout();
                    return redirect()->back()->withInput();
                }
            } else {
                $errors = new MessageBag(['password' => ['Email hoặc mật khẩu không chính xác']]);
                return redirect()->back()->withErrors($errors)->withInput();
            }
        }
    }

    public function register(Request $request)
    {
        # validate
        $rule = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
        ];
        $message = [
            'name.required' => 'Tên không được để trống',
            'email.required' => 'Email không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu ít nhất 6 ký tự',
        ];
        $validator = Validator::make($request->all(), $rule, $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // check email availability
        $emailTest = Student::select('email')->where('email', $request->get('email'))->first();
        if (!$emailTest) {
            // check  pass == re_pass
            $password = $request->get('password');
            $rePassword = $request->get('re_password');
            if ($password != $rePassword) {
                $errors = new MessageBag(['re_password' => ['\"Nhập lại mật khẩu\" không đúng']]);
                return redirect()->back()->withErrors($errors)->withInput();
            }
            // them vao bang students
            $student = new Student();
            $student->name = $request->get('name');
            $student->email = $request->get('email');
            $student->password = bcrypt($password);
            $student->save();
            $request->session()->flash('status', 'Đăng ký thành công !');
            return redirect()->route('index');
        } else {
            $errors = new MessageBag(['email' => ['Email đã tồn tại']]);
            return redirect()->back()->withErrors($errors)->withInput();
        }
    }

    public function forgotPassword(Request $request)
    {
        $email = Student::select('email')->where('email', $request->get('email'))->count();
        if ($email > 0) {
            // check pass = re_pass
            if ($request->get('new_password') != $request->get('re_password')) {
                $errors = new MessageBag(['re_password' => ['\"Nhập lại mật khẩu\" không đúng']]);
                return redirect()->back()->withErrors($errors)->withInput();
            }
            $student = Student::where('email', $request->get('email'));
            $student->password = bcrypt($request->get('password'));
            $student->save();
            $request->session()->flash('status', 'Cập nhật mật khẩu thành công');
            return redirect()->route('forgot-password');
        }
    }

    public function logout()
    {
        Auth::guard('students')->logout();
        return redirect()->route('index');
    }

    public function dashboard($id)
    {

        $bookLoan = BookLoan::select('id')->where('student_id', $id)->count();
        $bookNotReturn = BookLoan::select('id')->where([
            ['student_id', '=', $id],
            ['status', '=', 0],
        ])->count();
        $bookReturned = BookLoan::select('id')->where([
            ['student_id', '=', $id],
            ['status', '=', 1],
        ])->count();
        return view('dashboard', compact('bookLoan', 'bookNotReturn', 'bookReturned'));
    }

    public function profile($id)
    {
        $profile = Student::find($id);
        return view('profile', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->name = $request->name;
        $student->updated_at = date('Y-m-d H:i:s');
        $student->save();
        $request->session()->flash('status', "Thông tin đã được cập nhật");
        return redirect()->route('profile', ['id' => $id]);
    }

    public function changePassword($id)
    {
        return view('change-password', compact('id'));
    }

    public function updatePassword(Request $request, $id)
    {
        $pass = $request->get('password');
        $newPass = $request->get('new_password');
        $hashPass = bcrypt($newPass);
        $rePass = $request->get('re_password');
        $oldPass = Student::select('password')->where('id', $id)->get();
        if ($pass === $oldPass) {
            if ($newPass === $rePass) {
                $student = Student::find($id);
                $student->password = $hashPass;
                $request->session()->flash('status', 'Thay đổi mật khẩu thành công');
                return redirect()->route('changePassword', ['id' => $id]);
            } else {
                $errors[] = 'Nhập lại Mật khẩu Mới chưa chính xác';
                return redirect()->back()->withErrors($errors);
            }
        } else {
            $errors[] = 'Mật khẩu không chính xác';
            return redirect()->back()->withErrors($errors);
        }
    }

    public function bookLoan($id)
    {
        $bookLoans = DB::table('book_loan')->join('students', 'book_loan.student_id', '=', 'students.id')->join('books', 'book_loan.book_id', '=', 'books.id')->where('student_id', $id)->orderByDesc('id')->addSelect('book_loan.id', 'books.name', 'book_loan.date_issued', 'book_loan.date_due_for_return', 'book_loan.date_returned', 'book_loan.status', 'book_loan.amount_of_fine');
        // $bookLoans =  DB::raw('SELECT book_loan.id, books.name, book_loan.date_issued, book_loan.date_due_for_return, book_loan.date_returned, book_loan.status, book_loan.amount_of_fine FROM book_loan JOIN students on book_loan.student_id=students.id JOIN books on book_loan.book_id=books.id WHERE book_loan.student_id=2 ORDER BY book_loan.id DESC');

        return view('book-borrowed', compact('bookLoans'));
    }
}
