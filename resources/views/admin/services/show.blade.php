@extends('layouts.admin.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">Services</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $service->name }}</li>
                </ol>
            </nav>

            @if(session()->has('message'))
                <div class="alert alert-info">
                    {{ session()->get('message') }}
                </div>
            @endif

            <i class="bi-alarm"></i>
            <i class="fa fa-check"></i>

            <h1>{{ $service->name }}</h1>

            <p>{{ $service->description }}</p>

            <hr>

            <a href="{{ route('admin.services.edit', [$service]) }}" role="button" class="btn btn-primary float-right">Edit</a>
            <a href="#{{-- route('admin.services.destroy',[$service]) --}}" role="button" class="btn btn-primary float-right">Delete</a>

        </div>
    </div>
</div>
@endsection
