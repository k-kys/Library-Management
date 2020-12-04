@extends('admin.master')

@section('title', 'Edit Book loan')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Edit Book loan</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item active">Edit Book loan</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    document.getElementById('books_borrowed').className += ' menu-open';
    document.getElementById('books_borrowed_link').className += ' active';
    document.getElementById('manage_borrowed_link').className += ' active';
    document.getElementById('manage_borrowed_icon').className = 'far fa-dot-circle nav-icon';
</script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
