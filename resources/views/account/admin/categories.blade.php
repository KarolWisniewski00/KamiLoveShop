@extends('layouts.admin')
@section('main')
<!--CATEGORIES-->
<h1>Kategorie <span class="bg-custom-1 rounded-pill badge">{{count($categories)}}</span></h1>
<hr>
<div class="row">
    <div class="col-12 col-md-6 col-lg-3 mb-4">
        @if ($new == 0)
        <!--DEFAULT-->
        <a href="{{ route('categories_new')}}" class="border p-4 shadow d-flex flex-column justify-content-center align-items-center rounded h-100">
            <div class="bg-custom-1 p-4 rounded text-white fs-1"><i class="fa-solid fa-plus"></i></div>
        </a>
        <!--END DEFAULT-->
        @else
        <!--NEW-->
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
        <!--END NEW-->
        @endif
    </div>
    @foreach ($categories as $category)
    @if ($category->id == $id)
    <!--EDIT-->
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
    <!--END EDIT-->
    @else
    <!--DEFAULT-->
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
    <!--END DEFAULT-->
    @endif
    @endforeach
    <!----------------------------------------------------------------------------------------->
    <h1>Podkategorie <span class="bg-custom-2 rounded-pill badge">{{count($subcategories)}}</span></h1>
    <hr>
    <div class="col-12 col-md-6 col-lg-3 mb-4">
        @if ($new_sub == 0)
        <!--DEFAULT-->
        <a href="{{ route('subcategories_new')}}" class="border p-4 shadow d-flex flex-column justify-content-center align-items-center rounded h-100">
            <div class="bg-custom-1 p-4 rounded text-white fs-1"><i class="fa-solid fa-plus"></i></div>
        </a>
        @else
        <!--NEW-->
        <form class="border p-4 shadow d-flex flex-column justify-content-center align-items-center rounded h-100 form text-center p-4" method="POST" action="{{route('subcategories_new_form')}}">
            <p class="text-muted">Utwórz nową podkategorię produktów</p>
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

            <div class="input-group my-3 w-100">
                <label class="input-group-text" for="category_id">Kategoria nadrzędna</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    <option selected>Wybierz</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->plural}}</option>
                    @endforeach
                </select>
                <span class="text-danger">@error('category_id') {{$message}} @enderror</span>
            </div>


            <div class="d-flex justify-content-start align-items-center mt-4">
                <button class="btn btn-custom-1 me-2" type="submit"><i class="fa-solid fa-floppy-disk"></i> Zapisz</button>
                <a href="{{route('categories')}}" class="btn btn-custom-2"><i class="fa-solid fa-xmark"></i> Anuluj</a>
            </div>
        </form>
        <!--END NEW-->
        @endif
        <!--END DEFAULT-->
    </div>
    @foreach($subcategories as $subcategory)
    @if ($subcategory->id == $id_sub)
    <!--EDIT-->
    <div class="col-12 col-md-6 col-lg-3 mb-4">
        <form class="border p-4 shadow d-flex flex-column justify-content-center align-items-center rounded h-100 form text-center p-4" method="POST" action="{{url ('/admin/subcategories/edit/'.$subcategory->id)}}">
            <p class="text-muted">Edytuj podkategorię produktów</p>
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

            <div class="input-group my-3 w-100">
                <label class="input-group-text" for="category_id">Kategoria nadrzędna</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    <option selected>Wybierz</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->plural}}</option>
                    @endforeach
                </select>
                <span class="text-danger">@error('category_id') {{$message}} @enderror</span>
            </div>

            <div class="d-flex justify-content-start align-items-center mt-4">
                <button class="btn btn-custom-1 me-2" type="submit"><i class="fa-solid fa-floppy-disk"></i> Zapisz</button>
                <a href="{{route('categories')}}" class="btn btn-custom-2"><i class="fa-solid fa-xmark"></i> Anuluj</a>
            </div>
        </form>
    </div>
    <!--END EDIT-->
    @else
    <!--DEFAULT-->
    <div class="col-12 col-md-6 col-lg-3 mb-4">
        <div class="border p-4 shadow d-flex flex-column justify-content-center align-items-center rounded h-100">
            @foreach($categories as $category)
            @if ($category->id == $subcategory->category_id)
            <img alt="bag" src="{{ asset('photos/'.$category->photo)}}" class="img-fluid">
            <h1 class="mt-4 text-black">{{$category->plural}}</h1>
            <p class="text-muted"><i class="fa-solid fa-link"></i> {{$category->url}}</p>
            <h1 class="text-custom-4"><i class="fa-solid fa-down-long"></i></h1>
            @endif
            @endforeach
            <h1 class="mt-4 text-black">{{$subcategory->plural}}</h1>
            <p class="text-muted"><i class="fa-solid fa-link"></i> {{$subcategory->url}}</p>
            <div class="mt-4 d-flex flex-row justify-content-center align-items-center">
                <a href="{{url ('/admin/subcategories/edit/'.$subcategory->id)}}" class="bg-custom-1 p-4 rounded text-white fs-1 me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="{{url ('/admin/subcategories/delete/'.$subcategory->id)}}" class="bg-custom-2 p-4 rounded text-white fs-1" onclick="return confirm('Czy na pewno chcesz usunąć tę kategorię?');"><i class="fa-solid fa-trash"></i></a>
            </div>
        </div>
    </div>
    <!--END DEFAULT-->
    @endif
    @endforeach
</div>
<!--END CATEGORIES-->
@endsection