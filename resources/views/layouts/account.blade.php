<nav class="py-2 mb-2">
    <div class="container d-flex flex-wrap">
        <ul class="nav mx-auto">
            <li class="nav-item"><a href="{{ url('account')}}" class="nav-link link-dark px-2">Informacje</a></li>
            <li class="nav-item"><a href="{{ url('history')}}" class="nav-link link-dark px-2">Twoje zamówienia</a></li>
            <li class="nav-item"><a href="{{ url('busket')}}" class="nav-link link-dark px-2">Koszyk</a></li>
            @if (session()->has('admin'))
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Panel admina</a></li>
            @endif
            <li class="nav-item"><a href="{{ url('logout')}}" class="nav-link link-dark px-2">Wyloguj się</a></li>
        </ul>
    </div>
</nav>