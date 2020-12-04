@extends('admin.master')

@section('title', 'Edit Book')

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Edit Book</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item active">Edit Book</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    document.getElementById('books').className += ' menu-open';
    document.getElementById('books_link').className += ' active';
    document.getElementById('manage_book_link').className += ' active';
    document.getElementById('manage_book_icon').className = 'far fa-dot-circle nav-icon';
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
                    <h3 class="card-title">Edit Book</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.updateBook', ['id' => $book->id]) }}" method="POST" role="form">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Book Name</label>
                            <input type="text" class="form-control" name="name" id="" value="{{ $book->name }}"
                                placeholder="Enter Book name">
                        </div>
                        <div class="form-group">
                            <label for="">Author</label>
                            @php
                            $authorIds = $book->author->pluck('id')->toArray();
                            @endphp
                            <select class="form-control" name="author_id" id="">
                                @foreach ($authors as $author)
                                <option {{ in_array($author->id, $authorIds) }} value="{{ $author->id }}">
                                    {{ $author->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            @php
                            $categoryIds = $book->categories->pluck('id')->toArray();
                            @endphp
                            <select class="form-control select2" name="category_id[]" id="" multiple required>
                                @foreach ($categories as $category)
                                <option {{ in_array($category->id, $categoryIds)?'selected':'' }}
                                    value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" class="form-control" name="price" id="" value="{{ $book->price }}"
                                placeholder="Price">
                        </div>
                        <div class="form-group">
                            <label for="">Add Quantity (số lượng nhập thêm)</label>
                            <input type="number" class="form-control" name="add_quantity" id=""
                                placeholder="Add Quantity">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
