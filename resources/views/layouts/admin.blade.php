@extends('layouts.main')
@section('title', 'Panel admina')
@section('description', '')
@section('extra-meta')
<meta name="robots" content="noindex, nofollow">
@endsection
@section('content')
<!--HISTORY-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
                    <h1>Panel admina</h1>
                </div>
                @include('layouts.account')
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <!--NAVIGATION SIDE-->
            <div class="col-12 col-md-3 mb-4">
                <div class="list-group">
                    <a href="{{ route('admin')}}" class="list-group-item d-flex justify-content-center align-items-center"><i class="fa-solid fa-house me-2"></i>Start</a>
                    <a href="{{ route('categories')}}" class="list-group-item d-flex justify-content-center align-items-center"><i class="fa-solid fa-file me-2"></i>Kategorie</a>
                    <a href="{{ route('products')}}" class="list-group-item d-flex justify-content-center align-items-center"><i class="fa-solid fa-cart-shopping me-2"></i>Produkty</a>
                    <a href="{{ route('hero')}}" class="list-group-item d-flex justify-content-center align-items-center"><i class="fa-solid fa-star me-2"></i>Hero</a>
                    <a href="{{ route('rules_admin')}}" class="list-group-item d-flex justify-content-center align-items-center"><i class="fa-solid fa-book me-2"></i>Regulamin</a>
                    <a href="{{ route('policy_admin')}}" class="list-group-item d-flex justify-content-center align-items-center"><i class="fa-solid fa-lock me-2"></i>Polityka prywatności</a>
                    <a href="{{ route('return_admin')}}" class="list-group-item d-flex justify-content-center align-items-center"><i class="fa-solid fa-right-left me-2"></i>Zwroty i reklamacje</a>
                    <a href="{{ route('sizes')}}" class="list-group-item d-flex justify-content-center align-items-center"><i class="fa-solid fa-check me-2"></i>Rozmiary</a>
                </div>
            </div>
            <!--END NAVIGATION SIDE-->
            <!--MAIN SIDE-->
            <div class="col-12 col-md-9">
                @yield('main')
            </div>
            <!--END MAIN SIDE-->
        </div>
    </div>
</section>
<!--END HISTORY-->
@endsection