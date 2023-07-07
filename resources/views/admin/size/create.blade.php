@extends('layout.dashboard')
@section('main')
<div class="row mb-3">
    <div class="col-12">
        <div class="d-flex flex-row justify-content-start align-items-center">
            <h1 class="my-4 font-display me-2">Rozmiary</h1>
            <span class="badge rounded-pill bg-primary">Wybrano: Tworzenie nowego rozmiaru</span>
        </div>
    </div>
    <hr>
    <div class="mb-3"><a href="{{route('admin.size')}}"><span class="badge rounded-pill bg-primary"><i class="fa-solid fa-chevron-left me-2"></i>Powrót</span></a></div>
    <div class="col-12">
        <form method="POST" action="{{route('admin.size.store')}}">
            <!--TOKEN-->
            @csrf
            <div class="form-floating my-3 w-100">
                <input type="text" class="form-control" id="value" value="" name="value" required>
                <label for="value">Wartość</label>
                <span class="text-danger">@error('value') {{$message}} @enderror</span>
            </div>
            
            <div class="d-flex justify-content-start align-items-center mt-4">
                <button type="submit" class="btn btn-lg btn-primary me-2"><i class="fa-solid fa-floppy-disk me-2"></i>Zapisz</button>
                <a href="{{route('admin.size')}}" class="btn btn-lg btn-secondary"><i class="fa-solid fa-x me-2"></i>Anuluj</a>
            </div>
        </form>
    </div>
</div>
@endsection