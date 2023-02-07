@extends('layouts.frontend.main')

@section('content')


    <section id="hero">
        <div class="container">
            <div class="hero__wrapper">
            <div class="hero__left" data-aos="fade-left">
                <div class="hero__left__wrapper">

                <h1 class="hero__heading">eFixShoe: An Online Shoe Care and Services in Metro Vigan</h1>
                <p class="hero__info">
                    Providing shoe cleaning has never been a new notion, but the idea behind "Clean Steps" is to take it to the next level, "One Step Above," where people can be amazed by the results.
                    We hand wash your shoes making sure that every dirt is taken care of. We brush 'em, soap 'em clean because we value your time. Contact us, and we will pick them up and get them delivered within Metro Vigan.
                </p>
                <div class="button__wrapper">
                    <a href="{{ route('services') }}" class="btn primary-btn">Explore Services</a>
                    <a href="{{ route('customer.booking') }}" class="btn">Avail A Service</a>
                </div>
                </div>
            </div>
            <div class="hero__right" data-aos="fade-right">
                <div class="hero__imgWrapper">
                <img src="{{ asset('images/logo.png') }}">
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection
