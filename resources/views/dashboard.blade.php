@extends('master')

@section('title', 'Dashboard')

@section('js')
<script>
    $('#dashboard').addClass('active');
</script>
@endsection

@section('content')

{{-- Navbar --}}
@include('includes.navbar')
{{-- Content --}}
<div class="container">
    <div class="row pad-botm">
        <div class="col-md-12">
            <h2>STUDENT DASHBOARD</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="alert alert-info back-widget-set text-center">
                <i class="fa fa-bars fa-5x" aria-hidden="true"></i>
                <h3>{{ $bookLoan }}</h3>
                Tổng số sách mượn
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="alert alert-info back-widget-set text-center">
                <i class="fa fa-address-book fa-5x" aria-hidden="true"></i>
                <h3>{{ $bookReturned }}</h3>
                Sách đã trả
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="alert alert-info back-widget-set text-center">
                <i class="fa fa-recycle fa-5x" aria-hidden="true"></i>
                <h3>{{ $bookNotReturn }}</h3>
                Sách chưa trả
            </div>
        </div>
    </div>
</div>

@endsection