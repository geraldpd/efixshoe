@extends('adminlte::page')

@section('title', 'Payment Methods')

@section('content_header')
    <h1>Payment Methods</h1>
@stop

@section('content')

@php
    $heads = [
        '#',
        'Name',
        'Account Name',
        'Account Number',
        'Active',
        'Action'
    ];

    $d = [];
    foreach ($payment_methods as $payment_method) {
        $d[] = [
            $payment_method->id,
            $payment_method->name,
            $payment_method->account_name,
            $payment_method->account_number,
            $payment_method->is_active ? 'Yes' : 'No',
            "<a href='/admin/payment_methods/$payment_method->id/edit' title='Edit Payment Method'><i class='fa fa-edit'></i></a>"
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
            ['orderable' => false],
            ['orderable' => false]
        ],
    ];
@endphp

@if(session()->has('message'))
    <div class="alert alert-info">
        {{ session()->get('message') }}
    </div>
@endif

<a href="{{ route('admin.payment_methods.create') }}" role="button" class="btn btn-primary float-left">Create</a>
<br><br><br>

<x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config" striped hoverable bordered beautify/>

@endsection
