@extends('layout.dashboard')
@section('main')
<div class="row mb-3">
    <div class="col-12">
        <div class="d-flex flex-row justify-content-start align-items-center">
            <h1 class="my-4 font-display me-2">Kategorie</h1>
            <a href="{{route('admin.category.create')}}"><span class="badge rounded-pill bg-primary"><i class="fa-solid fa-plus me-2"></i>Dodaj</span></a>
        </div>
    </div>
    <hr>
    @foreach($cat as $c)
    <div class="col-12 col-md-6 col-lg-3 mb-4">
        <div class="border p-4 d-flex flex-column justify-content-center align-items-center rounded h-100">
            <img alt="category_photo" src="{{ asset('photos/'.$c->photo)}}" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('svg/photos.svg') }}`;">
            <h1 class="mt-4 text-black">{{$c->plural}}</h1>
            <p class="text-muted"><i class="fa-solid fa-link"></i>{{$c->url}}</p>
            <div class="mt-4 d-flex flex-row justify-content-center align-items-center">
                <a href="{{route('admin.category.edit', $c->id)}}" class="btn btn-primary btn-lg me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="{{route('admin.category.delete', $c->id)}}" class="btn btn-danger btn-lg" onclick="return confirm('Czy na pewno chcesz usunąć tę kategorię?');"><i class="fa-solid fa-trash"></i></a>
            </div>
        </div>
    </div>
    @endforeach
    <div class="col-12">
        <div class="d-flex flex-row justify-content-start align-items-center">
            <h1 class="my-4 font-display me-2">Podkategorie</h1>
            <a href="{{route('admin.subcategory.create')}}"><span class="badge rounded-pill bg-primary"><i class="fa-solid fa-plus me-2"></i>Dodaj</span></a>
        </div>
    </div>
    <hr>
    @foreach($subcat as $sc)
    <div class="col-12 col-md-6 col-lg-3 mb-4">
        <div class="border p-4 d-flex flex-column justify-content-center align-items-center rounded h-100">
            <img alt="category_photo" src="{{ asset('photos/'.$sc->category->photo)}}" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('svg/photos.svg') }}`;">
            <h1 class="mt-4 text-black">{{$sc->category->plural}}</h1>
            <p class="text-muted"><i class="fa-solid fa-link"></i>{{$sc->category->url}}</p>
            <h1 class="text-custom-4"><i class="fa-solid fa-down-long"></i></h1>
            <h1 class="mt-4 text-black">{{$sc->plural}}</h1>
            <p class="text-muted"><i class="fa-solid fa-link"></i>{{$sc->url}}</p>
            <div class="mt-4 d-flex flex-row justify-content-center align-items-center">
                <a href="{{route('admin.subcategory.edit', $sc->id)}}" class="btn btn-primary btn-lg me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="{{route('admin.subcategory.delete', $sc->id)}}" class="btn btn-danger btn-lg" onclick="return confirm('Czy na pewno chcesz usunąć tę podkategorię?');"><i class="fa-solid fa-trash"></i></a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection