@extends('admin.master')

@section('title', 'Add new book - Admin')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Add Book</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item active">Add Book</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    document.getElementById('books').className += ' menu-open';
    document.getElementById('books_link').className += ' active';
    document.getElementById('add_book_link').className += ' active';
    document.getElementById('add_book_icon').className = 'far fa-dot-circle nav-icon';
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
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Book</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.storeBook') }}" method="POST" role="form">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Book Name</label>
                            <input type="text" class="form-control" name="name" id="" placeholder="Enter Book name">
                        </div>
                        <div class="form-group">
                            <label for="">Author</label>
                            <select class="form-control" name="author_id" id="">
                                <option value="">-- Chọn tác giả --</option>
                                @foreach ($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <select class="form-control select2" name="category_id[]" id="" multiple required>
                                <option value="">-- Chọn danh mục --</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" class="form-control" name="price" id="" placeholder="Price">
                        </div>
                        <div class="form-group">
                            <label for="">Quantity</label>
                            <input type="number" class="form-control" name="quantity" id="" placeholder="Quantity">
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
