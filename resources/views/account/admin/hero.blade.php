@extends('layouts.admin')
@section('main')
<!--HERO-->
<h1>Hero</h1>
<hr>
<div class="row">
    <div class="col-12 col-md-6 col-lg-3 mb-4">
        @if ($new == 0)
        <!--DEFAULT-->
        <a href="{{ route('hero_new')}}" class="border p-4 shadow d-flex flex-column justify-content-center align-items-center rounded h-100">
            <div class="bg-custom-1 p-4 rounded text-white fs-1"><i class="fa-solid fa-plus"></i></div>
        </a>
        <!--END DEFAULT-->
        @else
        <!--NEW-->
        <form class="border p-4 shadow d-flex flex-column justify-content-center align-items-center rounded h-100 form text-center p-4" method="POST" action="{{route('hero_new_form')}}" enctype="multipart/form-data">
            <p class="text-muted">Utwórz nowe hero</p>
            <!--TOKEN-->
            @csrf
            <div class="form-floating my-3 w-100">
                <input type="text" class="form-control" id="h1" value="" name="h1" required>
                <label for="h1">Tytuł</label>
                <span class="text-danger">@error('h1') {{$message}} @enderror</span>
            </div>

            <div class="form-floating my-3 w-100">
                <input type="text" class="form-control" id="p" value="" name="p" required>
                <label for="p">paragraf</label>
                <span class="text-danger">@error('p') {{$message}} @enderror</span>
            </div>

            <div class="form-floating my-3 w-100">
                <input type="text" class="form-control" id="button" value="" name="button" required>
                <label for="button">Przycisk</label>
                <span class="text-danger">@error('button') {{$message}} @enderror</span>
            </div>

            <div class="input-group my-3 w-100">
                <label class="input-group-text" for="href">Łącze</label>
                <select class="form-select" id="href" name="href" required>
                    <option selected>Wybierz</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->url}}">{{$category->plural}}</option>
                    @endforeach
                </select>
                <span class="text-danger">@error('href') {{$message}} @enderror</span>
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
    @foreach($heros as $hero)
    @if ($hero->id == $id)
    <!--EDIT-->
    <div class="col-12 col-md-6 col-lg-3 mb-4">
        <form class="border p-4 shadow d-flex flex-column justify-content-center align-items-center rounded h-100 form text-center p-4" method="POST" action="{{url ('/admin/hero/edit/'.$hero->id)}}" enctype="multipart/form-data">
            <p class="text-muted">Edytuj hero</p>
            <!--TOKEN-->
            @csrf
            <div class="form-floating my-3 w-100">
                <input type="text" class="form-control" id="h1" value="{{$hero->h1}}" name="h1" required>
                <label for="h1">Tytuł</label>
                <span class="text-danger">@error('h1') {{$message}} @enderror</span>
            </div>

            <div class="form-floating my-3 w-100">
                <input type="text" class="form-control" id="p" value="{{$hero->p}}" name="p" required>
                <label for="p">paragraf</label>
                <span class="text-danger">@error('p') {{$message}} @enderror</span>
            </div>

            <div class="form-floating my-3 w-100">
                <input type="text" class="form-control" id="button" value="{{$hero->button}}" name="button" required>
                <label for="button">Przycisk</label>
                <span class="text-danger">@error('button') {{$message}} @enderror</span>
            </div>

            <div class="input-group my-3 w-100">
                <label class="input-group-text" for="href">Łącze</label>
                <select class="form-select" id="href" name="href" required>
                    <option selected>{{$hero->href}}</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->url}}">{{$category->plural}}</option>
                    @endforeach
                </select>
                <span class="text-danger">@error('href') {{$message}} @enderror</span>
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
            <img alt="product_photo" src="{{ asset('photos/'.$hero->photo)}}" class="img-fluid">
            <h1 class="mt-4 text-black">{{$hero->h1}}</h1>
            <p class="text-muted">{{$hero->p}}</p>
            <p><a class="btn btn-lg btn-custom-1" href="#">{{$hero->button}}</a></p>
            <p class="text-muted"><i class="fa-solid fa-link"></i> {{$hero->href}}</p>
            <div class="mt-4 d-flex flex-row justify-content-center align-items-center">
                <a href="{{url ('/admin/hero/edit/'.$hero->id)}}" class="bg-custom-1 p-4 rounded text-white fs-1 me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="{{url ('/admin/hero/delete/'.$hero->id)}}" class="bg-custom-2 p-4 rounded text-white fs-1" onclick="return confirm('Czy na pewno chcesz usunąć tą sekcję?');"><i class="fa-solid fa-trash"></i></a>
            </div>
        </div>
    </div>
    <!--END DEFAULT-->
    @endif
    @endforeach
</div>
<!--END HERO-->
@endsection