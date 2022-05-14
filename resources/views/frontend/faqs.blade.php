@extends('layouts.frontend.main')

@section('content')
<!-- page Title -->
{{-- <section id="page__title" data-aos="fade-up">
    <div class="container">
        <h2 class="page__title__text">
            This page is under construction.
        </h2>
    </div>
</section> --}}

<section id="ourServices" data-aos="fade-up">
    <div class="container">
        <div class="ourServices__wrapper">
            <div class="faq-item">
                <h3 class="ourServices__item__subtitle">
                    Q: What services are available at Efixshoe?
                </h3>
                <p class="ourServices__item__text">
                    A: Deep Clean, Unyellowing, Reglue, Restitch, and Restore.
                </p>
            </div>
            <div class="faq-item">
                <h3 class="ourServices__item__subtitle">
                    Q: What all repairs you do?
                </h3>
                <p class="ourServices__item__text">
                    A: We do almost all minor and major repair work on your shoes to bring them back to life. We do: <br>
                    1. Press Pasting work for outsoles. <br>
                    2. Press pasting for the minor opening of soles. <br>
                    3. Unyellowing <br>
                    4. Minor touch-ups using professional shoe paint. <br>
                    5. Minor and major patchwork for upper mesh.
                </p>
            </div>
            <div class="faq-item">
                <h3 class="ourServices__item__subtitle">
                    Q: How can I place the order?
                </h3>
                <p class="ourServices__item__text">
                    A: A customer can place an order through any of the following convenient options: <br>
                    1. Visit our website and fill up the order form. <br>
                    2. Give us a call and get a pickup scheduled.
                </p>
            </div>
            <div class="faq-item">
                <h3 class="ourServices__item__subtitle">
                    Q: How do I pay for my services?
                </h3>
                <p class="ourServices__item__text">
                    A: You choose any of these two whether Cash or through E-Payment such as GCash or Bank Transfer.
                </p>
            </div>
            <div class="faq-item">
                <h3 class="ourServices__item__subtitle">
                    Q: Do you provide pick-up and drop service in my area?
                </h3>
                <p class="ourServices__item__text">
                    A: We offer pick-up and drop services across Vigan City, via our logistics partner. Please feel free to share your pin-code details along with your requirement and our team would instantly offer you a service detail along with a quote and service timeline for your location.
                </p>
            </div>
            <div class="faq-item">
                <h3 class="ourServices__item__subtitle">
                    Q: My shoes are expensive. What if my shoe gets damaged during the process?
                </h3>
                <p class="ourServices__item__text">
                    A: We understand your concern completely and that’s the reason we have built a flawless system to avoid any damage to your valuable shoes. However, in a scenario where humans are involved, there might be a rare and unavoidable scenario where the loss of footwear or damage may happen.
                </p>
            </div>
            <div class="faq-item">
                <h3 class="ourServices__item__subtitle">
                    Q: How long is the turnaround time?
                </h3>
                <p class="ourServices__item__text">
                    A: It takes approximately {{ $max_turnaround_time ?: 3 }} day(s).
                </p>
            </div>
            <div class="faq-item">
                <h3 class="ourServices__item__subtitle">
                    Q: Can I get a refund if I'm not satisfied with my shoes?
                </h3>
                <p class="ourServices__item__text">
                    A: Yes. We guarantee you will be happy with your shoes, or we will give you full refund!
                </p>
            </div>
            <div class="faq-item">
                <h3 class="ourServices__item__subtitle">
                    Q: What is your cancellation policy?
                </h3>
                <p class="ourServices__item__text">
                    A: Cancellation charges are applicable once the order is picked up from your location and then cancelled by either you or us due to any technical reason or infeasibility to work on the items.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
