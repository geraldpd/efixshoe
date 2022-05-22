@extends('layouts.frontend.main')

@section('content')
    <!-- page Title -->
    <section id="page__title" data-aos="fade-up">
        <div class="container">
            <h2 class="page__title__text">
                My Cart
            </h2>
        </div>
    </section>

    @livewire('my-cart')
@endsection
