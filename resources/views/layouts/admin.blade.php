@extends('layouts.main')
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
            <div class="col-3">
                <div class="list-group">
                    <a href="{{ route('admin')}}" class="list-group-item d-flex justify-content-center align-items-center"><i class="fa-solid fa-house me-2"></i>Start</a>
                    <a href="{{ route('categories')}}" class="list-group-item d-flex justify-content-center align-items-center"><i class="fa-solid fa-file me-2"></i>Kategorie</a>
                    <a href="{{ route('products')}}" class="list-group-item d-flex justify-content-center align-items-center"><i class="fa-solid fa-cart-shopping me-2"></i>Produkty</a>
                    <a href="{{ route('hero')}}" class="list-group-item d-flex justify-content-center align-items-center"><i class="fa-solid fa-star me-2"></i></i>Hero</a>
                </div>
            </div>
            <!--END NAVIGATION SIDE-->
            <!--MAIN SIDE-->
            <div class="col-9">
                @yield('main')
            </div>
            <!--END MAIN SIDE-->
        </div>
    </div>
</section>
<!--END HISTORY-->
@endsection