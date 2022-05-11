@extends('layouts.admin.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.payment_methods.index') }}">Payment Methods</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $payment_method->name }}</li>
                </ol>
            </nav>

            @if(session()->has('message'))
                <div class="alert alert-info">
                    {{ session()->get('message') }}
                </div>
            @endif

            <i class="bi-alarm"></i>
            <i class="fa fa-check"></i>

            <h1>{{ $payment_method->name }}</h1>
            <h3>{{ $payment_method->account_name }}</h3>
            <h3>{{ $payment_method->account_number }}</h3>

            <hr>

            <a href="{{ route('admin.payment_methods.edit', [$payment_method]) }}" role="button" class="btn btn-primary float-right">Edit</a>
            <a href="#{{-- route('admin.payment_methods.destroy',[$service]) --}}" role="button" class="btn btn-primary float-right">Delete</a>

        </div>
    </div>
</div>
@endsection
