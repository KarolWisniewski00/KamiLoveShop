@extends('layouts.main')
@section('content')
<!--PAGES-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                @foreach($categories as $category)
                @if ($url == $category->url)
                <div class="text-center my-4">
                    <h1>{{$category->plural}}</h1>
                </div>
                @endif
                @endforeach
            </div>
            <!--LINKS-->
            <section>
                <div class="col-12">
                    <div class="d-flex justify-content-start align-items-center mb-4">
                        <a href="{{route('index')}}" class="text-custom-2 mx-1 text-decoration-none">Strona główna</a>
                        <div class="mx-1"><i class="fa-solid fa-chevron-right" style="font-size: 0.75em;"></i></div>
                        <div class="mx-1">Kategorie</div>
                        <div class="mx-1"><i class="fa-solid fa-chevron-right" style="font-size: 0.75em;"></i></div>
                        @foreach($categories as $category)
                        @if ($url == $category->url)
                        <div class="mx-1">{{$category->plural}}</div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </section>
            <!--END LINKS-->
        </div>
        <div class="row">
            <!--FILTERS-->
            <div class="col-12 col-lg-3 col-xl-2 mb-4">
                <div class="accordion shadow" id="accordionPanelsStayOpenExample">
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
                                        <label for="price-min">Od:</label>
                                        <input type="range" name="price-min" id="price-min" class="slider my-2" value="0" min="0" max="{{$max}}">
                                    </div>
                                    <div>
                                        <label for="price-max">Do:</label>
                                        <input type="range" name="price-max" id="price-max" class="slider my-2" value="{{$max}}" min="0" max="{{$max}}">
                                    </div>
                                </div>
                                <div>
                                    <span id="price-min-value"></span> PLN -
                                    <span id="price-max-value"></span> PLN
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
                                @if ($url != $category->url)
                                <a href="{{ url('category/'.$category->url)}}" class="list-group-item d-flex justify-content-between align-items-start py-1">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">{{$category->plural}}</div>
                                    </div>
                                    <span class="badge bg-custom rounded-pill">{{$category->count}}</span>
                                </a>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                Rotacyjny
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item py-4">
                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn btn-lg btn-custom rounded-0">Filtruj</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--END FILTERS-->
            <!--PRODUCTS GRID-->
            <div class="col-12 col-lg-9 col-xl-10">
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
                                <button class="btn btn-custom dropdown-toggle rounded-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">Sortuj</button>
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
                                <img alt="bong" src="{{ asset('photos/'.$product->photo)}}" class="img-fluid">
                                <h3>{{$product->name}}</h3>
                                <p class="text-muted">{{$product->short_description}}</p>
                                <div class="d-flex flex-row justify-content-center align-items-center mb-4">
                                    @if ($product->sale_price != 0)
                                    <div class="text-muted" style="text-decoration: line-through;padding-top:1px;">{{$product->normal_price}} PLN</div>
                                    <div class="text-custom-2 fs-4"> {{$product->sale_price}} PLN</div>
                                    @else
                                    <div class="text-custom-2 fs-4"> {{$product->normal_price}} PLN</div>
                                    @endif
                                </div>
                                <div class="d-flex flex-row justify-content-between align-items-center">
                                    <button class="btn btn-custom rounded-0 w-75 h-100 me-2">Dodaj do koszyka</button>
                                    <a href="{{ url('product/'.$product->id)}}" class="btn btn-custom-1 rounded-0 w-25 h-100 text-black d-flex justify-content-center align-items-center"><i class="fa fa-search"></i></a>
                                </div>
                                <div class="position-absolute top-0 start-100 p-2" style="transform:translateX(-100%)">
                                    @if ($product->new != 0)
                                    <div class="bg-custom p-2 text-white mb-2 shadow">Nowość!</div>
                                    @endif
                                    @if ($product->sale_price != 0)
                                    <div class="bg-custom-1 p-2 text-white shadow">-{{100-(($product->sale_price*100)/$product->normal_price)}}%</div>
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
    const priceMin = document.getElementById('price-min');
    const priceMax = document.getElementById('price-max');
    const priceMinValue = document.getElementById('price-min-value');
    const priceMaxValue = document.getElementById('price-max-value');

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