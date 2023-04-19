@extends('layouts.main')
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
            @foreach ($products as $product)
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <div class="border text-center p-4 shadow position-relative h-100 d-flex flex-column justify-content-between align-items-center rounded">
                    <img alt="product_photo" src="{{ asset('photos/'.$product->photo)}}" class="img-fluid">
                    <h3>{{$product->name}}</h3>
                    <p class="text-muted">{{$product->short_description}}</p>
                    <div class="d-flex flex-row justify-content-center align-items-center mb-4">
                        @if ($product->sale_price != 0)
                        <div class="text-muted" style="text-decoration: line-through;padding-top:1px;">{{$product->normal_price}} PLN</div>
                        <div class="text-custom-1 fs-4"> {{$product->sale_price}} PLN</div>
                        @else
                        <div class="text-custom-1 fs-4"> {{$product->normal_price}} PLN</div>
                        @endif
                    </div>
                    <div class="d-flex flex-row justify-content-start align-items-center flex-wrap">
                        @if (in_array($product->id,$sizes_id))
                        @foreach($brokers_all as $broker)
                        @if($broker->product_id == $product->id)
                        @foreach($sizes as $size)
                        @if ($size->id == $broker->size_id)
                        <a href="" class="btn btn-sm btn-custom-1 m-2">{{$size->value}}</a>
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                        @else
                        @endif
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        @if (in_array($product->id,$sizes_id))
                        <a href="{{ url('product/'.$product->id)}}" class="btn btn-custom-2 w-100 h-100"><i class="fa fa-search"></i> Wybierz opcję</a>
                        @else
                        <button class="btn btn-custom-1 w-75 h-100 me-2">Dodaj do koszyka</button>
                        <a href="{{ url('product/'.$product->id)}}" class="btn btn-custom-2 w-25 h-100 text-white d-flex justify-content-center align-items-center"><i class="fa fa-search"></i></a>
                        @endif
                    </div>
                    <div class="position-absolute top-0 start-100 p-2" style="transform:translateX(-100%)">
                        @if ($product->new != 0)
                        <div class="bg-custom-1 p-2 text-white mb-2 shadow rounded">Nowość!</div>
                        @endif
                        @if ($product->sale_price != 0)
                        <div class="bg-custom-2 p-2 text-white shadow rounded">-{{round(100-(($product->sale_price*100)/$product->normal_price),2)}}%</div>
                        @endif
                    </div>
                </div>
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
                    @foreach ($id['products'] as $product)
                    <div class="col-12 col-md-6 mb-4">
                        <div class="border text-center p-4 shadow position-relative h-100 d-flex flex-column justify-content-between align-items-center rounded">
                            <img alt="product_photo" src="{{ asset('photos/'.$product->photo)}}" class="img-fluid">
                            <h3>{{$product->name}}</h3>
                            <p class="text-muted">{{$product->short_description}}</p>
                            <div class="d-flex flex-row justify-content-center align-items-center mb-4">
                                @if ($product->sale_price != 0)
                                <div class="text-muted" style="text-decoration: line-through;padding-top:1px;">{{$product->normal_price}} PLN</div>
                                <div class="text-custom-1 fs-4"> {{$product->sale_price}} PLN</div>
                                @else
                                <div class="text-custom-1 fs-4"> {{$product->normal_price}} PLN</div>
                                @endif
                            </div>
                            <div class="d-flex flex-row justify-content-start align-items-center flex-wrap">
                                @if (in_array($product->id,$sizes_id))
                                @foreach($brokers_all as $broker)
                                @if($broker->product_id == $product->id)
                                @foreach($sizes as $size)
                                @if ($size->id == $broker->size_id)
                                <a href="" class="btn btn-sm btn-custom-1 m-2">{{$size->value}}</a>
                                @endif
                                @endforeach
                                @endif
                                @endforeach
                                @else
                                @endif
                            </div>
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                @if (in_array($product->id,$sizes_id))
                                <a href="{{ url('product/'.$product->id)}}" class="btn btn-custom-2 w-100 h-100"><i class="fa fa-search"></i> Wybierz opcję</a>
                                @else
                                <button class="btn btn-custom-1 w-75 h-100 me-2">Dodaj do koszyka</button>
                                <a href="{{ url('product/'.$product->id)}}" class="btn btn-custom-2 w-25 h-100 text-white d-flex justify-content-center align-items-center"><i class="fa fa-search"></i></a>
                                @endif
                            </div>
                            <div class="position-absolute top-0 start-100 p-2" style="transform:translateX(-100%)">
                                @if ($product->new != 0)
                                <div class="bg-custom-1 p-2 text-white mb-2 shadow rounded">Nowość!</div>
                                @endif
                                @if ($product->sale_price != 0)
                                <div class="bg-custom-2 p-2 text-white shadow rounded">-{{round(100-(($product->sale_price*100)/$product->normal_price),2)}}%</div>
                                @endif
                            </div>
                        </div>
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
                    @foreach ($id['products'] as $product)
                    <div class="col-12 col-md-6 mb-4">
                        <div class="border text-center p-4 shadow position-relative h-100 d-flex flex-column justify-content-between align-items-center rounded">
                            <img alt="product_photo" src="{{ asset('photos/'.$product->photo)}}" class="img-fluid">
                            <h3>{{$product->name}}</h3>
                            <p class="text-muted">{{$product->short_description}}</p>
                            <div class="d-flex flex-row justify-content-center align-items-center mb-4">
                                @if ($product->sale_price != 0)
                                <div class="text-muted" style="text-decoration: line-through;padding-top:1px;">{{$product->normal_price}} PLN</div>
                                <div class="text-custom-1 fs-4"> {{$product->sale_price}} PLN</div>
                                @else
                                <div class="text-custom-1 fs-4"> {{$product->normal_price}} PLN</div>
                                @endif
                            </div>
                            <div class="d-flex flex-row justify-content-start align-items-center flex-wrap">
                                @if (in_array($product->id,$sizes_id))
                                @foreach($brokers_all as $broker)
                                @if($broker->product_id == $product->id)
                                @foreach($sizes as $size)
                                @if ($size->id == $broker->size_id)
                                <a href="" class="btn btn-sm btn-custom-1 m-2">{{$size->value}}</a>
                                @endif
                                @endforeach
                                @endif
                                @endforeach
                                @else
                                @endif
                            </div>
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                @if (in_array($product->id,$sizes_id))
                                <a href="{{ url('product/'.$product->id)}}" class="btn btn-custom-2 w-100 h-100"><i class="fa fa-search"></i> Wybierz opcję</a>
                                @else
                                <button class="btn btn-custom-1 w-75 h-100 me-2">Dodaj do koszyka</button>
                                <a href="{{ url('product/'.$product->id)}}" class="btn btn-custom-2 w-25 h-100 text-white d-flex justify-content-center align-items-center"><i class="fa fa-search"></i></a>
                                @endif
                            </div>
                            <div class="position-absolute top-0 start-100 p-2" style="transform:translateX(-100%)">
                                @if ($product->new != 0)
                                <div class="bg-custom-1 p-2 text-white mb-2 shadow rounded">Nowość!</div>
                                @endif
                                @if ($product->sale_price != 0)
                                <div class="bg-custom-2 p-2 text-white shadow rounded">-{{round(100-(($product->sale_price*100)/$product->normal_price),2)}}%</div>
                                @endif
                            </div>
                        </div>
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