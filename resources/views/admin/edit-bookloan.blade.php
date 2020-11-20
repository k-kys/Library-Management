@extends('admin.master')
@section('title', 'Edit Issued Book')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h4>Edit Book Loan</h4>
        </div>
    </div>
    <div class="row">
        <div class="row col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit BookLoan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.updateBookLoan', ['id' => $bookLoan->id]) }}" method="POST" role="form">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Student Name</label>
                            <input type="text" class="form-control" name="" id="" value="{{ $bookLoan->student->name }}"
                                placeholder="Student name" readonly>
                            {{-- @php
                            $studentIds = $bookLoan->student->pluck('id')->toArray();
                            @endphp
                            <select name="student_id" id="input" class="form-control" aria-readonly="true">
                                @foreach ($students as $student)
                                <option {{ in_array($student->id, $studentIds) ? 'selected' : '' }}
                            value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                            </select> --}}
                        </div>
                        <div class="form-group">
                            <label for="">Book Name</label>
                            <input type="text" class="form-control" name="" id="" value="{{ $bookLoan->book->name }}"
                                placeholder="Book Name" readonly>
                            {{-- @php
                            $bookIds = $bookLoan->book->pluck('id')->toArray();
                            @endphp
                            <select name="book_id" id="input" class="form-control" aria-readonly="true">
                                @foreach ($books as $book)
                                <option {{ in_array($book->id, $bookIds) ? 'selected' : '' }} value="{{ $book->id }}">
                            {{ $book->name }}</option>
                            @endforeach
                            </select> --}}
                        </div>
                        <div class="form-group">
                            <label for="">Date issued</label>
                            <input type="text" class="form-control" name="" id="" value="{{ $bookLoan->date_issued }}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Date due for return</label>
                            <input type="text" class="form-control" name="" id=""
                                value="{{ $bookLoan->date_due_for_return }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Date returned</label>
                            <input type="text" class="form-control" name="" id="" value="{{ $bookLoan->date_returned }}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            @if ($bookLoan->status == 1)
                            <input type="text" class="form-control" name="" id="" value="Returned" readonly>
                            @else
                            <input type="text" class="form-control" name="" id="" value="Not Return Yet" readonly>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Amount of fine</label>
                            @if ($bookLoan->amount_of_fine)
                            <input type="number" class="form-control" name="" value="{{ $bookLoan->amount_of_fine }}"
                                readonly>
                            @else
                            <input type="number" class="form-control" name="fine" value="0"
                                placeholder="Nhập số tiền phạt">
                            @endif
                        </div>
                    </div>
                    <!-- /.card-body -->

                    @if ($bookLoan->status == 0)
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    @endif

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
