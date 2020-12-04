@extends('master')

@section('title', 'Quên mật khẩu')

@section('content')

<!-- Navbar -->
@include('includes.navbar2')
{{-- Content --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Password Recovery</h4>
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

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <form action="{{ route('forgot-password') }}" method="POST" role="form">
                @csrf
                <legend>Form title</legend>

                <div class="form-group">
                    <label for="">Enter Email</label>
                    <input type="text" class="form-control" id="" name="email" placeholder="Input field">
                </div>

                <div class="form-group">
                    <label for="">Enter New Password</label>
                    <input type="text" class="form-control" id="" name="new_password" placeholder="Input field">
                </div>

                <div class="form-group">
                    <label for="">Enter Retype Password</label>
                    <input type="text" class="form-control" id="" name="re_password" placeholder="Input field">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('index') }}">Login</a>
            </form>
        </div>
    </div>
</div>

@show