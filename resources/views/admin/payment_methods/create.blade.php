@extends('layouts.admin.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.payment_methods.index') }}">Payment Methods</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>

            <form method="POST" action="{{ route('admin.payment_methods.store') }}">
                @csrf

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

                <br>

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
