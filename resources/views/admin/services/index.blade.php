@extends('adminlte::page')

@section('title', 'Services')

@section('content_header')
    <h1>Services</h1>
@stop

@section('content')

@php
    $heads = [
        '#',
        'Name',
        'Description',
        'Turnaround Days',
        'Cost',
        'Active',
        'Action'
    ];

    $d = [];
    foreach ($services as $service) {
        $d[] = [
            $service->id,
            $service->name,
            $service->description,
            $service->turnaround_time,
            $service->cost,
            $service->is_active ? 'Yes' : 'No',
            "<a href='services/$service->id/edit'>Edit</a>"
        ];
    }

    $config = [
        'data' => $d,
        'order' => [[0, 'desc']],
        'columns' => [
            null, 
            ['orderable' => false],
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

<a href="{{ route('admin.services.create') }}" role="button" class="btn btn-primary float-left">Create</a>
<br><br><br>

<x-adminlte-datatable id="table2" :heads="$heads" head-theme="dark" :config="$config" striped hoverable bordered compressed/>

@endsection
