@extends('master')

@section('title', 'Student Borrow')



@section('content')

{{-- Navbar --}}
@include('includes.navbar')
{{-- Content --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{ route('storeBorrow') }}">
                @csrf
                <div class="form-group">
                    <label for="">Student Name: {{ $student->name }}</label>
                    <input id="" class="form-control" type="text" name="student_id" value="{{ $student->id }}" readonly>
                </div>
                <div class="form-group">
                    <label for="">Book Name: {{ $book->name }}</label>
                    <input id="" class="form-control" type="text" name="book_id" value="{{ $book->id }}" readonly>
                </div>
                <div class="form-group">
                    <label for="">Date Issued</label>
                    <input id="" class="form-control" type="date" name="date_issued" value="{{ $dateIssued }}" readonly>
                </div>
                <div class="form-group">
                    <label for="">Date due for return</label>
                    <input id="" class="form-control" type="date" name="date_due_for_return"
                        value="{{ $dateDueForReturn }}" readonly>
                </div>
                <button type="submit" class="btn btn-primary">Create borrow</button>
            </form>
        </div>
    </div>
</div>
@endsection