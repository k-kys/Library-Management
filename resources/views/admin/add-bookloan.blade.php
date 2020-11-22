@extends('admin.master')

@section('title', 'Add new Book loan')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Add Book loan</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item active">Add Book loan</li>
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
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Book Loan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.storeBookLoan') }}" method="POST" role="form">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Student Name</label>
                            {{-- <input type="text" class="form-control" name="name" id="" placeholder="Enter Book name"> --}}
                            <select name="student_id" id="input" class="form-control">
                                <option value="">-- Chọn sinh viên --</option>
                                @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Book Name</label>
                            {{-- <input type="text" class="form-control" name="" id="author" placeholder="Author"> --}}
                            <select name="book_id" id="input" class="form-control">
                                <option value="">-- Chọn sách --</option>
                                @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Date Issued</label>
                            <input type="text" id="" class="form-control" disabled value="{{ $dateIssued }}">
                        </div>
                        <div class="form-group">
                            <label for="">Date due for return</label>
                            <input type="date" name="date_due_for_return" id="" class="form-control"
                                placeholder="Date due for return">
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
