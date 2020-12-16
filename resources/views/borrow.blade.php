@extends('master')

@section('title', 'Student Borrow')



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
        <div class="col-md-8">

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Check out borrow</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @if ($quantityStock > 0)
                <form class="form-horizontal" method="post" action="{{ route('storeBorrow') }}">
                    <div class="card-body">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Student Name: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="student_name"
                                    placeholder="Student Name" value="{{ $student->name }}" readonly>
                                <input hidden type="text" class="form-control" id="" name="student_id"
                                    placeholder="Student Name" value="{{ $student->id }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Book Name: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" name="book_name" placeholder="Book Name"
                                    value="{{ $book->name }}" readonly>
                                <input hidden type="text" class="form-control" id="" name="book_id"
                                    placeholder="Book Name" value="{{ $book->id }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Date Issued</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="" name="date_issued"
                                    placeholder="Date issued" value="{{ $dateIssued }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Date due for return</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="" name="date_due_for_return"
                                    placeholder="Date due for return" value="{{ $dateDueForReturn }}" readonly>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Create borrow</button>
                        <a class="btn btn-default float-right" href="{{ route('home') }}">Cancel</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
                @else
                <br>
                <h5 style="text-align: center">
                    <i>Sách này đã được mượn hết rồi. Vui lòng chọn sách khác tại
                        <a href="{{ route('home') }}">trang chủ</a>
                    </i>
                </h5>
                <br>
                <a class="btn btn-default float-right" href="{{ route('home') }}">Cancel</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
