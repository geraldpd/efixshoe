<div class="nav__list__wrapper">
    <li><a class="nav__link" href="{{ route('home') }}">Home</a></li>
    <li><a class="nav__link" href="{{ route('services') }}">Services</a></li>
    <li><a class="nav__link" href="{{ route('about-us') }}">About Us</a></li>
    <li><a class="nav__link" href="{{ route('faqs') }}">FAQs</a></li>
    @guest
        <li><a class="nav__link" href="{{ route('login') }}">Account</a></li>
    @else
        <li><a class="nav__link" href="{{ route('customer.cart.content') }}">My Cart ({{ $cartCount }})</a></li>
        <li>
            <a class="nav__link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    @endguest
    <li><a href="{{ route('customer.booking') }}" class="btn primary-btn">Book A Service</a></li>
</div>
