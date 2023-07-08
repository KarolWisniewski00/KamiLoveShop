@extends('layout.dashboard')
@section('main')
<div class="row mb-3">
    <div class="col-12">
        <div class="d-flex flex-row justify-content-start align-items-center">
            <h1 class="my-4 font-display me-2">Regulamin</h1>
            <span class="badge rounded-pill bg-primary">Wybrano: Tworzenie nowej sekcji</span>
        </div>
    </div>
    <hr>
    <div class="mb-3"><a href="{{route('admin.page-rule')}}"><span class="badge rounded-pill bg-primary"><i class="fa-solid fa-chevron-left me-2"></i>Powrót</span></a></div>
    <div class="col-12">
        <form method="POST" action="{{route('admin.page-rule.store')}}">
            @csrf
            <div class="input-group my-3 w-100">
                <label class="input-group-text" for="type">Typ</label>
                <select class="form-select" id="type" name="type" required>
                    <option selected>Wybierz</option>
                    <option value="1">Nagłówek</option>
                    <option value="0">Paragraf</option>
                </select>
                <span class="text-danger">@error('type') {{$message}} @enderror</span>
            </div>

            <div class="form-floating my-3 w-100">
                <input type="text" class="form-control" id="content" value="{{ old('content') }}" name="content" required>
                <label for="content">Zawartość</label>
                <span class="text-danger">@error('content') {{$message}} @enderror</span>
            </div>

            <div class="form-floating my-3 w-100">
                <input type="text" class="form-control" id="order" value="0" name="order">
                <label for="order">Kolejność</label>
                <span class="text-danger">@error('order') {{$message}} @enderror</span>
            </div>

            <div class="d-flex justify-content-start align-items-center mt-4">
                <button class="btn btn-primary btn-lg me-2" type="submit"><i class="fa-solid fa-floppy-disk"></i> Zapisz</button>
                <a href="{{route('admin.page-rule')}}" class="btn btn-danger btn-lg"><i class="fa-solid fa-xmark"></i> Anuluj</a>
            </div>
        </form>
    </div>
</div>
@endsection