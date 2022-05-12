@extends('layouts.frontend.main')

@section('content')
<!-- page Title -->
<section id="page__title" data-aos="fade-up">
    <div class="container">
        <h2 class="page__title__text">
            Our Services
        </h2>
    </div>
</section>

<!-- Our Services -->
<section id="ourServices" data-aos="fade-up">
    <div class="container">
        <div class="ourServices__wrapper">
            <div class="ourServices__item">
                <div class="ourServices__item__img">
                    <img src="{{ asset('images/deepclean.png') }}" alt="deep clean img">
                </div>
                <div class="ourServices__item__info">
                <h3 class="ourServices__item__title">
                    Deep Clean
                </h3>
                <h4 class="ourServices__item__price">PHP 300.00</h4>
                <p class="ourServices__item__text">
                    Full deep clean of uppers and lowers. <br>
                    Additional PHP 200.00 for suede.
                </p>
                </div>
            </div>
            <div class="ourServices__item">
                <div class="ourServices__item__img">
                    <img src="{{ asset('images/unyellowing.jpg') }}" alt="unyellowing img">
                </div>
                <div class="ourServices__item__info">
                <h3 class="ourServices__item__title">
                    Unyellowing
                </h3>
                <h4 class="ourServices__item__price">PHP 300.00</h4>
                <p class="ourServices__item__text">
                    With our deoxidization procedure, we bring your yellow and faded soles back to life. This takes time, so expect to be without your kicks for at least a week. Whitening shoes sneaker cleaning sneaker restoration.
                </p>
                </div>
            </div>
            <div class="ourServices__item">
                <div class="ourServices__item__img">
                    <img src="{{ asset('images/reglue.jpg') }}" alt="reglue img">
                </div>
                <div class="ourServices__item__info">
                <h3 class="ourServices__item__title">
                    Reglue
                </h3>
                <h4 class="ourServices__item__price">PHP 500.00</h4>
                <p class="ourServices__item__text">
                    If your kicks have any sole separation, you'll probably require a thorough re-glue. We don't usually undertake "spot re-glues" since we always stand by our work. If your kicks are more than ten years old, they should be completely re-glued. <br>
                    There will be an extra PHP 500.00 fee if you need a reglue that needs the removal of any glue brand from a failed reglue effort.
                </p>
                </div>
            </div>
            <div class="ourServices__item">
                <div class="ourServices__item__img">
                    <img src="{{ asset('images/restitch.jpg') }}" alt="restitch img">
                </div>
                <div class="ourServices__item__info">
                <h3 class="ourServices__item__title">
                    Restitch
                </h3>
                <h4 class="ourServices__item__price">PHP 500.00</h4>
                <p class="ourServices__item__text">
                    To ensure that your shoes endure longer, stay up with the newest shoe repairs. Re-stitching is therefore a crucial aspect of shoe repair.
                </p>
                </div>
            </div>
            <div class="ourServices__item">
                <div class="ourServices__item__img">
                    <img src="{{ asset('images/restoration.png') }}" alt="restore img">
                </div>
                <div class="ourServices__item__info">
                <h3 class="ourServices__item__title">
                    Restore
                </h3>
                <h4 class="ourServices__item__price">PHP 800.00</h4>
                <p class="ourServices__item__text">
                    Cleaning and disinfecting your shoes effectively involve treating each material according to its best techniques.
                </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Our Services -->
@endsection
