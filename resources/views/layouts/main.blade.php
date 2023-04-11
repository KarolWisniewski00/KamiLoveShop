<!doctype html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KamiLove Fashion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <script src="https://kit.fontawesome.com/e37acf9c2e.js" crossorigin="anonymous"></script>
</head>

<body>
    <!--NAV + HEADER-->
    <section>
        <header class="d-flex flex-wrap justify-content-center py-2 container align-items-center">
            <a href="{{route('index')}}" class="d-flex align-items-center mb-2 mb-md-0 me-md-auto text-dark text-decoration-none">
                <img src="{{ asset('photos/logo-male-beztla.png')}}" alt="logo" class="img-fluid" style="max-height: 6em;">
                <span class="fs-2">KamiLove</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="{{route('index')}}" class="text-dark nav-link">Start</a></li>
                <li class="nav-item"><a href="#" class="text-dark nav-link">Torebki</a></li>
                <li class="nav-item"><a href="#" class="text-dark nav-link">Sukienki</a></li>
                <li class="nav-item"><a href="#" class="text-dark nav-link">Obuwie</a></li>
                <li class="nav-item"><a href="#" class="text-dark nav-link">Biżuteria</a></li>
                <li class="nav-item"><a href="{{ url('account')}}" class="btn btn-custom-1 mx-2"><i class="fa-solid fa-user"></i></a></li>
                <li class="nav-item"><a href="#" class="btn btn-custom-2 mx-2"><i class="fa-solid fa-magnifying-glass"></i></a>
                </li>
            </ul>
        </header>
    </section>
    <!--END ANV + HEADER-->
    @yield('content')
    <!--FOOTER-->
    <div class="container">
        <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
            <div class="col mb-3">
                <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
                    <img alt="logo" src="{{ asset('photos/logo-napis-beztla.png')}}" class="img-fluid">
                </a>
            </div>

            <div class="col mb-3">

            </div>

            <div class="col mb-3">
                <h5>Nowości</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Torebki</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Sukienki</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Obuwie</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Biżuteria</a></li>
                </ul>
            </div>

            <div class="col mb-3">
                <h5>Zakupy</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="{{ url('busket')}}" class="nav-link p-0 text-muted">Koszyk</a></li>
                    <li class="nav-item mb-2"><a href="{{ url('history')}}" class="nav-link p-0 text-muted">Twoje zamówienia</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Formy płatności</a></li>
                </ul>
            </div>

            <div class="col mb-3">
                <h5>Informacje</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">O nas</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Zwroty i reklamacje</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Regulamin</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Polityka prywatności</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Kontakt</a></li>
                </ul>
            </div>
        </footer>
    </div>
    <!--END FOOTER-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>