@extends('layouts.main')
@section('content')
<!--PAGES-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center my-4">
                    <h1>{{$plural}}</h1>
                </div>
            </div>
            <!--LINKS-->
            <section>
                <div class="col-12">
                    <div class="d-flex justify-content-start align-items-center mb-4">
                        <a href="{{route('index')}}" class="text-custom-1 mx-1 text-decoration-none">Strona główna</a>
                        <div class="mx-1"><i class="fa-solid fa-chevron-right" style="font-size: 0.75em;"></i></div>
                        <div class="mx-1">Kategorie</div>
                        <div class="mx-1"><i class="fa-solid fa-chevron-right" style="font-size: 0.75em;"></i></div>
                        <div class="mx-1">{{$plural}}</div>
                    </div>
                </div>
            </section>
            <!--END LINKS-->
        </div>
        <div class="row">
            <!--FILTERS-->
            <div class="col-12 col-lg-3 mb-4">
                <form class="accordion shadow" id="accordionPanelsStayOpenExample" method="GET" action="{{ url('category/'.$url)}}">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                Cena
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body d-flex flex-column justify-content-center align-items-center">
                                <div data-role="rangeslider" class="d-flex flex-column justify-content-center align-items-center">
                                    <div>
                                        <label for="price_min">Od:</label>
                                        @if ($last_min != null)
                                        <input type="range" name="price_min" id="price_min" class="slider my-2" value="{{$last_min}}" min="0" max="{{$max}}">
                                        @else
                                        <input type="range" name="price_min" id="price_min" class="slider my-2" value="0" min="0" max="{{$max}}">
                                        @endif
                                    </div>
                                    <div>
                                        <label for="price_max">Do:</label>
                                        @if ($last_min != null)
                                        <input type="range" name="price_max" id="price_max" class="slider my-2" value="{{$last_max}}" min="0" max="{{$max}}">
                                        @else
                                        <input type="range" name="price_max" id="price_max" class="slider my-2" value="{{$max}}" min="0" max="{{$max}}">
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    <span id="price_min_value"></span> PLN -
                                    <span id="price_max_value"></span> PLN
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">
                                Kategorie
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                @foreach($categories_count as $category)
                                <a href="{{ url('category/'.$category->url)}}" class="list-group-item d-flex justify-content-between align-items-start py-1">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">{{$category->plural}}</div>
                                    </div>
                                    <span class="badge bg-custom-1 rounded-pill">{{$category->count}}</span>
                                </a>
                                @foreach($subcategories_count as $subcategory)
                                @if ($subcategory->category_id == $category->id)
                                <a href="{{ url('category/'.$subcategory->url)}}" class="list-group-item d-flex justify-content-between align-items-start py-1">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold text-muted ps-2" style="inline-size: 100%;overflow-wrap: break-word;">{{$subcategory->plural}}</div>
                                    </div>
                                    <span class="badge bg-custom-2 rounded-pill">{{$subcategory->count}}</span>
                                </a>
                                @endif
                                @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">
                                Rozmiary
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                @foreach ($brokers as $broker)
                                <div class="list-group-item d-flex justify-content-between align-items-start py-1">
                                    <div class="ms-2 me-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{$broker}}" name="broker" id="flexCheckDefault">
                                            <label class="form-check-label fw-bold" for="flexCheckDefault">
                                                {{$broker}}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item py-4">
                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn btn-lg btn-custom-1" type="submit">Filtruj</button>
                        </div>
                    </div>
                </form>
            </div>
            <!--END FILTERS-->
            <!--PRODUCTS GRID-->
            <div class="col-12 col-lg-9">
                <!--SORT-->
                <div class="row mb-4">
                    <div class="col-6">
                        <div class="text-muted">Pokazano {{count($products)}}
                            @if(count($products) == 1)
                            produkt
                            @elseif(count($products) > 1 && count($products) <= 4) produkty @elseif(count($products)> 4 || count($products) == 0)
                                produktów
                                @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="dropdown">
                                <button class="btn btn-custom-1 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Sortuj</button>
                                <ul class="dropdown-menu rounded-0">
                                    <li><button class="dropdown-item">Domyślne sortowanie</button></li>
                                    <li><button class="dropdown-item">Sortuj po cenie od najniższej</button></li>
                                    <li><button class="dropdown-item">Sortuj po cenie od najwyższej</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END SORT-->
                <div class="row products">
                    @foreach ($products as $product)
                    @if ($product->sale_price != 0)
                    <div class="col-12 col-md-6 col-lg-4 mb-4 single" data-price="{{$product->sale_price}}" data-id="{{$product->id}}">
                        @else
                        <div class="col-12 col-md-6 col-lg-4 mb-4 single" data-price="{{$product->normal_price}}" data-id="{{$product->id}}">
                            @endif
                            <div class="border text-center p-4 shadow position-relative h-100 d-flex flex-column justify-content-between align-items-center">
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
                </div>
                <!--END PRODUCTS GRID-->
            </div>
        </div>
    </div>
</section>
<!--END PAGES-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    //SORT
    $(document).ready(function() {
        $(".dropdown-menu button").click(function() {
            var sortValue = $(this).text();
            if (sortValue == "Domyślne sortowanie") {
                $(".single").sort(function(a, b) {
                    return $(a).data('id') - $(b).data('id');
                }).appendTo(".products");
            } else if (sortValue == "Sortuj po cenie od najniższej") {
                $(".single").sort(function(a, b) {
                    return $(a).data("price") - $(b).data("price");
                }).appendTo(".products");
            } else if (sortValue == "Sortuj po cenie od najwyższej") {
                $(".single").sort(function(a, b) {
                    return $(b).data("price") - $(a).data("price");
                }).appendTo(".products");
            }
        });
    });

    //FILTER
    const priceMin = document.getElementById('price_min');
    const priceMax = document.getElementById('price_max');
    const priceMinValue = document.getElementById('price_min_value');
    const priceMaxValue = document.getElementById('price_max_value');

    priceMin.addEventListener('input', function() {
        priceMinValue.textContent = priceMin.value;
    });

    priceMax.addEventListener('input', function() {
        priceMaxValue.textContent = priceMax.value;
    });
    document.addEventListener('DOMContentLoaded', function() {
        priceMaxValue.textContent = priceMax.value;
        priceMinValue.textContent = priceMin.value;

    });
</script>
@endsection