<div class="nav__list__wrapper">
    <li><a class="nav__link" href="{{ route('home') }}">Home</a></li>
    <li><a class="nav__link" href="{{ route('services') }}">Services</a></li>
    <li><a class="nav__link" href="{{ route('about-us') }}">About Us</a></li>
    <li><a class="nav__link" href="{{ route('faqs') }}">FAQs</a></li>
    @guest
        <li><a class="nav__link" href="{{ route('login') }}">Account</a></li>
    @else
        <li><a class="nav__link" href="{{ route('customer.cart.content') }}">My Cart ({{ $cartCount }})</a></li>
        <div class="dropdown">
            <li>
                <a class="nav__link dropbtn" href="#">Hi, {{ ($user->first_name) ? ucwords($user->first_name) : 'User' }}!</a>
                <div class="dropdown-content">
                    <a class="nav__link" href="{{ route('customer.home') }}">My Account</a>
                    <a class="nav__link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </div>
    @endguest
</div>
