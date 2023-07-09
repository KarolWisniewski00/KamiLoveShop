@extends('layout.saco')
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
                        <a href="{{route('index')}}" class="text-custom-2 mx-1 text-decoration-none">Strona główna</a>
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
                <form class="accordion " id="accordionPanelsStayOpenExample" method="GET" action="">
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
                                        <input type="range" name="price_min" id="price_min" class="slider my-2" value="$last_min" min="0" max="$max">
                                    </div>
                                    <div>
                                        <label for="price_max">Do:</label>
                                        <input type="range" name="price_max" id="price_max" class="slider my-2" value="$last_max" min="0" max="$max">
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
                                @foreach($pro_cat as $c)
                                <a href="{{route('category.show',$c->url)}}" class="list-group-item d-flex justify-content-between align-items-start py-1">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">{{$c->plural}}</div>
                                    </div>
                                    <span class="badge bg-custom rounded-pill">
                                        @php
                                        $count = 0;
                                        @endphp
                                        @foreach($pro_prod as $p)
                                        @if($p->category_id == $c->id)
                                        @php
                                        $count++;
                                        @endphp
                                        @endif
                                        @endforeach
                                        {{$count}}
                                    </span>
                                </a>
                                @foreach($pro_subcat as $sc)
                                @if ($sc->category_id == $c->id)
                                <a href="{{route('category.show',$c->url)}}" class="list-group-item d-flex justify-content-between align-items-start py-1">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold text-muted ps-2" style="inline-size: 100%;overflow-wrap: break-word;">{{$sc->plural}}</div>
                                    </div>
                                    <span class="badge bg-custom-1 rounded-pill">
                                        @php
                                        $count = 0;
                                        @endphp
                                        @foreach($pro_prod as $p)
                                        @if($p->subcategory_id == $sc->id)
                                        @php
                                        $count++;
                                        @endphp
                                        @endif
                                        @endforeach
                                        {{$count}}
                                    </span>
                                </a>
                                @endif
                                @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true" aria-controls="panelsStayOpen-collapseThree">
                                Rozmiary
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                <div class="list-group-item d-flex justify-content-between align-items-start py-1">
                                    <div class="ms-2 me-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="$b" name="broker_$key" id="flexCheck_$key">
                                            <label class="form-check-label fw-bold" for="flexCheck_$key">
                                                $b
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item py-4">
                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn btn-lg btn-custom rounded-0" type="submit">Filtruj</button>
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
                        <div class="text-muted">Pokazano {{count($prod)}}
                            @if(count($prod) == 1)
                            produkt
                            @elseif(count($prod) > 1 && count($prod) <= 4) produkty @elseif(count($prod)> 4 || count($prod) == 0)
                                produktów
                                @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="dropdown">
                                <button class="btn btn-custom dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Sortuj</button>
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
                    @foreach ($prod as $p)
                    @if ($p->sale_price != 0)
                    <div class="col-12 col-md-6 col-lg-4 mb-4 single" data-price="{{$p->sale_price}}" data-id="{{$p->id}}">
                        @else
                        <div class="col-12 col-md-6 col-lg-4 mb-4 single" data-price="{{$p->normal_price}}" data-id="{{$p->id}}">
                            @endif
                            @include('client.saco.module.product-card')
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
@endsection