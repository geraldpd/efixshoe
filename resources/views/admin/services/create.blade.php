@extends('layouts.admin.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">Services</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>

            <form method="POST" action="{{ route('admin.services.store') }}">
                @csrf

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Name" value="{{ old('name') }}">

                        @if ($errors->has('name'))
                            <small class="help-block text-danger">
                                <strong>{{ $errors->first('name') }}</strong>
                            </small>
                        @endif
                    </div>

                    <br>

                    <div class="form-group col-md-6">
                        <label for="cost">Service Cost</label>
                        <input name="cost" type="number" class="form-control" id="cost" step=".10" max="99999" maxlength="5" placeholder="Service Cost" value="{{ old('cost') }}">

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
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" placeholder="Description" rows="10">{{ old('description') }}</textarea>

                        @if ($errors->has('description'))
                            <small class="help-block text-danger">
                                <strong>{{ $errors->first('description') }}</strong>
                            </small>
                        @endif
                    </div>
                </div>

                <br>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary float-right">
                        {{ __('Create') }}
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
