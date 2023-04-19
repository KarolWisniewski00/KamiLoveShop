@extends('layouts.admin')
@section('main')
<!--CATEGORIES-->
<h1>Rozmiary <span class="bg-custom-1 rounded-pill badge">{{count($sizes)}}</span></h1>
<hr>
<div class="row">
    <div class="col-12 col-md-6 col-lg-3 mb-4">
        @if ($new == 0)
        <!--DEFAULT-->
        <a href="{{ route('sizes_new')}}" class="border p-4 shadow d-flex flex-column justify-content-center align-items-center rounded h-100">
            <div class="bg-custom-1 p-4 rounded text-white fs-1"><i class="fa-solid fa-plus"></i></div>
        </a>
        <!--END DEFAULT-->
        @else
        <!--NEW-->
        <form class="border p-4 shadow d-flex flex-column justify-content-center align-items-center rounded h-100 form text-center p-4" method="POST" action="{{route('sizes_new_form')}}" enctype="multipart/form-data">
            <p class="text-muted">Utwórz nowy rozmiar</p>
            <!--TOKEN-->
            @csrf
            <div class="form-floating my-3 w-100">
                <input type="text" class="form-control" id="value" value="" name="value" required>
                <label for="value">Wartość</label>
                <span class="text-danger">@error('value') {{$message}} @enderror</span>
            </div>

            <div class="d-flex justify-content-start align-items-center mt-4">
                <button class="btn btn-custom-1 me-2" type="submit"><i class="fa-solid fa-floppy-disk"></i> Zapisz</button>
                <a href="{{route('sizes')}}" class="btn btn-custom-2"><i class="fa-solid fa-xmark"></i> Anuluj</a>
            </div>
        </form>
        <!--END NEW-->
        @endif
    </div>
    @foreach ($sizes as $size)
    @if ($size->id == $id)
    <!--EDIT-->
    <div class="col-12 col-md-6 col-lg-3 mb-4">
        <form class="border p-4 shadow d-flex flex-column justify-content-center align-items-center rounded h-100 form text-center p-4" method="POST" action="{{url ('/admin/sizes/edit/'.$size->id)}}" enctype="multipart/form-data">
            <p class="text-muted">Edytuj rozmiar</p>
            <!--TOKEN-->
            @csrf
            <div class="form-floating my-3 w-100">
                <input type="text" class="form-control" id="value" value="{{$size->value}}" name="value" required>
                <label for="value">Wartość</label>
                <span class="text-danger">@error('value') {{$message}} @enderror</span>
            </div>

            <div class="d-flex justify-content-start align-items-center mt-4">
                <button class="btn btn-custom-1 me-2" type="submit"><i class="fa-solid fa-floppy-disk"></i> Zapisz</button>
                <a href="{{route('sizes')}}" class="btn btn-custom-2"><i class="fa-solid fa-xmark"></i> Anuluj</a>
            </div>
        </form>
    </div>
    <!--END EDIT-->
    @else
    <!--DEFAULT-->
    <div class="col-12 col-md-6 col-lg-3 mb-4">
        <div class="border p-4 shadow d-flex flex-column justify-content-center align-items-center rounded h-100">
            <h1 class="mt-4 text-black">{{$size->value}}</h1>
            <div class="mt-4 d-flex flex-row justify-content-center align-items-center">
                <a href="{{url ('/admin/sizes/edit/'.$size->id)}}" class="bg-custom-1 p-4 rounded text-white fs-1 me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="{{url ('/admin/sizes/delete/'.$size->id)}}" class="bg-custom-2 p-4 rounded text-white fs-1" onclick="return confirm('Czy na pewno chcesz usunąć ten rozmiar?');"><i class="fa-solid fa-trash"></i></a>
            </div>
        </div>
    </div>
    <!--END DEFAULT-->
    @endif
    @endforeach
    
</div>
<!--END CATEGORIES-->
@endsection