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
                <h3 class="card-title">Edit Payment Method</small></h3>
            </div>

            <form method="POST" action="{{ route('admin.payment_methods.update', [$payment_method]) }}" enctype="multipart/form-data" id="form">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Name" value="{{ $payment_method->name ?? old('name') }}">

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
                            <input name="account_name" type="text" class="form-control" id="account_name" placeholder="Account Name" value="{{ $payment_method->account_name ?? old('account_name') }}">

                            @if ($errors->has('account_name'))
                                <small class="help-block text-danger">
                                    <strong>{{ $errors->first('account_name') }}</strong>
                                </small>
                            @endif
                        </div>

                        <br>

                        <div class="form-group col-md-6">
                            <label for="Account Number">Account Number</label>
                            <input name="account_number" type="text" class="form-control" id="account_number" placeholder="Account Number" value="{{ $payment_method->account_number ?? old('account_number') }}">

                            @if ($errors->has('account_number'))
                                <small class="help-block text-danger">
                                    <strong>{{ $errors->first('account_number') }}</strong>
                                </small>
                            @endif
                        </div>
                    </div>

                    <x-adminlte-input-file name="image" label="Image" placeholder="Choose a file..."/>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" {{ $payment_method->is_active ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">
                            Active
                        </label>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right">
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
