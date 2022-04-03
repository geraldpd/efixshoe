<!-- Nav Section -->
<div class="nav">
    <div class="container">
        <div class="nav__wrapper">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('images/logo.svg') }}" alt="eFixShoe Logo">
        </a>
        <nav>
            <div class="nav__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12" />
                <line x1="3" y1="6" x2="21" y2="6" />
                <line x1="3" y1="18" x2="21" y2="18" />
            </svg>
            </div>
            <div class="nav__bgOverlay"></div>
            <ul class="nav__list">
            <div class="nav__close">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-x">
                <line x1="18" y1="6" x2="6" y2="18" />
                <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
            </div>
            <div class="nav__list__wrapper">
                <li><a class="nav__link" href="{{ route('home') }}">Home</a></li>
                <li><a class="nav__link" href="{{ route('services') }}">Services</a></li>
                <li><a class="nav__link" href="{{ route('about-us') }}">About Us</a></li>
                <li><a class="nav__link" href="{{ route('faqs') }}">FAQs</a></li>
                @guest
                    <li><a class="nav__link" href="{{ route('login') }}">Account</a></li>
                @else
                    <li>|</li>
                    <li><span class="nav__link">Hi, {{ ucwords(Auth::user()->first_name) }}!</span></li>
                    <li>|</li>
                    <li>
                        <a class="nav__link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
                <li><a href="#" class="btn primary-btn">Book A Service</a></li>
            </div>
            </ul>
        </nav>
        </div>
    </div>
</div>
<!-- End Nav Section -->