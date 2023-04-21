@extends('layouts.main')
@section('title', 'Strona główna')
@section('description', 'KamiLove Fashion to sklep dla kobiet, które cenią sobie styl i jakość. Oferujemy bogaty wybór torebek, plecaków, obuwia, odzieży, sukienek oraz biżuterii, które zaspokoją gusta najbardziej wymagających klientek. Nasze produkty charakteryzuje wysoka jakość materiałów oraz staranność wykonania, dzięki czemu będą Ci służyć przez wiele sezonów. Wybierz coś dla siebie i poczuj się wyjątkowo dzięki modnym dodatkom z KamiLove Fashion!')
@section('extra-meta')
@endsection
@section('content')
<!--HERO-->
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach($heros as $key => $hero)
        @if ($key == 0)
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{$key}}" class="active" aria-current="true" aria-label="Slide {{$key+1}}"></button>
        @else
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{$key}}" aria-label="Slide {{$key+1}}"></button>
        @endif
        @endforeach
    </div>
    <div class="carousel-inner">
        @foreach($heros as $key => $hero)
        @if ($key == 0)
        <div class="carousel-item active">
            <div style='background-image: url({{asset("photos/".$hero->photo)}}); background-color: #cccccc; height: 50em; background-position: center; background-repeat: no-repeat; background-size: cover; filter: brightness(0.75) saturate(1.4);'></div>

            <div class="container">
                <div class="carousel-caption">
                    <h1>{{$hero->h1}}</h1>
                    <p>{{$hero->p}}</p>
                    <p><a class="btn btn-lg btn-custom-1" href="{{url('/category/'.$hero->href)}}">{{$hero->button}}</a></p>
                </div>
            </div>
        </div>
        @else
        <div class="carousel-item">
            <div style='background-image: url({{asset("photos/".$hero->photo)}}); background-color: #cccccc; height: 50em; background-position: center; background-repeat: no-repeat; background-size: cover; filter: brightness(0.75) saturate(1.4);'></div>

            <div class="container">
                <div class="carousel-caption">
                    <h1>{{$hero->h1}}</h1>
                    <p>{{$hero->p}}</p>
                    <p><a class="btn btn-lg btn-custom-1" href="{{url('/category/'.$hero->href)}}">{{$hero->button}}</a></p>
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
        @if(count($products)>0)
        <h2 class="text-center my-4" style="font-size: 3em;">Nowości</h2>
        <div class="row g-4">
            @foreach ($products as $p)
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                @include('layouts.card')
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
        @foreach ($categories as $key => $category)
        <h2 class="text-start my-4" style="font-size: 3em;">{{$category->plural}}</h2>
        @if ($key % 2 == 0)
        <!--DEFAULT-->
        <div class="row g-4">
            <div class="col-12 col-lg-6">
                <div class="row">
                    @foreach ($products_in_categories as $id)
                    @if ($id['id'] == $category->id)
                    @foreach ($id['products'] as $p)
                    <div class="col-12 col-md-6 mb-4">
                        @include('layouts.card')
                    </div>
                    @endforeach
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="d-flex flex-row justify-content-center align-items-center h-100">
                    <a href="{{ url('category/'.$category->url)}}"><img alt="category_photo" src="{{ asset('photos/'.$category->photo)}}" class="img-fluid shadow rounded"></a>
                </div>
            </div>
        </div>
        <!--END DEFAULT-->
        @else
        <!--REVERSED-->
        <div class="row g-4">
            <div class="col-12 col-lg-6">
                <div class="d-flex flex-row justify-content-center align-items-center h-100">
                    <a href="{{ url('category/'.$category->url)}}"><img alt="category_photo" src="{{ asset('photos/'.$category->photo)}}" class="img-fluid shadow rounded"></a>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="row">
                    @foreach ($products_in_categories as $id)
                    @if ($id['id'] == $category->id)
                    @foreach ($id['products'] as $p)
                    <div class="col-12 col-md-6 mb-4">
                        @include('layouts.card')
                    </div>
                    @endforeach
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