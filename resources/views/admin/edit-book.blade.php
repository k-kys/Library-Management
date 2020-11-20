@extends('admin.master')
@section('title', 'Edit Book')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h4>Edit Book</h4>
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
        <div class="row col-md-8">
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
