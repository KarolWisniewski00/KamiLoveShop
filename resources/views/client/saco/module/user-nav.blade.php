<nav class="py-2 mb-2">
    <div class="container d-flex flex-wrap">
        <ul class="nav mx-auto">
            <li class="nav-item"><a href="{{ route('user')}}" class="nav-link link-dark px-2"><i class="fa-solid fa-user me-2"></i>Konto</a></li>
            <li class="nav-item"><a href="{{ route('user.order')}}" class="nav-link link-dark px-2"><i class="fa-solid fa-store me-2"></i>Twoje zamówienia</a></li>
            <li class="nav-item"><a href="{{ route('user.busket')}}" class="nav-link link-dark px-2"><i class="fa-solid fa-cart-shopping me-2"></i>Koszyk</a></li>
            <li class="nav-item"><a href="{{ route('logout')}}" class="nav-link link-dark px-2" onclick="return confirm('Czy na pewno chcesz się wylogować?');"><i class="fa-solid fa-right-from-bracket me-2"></i>Wyloguj</a></li>
        </ul>
    </div>
</nav>