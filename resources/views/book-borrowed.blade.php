@extends('master')
@section('title', 'Book borrow')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>BOOK BORROWED</h2>
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
