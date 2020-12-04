@extends('master')

@section('title', 'Book borrow')

@section('js')
<script>
    $('#book_borrowed').addClass('active');
</script>
@endsection

@section('content')

{{-- Navbar --}}
@include('includes.navbar')
{{-- Content --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>BOOK BORROWED</h2>
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
        <div class="col-md-12">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Book Name</th>
                        <th>Date issued</th>
                        <th>Date due for return</th>
                        <th>Date returned</th>
                        <th>Status</th>
                        <th>Amount of fine</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookLoans as $bookLoan)
                    <tr>
                        <td>{{ $bookLoan->id }}</td>
                        <td>{{ $bookLoan->name }}</td>
                        <td>{{ $bookLoan->date_issued }}</td>
                        <td>{{ $bookLoan->date_due_for_return }}</td>
                        <td>{{ $bookLoan->date_returned }}</td>
                        <td>
                            @if ($bookLoan->status == 0)
                            <span class="badge badge-warning"> Not return yet</span>
                            @else
                            <span class="badge badge-primary"> Returned</span>
                            @endif
                        </td>
                        <td>{{ $bookLoan->amount_of_fine }}</td>
                        <td>
                            @if ($bookLoan->status == 0)
                            <a class="btn btn-primary"
                                href="{{ route('returnBorrow', ['id' => $bookLoan->id]) }}">Return Book</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection