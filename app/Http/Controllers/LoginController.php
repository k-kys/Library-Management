<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Models\Student;
use Validator;

class LoginController extends Controller
{
    //
    public function adminLogin(Request $request)
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

    public function adminRegister(Request $request)
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

    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('index');
    }

    public function studentLogin(Request $request)
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
                    // $id = Auth::guard('students')->id();
                    return redirect()->route('home');
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

    public function studentRegister(Request $request)
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

    public function studentLogout()
    {
        Auth::guard('students')->logout();
        return redirect()->route('index');
    }
}
