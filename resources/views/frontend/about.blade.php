@extends('layouts.frontend.main')

@section('content')
<!-- Our Story Section -->
<section id="ourStory" data-aos="fade-up">
  <div class="container">
    <div class="ourStory__wrapper">

      <div class="ourStory__img">
          <img src="{{ asset('images/restitch.jpg') }}" alt="restitch img">
      </div>
      <div class="ourStory__info">
        <h3 class="ourStory__title">
          About Us
        </h3>
        <p class="ourStory__text">
            Efixshoe, was created with the idea that, just like your clothes, your shoes need to be kept clean and shiny as new. After all, you buy expensive, high-quality clothes and dry-clean them frequently. But what about sneakers or leather shoes? Don't you require shoes that are as good as new and look amazing with your excellent, contemporary outfits?
            <br><br>
            Efixshoe was born as a result of this understanding. Efixshoe offers a full range of cleaning and laundry services for both sports and leather shoes
            <br><br>
            Providing shoe cleaning has never been a new notion, but the idea behind "Clean Steps" is to take it to the next level, "One Step Above," where people can be amazed by the results.
        </p>
      </div>
    </div>
  </div>
</section>
<!-- End Our Story Section -->

<!-- Our Goals -->
<section id="ourGoals" data-aos="fade-down">
  <div class="container">
    <div class="ourGoals__info">
      <h3 class="ourGoals__title">
          Have your shoes washed and cleaned with the best.
      </h3>
      <p class="ourGoals__text">
          We handle all types of shoe cleaning.
          We hand wash your shoes making sure that every dirt is taken care of. We brush 'em, soap 'em clean because we value your time. Contact us, and we will pick them up and get them delivered within Metro Vigan.
          There are free pick-up and drop-off services available.
      </p>
    </div>
    <div class="ourGoals__imgs__wrapper" data-aos="fade-up">
      <div class="ourGoals__img1">
        <img src="{{ asset('images/deep-clean.jpg') }}" alt="deepclean img">
      </div>
      <div class="ourGoals__img2">
          <img src="{{ asset('images/reglue.jpg') }}" alt="reglue img">
      </div>
      <div class="ourGoals__img3">
          <img src="{{ asset('images/restore.jpg') }}" alt="restore img">
      </div>
    </div>
  </div>
</section>
<!-- End Our Goals -->
@endsection
