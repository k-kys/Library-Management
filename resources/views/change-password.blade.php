@extends('master')
@section('title', 'Change Password')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>CHANGE PASSWORD</h2>
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
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ session('status') }}
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <form action="{{ route('updatePassword') }}" method="POST" role="form">
                @method('PUT')
                @csrf
                {{-- <legend>Change password</legend> --}}

                <div class="form-group">
                    <label for="">Current Password</label>
                    <input type="password" class="form-control" name="password" id="" placeholder="Input field">
                </div>

                <div class="form-group">
                    <label for="">New Password</label>
                    <input type="password" class="form-control" name="new_password" id="" placeholder="Input field">
                </div>

                <div class="form-group">
                    <label for="">Confirm New Password</label>
                    <input type="password" class="form-control" name="re_password" id="" placeholder="Input field">
                </div>

                <button type="submit" name="change" class="btn btn-primary">Change Password</button>
            </form>

        </div>
    </div>
</div>

@endsection
