@extends('master')

@section('title', 'Change Password')

@section('js')
<script>
    $('#change_password').addClass('active');
</script>
@endsection

@section('content')

{{-- Navbar --}}
@include('includes.navbar')
{{-- Content --}}
<div class="container-fluid">

    {{-- Kiem tra loi - validate --}}
    <div class="row">
        <div class="col-md-10">
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
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Change password</h3>
                </div>
                <form action="{{ route('updatePassword') }}" method="POST" role="form">
                    @method('PUT')
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">Current Password</label>
                            <input type="password" class="form-control" name="password" id=""
                                placeholder="Current password">
                        </div>

                        <div class="form-group">
                            <label for="">New Password</label>
                            <input type="password" class="form-control" name="new_password" id=""
                                placeholder="New password">
                        </div>

                        <div class="form-group">
                            <label for="">Confirm New Password</label>
                            <input type="password" class="form-control" name="re_password" id=""
                                placeholder="New password">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="change" class="btn btn-primary">Change Password</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>

@endsection
