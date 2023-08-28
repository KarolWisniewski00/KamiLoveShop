@extends('layout.kamilove'
@section('meta')
<title>KamiLove Fashion sklep online - Sukienki, Biżuteria, Akcesoria</title>
<meta property="og:title" content="KamiLove Fashion sklep online - Sukienki, Biżuteria, Akcesoria" />
<meta name="twitter:title" content="KamiLove Fashion sklep online - Sukienki, Biżuteria, Akcesoria" />
<meta name="description" content="Odkryj KamiLove Fashion to zestawienie modnych ubrań, biżuterii i dodatków dla każdej kobiety. Bezpieczne płatności.">
<meta property="og:description" content="Odkryj KamiLove Fashion to zestawienie modnych ubrań, biżuterii i dodatków dla każdej kobiety. Bezpieczne płatności." />
<meta name="twitter:description" content="Odkryj KamiLove Fashion to zestawienie modnych ubrań, biżuterii i dodatków dla każdej kobiety. Bezpieczne płatności." />
<meta name="keywords" content="KamiLove, KamiLove Fashion, Fashion, sklep, sklep damski,moda, moda damska, sukienki, sukienki damskie, ubrania, ubrania damskie">
@endsection)
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
                    <p><a class="btn btn-custom-1 rounded-0" href="{{url('/category/'.$h->href)}}">{{$h->button}}</a></p>
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
                    <p><a class="btn btn-custom-1 rounded-0" href="{{url('/category/'.$h->href)}}">{{$h->button}}</a></p>
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
<!--PRODUCTS GRID-->
<section>
    <div class="container">
        @if(count($prod)>0)
        <h2 class="text-center my-4" style="font-size: 3em;">Nowości</h2>
        <div class="row g-4">
            @foreach ($prod as $p)
            <div class="col-12 col-md-6 col-lg-3 mb-4">
            @include('client.kamilove.module.product-card')
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>
<!--END PRODUCTS GRID-->
<!--PRODUCTS WITH CATEGORY-->
<section>
    <div class="container">
        @foreach ($pro_cat as $key => $c)
        <h2 class="text-start my-4" style="font-size: 3em;">{{$c->plural}}</h2>
        @if ($key % 2 == 0)
        <!--DEFAULT-->
        <div class="row g-4">
            <div class="col-12 col-lg-6">
                <div class="row">
                @foreach ($prod as $p)
                @if($p->category_id == $c->id)
                <div class="col-12 col-md-6 mb-4">
                @include('client.kamilove.module.product-card')
                </div>
                @endif
                @endforeach
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="d-flex flex-row justify-content-center align-items-center h-100">
                    <a href="{{ route('category.show', $c->url)}}"><img alt="category_photo" src="{{ asset('photos/'.$c->photo)}}" class="img-fluid  rounded"></a>
                </div>
            </div>
        </div>
        <!--END DEFAULT-->
        @else
        <!--REVERSED-->
        <div class="row g-4">
            <div class="col-12 col-lg-6">
                <div class="d-flex flex-row justify-content-center align-items-center h-100">
                    <a href="{{ route('category.show', $c->url)}}"><img alt="category_photo" src="{{ asset('photos/'.$c->photo)}}" class="img-fluid  rounded"></a>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="row">
                @foreach ($prod as $p)
                @if($p->category_id == $c->id)
                <div class="col-12 col-md-6 mb-4">
                @include('client.kamilove.module.product-card')
                </div>
                @endif
                @endforeach
                </div>
            </div>
        </div>
        <!--END REVERSED-->
        @endif
        @endforeach
    </div>
</section>
<!--END PRODUCTS WITH CATEGORY-->
@endsection

