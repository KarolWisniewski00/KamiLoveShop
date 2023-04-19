@extends('layouts.main')
@section('content')
<!--PRODUCT-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center my-4">
                    <h1>{{$product->name}}</h1>
                </div>
            </div>
            <!--LINKS-->
            <div class="col-12 text-wrap">
                <div class="d-flex flex-row justify-content-start align-items-center mb-4 flex-wrap">
                    <a href="{{route('index')}}" class="text-custom-1 mx-1 text-decoration-none">Strona główna</a>
                    <div class="mx-1"><i class="fa-solid fa-chevron-right" style="font-size: 0.75em;"></i></div>
                    <div class="mx-1">Kategorie</div>
                    <div class="mx-1"><i class="fa-solid fa-chevron-right" style="font-size: 0.75em;"></i></div>
                    @foreach($categories as $category)
                    @if ($category_id == $category->id)
                    <a href="{{ url('category/'.$category->url)}}" class="text-custom-1 mx-1 text-decoration-none">{{$category->plural}}</a>
                    @endif
                    @endforeach
                    <div class="mx-1"><i class="fa-solid fa-chevron-right" style="font-size: 0.75em;"></i></div>
                    <div class="mx-1">Produkt</div>
                    <div class="mx-1"><i class="fa-solid fa-chevron-right" style="font-size: 0.75em;"></i></div>
                    <div class="mx-1">{{$product->name}}</div>
                </div>
            </div>
            <!--END LINKS-->
            <div class="col-12 col-md-6">
                <div class="img position-relative rounded shadow" style='background-image: url({{asset("photos/".$product->photo)}}); background-color: #cccccc; height: 40em; background-position: center; background-repeat: no-repeat; background-size: cover;'>
                    <div class="position-absolute top-0 start-100 p-2" style="transform:translateX(-100%)">
                        @if ($product->new != 0)
                        <div class="bg-custom-1 p-2 text-white mb-2 shadow rounded">Nowość!</div>
                        @endif
                    </div>
                </div>
                <div class="row d-flex my-4">
                    <div class="img rounded shadow col mx-2" style='background-image: url({{asset("photos/".$product->photo)}}); background-color: #cccccc; aspect-ratio: 1/1; max-width:100%;background-position: center; background-repeat: no-repeat; background-size: cover;'></div>
                    <div class="img rounded shadow col mx-2" style='background-image: url({{asset("photos/".$product->photo)}}); background-color: #cccccc; aspect-ratio: 1/1; max-width:100%;background-position: center; background-repeat: no-repeat; background-size: cover;'></div>
                    <div class="img rounded shadow col mx-2" style='background-image: url({{asset("photos/".$product->photo)}}); background-color: #cccccc; aspect-ratio: 1/1; max-width:100%;background-position: center; background-repeat: no-repeat; background-size: cover;'></div>
                    <div class="img rounded shadow col mx-2" style='background-image: url({{asset("photos/".$product->photo)}}); background-color: #cccccc; aspect-ratio: 1/1; max-width:100%;background-position: center; background-repeat: no-repeat; background-size: cover;'></div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column justify-content-start align-items-start">
                    <h3>{{$product->name}}</h3>
                    <p class="text-muted">{{$product->long_description}}</p>
                    <div class="d-flex flex-column justify-content-start align-items-start my-4">
                        @if ($product->sale_price != 0)
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="text-muted" style="text-decoration: line-through;padding-top:1px;">{{$product->normal_price}} PLN</div>
                            <div class="bg-custom-2 p-2 text-white shadow ms-2 rounded">-{{round(100-(($product->sale_price*100)/$product->normal_price),2)}}%</div>
                        </div>
                        <div class="text-custom-1 fs-2">{{$product->sale_price}} PLN</div>
                        @else
                        <div class="text-custom-1 fs-1">{{$product->normal_price}} PLN</div>
                        @endif
                    </div>
                    <p class="fw-bold">Wybierz rozmiar</p>
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
                        <a href="{{ url('product/'.$product->id)}}" class="btn btn-lg btn-custom-2 w-100 h-100"><i class="fa fa-search"></i> Wybierz opcję</a>
                        @else
                        <button class="btn btn-custom-1 w-75 h-100 me-2">Dodaj do koszyka</button>
                        <a href="{{ url('product/'.$product->id)}}" class="btn btn-lg btn-custom-2 w-25 h-100 text-white d-flex justify-content-center align-items-center"><i class="fa fa-search"></i></a>
                        @endif
                    </div>
                    <p class="text-muted mt-2">SKU: {{$product->SKU}}</p>
                </div>
            </div>
        </div>
        <!--END PRODUCT-->
        <!--PRODUCTS GRID-->
        <div class="row">
            @if (count($products)!=0)
            <div class="col-12">
                <div class="text-center my-4">
                    <h1>Podobne produkty</h1>
                </div>
            </div>
            @endif
            @foreach ($products as $product)
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                @include('layouts.card')
            </div>
            @endforeach
        </div>
        <!--END PRODUCTS GRID-->
    </div>
</section>
<!--END PRODUCT-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".img").click(function() {
            this.requestFullscreen()
        })
    });
</script>
@endsection