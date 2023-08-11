@extends('layout.kamilove')
@section('content')
<!--PRODUCT-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center my-4">
                    <h1>{{$prod->name}}</h1>
                </div>
            </div>
            <!--LINKS-->
            <div class="col-12 text-wrap">
                <div class="d-flex flex-row justify-content-start align-items-center mb-4 flex-wrap">
                    <a href="{{route('index')}}" class="text-custom-1 mx-1 text-decoration-none">Strona główna</a>
                    <div class="mx-1"><i class="fa-solid fa-chevron-right" style="font-size: 0.75em;"></i></div>
                    <div class="mx-1">Kategorie</div>
                    <div class="mx-1"><i class="fa-solid fa-chevron-right" style="font-size: 0.75em;"></i></div>
                    @foreach($pro_cat as $c)
                    @if ($prod->category_id == $c->id)
                    <a href="{{route('category.show', $c->url)}}" class="text-custom-1 mx-1 text-decoration-none">{{$c->plural}}</a>
                    @endif
                    @endforeach
                    <div class="mx-1"><i class="fa-solid fa-chevron-right" style="font-size: 0.75em;"></i></div>
                    <div class="mx-1">Produkt</div>
                    <div class="mx-1"><i class="fa-solid fa-chevron-right" style="font-size: 0.75em;"></i></div>
                    <div class="mx-1">{{$prod->name}}</div>
                </div>
            </div>
            <!--END LINKS-->
            <div class="col-12 col-md-6">
                <button type="button" class="p-0 m-0 mb-3 border-0 d-flex align-items-center justify-content-center bg-transparent overflow-hidden" id="button-studio-photo-main" data-bs-toggle="modal" data-bs-target="#studio-photo-main">
                    <img src="{{asset('photos/'.$prod->photo)}}" alt="studio-photo-main" id="img-studio-photo-main" class="img-fluid ">
                </button>
                <div class="modal fade" id="studio-photo-main" tabindex="-1" aria-labelledby="studio-photo-main-label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content border-0 rounded-0">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{asset('photos/'.$prod->photo)}}" alt="studio-photo-main" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex my-4">
                    @foreach (unserialize($prod->photos) as $k => $pho)
                    @if($pho != null)
                    <button type="button" class="col p-3 m-0 mb-3 border-0 d-flex align-items-center justify-content-center bg-transparent overflow-hidden" id="button-studio-photo-{{$k}}" data-bs-toggle="modal" data-bs-target="#studio-photo-{{$k}}">
                        <img src="{{asset('photos/'.$pho)}}" alt="studio-photo-{{$k}}" id="img-studio-photo-{{$k}}" class="img-fluid ">
                    </button>
                    <div class="modal fade" id="studio-photo-{{$k}}" tabindex="-1" aria-labelledby="studio-photo-{{$k}}-label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content border-0 rounded-0">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{asset('photos/'.$pho)}}" alt="studio-photo-{{$k}}" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-flex flex-column justify-content-start align-items-start">
                    <h3 style="font-size: 3em;">{{$prod->name}}</h3>
                    <p class="text-muted">{{$prod->long_description}}</p>
                    <div class="d-flex flex-column justify-content-start align-items-start my-4">
                        @if ($prod->sale_price != 0)
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="text-muted" style="text-decoration: line-through;padding-top:1px;">{{$prod->normal_price}} PLN</div>
                            <div class="bg-custom-2 p-2 text-white  ms-2 rounded">-{{round(100-(($prod->sale_price*100)/$prod->normal_price),2)}}%</div>
                        </div>
                        <div class="text-custom-2 fs-2">{{$prod->sale_price}} PLN</div>
                        @else
                        <div class="text-custom-2 fs-1">{{$prod->normal_price}} PLN</div>
                        @endif
                    </div>
                    @if (in_array($prod->id,$sizes_id))
                    <p class="fw-bold mt-4">Rozmiar</p>
                    @endif
                    <div class="d-flex flex-row justify-content-start align-items-center flex-wrap mb-2">
                        @if (in_array($prod->id,$sizes_id))
                        @foreach($brokers_all as $broker)
                        @if($broker->product_id == $prod->id)
                        @foreach($sizes as $size)
                        @if ($size->id == $broker->size_id)
                        <button type="button" class="btn btn-lg btn-custom rounded-pill m-1 size mb-3">{{$size->value}}</button>
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                        @else
                        @endif
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center mb-4 mt-2">
                        <form method="POST" action="{{route('user.busket.store')}}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$prod->id}}">
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="size" value="0">
                            <button type="submit" class="btn btn-lg btn-custom-1 w-100 h-100">
                                <div class="d-flex justify-content-start align-items-center">
                                    <div><i class="fa-solid fa-cart-shopping me-2"></i></div>
                                    <div>Dodaj do koszyka</div>
                                </div>
                            </button>
                        </form>
                    </div>
                    <p class="text-muted mt-2">SKU: {{$prod->SKU}}</p>
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
            @foreach ($products as $p)
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                @include('client.kamilove.module.product-card')
            </div>
            @endforeach
        </div>
        <!--END PRODUCTS GRID-->
    </div>
</section>
<!--END PRODUCT-->
@endsection