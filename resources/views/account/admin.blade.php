@extends('layouts.main')
@section('content')
<!--HISTORY-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
                    <h1>Panel admina</h1>
                </div>
                @include('layouts.account')
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                @if ($panel == 0)
                <div class="list-group">
                    <a href="{{ route('admin')}}" class="list-group-item active d-flex justify-content-center align-items-center" aria-current="true"><i class="fa-solid fa-house me-2"></i>Start</a>
                    <a href="{{ route('categories')}}" class="list-group-item d-flex justify-content-center align-items-center"><i class="fa-solid fa-file me-2"></i>Kategorie</a>
                    <a href="{{ route('products')}}" class="list-group-item d-flex justify-content-center align-items-center"><i class="fa-solid fa-cart-shopping me-2"></i>Produkty</a>
                </div>
                @elseif ($panel == 1)
                <div class="list-group">
                    <a href="{{ route('admin')}}" class="list-group-item d-flex justify-content-center align-items-center"><i class="fa-solid fa-house me-2"></i>Start</a>
                    <a href="{{ route('categories')}}" class="list-group-item active d-flex justify-content-center align-items-center" aria-current="true"><i class="fa-solid fa-file me-2"></i>Kategorie</a>
                    <a href="{{ route('products')}}" class="list-group-item d-flex justify-content-center align-items-center"><i class="fa-solid fa-cart-shopping me-2"></i>Produkty</a>
                </div>
                @elseif ($panel == 2)
                <div class="list-group">
                    <a href="{{ route('admin')}}" class="list-group-item d-flex justify-content-center align-items-center"><i class="fa-solid fa-house me-2"></i>Start</a>
                    <a href="{{ route('categories')}}" class="list-group-item d-flex justify-content-center align-items-center"><i class="fa-solid fa-file me-2"></i>Kategorie</a>
                    <a href="{{ route('products')}}" class="list-group-item active d-flex justify-content-center align-items-center" aria-current="true"><i class="fa-solid fa-cart-shopping me-2"></i>Produkty</a>
                </div>
                @endif
            </div>
            <div class="col-9">
                @if ($panel == 0)
                <h1>Start</h1>
                <hr>
                <p>Pusta strona</p>
                @elseif ($panel == 1)
                <h1>Kategorie</h1>
                <hr>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3 mb-4">
                        @if ($edit == 0)
                        <a href="{{ route('categories_new')}}" class="border p-4 shadow d-flex flex-column justify-content-center align-items-center rounded h-100">
                            <div class="bg-custom-1 p-4 rounded text-white fs-1"><i class="fa-solid fa-plus"></i></div>
                        </a>
                        @else
                        <form class="border p-4 shadow d-flex flex-column justify-content-center align-items-center rounded h-100 form text-center p-4" method="POST" action="{{route('categories_new_form')}}" enctype="multipart/form-data">
                            <p class="text-muted">Utwórz nową kategorię produktów</p>
                            <!--TOKEN-->
                            @csrf
                            <div class="form-floating my-3 w-100">
                                <input type="text" class="form-control" id="name" value="" name="name" required>
                                <label for="name">Nazwa</label>
                                <span class="text-danger">@error('name') {{$message}} @enderror</span>
                            </div>

                            <div class="form-floating my-3 w-100">
                                <input type="text" class="form-control" id="plural" value="" name="plural" required>
                                <label for="plural">L.mnoga</label>
                                <span class="text-danger">@error('plural') {{$message}} @enderror</span>
                            </div>

                            <div class="form-floating my-3 w-100">
                                <input type="text" class="form-control" id="url" value="" name="url" required>
                                <label for="url">URL</label>
                                <span class="text-danger">@error('url') {{$message}} @enderror</span>
                            </div>

                            <div class="form-floating my-3 w-100">
                                <input type="file" class="form-control" id="photo" name="photo" accept="image/png, image/jpeg, image/jpg" required>
                                <label for="photo">Zdjęcie</label>
                                <span class="text-danger">@error('photo') {{$message}} @enderror</span>
                            </div>

                            <div class="d-flex justify-content-start align-items-center mt-4">
                                <button class="btn btn-custom-1 me-2" type="submit"><i class="fa-solid fa-floppy-disk"></i> Zapisz</button>
                                <a href="{{route('categories')}}" class="btn btn-custom-2"><i class="fa-solid fa-xmark"></i> Anuluj</a>
                            </div>
                        </form>
                        @endif
                    </div>
                    @foreach ($categories as $category)
                    @if ($category->id == $id)
                    <div class="col-12 col-md-6 col-lg-3 mb-4">
                        <form class="border p-4 shadow d-flex flex-column justify-content-center align-items-center rounded h-100 form text-center p-4" method="POST" action="{{url ('/admin/categories/edit/'.$category->id)}}" enctype="multipart/form-data">
                            <p class="text-muted">Edytuj kategorię produktów</p>
                            <!--TOKEN-->
                            @csrf
                            <div class="form-floating my-3 w-100">
                                <input type="text" class="form-control" id="name" value="{{$category->name}}" name="name" required>
                                <label for="name">Nazwa</label>
                                <span class="text-danger">@error('name') {{$message}} @enderror</span>
                            </div>

                            <div class="form-floating my-3 w-100">
                                <input type="text" class="form-control" id="plural" value="{{$category->plural}}" name="plural" required>
                                <label for="plural">L.mnoga</label>
                                <span class="text-danger">@error('plural') {{$message}} @enderror</span>
                            </div>

                            <div class="form-floating my-3 w-100">
                                <input type="text" class="form-control" id="url" value="{{$category->url}}" name="url" required>
                                <label for="url">URL</label>
                                <span class="text-danger">@error('url') {{$message}} @enderror</span>
                            </div>

                            <div class="form-floating my-3 w-100">
                                <input type="file" class="form-control" id="photo" name="photo" accept="image/png, image/jpeg, image/jpg">
                                <label for="photo">Zdjęcie</label>
                                <span class="text-danger">@error('photo') {{$message}} @enderror</span>
                            </div>

                            <div class="d-flex justify-content-start align-items-center mt-4">
                                <button class="btn btn-custom-1 me-2" type="submit"><i class="fa-solid fa-floppy-disk"></i> Zapisz</button>
                                <a href="{{route('categories')}}" class="btn btn-custom-2"><i class="fa-solid fa-xmark"></i> Anuluj</a>
                            </div>
                        </form>
                    </div>
                    @else
                    <div class="col-12 col-md-6 col-lg-3 mb-4">
                        <div class="border p-4 shadow d-flex flex-column justify-content-center align-items-center rounded h-100">
                            <img alt="bag" src="{{ asset('photos/'.$category->photo)}}" class="img-fluid">
                            <h1 class="mt-4 text-black">{{$category->plural}}</h1>
                            <p class="text-muted"><i class="fa-solid fa-link"></i> {{$category->url}}</p>
                            <div class="mt-4 d-flex flex-row justify-content-center align-items-center">
                                <a href="{{url ('/admin/categories/edit/'.$category->id)}}" class="bg-custom-1 p-4 rounded text-white fs-1 me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{url ('/admin/categories/delete/'.$category->id)}}" class="bg-custom-2 p-4 rounded text-white fs-1" onclick="return confirm('Czy na pewno chcesz usunąć tę kategorię?');"><i class="fa-solid fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                @elseif ($panel == 2)
                <h1>Produkty</h1>
                <hr>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3 mb-4">
                        <a href="" class="border p-4 shadow d-flex flex-column justify-content-center align-items-center rounded h-100">
                            <div class="bg-custom-1 p-4 rounded text-white fs-1"><i class="fa-solid fa-plus"></i></div>
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!--END HISTORY-->
@endsection