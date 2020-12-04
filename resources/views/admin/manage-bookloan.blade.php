@extends('admin.master')

@section('title', 'Manage Issued Book')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Manage Book loan</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item active">Manage Book loan</li>
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
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataTable with default features</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="example1_length"><label>Show <select
                                            name="example1_length" aria-controls="example1"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> entries</label></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <form class="form-inline" method="get" action="">
                                    <div id="example1_filter" class="dataTables_filter"><label>Search:<input
                                                type="search" class="form-control form-control-sm" name="keyword"
                                                value="{{ request()->get('keyword') }}" placeholder="Keyword"
                                                aria-controls="example1"></label></div>
                                    <i style="color: silver">Search by Student name, Book name, Bookloan ID</i>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1"
                                    class="table table-bordered table-striped dataTable dtr-inline collapsed"
                                    role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                ID</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                Student Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                Book Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                Date issued</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                Date due for return</th>
                                            <th>Date returned</th>
                                            <th>Status</th>
                                            <th>Amount of fine</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bookLoans as $bookLoan)
                                        <tr role="row" class="odd">
                                            <td>{{ $bookLoan->id }}</td>
                                            <td>{{ $bookLoan->student_name }}</td>
                                            <td>{{ $bookLoan->book_name }}</td>
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
                                                <a class="btn btn-primary"
                                                    href="{{ route('admin.editBookLoan', ['id' => $bookLoan->id]) }}"><i
                                                        class="fas fa-edit"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing
                                    1 to 10 of 57 entries</div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                {{-- <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled" id="example1_previous">
                                            <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0"
                                                class="page-link">Previous</a></li>
                                        <li class="paginate_button page-item active"><a href="#"
                                                aria-controls="example1" data-dt-idx="1" tabindex="0"
                                                class="page-link">1</a></li>
                                        <li class="paginate_button page-item next" id="example1_next"><a href="#"
                                                aria-controls="example1" data-dt-idx="7" tabindex="0"
                                                class="page-link">Next</a></li>
                                    </ul>
                                </div> --}}
                                {{ $bookLoans->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
@endsection
