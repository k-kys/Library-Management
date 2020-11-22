@extends('master')
@section('title', 'My Profile')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>MY PROFILE</h2>
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
        <div class="col-md-9 col-md-offset-1">

            <form action="{{ route('update', ['id' => $profile->id]) }}" method="POST" role="form">
                @csrf
                @method('PUT')
                {{-- <legend>My Profile</legend> --}}

                <div class="form-group">
                    <label for="">Student ID: </label> {{ $profile->id }}
                </div>

                <div class="form-group">
                    <label for="">Register Date: </label> {{ $profile->created_at }}
                </div>
                {{-- neu co ngay updated --}}
                <div class="form-group">
                    <label for="">Last Update Date: </label> {{ $profile->updated_at }}
                </div>

                <div class="form-group">
                    <label for="">Status:</label>
                    @if ($profile->status == 1)
                    <span style="color: green">Active</span>
                    @else
                    <span style="color: red">Blocked</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" id="" value="{{ $profile->name }}"
                        placeholder="Input field">
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" id="" value="{{ $profile->email }}" readonly
                        placeholder="Input field">
                </div>

                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>

        </div>
    </div>
</div>

@endsection
