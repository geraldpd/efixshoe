<!-- Footer -->
<footer>
<div class="container">
    <div class="footer__wrapper">
    <div class="footer__col2">
        <div class="footer__logo">
            <img src="{{ asset('images/logo.png') }}" alt="eFixShoe Logo">
        </div>
        <p class="footer__desc">
        An Online Shoe Care and Services in Metro Vigan
        </p>
        <div class="footer__socials">
        <h4 class="footer__socials__title">Follow us</h4>
        <ol class="footer__socials__list">
            <li>
            <a href="https://www.instagram.com/efix.shoe" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-instagram">
                <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
                </svg>
            </a>
            </li>
        </ol>
        </div>
    </div>
    <div class="footer__col4">
        <h3 class="footer__text__title">
        Links
        </h3>
        <ol class="footer__text">
        <li>
            <a href="{{ route('home') }}">Home</a>
        </li>
        <li>
            <a href="{{ route('services') }}">Services</a>
        </li>
        <li>
            <a href="{{ route('about-us') }}">About Us</a>
        </li>
        <li>
            <a href="{{ route('faqs') }}">FAQs</a>
        </li>
        <li>
            <a href="{{ route('customer.booking') }}">Avail A Service</a>
        </li>
        </ol>
    </div>
    <div class="footer__col4">
        <h3 class="footer__text__title">
        Contact
        </h3>
        <ol class="footer__text">
        <li>
            <a href="#">+1234567890</a>
        </li>
        <li>
            <a href="#">efixshoe@gmail.com</a>
        </li>
        <li>
            <a href="#">Cabangaran, Santa, Ilocos Sur, Philippines</a>
        </li>
        </ol>
    </div>
    </div>
</div>
</footer>
<div id="copyright">
<div class="container">
    <p class="copyright__text">
    © copyright 2021 eFixShoe | All rights reserved
    </p>
</div>
</div>
<!-- End Footer -->
