@extends('layout.saco')
@section('content')
<!--HERO-->
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach($her as $key => $h)
        @if ($key == 0)
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{$key}}" class="active" aria-current="true" aria-label="Slide {{$key+1}}"></button>
        @else
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{$key}}" aria-label="Slide {{$key+1}}"></button>
        @endif
        @endforeach
    </div>
    <div class="carousel-inner">
        @foreach($her as $key => $h)
        @if ($key == 0)
        <div class="carousel-item active">
            <div style='background-image: url({{asset("photos/".$h->photo)}}); background-color: #cccccc; height: 50em; background-position: center; background-repeat: no-repeat; background-size: cover; filter: brightness(0.75) saturate(1.4);'></div>

            <div class="container">
                <div class="carousel-caption">
                    <h1>{{$h->h1}}</h1>
                    <p>{{$h->p}}</p>
                    <p><a class="btn btn-custom rounded-0" href="{{url('/category/'.$h->href)}}">{{$h->button}}</a></p>
                </div>
            </div>
        </div>
        @else
        <div class="carousel-item">
            <div style='background-image: url({{asset("photos/".$h->photo)}}); background-color: #cccccc; height: 50em; background-position: center; background-repeat: no-repeat; background-size: cover; filter: brightness(0.75) saturate(1.4);'></div>

            <div class="container">
                <div class="carousel-caption">
                    <h1>{{$h->h1}}</h1>
                    <p>{{$h->p}}</p>
                    <p><a class="btn btn-custom rounded-0" href="{{url('/category/'.$h->href)}}">{{$h->button}}</a></p>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!--END HERO-->
<!--NAV GRID-->
<section>
    <div class="container">
        <h2 class="text-center my-4" style="font-size: 3em;">Kategorie</h2>
        <div class="row g-4 justify-content-center">
            @foreach($pro_cat as $c)
            <div class="col-12 col-md-4">
                <a href="{{ route('category.show', $c->url)}}" class="position-relative cat-card">
                    <div class="bg-img" style="background-image: url({{ asset('photos/'.$c->photo) }} );"></div>
                    <div class="position-absolute top-0 start-50 translate-middle-x text-center mt-3 p-2">
                        <p class="cat-cat">Kategoria</p>
                        <h2 class="cat-head">{{$c->plural}}</h2>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--END NAV GRID-->
<!--PRODUCTS GRID-->
<section>
    <div class="container">
        <h2 class="text-center my-4" style="font-size: 3em;">Produkty</h2>
        <div class="row products">
            @foreach ($prod as $p)
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                @include('client.saco.module.product-card')
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--END PRODUCTS GRID-->
@endsection