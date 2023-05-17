@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12 d-print-none">
                <button class="print-buttons btn btn-primary float-end" onClick="window.print()">Print</button>
                <br>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.reports.index') }}">Reports</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Customer Report</li>
                    </ol>
                </nav>
            </div>

            <div class="col-md-12">

                <div class="d-print-block d-none">
                    <img src="{{ asset('images/logo.png') }}" alt="eFixShoe Logo" style="position: absolute; float: right; right: 0; width: 10%;">
                    <br>
                    <h1>Customer Report</h1>
                    <span class="col-sm-8">Print Date: {{ now() }}</span>
                </div>

                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Address</th>
                            <th scope="col">Date Joined</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($result as $customer)
                            <tr>
                                <td> {{ $customer->id }} </td>
                                <td> {{ $customer->first_name }} </td>
                                <td> {{ $customer->last_name }} </td>
                                <td> {{ $customer->email }} </td>
                                <td> {{ $customer->contact_number }} </td>
                                <td> {{ $customer->address }} </td>
                                <td> {{ $customer->created_at }} </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="7">No Customers</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>

        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* style */
    </style>
@endpush

@push('scripts')
    <script>
        /* scripts */
    </script>
@endpush