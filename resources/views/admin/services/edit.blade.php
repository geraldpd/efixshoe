@extends('layouts.admin.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">Services</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.services.show', [$service]) }}">{{ $service->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
            <form method="POST" action="{{ route('admin.services.update', [$service]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Name" value="{{ $service->name ?? old('name') }}">

                        @if ($errors->has('name'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('name') }}</strong>
                        </small>
                        @endif
                    </div>

                    <br>

                    <div class="form-group col-md-6">
                        <label for="cost">Service Cost</label>
                        <input name="cost" type="number" class="form-control" id="cost" step=".10" max="99999" maxlength="5" placeholder="Service Cost" value="{{ $service->cost ?? old('cost') }}">

                        @if ($errors->has('cost'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('cost') }}</strong>
                        </small>
                        @endif
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="turnaround_time">Turnaround Time</label>
                        <input name="turnaround_time" type="number" min="1" max="7" class="form-control" id="turnaround_time" value="{{ $service->turnaround_time ?? old('turnaround_time') }}" title="The number of days this service will take to finish">

                        @if ($errors->has('turnaround_time'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('turnaround_time') }}</strong>
                        </small>
                        @endif
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" placeholder="Description" rows="10">{{ $service->description ?? old('description') }}</textarea>

                        @if ($errors->has('description'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('description') }}</strong>
                        </small>
                        @endif
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control" type="file" id="image" name="image">

                        @if ($errors->has('image'))
                            <small class="help-block text-danger">
                                <strong>{{ $errors->first('image') }}</strong>
                            </small>
                        @endif
                    </div>
                </div>

                <br>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" {{ $service->is_active ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">
                        Active
                    </label>
                </div>

                <br>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary float-right">
                        {{ __('Update') }}
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
