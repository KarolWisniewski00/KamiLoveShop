@extends('layouts.main')
@section('content')
<!--END NAV + HEADER-->
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="bg-img-1"></div>

            <div class="container">
                <div class="carousel-caption">
                    <h1>Example headline</h1>
                    <p>Some representative placeholder content for the first slide of the carousel.</p>
                    <p><a class="btn btn-lg btn-custom-1" href="#">Sign up today</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="bg-img-2"></div>

            <div class="container">
                <div class="carousel-caption">
                    <h1>Another example headline.</h1>
                    <p>Some representative placeholder content for the second slide of the carousel.</p>
                    <p><a class="btn btn-lg btn-custom-1" href="#">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="bg-img-3"></div>

            <div class="container">
                <div class="carousel-caption">
                    <h1>One more for good measure.</h1>
                    <p>Some representative placeholder content for the third slide of this carousel.</p>
                    <p><a class="btn btn-lg btn-custom-1" href="#">Browse gallery</a></p>
                </div>
            </div>
        </div>
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
<!--PRODUCTS GRID-->
<section>
    <div class="container">
        <h2 class="text-center my-4" style="font-size: 3em;">Nowości</h2>
        <div class="row g-4">
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <div class="border text-center p-4 shadow position-relative h-100 d-flex flex-column justify-content-between align-items-center rounded">
                    <img alt="" src="{{ asset('photos/product-1.jpg')}}" class="img-fluid">
                    <h3>Nazwa produktu</h3>
                    <p class="text-muted">Opis produktu</p>
                    <div class="d-flex flex-row justify-content-center align-items-center mb-4">
                        <div class="text-muted" style="text-decoration: line-through;padding-top:1px;">100 PLN</div>
                        <div class="text-custom-1 fs-4"> 80 PLN</div>
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <button class="btn btn-custom-1 w-75 h-100 me-2">Dodaj do koszyka</button>
                        <a href="" class="btn btn-custom-2 w-25 h-100  d-flex justify-content-center align-items-center"><i class="fa fa-search"></i></a>
                    </div>
                    <div class="position-absolute top-0 start-100 p-2" style="transform:translateX(-100%)">
                        <div class="bg-custom-1 p-2 text-white mb-2 shadow rounded">Nowość!</div>
                        <div class="bg-custom-2 p-2 text-white shadow rounded">-20%</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <div class="border text-center p-4 shadow position-relative h-100 d-flex flex-column justify-content-between align-items-center rounded">
                    <img alt="" src="{{ asset('photos/product-1.jpg')}}" class="img-fluid">
                    <h3>Nazwa produktu</h3>
                    <p class="text-muted">Opis produktu</p>
                    <div class="d-flex flex-row justify-content-center align-items-center mb-4">
                        <div class="text-muted" style="text-decoration: line-through;padding-top:1px;">100 PLN</div>
                        <div class="text-custom-1 fs-4"> 80 PLN</div>
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <button class="btn btn-custom-1 w-75 h-100 me-2">Dodaj do koszyka</button>
                        <a href="" class="btn btn-custom-2 w-25 h-100  d-flex justify-content-center align-items-center"><i class="fa fa-search"></i></a>
                    </div>
                    <div class="position-absolute top-0 start-100 p-2" style="transform:translateX(-100%)">
                        <div class="bg-custom-1 p-2 text-white mb-2 shadow rounded">Nowość!</div>
                        <div class="bg-custom-2 p-2 text-white shadow rounded">-20%</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <div class="border text-center p-4 shadow position-relative h-100 d-flex flex-column justify-content-between align-items-center rounded">
                    <img alt="" src="{{ asset('photos/product-1.jpg')}}" class="img-fluid">
                    <h3>Nazwa produktu</h3>
                    <p class="text-muted">Opis produktu</p>
                    <div class="d-flex flex-row justify-content-center align-items-center mb-4">
                        <div class="text-muted" style="text-decoration: line-through;padding-top:1px;">100 PLN</div>
                        <div class="text-custom-1 fs-4"> 80 PLN</div>
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <button class="btn btn-custom-1 w-75 h-100 me-2">Dodaj do koszyka</button>
                        <a href="" class="btn btn-custom-2 w-25 h-100  d-flex justify-content-center align-items-center"><i class="fa fa-search"></i></a>
                    </div>
                    <div class="position-absolute top-0 start-100 p-2" style="transform:translateX(-100%)">
                        <div class="bg-custom-1 p-2 text-white mb-2 shadow rounded">Nowość!</div>
                        <div class="bg-custom-2 p-2 text-white shadow rounded">-20%</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <div class="border text-center p-4 shadow position-relative h-100 d-flex flex-column justify-content-between align-items-center rounded">
                    <img alt="" src="{{ asset('photos/product-1.jpg')}}" class="img-fluid">
                    <h3>Nazwa produktu</h3>
                    <p class="text-muted">Opis produktu</p>
                    <div class="d-flex flex-row justify-content-center align-items-center mb-4">
                        <div class="text-muted" style="text-decoration: line-through;padding-top:1px;">100 PLN</div>
                        <div class="text-custom-1 fs-4"> 80 PLN</div>
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <button class="btn btn-custom-1 w-75 h-100 me-2">Dodaj do koszyka</button>
                        <a href="" class="btn btn-custom-2 w-25 h-100  d-flex justify-content-center align-items-center"><i class="fa fa-search"></i></a>
                    </div>
                    <div class="position-absolute top-0 start-100 p-2" style="transform:translateX(-100%)">
                        <div class="bg-custom-1 p-2 text-white mb-2 shadow rounded">Nowość!</div>
                        <div class="bg-custom-2 p-2 text-white shadow rounded">-20%</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <div class="border text-center p-4 shadow position-relative h-100 d-flex flex-column justify-content-between align-items-center rounded">
                    <img alt="" src="{{ asset('photos/product-1.jpg')}}" class="img-fluid">
                    <h3>Nazwa produktu</h3>
                    <p class="text-muted">Opis produktu</p>
                    <div class="d-flex flex-row justify-content-center align-items-center mb-4">
                        <div class="text-muted" style="text-decoration: line-through;padding-top:1px;">100 PLN</div>
                        <div class="text-custom-1 fs-4"> 80 PLN</div>
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <button class="btn btn-custom-1 w-75 h-100 me-2">Dodaj do koszyka</button>
                        <a href="" class="btn btn-custom-2 w-25 h-100  d-flex justify-content-center align-items-center"><i class="fa fa-search"></i></a>
                    </div>
                    <div class="position-absolute top-0 start-100 p-2" style="transform:translateX(-100%)">
                        <div class="bg-custom-1 p-2 text-white mb-2 shadow rounded">Nowość!</div>
                        <div class="bg-custom-2 p-2 text-white shadow rounded">-20%</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <div class="border text-center p-4 shadow position-relative h-100 d-flex flex-column justify-content-between align-items-center rounded">
                    <img alt="" src="{{ asset('photos/product-1.jpg')}}" class="img-fluid">
                    <h3>Nazwa produktu</h3>
                    <p class="text-muted">Opis produktu</p>
                    <div class="d-flex flex-row justify-content-center align-items-center mb-4">
                        <div class="text-muted" style="text-decoration: line-through;padding-top:1px;">100 PLN</div>
                        <div class="text-custom-1 fs-4"> 80 PLN</div>
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <button class="btn btn-custom-1 w-75 h-100 me-2">Dodaj do koszyka</button>
                        <a href="" class="btn btn-custom-2 w-25 h-100  d-flex justify-content-center align-items-center"><i class="fa fa-search"></i></a>
                    </div>
                    <div class="position-absolute top-0 start-100 p-2" style="transform:translateX(-100%)">
                        <div class="bg-custom-1 p-2 text-white mb-2 shadow rounded">Nowość!</div>
                        <div class="bg-custom-2 p-2 text-white shadow rounded">-20%</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <div class="border text-center p-4 shadow position-relative h-100 d-flex flex-column justify-content-between align-items-center rounded">
                    <img alt="" src="{{ asset('photos/product-1.jpg')}}" class="img-fluid">
                    <h3>Nazwa produktu</h3>
                    <p class="text-muted">Opis produktu</p>
                    <div class="d-flex flex-row justify-content-center align-items-center mb-4">
                        <div class="text-muted" style="text-decoration: line-through;padding-top:1px;">100 PLN</div>
                        <div class="text-custom-1 fs-4"> 80 PLN</div>
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <button class="btn btn-custom-1 w-75 h-100 me-2">Dodaj do koszyka</button>
                        <a href="" class="btn btn-custom-2 w-25 h-100  d-flex justify-content-center align-items-center"><i class="fa fa-search"></i></a>
                    </div>
                    <div class="position-absolute top-0 start-100 p-2" style="transform:translateX(-100%)">
                        <div class="bg-custom-1 p-2 text-white mb-2 shadow rounded">Nowość!</div>
                        <div class="bg-custom-2 p-2 text-white shadow rounded">-20%</div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <div class="border text-center p-4 shadow position-relative h-100 d-flex flex-column justify-content-between align-items-center rounded">
                    <img alt="" src="{{ asset('photos/product-1.jpg')}}" class="img-fluid">
                    <h3>Nazwa produktu</h3>
                    <p class="text-muted">Opis produktu</p>
                    <div class="d-flex flex-row justify-content-center align-items-center mb-4">
                        <div class="text-muted" style="text-decoration: line-through;padding-top:1px;">100 PLN</div>
                        <div class="text-custom-1 fs-4"> 80 PLN</div>
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <button class="btn btn-custom-1 w-75 h-100 me-2">Dodaj do koszyka</button>
                        <a href="" class="btn btn-custom-2 w-25 h-100  d-flex justify-content-center align-items-center"><i class="fa fa-search"></i></a>
                    </div>
                    <div class="position-absolute top-0 start-100 p-2" style="transform:translateX(-100%)">
                        <div class="bg-custom-1 p-2 text-white mb-2 shadow rounded">Nowość!</div>
                        <div class="bg-custom-2 p-2 text-white shadow rounded">-20%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <h2 class="text-start my-4" style="font-size: 3em;">Torebki</h2>
        <div class="row g-4">
            <div class="col-6">
                <div class="row">
                    <div class="col-12 col-md-6 mb-4">
                        <div class="border text-center p-4 shadow position-relative h-100 d-flex flex-column justify-content-between align-items-center rounded">
                            <img alt="" src="{{ asset('photos/product-1.jpg')}}" class="img-fluid">
                            <h3>Nazwa produktu</h3>
                            <p class="text-muted">Opis produktu</p>
                            <div class="d-flex flex-row justify-content-center align-items-center mb-4">
                                <div class="text-muted" style="text-decoration: line-through;padding-top:1px;">100 PLN</div>
                                <div class="text-custom-1 fs-4"> 80 PLN</div>
                            </div>
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <button class="btn btn-custom-1 w-75 h-100 me-2">Dodaj do koszyka</button>
                                <a href="" class="btn btn-custom-2 w-25 h-100  d-flex justify-content-center align-items-center"><i class="fa fa-search"></i></a>
                            </div>
                            <div class="position-absolute top-0 start-100 p-2" style="transform:translateX(-100%)">
                                <div class="bg-custom-1 p-2 text-white mb-2 shadow rounded">Nowość!</div>
                                <div class="bg-custom-2 p-2 text-white shadow rounded">-20%</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="border text-center p-4 shadow position-relative h-100 d-flex flex-column justify-content-between align-items-center rounded">
                            <img alt="" src="{{ asset('photos/product-1.jpg')}}" class="img-fluid">
                            <h3>Nazwa produktu</h3>
                            <p class="text-muted">Opis produktu</p>
                            <div class="d-flex flex-row justify-content-center align-items-center mb-4">
                                <div class="text-muted" style="text-decoration: line-through;padding-top:1px;">100 PLN</div>
                                <div class="text-custom-1 fs-4"> 80 PLN</div>
                            </div>
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <button class="btn btn-custom-1 w-75 h-100 me-2">Dodaj do koszyka</button>
                                <a href="" class="btn btn-custom-2 w-25 h-100  d-flex justify-content-center align-items-center"><i class="fa fa-search"></i></a>
                            </div>
                            <div class="position-absolute top-0 start-100 p-2" style="transform:translateX(-100%)">
                                <div class="bg-custom-1 p-2 text-white mb-2 shadow rounded">Nowość!</div>
                                <div class="bg-custom-2 p-2 text-white shadow rounded">-20%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex flex-row justify-content-center align-items-center h-100">
                    <img alt="bag" src="{{ asset('photos/bag.jpg')}}" class="img-fluid shadow rounded">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection