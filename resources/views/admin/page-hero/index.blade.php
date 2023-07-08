@extends('layout.dashboard')
@section('main')
<div class="row mb-3">
    <div class="col-12">
        <div class="d-flex flex-row justify-content-start align-items-center">
            <h1 class="my-4 font-display me-2">Hero</h1>
            <a href="{{route('admin.page-hero.create')}}"><span class="badge rounded-pill bg-primary"><i class="fa-solid fa-plus me-2"></i>Dodaj</span></a>
        </div>
    </div>
    <hr>
    @foreach($her as $h)
    <div class="col-12 col-md-6 col-lg-3 mb-4">
        <div class="border p-4 d-flex flex-column justify-content-center align-items-center rounded h-100">
            <img alt="product_photo" src="{{asset('photos/'.$h->photo)}}" class="img-fluid">
            <h1 class="mt-4 text-black">{{$h->h1}}</h1>
            <p class="text-muted">{{$h->p}}</p>
            <p><a class="btn btn-primary btn-lg" href="#">{{$h->button}}</a></p>
            <p class="text-muted"><i class="fa-solid fa-link"></i>{{$h->href}}</p>
            <div class="mt-4 d-flex flex-row justify-content-center align-items-center">
                <a href="{{route('admin.page-hero.edit', $h->id)}}" class="btn btn-primary btn-lg me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="{{route('admin.page-hero.delete', $h->id)}}" class="btn btn-danger btn-lg" onclick="return confirm('Czy na pewno chcesz usunąć to hero?');"><i class="fa-solid fa-trash"></i></a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection