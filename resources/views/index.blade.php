@extends('master')
@section('title', 'Đăng nhập - Đăng ký')

@section('content')

<!-- Navbar -->
@include('includes.navbar2')
{{-- Content --}}
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <h4>STUDENT FORM</h4>
        </div>
    </div>

    {{-- Kiem tra loi - validate --}}
    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (session('status'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ session('status') }}
            </div>
            @endif
        </div>
    </div>

    {{-- Form đăng nhập --}}
    <div class="row">
        <div class="col-md-6">
            <!-- Login Box -->
            <div class="login-box">
                <div class="card">
                    <div class="card-body login-card-body">
                        <legend class="" style="text-align: center">Login</legend>
                        <p class="login-box-msg">Sign in to start your session</p>

                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="remember">
                                        <label for="remember">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-4">
                                    <button type="submit" name="login" class="btn btn-primary btn-block">Sign
                                        In</button>
                                </div>
                                <!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ route('forgot-password') }}">Quên mật khẩu</a>
                                </div>
                            </div>
                        </form>

                        <div class="social-auth-links text-center mb-3">
                            <p>- OR -</p>
                            <a href="#" class="btn btn-block btn-primary">
                                <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                            </a>
                            <a href="#" class="btn btn-block btn-danger">
                                <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                            </a>
                        </div>
                        <!-- /.social-auth-links -->
                    </div>
                    <!-- /.login-card-body -->
                </div>
            </div>
            <!-- /.login-box -->
        </div>

        {{-- Form đăng ký --}}
        <div class="col-md-6">
            <!-- Register Box -->
            <div class="register-box">
                <div class="card">
                    <div class="card-body register-card-body">
                        <legend class="" style="text-align: center">Register</legend>
                        <p class="login-box-msg">Register a new membership</p>

                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="name" placeholder="Full name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="re_password"
                                    placeholder="Retype password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                        <label for="agreeTerms">
                                            I agree to the <a href="#">terms</a>
                                        </label>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-4">
                                    <button type="submit" name="signup"
                                        class="btn btn-primary btn-block">Register</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>

                        <div class="social-auth-links text-center">
                            <p>- OR -</p>
                            <a href="#" class="btn btn-block btn-primary">
                                <i class="fab fa-facebook mr-2"></i>
                                Sign up using Facebook
                            </a>
                            <a href="#" class="btn btn-block btn-danger">
                                <i class="fab fa-google-plus mr-2"></i>
                                Sign up using Google+
                            </a>
                        </div>
                    </div>
                    <!-- /.form-box -->
                </div><!-- /.card -->
            </div>
            <!-- /.register-box -->
        </div>
    </div>
</div>
@endsection
