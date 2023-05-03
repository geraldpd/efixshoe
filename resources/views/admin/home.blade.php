@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $bookings }}</h3>
                        <p>New Bookings (Today)</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-list"></i>
                    </div>
                    <a href="{{ route('admin.bookings.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $services }}</h3>
                        <p>Services</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-cog"></i>
                    </div>
                    <a href="{{ route('admin.services.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $pmethods }}</h3>
                        <p>Payment Methods</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-shopping-cart"></i>
                    </div>
                    <a href="{{ route('admin.payment_methods.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $vouchers }}</h3>
                        <p>Vouchers</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-credit-card"></i>
                    </div>
                    <a href="{{ route('admin.vouchers.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
