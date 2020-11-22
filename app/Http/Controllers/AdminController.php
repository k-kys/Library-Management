<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Validator;

class AdminController extends Controller
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
            if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])) {
                // $id = Auth::guard('admin')->id();
                return redirect()->route('admin.dashboard');
            }
            $errors = new MessageBag(['password' => ['Email hoặc mật khẩu không chính xác']]);
            return redirect()->back()->withErrors($errors)->withInput();
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
            'email.required' => 'Email không được đế trống',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu ít nhất 6 ký tự',
        ];
        $validator = Validator::make($request->all(), $rule, $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $checkMail = Admin::select('email')->where('email', $request->get('email'))->first();
        if (!$checkMail) {
            # check pass = re_pass
            $password = $request->get('password');
            $rePassword = $request->get('re_password');
            if ($password != $rePassword) {
                $errors = new MessageBag(['re_password' => ['Nhập lại mật khẩu không chính xác']]);
                return redirect()->back()->withErrors($errors)->withInput();
            }
            // them vao bảng admin
            $admin = new Admin();
            $admin->name = $request->get('name');
            $admin->email = $request->get('email');
            $admin->password = bcrypt($password);
            $admin->save();
            $request->session()->flash('status', 'Đăng ký tài khoản Admin thành công');
            return redirect()->route('admin.getRegister');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('index');
    }

    public function dashboard()
    {
        $totalBook = DB::table('books')->select('id')->count();
        $bookLoan = DB::table('book_loan')->select('id')->count();
        $returnedBook = DB::table('book_loan')->select('id')->where('status', 1)->count();
        $regStudent = DB::table('students')->select('id')->count();
        return view('admin.dashboard', compact('totalBook', 'bookLoan', 'returnedBook', 'regStudent'));
    }



    public function manageStudent()
    {
        $students = DB::table('students')->get();
        return view('admin.manage-student', compact('students'));
    }

    public function activeStudent(Request $request, $id)
    {
        DB::table('students')->where('id', $id)->update([
            'status' => 1,
        ]);
        $request->session()->flash('status', 'Active thành công');
        return redirect()->back();
    }

    public function blockStudent(Request $request, $id)
    {
        DB::table('students')->where('id', $id)->update([
            'status' => 0,
        ]);
        $request->session()->flash('status', 'Block thành công');
        return redirect()->back();
    }

    public function changePassword()
    {
        return view('admin.change-password');
    }

    public function updatePassword(Request $request)
    {
        $id = Auth::guard('admin')->id();
        $pass = $request->get('password');
        $newPass = $request->get('new_password');
        $hashPass = bcrypt($newPass);
        $rePass = $request->get('re_password');
        $oldPass = Admin::where('id', $id)->first()->password;
        // dd($oldPass);
        if (Hash::check($pass, $oldPass)) {
            if ($newPass == $rePass) {
                $admin = Admin::find($id);
                $admin->password = $hashPass;
                $admin->save();
                $request->session()->flash('status', 'Thay đổi mật khẩu thành công');
                return redirect()->route('admin.changePassword');
            } else {
                $errors = 'Nhập lại Mật khẩu Mới chưa chính xác';
                return redirect()->back()->withErrors($errors);
            }
        } else {
            $errors = 'Mật khẩu không chính xác';
            return redirect()->back()->withErrors($errors);
        }
    }
}
