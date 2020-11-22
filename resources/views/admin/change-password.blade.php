@extends('admin.master')

@section('title', 'Change Admin Password')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Change Password</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item active">Change Password</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">

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

    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Change Password</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.updatePassword') }}" method="POST" role="form">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Currrent Password</label>
                            <input type="password" class="form-control" name="password" id=""
                                placeholder="Current Password">
                        </div>
                        <div class="form-group">
                            <label for="">New Password</label>
                            <input type="password" class="form-control" name="new_password" id=""
                                placeholder="New Password">
                        </div>
                        <div class="form-group">
                            <label for="">Confirm New Password</label>
                            <input type="password" class="form-control" name="re_password" id=""
                                placeholder="New Password">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
