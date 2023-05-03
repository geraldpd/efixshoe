@extends('adminlte::page')

@section('title', 'Vouchers')

@section('content_header')
    <h1>Vouchers</h1>
@stop

@section('content')

@php
    $heads = [
        '#',
        'Code',
        'Percent Amount',
        'Quantity',
        'Remaining',
        'Expiry Date'
    ];

    $d = [];
    foreach ($vouchers as $voucher) {
        $d[] = [
            $voucher->id,
            $voucher->code,
            $voucher->amount . '%',
            $voucher->quantity,
            $voucher->remaining,
            $voucher->expiry_date ? $voucher->expiry_date->format('Y-m-d') : 'None'
        ];
    }

    $config = [
        'data' => $d,
        'order' => [[0, 'desc']],
        'columns' => [
            null, 
            null,
            null,
            null,
            null,
            null,
        ],
    ];
@endphp

@if(session()->has('message'))
    <div class="alert alert-info">
        {{ session()->get('message') }}
    </div>
@endif

<a href="{{ route('admin.vouchers.create') }}" role="button" class="btn btn-primary float-left">Create</a>
<br><br><br>

<x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config" striped hoverable bordered compressed/>

@endsection
