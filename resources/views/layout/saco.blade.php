<!doctype html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Taco Tabacco</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e37acf9c2e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/saco.css')}}">
</head>

<body>
    <!--INFO +NAV + HEADER-->
    <section class="bg-light">
        <div class="container-fluid bg-custom border-bot-custom text-white">
            <div class="d-flex flex-row flex-wrap justify-content-center justify-content-md-end py-2">
                <div class="me-3"><i class="fa-solid fa-joint"></i> Taco Tabacco</div>
                <div class="me-3"><i class="fa-solid fa-phone"></i> +48 791 123 387</div>
                <div class="me-3"><i class="fa-solid fa-envelope"></i> maciek.sacco@interia.pl</div>
                <div class="me-3"><i class="fa-solid fa-house"></i> Zabrzańska b/n Przystanek Ratusz</div>
            </div>
        </div>
        <!---->
        <header class="py-4 border-bottom">
            <div class="container d-flex flex-wrap justify-content-center">
                <a href="{{route('index')}}" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
                    <img src="{{ asset('photos/logo.png')}}" alt="logo" class="img-fluid" style="max-height: 3em;" onerror="this.onerror=null; this.src=`{{ asset('svg/photos.svg') }}`;">
                </a>
                @if (session()->has('login_id'))
                <ul class="nav">
                    @if (session()->has('admin'))
                    <li class="nav-item"><a href="{{ url('admin')}}" class="mx-2 btn btn-primary rounded-0"><i class="fa-solid fa-screwdriver-wrench me-2"></i>Admin</a></li>
                    @endif
                    <li><a href="{{ route('user')}}" class="mx-2 btn btn-custom-2 rounded-0"><i class="fa-solid fa-user me-2"></i>Konto</a></li>
                    <li><a href="{{ route('user.busket')}}" class="mx-2 btn btn-custom rounded-0"><i class="fa-solid fa-cart-shopping me-2"></i>Koszyk</a></li>
                </ul>
                @else
                <ul class="nav">
                    <li><a href="{{ route('login')}}" class="mx-2 btn btn-custom rounded-0">Logowanie</a></li>
                    <li><a href="{{ route('register')}}" class="mx-2 btn btn-custom-1 text-black rounded-0">Rejestracja</a></li>
                </ul>
                @endif
            </div>
        </header>
        <!---->
        <nav class="py-2 mb-2">
            <div class="container d-flex flex-wrap">
                <ul class="nav mx-auto">
                    <div class="d-flex flex-row flex-wrap justify-content-center align-items-center text-center">
                        <li class="nav-item"><a href="{{route('index')}}" class="nav-link link-dark px-2">Start</a></li>
                        @foreach($pro_cat as $c)
                        <li class="nav-item"><a href="{{ route('category.show',$c->url)}}" class="nav-link link-dark px-2">{{$c->plural}}</a></li>
                        @endforeach
                    </div>
                </ul>
            </div>
        </nav>
    </section>
    <!--END INFO +NAV + HEADER-->
    <!--ALERT-->
    <div class="container">
        @if(Session::has('success'))
        <div>
            <div class="alert alert-success">{{Session::get('success')}}</div>
        </div>
        @endif

        @if(Session::has('fail'))
        <div>
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
        </div>
        @endif
    </div>
    <!--END ALERT-->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center text-center">
                    @yield('title')
                </div>
            </div>
        </div>
    </div>
    @yield('content')
    <!--FOOTER-->
    <section class="text-white mt-5">
        <div class="bg-custom border-top-custom">
            <div class="container">
                <footer class="row row-cols-1 row-cols-md-3 py-3 text-center">
                    <div class="col">
                        <h5 class="fw-bold fs-4 text-uppercase text-custom">Kategorie</h5>
                        <ul class="nav flex-column">
                            @foreach($pro_cat as $c)
                            <li class="nav-item mb-2"><a href="{{ route('category.show', $c->url)}}" class="nav-link p-0 text-custom-1">{{$c->plural}}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col">
                        <h5 class="fw-bold fs-4 text-uppercase text-custom">Zakupy</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="{{ route('user.busket')}}" class="nav-link p-0 text-custom-1">Koszyk</a></li>
                            <li class="nav-item mb-2"><a href="{{ route('user.order')}}" class="nav-link p-0 text-custom-1">Twoje zamówienia</a></li>
                            </li>
                        </ul>
                    </div>

                    <div class="col">
                        <h5 class="fw-bold fs-4 text-uppercase text-custom">Informacje</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="{{ route('return') }}" class="nav-link p-0 text-custom-1">Zwroty i reklamacje</a></li>
                            <li class="nav-item mb-2"><a href="{{ route('rule') }}" class="nav-link p-0 text-custom-1">Regulamin</a></li>
                            <li class="nav-item mb-2"><a href="{{ route('policy') }}" class="nav-link p-0 text-custom-1">Polityka prywatności</a></li>
                            <li class="nav-item mb-2"><a href="{{ route('contact') }}" class="nav-link p-0 text-custom-1">Kontakt</a></li>
                        </ul>
                    </div>
                </footer>
            </div>
        </div>
        <div class="bg-img-footer">
            <div class="d-flex justify-content-center align-items-center h-100 border-bot-custom">
                <a href="" class="border border-4 border-white px-4 py-2 fw-bold fs-1 text-decoration-none text-white hover-footer" style="background-color: rgba(0, 0, 0, 0.5);">420</a>
            </div>
        </div>
    </section>
    <!--END FOOTER-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>