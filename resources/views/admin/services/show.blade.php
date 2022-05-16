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

            <div class="card">
                @if($service->image)
                    <img src="{{ $service->image_url }}" class="card-img-top" alt="{{ $service->name }}" style="object-fit:contain; width:200px; height:300px;">
                @endif

                <div class="card-body">
                  <h5 class="card-title">{{ $service->name }}</h5>
                  <p class="card-text">{{ $service->description }}</p>
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Cost: <b>{{ $service->cost }}</b></li>
                    <li class="list-group-item">Turnaround Time:  <b>{{ $service->turnaround_time }} day(s)</b></li>
                    <li class="list-group-item">{{ $service->is_active ? 'ACTIVE'  : 'INACTIVE' }}</li>
                </ul>

                <div class="card-body">
                    <a href="{{ route('admin.services.edit', [$service]) }}" role="button" class="btn btn-primary float-right">Edit</a>
                    <button class="btn btn-secondary float-right" disabled>Delete</button>
                </div>
              </div>

        </div>
    </div>
</div>
@endsection
