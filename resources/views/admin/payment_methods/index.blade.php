@extends('layouts.admin.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <h1>Payment Methods</h1>

        @if(session()->has('message'))
            <div class="alert alert-info">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="col-md-12">

            <a href="{{ route('admin.payment_methods.create') }}" role="button" class="btn btn-primary float-right">Create</a>

            <br>
            <br>

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Account Name</th>
                        <th scope="col">Account Number</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($payment_methods as $payment_method)
                        <tr>
                            <td>{{ $payment_method->id }}</td>
                            <td>{{ $payment_method->name }}</td>
                            <td>{{ $payment_method->account_name }}</td>
                            <td>{{ $payment_method->account_number }}</td>
                            <td>{{ $payment_method->is_active ? 'Yes' : 'No' }}</td>
                            <td><a href="{{ route('admin.payment_methods.edit', [$payment_method->id]) }}">Edit</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="6">No Payment Methods</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $payment_methods->links() }}

        </div>
    </div>
</div>
@endsection
