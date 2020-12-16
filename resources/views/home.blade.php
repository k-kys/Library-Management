@extends('master')

@section('title', 'Trang chủ')

@section('js')
<script>
    $('#home').addClass('active');
</script>
@endsection

@section('content')

{{-- Navbar --}}
@include('includes.navbar')
{{-- Content --}}
<div class="container">
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

    <div class="row justify-content-end" style="margin: 10px">
        <div class="col-md-10">
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control" type="search" name="keyword" value="{{ request()->get('keyword') }}"
                        placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div>
                <table style="width: 100%; margin-bottom: 30px">
                    @foreach ($books as $book)
                    <tr>
                        <th>
                            <h5><i>{{ $book->name }} &nbsp;&nbsp;</i>
                                @foreach ($book->categories as $category)
                                <span class="badge badge-sm badge-secondary">{{ $category->name }}</span>
                                @endforeach
                            </h5>
                        </th>
                    </tr>
                    <tr style="border-bottom: 1px solid #0485">
                        <td>Tác giả:<i> {{ $book->author->name }} </i></td>
                        <td>Giá: {{ $book->price }} VNĐ</td>
                        <td align="right">
                            <a class="btn btn-success btn-sm"
                                href="{{ route('borrow', ['id' => $book->id]) }}">Borrow</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-5 center-block">
            {{ $books->links() }}
        </div>
    </div>
</div>

@endsection
