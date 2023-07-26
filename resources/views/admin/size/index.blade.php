@extends('layout.dashboard')
@section('main')
<div class="row mb-3">
    <div class="col-12">
        <div class="d-flex flex-row justify-content-start align-items-center">
            <h1 class="my-4 font-display me-2">Rozmiary</h1>
            <a href="{{route('admin.size.create')}}"><span class="badge rounded-pill bg-primary"><i class="fa-solid fa-plus me-2"></i>Dodaj</span></a>
        </div>
    </div>
    <hr>
    @foreach($siz as $s)
    <div class="col-12 col-md-6 col-lg-3 mb-4">
        <div class="border p-4 d-flex flex-column justify-content-center align-items-center rounded h-100">
            <h1 class="mt-4 text-black">{{$s->value}}</h1>
            <div class="mt-4 d-flex flex-row justify-content-center align-items-center">
                <a href="{{route('admin.size.edit', $s->id)}}" class="btn btn-primary btn-lg me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="{{route('admin.size.delete', $s->id)}}" class="btn btn-danger btn-lg" onclick="return confirm('Czy na pewno chcesz usunąć ten rozmiar?');"><i class="fa-solid fa-trash"></i></a>
            </div>
        </div>
    </div>
    @endforeach
    {{ $siz->links('client.saco.module.pagination') }}
</div>
@endsection