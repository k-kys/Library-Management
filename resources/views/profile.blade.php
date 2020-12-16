@extends('master')

@section('title', 'My Profile')

@section('js')
<script>
    $('#my_profile').addClass('active');
</script>
@endsection

@section('content')

{{-- Navbar --}}
@include('includes.navbar')
{{-- Content --}}
<div class="container-fluid">
    {{-- <div class="row">
        <div class="col-md-12">
            <h2>MY PROFILE</h2>
        </div>
    </div> --}}
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
        <div class="col-md-8">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">My Profile</h3>
                </div>
                <form action="{{ route('update', ['id' => $profile->id]) }}" method="POST" role="form"
                    class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Student ID: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $profile->id }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Register Date: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $profile->created_at }}" disabled>
                            </div>
                        </div>
                        {{-- neu co ngay updated --}}
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Last Update Date: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $profile->updated_at }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Status:</label>
                            <div class="col-sm-10">
                                @if ($profile->status == 1)
                                <span style="color: green"><b>Active</b></span>
                                @else
                                <span style="color: red"><b>Blocked</b></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Name: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="{{ $profile->name }}"
                                    placeholder="Student Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Email: </label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" value="{{ $profile->email }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>



        </div>
    </div>
</div>

@endsection
