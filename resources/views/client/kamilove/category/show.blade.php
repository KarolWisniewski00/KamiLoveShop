@extends('layout.kamilove')
@section('meta')
@foreach($pro_cat as $c)
@if ($slug == $c->url)
<title>{{$c->plural}} | KamiLove Fashion sklep online</title>
@endif
@endforeach
@endsection
@section('content')
<!--PAGES-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center my-4">
                    @foreach($pro_cat as $c)
                    @if ($slug == $c->url)
                    <h1>{{$c->plural}}</h1>
                    @endif
                    @endforeach
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
                        @foreach($pro_cat as $c)
                        @if ($slug == $c->url)
                        <div class="mx-1">{{$c->plural}}</div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </section>
            <!--END LINKS-->

        </div>
        <div class="row">
            <!--FILTERS-->
            <div class="col-12 col-lg-3 mb-4">
                <form class="accordion " id="accordionPanelsStayOpenExample" method="GET" action="{{ route('category.show', $slug) }}">
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
                                        <input type="range" name="price_min" id="price_min" class="slider my-2" value="{{ $request->input('price_min', 0) }}" min="0" max="{{ $max }}">
                                    </div>
                                    <div>
                                        <label for="price_max">Do:</label>
                                        <input type="range" name="price_max" id="price_max" class="slider my-2" value="{{ $request->input('price_max', $max) }}" min="0" max="{{ $max }}">
                                    </div>
                                </div>
                                <div>
                                    <span id="price_min_value">{{ $request->input('price_min', 0) }}</span> PLN -
                                    <span id="price_max_value">{{ $request->input('price_max', $max) }}</span> PLN
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
                                @foreach($pro_cat as $c)
                                <a href="{{route('category.show', $c->url)}}" class="list-group-item d-flex justify-content-between align-items-start py-1">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">{{$c->plural}}</div>
                                    </div>
                                    <span class="badge bg-custom rounded-pill">
                                        @php
                                        $count = $prod->where('category_id', $c->id)->count();
                                        @endphp
                                        {{$count}}
                                    </span>
                                </a>
                                @foreach($pro_subcat as $sc)
                                @if ($sc->category_id == $c->id)
                                <a href="{{route('category.show', $c->url)}}" class="list-group-item d-flex justify-content-between align-items-start py-1">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold text-muted ps-2" style="inline-size: 100%;overflow-wrap: break-word;">{{$sc->plural}}</div>
                                    </div>
                                    <span class="badge bg-custom-1 rounded-pill">
                                        @php
                                        $count = $prod->where('subcategory_id', $sc->id)->count();
                                        @endphp
                                        {{$count}}
                                    </span>
                                </a>
                                @endif
                                @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @if($sizes != null)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true" aria-controls="panelsStayOpen-collapseThree">
                                Rozmiary
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                @foreach($sizes as $size)
                                <div class="list-group-item d-flex justify-content-between align-items-start py-1">
                                    <div class="ms-2 me-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" {{ $request->sizes ? 'checked':'' }} value="{{ $size->size->id }}" name="sizes[]" id="flexCheck_{{ $size->size->id }}">
                                            <label class="form-check-label fw-bold" for="flexCheck_{{ $size->size->id }}">
                                                {{ $size->size->value }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="accordion-item py-4">
                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn btn btn-lg btn-custom-1 rounded-0" type="submit">Filtruj</button>
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
                        <div class="d-flex justify-content-start align-items-center">
                            <div class="text-muted">Pokazano {{ $prod->total() }}
                                @if($prod->total() == 1)
                                produkt
                                @else
                                produktów
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex justify-content-end align-items-center">
                            <select id="sort_option" class="btn btn-custom-1 rounded-0 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <option class="bg-white text-black" value="default">Domyślne sortowanie</option>
                                <option class="bg-white text-black" value="low_to_high">Sortuj po cenie od najniższej</option>
                                <option class="bg-white text-black" value="high_to_low">Sortuj po cenie od najwyższej</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!--END SORT-->
                <div class="row products">
                    @foreach ($prod as $p)
                    @if ($p->sale_price != 0)
                    <div class="col-12 col-md-6 col-lg-4 mb-4 single" data-price="{{ $p->sale_price }}" data-id="{{ $p->id }}">
                        @else
                        <div class="col-12 col-md-6 col-lg-4 mb-4 single" data-price="{{ $p->normal_price }}" data-id="{{ $p->id }}">
                            @endif
                            @include('client.kamilove.module.product-card')
                        </div>
                        @endforeach
                        @if ($prod->total() == 0)
                        <div class="col-12">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img alt="emptyplace" src="{{asset('svg/kamilove-product.svg')}}" class="img-fluid">
                                <div class="h4 m-0 p-0 my-3">Nie znaleziono produktów!</div>
                            </div>
                        </div>
                        @endif
                        {{ $prod->links('client.kamilove.module.pagination') }}
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
    $(document).ready(function() {
        // Obsługa zmiany wartości na pasku suwakowym price_min
        $('#price_min').on('input', function() {
            var minPrice = $(this).val();
            $('#price_min_value').text(minPrice);
        });

        // Obsługa zmiany wartości na pasku suwakowym price_max
        $('#price_max').on('input', function() {
            var maxPrice = $(this).val();
            $('#price_max_value').text(maxPrice);
        });
        // Obsługa zmiany sortowania
        $('#sort_option').on('change', function() {
            var selectedOption = $(this).val();

            if (selectedOption === 'default') {
                // If the default sorting is selected, simply reset the products to their original order
                $('.products').find('.single').sort(function(a, b) {
                    return $(a).data('id') - $(b).data('id');
                }).appendTo('.products');
            } else {
                // Sort products based on price
                $('.products').find('.single').sort(function(a, b) {
                    var priceA = parseFloat($(a).data('price'));
                    var priceB = parseFloat($(b).data('price'));

                    if (selectedOption === 'low_to_high') {
                        return priceA - priceB;
                    } else if (selectedOption === 'high_to_low') {
                        return priceB - priceA;
                    }
                }).appendTo('.products');
            }
        });
    });
</script>

@endsection