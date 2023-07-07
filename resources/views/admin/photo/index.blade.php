@extends('layout.dashboard')
@section('main')
<div class="row mb-3">
    <div class="col-12">
        <div class="d-flex flex-row justify-content-start align-items-center">
            <h1 class="my-4 font-display me-2">Zdjęcia</h1>
            <a href="{{ route('admin.photo.create')}}"><span class="badge rounded-pill bg-primary"><i class="fa-solid fa-plus me-2"></i>Dodaj</span></a>
        </div>
    </div>
    <hr>
    @foreach(File::files(public_path('photos')) as $file)
    <div class="col-12 col-md-4 col-xl-2 p-2">
        <div class="d-flex flex-column justify-content-between align-items-center h-100 border">
            <div class="d-flex flex-column justify-content-center align-items-center h-75 overflow-hidden">
                <img alt="" src="{{ asset('photos/' . basename($file)) }}" class="img-fluid p-2" onerror="this.onerror=null; this.src=`{{ asset('svg/photos.svg') }}`;">
            </div>
            <div class="d-flex flex-row justify-content-start align-items-center h-25">
                <a href="{{ route('admin.photo.edit', ['filename' => basename($file)]) }}" class="btn btn-primary my-2 me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="{{ route('admin.photo.delete', ['filename' => basename($file)]) }}" class="btn btn-danger my-2" onclick="return confirm('Czy na pewno chcesz usunąć to zdjęcie?');"><i class="fa-solid fa-trash"></i></a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection