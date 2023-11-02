<!doctype html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('photos/logo_.png')}}" type="image/png">
    <meta name="author" content="Karol Wiśniewski">
    <meta name="robots" content="max-image-preview:large" />
    <meta property="og:locale" content="pl_PL" />
    <meta property="og:site_name" content="KamiLove Fashion sukienki damskie - Kupuj lokalnie przez internet" />
    <meta property="og:type" content="article" />
    <meta name="twitter:card" content="summary" />
    @yield('meta')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <script src="https://kit.fontawesome.com/e37acf9c2e.js" crossorigin="anonymous"></script>
</head>

<body>
    <!--NAV + HEADER-->
    <section>
        <header class="d-flex flex-wrap justify-content-center py-2 container align-items-center">
            <a href="{{route('index')}}" class="d-flex align-items-center mb-2 mb-md-0 me-md-auto text-dark text-decoration-none">
                <img src="{{ asset('photos/logo.png')}}" alt="logo" class="img-fluid my-4" style="max-height: 6em;" onerror="this.onerror=null; this.src=`{{ asset('svg/photos.svg') }}`;">
            </a>

            <ul class="nav nav-pills d-flex flex-row flex-wrap justify-content-center align-items-center">
                <li class="nav-item"><a href="{{route('index')}}" class="text-dark nav-link">Start</a></li>
                @foreach($pro_cat as $c)
                @php
                $count = $pro_prod->where('category_id', $c->id)->count();
                @endphp
                @if($count != 0)
                <li class="nav-item"><a href="{{ route('category.show',$c->url)}}" class="text-dark nav-link">{{$c->plural}}</a></li>
                @endif
                @endforeach
                @if (session()->has('login_id'))
                <ul class="nav">
                    @if (session()->has('admin'))
                    <li class="nav-item"><a href="{{ route('admin')}}" class="mx-2 btn btn-primary"><i class="fa-solid fa-screwdriver-wrench me-2"></i>Admin</a></li>
                    @endif
                    <li><a href="{{ route('user')}}" class="mx-2 btn btn-custom-1"><i class="fa-solid fa-user me-2"></i>Konto</a></li>
                    <li class="nav-item"><a href="{{ route('user.busket')}}" class="btn btn-custom-2 mx-2"><i class="fa-solid fa-cart-shopping"></i></a></li>
                </ul>
                @else
                <ul class="nav">
                    <li><a href="{{ route('login')}}" class="mx-2 btn btn-custom-1"><i class="fa-solid fa-right-to-bracket me-2"></i>Logowanie</a></li>
                    <li><a href="{{ route('register')}}" class="mx-2 btn btn-custom-2"><i class="fa-solid fa-arrow-right me-2"></i>Rejestracja</a></li>
                </ul>
                @endif
                <li class="nav-item"><a href="https://instagram.com/kamilove_fashion?igshid=YmMyMTA2M2Y=" class="mx-2"><img src="{{ asset('photos/instagram.png')}}" alt="instagram" width="40" height="40" class="img-fluid"></a></li>
            </ul>
        </header>
    </section>
    <!--END ANV + HEADER-->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
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
            </div>
        </div>
    </section>
    @yield('content')
    <!--FOOTER-->
    <div class="container">
        <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
            <div class="col mb-3">
                <a href="{{route('index')}}" class="d-flex align-items-center mb-2 mb-md-0 me-md-auto text-dark text-decoration-none">
                    <img src="{{ asset('photos/logo.png')}}" alt="logo" class="img-fluid" style="max-height: 6em;" onerror="this.onerror=null; this.src=`{{ asset('svg/photos.svg') }}`;">
                </a>
            </div>

            <div class="col mb-3">

            </div>

            <div class="col mb-3">
                <h5>Nowości</h5>
                <ul class="nav flex-column">
                    @foreach($pro_cat as $c)
                    <li class="nav-item mb-2"><a href="{{ route('category.show', $c->url)}}" class="nav-link p-0 text-muted">{{$c->plural}}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="col mb-3">
                <h5>Zakupy</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="{{ route('user.busket')}}" class="nav-link p-0 text-muted">Koszyk</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('user.order')}}" class="nav-link p-0 text-muted">Twoje zamówienia</a></li>
                </ul>
            </div>

            <div class="col mb-3">
                <h5>Informacje</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="{{ route('return') }}" class="nav-link p-0 text-muted">Zwroty i reklamacje</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('rule') }}" class="nav-link p-0 text-muted">Regulamin</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('policy') }}" class="nav-link p-0 text-muted">Polityka prywatności</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('contact') }}" class="nav-link p-0 text-muted">Kontakt</a></li>
                </ul>
            </div>
        </footer>
    </div>
    <!--END FOOTER-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>