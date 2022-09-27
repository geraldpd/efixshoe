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
                        <th scope="col">Is Used</th>
                        <th scope="col">Batch</th></th>
                        <th scope="col">Expiry Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($vouchers as $voucher)
                        <tr>
                            <td>{{ $voucher->id }}</td>
                            <td>{{ $voucher->code }}</td>
                            <td>{{ $voucher->is_used ? 'Yes' : 'No' }}</td>
                            <td>{{ $voucher->batch }}</td>
                            <td>{{ $voucher->expiry_date ?? 'None'}}</td>
                            <td>action</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="6">No Voucher</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $vouchers->links() }}

        </div>
    </div>
</div>
@endsection
