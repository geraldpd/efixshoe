@extends('layouts.admin.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @if(session()->has('message'))
            <div class="alert alert-info">
                {{ session()->get('message') }}
            </div>
        @endif

        <h1>Vouchers</h1>

        <div class="col-md-12">

            <a href="{{ route('admin.vouchers.create') }}" role="button" class="btn btn-primary float-right">Create</a>

            <br>
            <br>

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Code</th>
                        <th scope="col">Percent Amount</th></th>
                        <th scope="col">Quantity</th></th>
                        <th scope="col">Remaining</th></th>
                        <th scope="col">Expiry Date</th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($vouchers as $voucher)
                        <tr>
                            <td>{{ $voucher->id }}</td>
                            <td>{{ $voucher->code }}</td>
                            <td>{{ $voucher->amount }}%</td>
                            <td>{{ $voucher->quantity }}</td>
                            <td>{{ $voucher->remaining }}</td>
                            <td>{{ $voucher->expiry_date ? $voucher->expiry_date->format('Y-m-d') : 'None'}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="7">No Voucher</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $vouchers->links() }}

        </div>
    </div>
</div>
@endsection
