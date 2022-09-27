@extends('layouts.frontend.main')

@section('content')
    @livewire('account-detail', compact('user'))

     <!-- page Title -->
     <section id="page__title">
        <div class="container">
            <h2 class="page__title__text">
                Recent Bookings
            </h2>
        </div>
    </section>
    @livewire('customer-bookings')
@endsection