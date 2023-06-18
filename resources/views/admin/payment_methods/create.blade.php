@extends('adminlte::page')

@section('title', 'Payment Methods')

@section('content_header')
    <h1>Payment Methods</h1>
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create New Payment Method</small></h3>
            </div>

            <form method="POST" action="{{ route('admin.payment_methods.store') }}" enctype="multipart/form-data" id="form">
                @csrf

                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Name" value="{{ old('name') }}">

                            @if ($errors->has('name'))
                                <small class="help-block text-danger">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </small>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="Account name">Account Name</label>
                            <input name="account_name" type="text" class="form-control" id="account_name" placeholder="Account Name" value="{{ old('account_name') }}">

                            @if ($errors->has('account_name'))
                                <small class="help-block text-danger">
                                    <strong>{{ $errors->first('account_name') }}</strong>
                                </small>
                            @endif
                        </div>

                        <br>

                        <div class="form-group col-md-6">
                            <label for="Account Number">Account Number</label>
                            <input name="account_number" type="text" class="form-control" id="account_number" placeholder="Account Number" value="{{ old('account_number') }}">

                            @if ($errors->has('name'))
                                <small class="help-block text-danger">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </small>
                            @endif
                        </div>
                    </div>

                    <x-adminlte-input-file name="image" label="Image" placeholder="Choose a file..."/>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right">
                            {{ __('Create') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
