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
            <div class="col-3">
                <div class="border rounded text-center p-4 rounded">
                    <div class="bg-img-4"></div>
                    <h3>Nazwa produktu</h3>
                    <div>
                        <div class="text-danger">100 PLN</div>
                        <button class="btn btn-custom-1">Wybierz</button>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="border rounded text-center p-4 rounded">
                    <div class="bg-img-4"></div>
                    <h3>Nazwa produktu</h3>
                    <div>
                        <div class="text-danger">100 PLN</div>
                        <button class="btn btn-custom-1">Wybierz</button>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="border rounded text-center p-4 rounded">
                    <div class="bg-img-4"></div>
                    <h3>Nazwa produktu</h3>
                    <div>
                        <div class="text-danger">100 PLN</div>
                        <button class="btn btn-custom-1">Wybierz</button>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="border rounded text-center p-4 rounded">
                    <div class="bg-img-4"></div>
                    <h3>Nazwa produktu</h3>
                    <div>
                        <div class="text-danger">100 PLN</div>
                        <button class="btn btn-custom-1">Wybierz</button>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="border rounded text-center p-4 rounded">
                    <div class="bg-img-4"></div>
                    <h3>Nazwa produktu</h3>
                    <div>
                        <div class="text-danger">100 PLN</div>
                        <button class="btn btn-custom-1">Wybierz</button>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="border rounded text-center p-4 rounded">
                    <div class="bg-img-4"></div>
                    <h3>Nazwa produktu</h3>
                    <div>
                        <div class="text-danger">100 PLN</div>
                        <button class="btn btn-custom-1">Wybierz</button>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="border rounded text-center p-4 rounded">
                    <div class="bg-img-4"></div>
                    <h3>Nazwa produktu</h3>
                    <div>
                        <div class="text-danger">100 PLN</div>
                        <button class="btn btn-custom-1">Wybierz</button>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="border rounded text-center p-4 rounded">
                    <div class="bg-img-4"></div>
                    <h3>Nazwa produktu</h3>
                    <div>
                        <div class="text-danger">100 PLN</div>
                        <button class="btn btn-custom-1">Wybierz</button>
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
                    <div class="col-6">
                        <div class="border rounded text-center p-4 rounded">
                            <div class="bg-img-5"></div>
                            <h3>Nazwa produktu</h3>
                            <div>
                                <div class="text-danger">100 PLN</div>
                                <button class="btn btn-custom-1">Wybierz</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="border rounded text-center p-4 rounded">
                            <div class="bg-img-5"></div>
                            <h3>Nazwa produktu</h3>
                            <div>
                                <div class="text-danger">100 PLN</div>
                                <button class="btn btn-custom-1">Wybierz</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="border rounded text-center p-4 rounded">
                            <div class="bg-img-5"></div>
                            <h3>Nazwa produktu</h3>
                            <div>
                                <div class="text-danger">100 PLN</div>
                                <button class="btn btn-custom-1">Wybierz</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="border rounded text-center p-4 rounded">
                            <div class="bg-img-5"></div>
                            <h3>Nazwa produktu</h3>
                            <div>
                                <div class="text-danger">100 PLN</div>
                                <button class="btn btn-custom-1">Wybierz</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-12">
                        <img alt="bag" src="{{ asset('photos/bag.jpg')}}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <h2 class="text-end my-4" style="font-size: 3em;">Sukienki</h2>
        <div class="row g-4">
            <div class="col-6">
                <div class="row">
                    <div class="col-12">
                        <img alt="bag" src="{{ asset('photos/dress.jpg')}}" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-6">
                        <div class="border rounded text-center p-4 rounded">
                            <div class="bg-img-6"></div>
                            <h3>Nazwa produktu</h3>
                            <div>
                                <div class="text-danger">100 PLN</div>
                                <button class="btn btn-custom-1">Wybierz</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="border rounded text-center p-4 rounded">
                            <div class="bg-img-6"></div>
                            <h3>Nazwa produktu</h3>
                            <div>
                                <div class="text-danger">100 PLN</div>
                                <button class="btn btn-custom-1">Wybierz</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="border rounded text-center p-4 rounded">
                            <div class="bg-img-6"></div>
                            <h3>Nazwa produktu</h3>
                            <div>
                                <div class="text-danger">100 PLN</div>
                                <button class="btn btn-custom-1">Wybierz</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="border rounded text-center p-4 rounded">
                            <div class="bg-img-6"></div>
                            <h3>Nazwa produktu</h3>
                            <div>
                                <div class="text-danger">100 PLN</div>
                                <button class="btn btn-custom-1">Wybierz</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection