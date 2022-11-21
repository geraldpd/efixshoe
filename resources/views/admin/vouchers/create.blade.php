@extends('layouts.admin.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.vouchers.index') }}">Vouchers</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>

            <form method="POST" action="{{ route('admin.vouchers.store') }}">
                @csrf

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="count">Count</label>
                        <input name="count" type="number" class="form-control" id="count" min="1" max="1000" placeholder="Number of Vouchers to be created" value="{{ old('count') ?? 1 }}" required>

                        @if ($errors->has('count'))
                            <small class="help-block text-danger">
                                <strong>{{ $errors->first('count') }}</strong>
                            </small>
                        @endif
                    </div>

                    <br>

                    <div class="form-group col-md-6">
                        <label for="Prefix">Prefix</label>
                        <input name="prefix" type="text" class="form-control" id="prefix" placeholder="Prefix" value="{{ old('prefix') }}">

                        @if ($errors->has('Prefix'))
                            <small class="help-block text-danger">
                                <strong>{{ $errors->first('Prefix') }}</strong>
                            </small>
                        @endif
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="amound">Percent Amount</label>
                        <input name="amount" type="text" class="form-control" id="amount" placeholder="How much discount? (e.g. Input 10 = 10% discount)" value="{{ old('amount') }}" required>

                        @if ($errors->has('amount'))
                            <small class="help-block text-danger">
                                <strong>{{ $errors->first('amount') }}</strong>
                            </small>
                        @endif
                    </div>

                    <br>

                    <div class="form-group col-md-6">
                        <label for="expiry_date">Expiry Date</label>
                        <input name="expiry_date" type="date" min="{{ now()->toDateString('Y-m-d') }}" class="form-control" id="expiry_date" step=".10" max="99999" maxlength="5" placeholder="Expiry Date" value="{{ old('expiry_date') }}">

                        @if ($errors->has('expiry_date'))
                            <small class="help-block text-danger">
                                <strong>{{ $errors->first('expiry_date') }}</strong>
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
