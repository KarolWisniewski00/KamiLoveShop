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

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 ">
        <div class="my-2">
            <a href="{{route('index')}}" class="my-2 btn btn-primary mx-2 "><i class="fa-solid fa-house me-2"></i>Strona główna</a>
            <a href="{{route('logout')}}" class="my-2 btn btn-outline-light mx-2 "><i class="fa-solid fa-right-from-bracket me-2"></i>Wyloguj się</a>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                        <span>Kokpit</span>
                    </h6>

                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="{{ route('admin')}}" class="nav-link text-black"><i class="fa-solid fa-house me-2"></i>Zamówienia</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user')}}" class="nav-link text-black"><i class="fa-solid fa-user me-2"></i>Użytkownicy<span class="badge rounded-pill bg-primary ms-2">Wkrótce dostępne</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.photo')}}" class="nav-link text-black"><i class="fa-solid fa-photo-film me-2"></i>Zdjęcia</a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                        <span>Sklep</span>
                    </h6>

                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a href="{{ route('admin.category')}}" class="nav-link text-black"><i class="fa-solid fa-file me-2"></i>Kategorie</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.size')}}" class="nav-link text-black"><i class="fa-solid fa-check me-2"></i>Rozmiary</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.product')}}" class="nav-link text-black"><i class="fa-solid fa-cart-shopping me-2"></i>Produkty</a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                        <span>Edycja Stron</span>
                    </h6>

                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a href="{{ route('admin.page-hero')}}" class="nav-link text-black"><i class="fa-solid fa-star me-2"></i>Hero</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.page-rule')}}" class="nav-link text-black"><i class="fa-solid fa-book me-2"></i>Regulamin</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.page-policy')}}" class="nav-link text-black"><i class="fa-solid fa-lock me-2"></i>Polityka prywatności</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.page-return')}}" class="nav-link text-black"><i class="fa-solid fa-right-left me-2"></i>Zwroty i reklamacje</a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                        <span>Inne</span>
                    </h6>

                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a href="{{ route('admin.old')}}" class="nav-link text-black"><i class="fa-solid fa-unlock me-2"></i>Panel admina - poprzednia wersja</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!--ALERT-->
                @if(Session::has('success'))
                <div class="alert alert-success m-2 mt-4">{{Session::get('success')}}</div>
                @endif

                @if(Session::has('fail'))
                <div class="alert alert-danger m-2 mt-4">{{Session::get('fail')}}</div>
                @endif
                <!--END ALERT-->
                @yield('main')
            </main>
        </div>
    </div>
    <!--END FOOTER-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>