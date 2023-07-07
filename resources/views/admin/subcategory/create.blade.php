@extends('layout.dashboard')
@section('main')
<div class="row mb-3">
    <div class="col-12">
        <div class="d-flex flex-row justify-content-start align-items-center">
            <h1 class="my-4 font-display me-2">Kategorie</h1>
            <span class="badge rounded-pill bg-primary">Wybrano: Tworzenie nowej podkategorii</span>
        </div>
    </div>
    <hr>
    <div class="mb-3"><a href="{{route('admin.category')}}"><span class="badge rounded-pill bg-primary"><i class="fa-solid fa-chevron-left me-2"></i>Powrót</span></a></div>
    <div class="col-12">
        <form method="POST" action="{{route('admin.subcategory.store')}}">
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
                    @foreach ($cat as $c)
                    <option value="{{$c->id}}">{{$c->plural}}</option>
                    @endforeach
                </select>
                <span class="text-danger">@error('category_id') {{$message}} @enderror</span>
            </div>

            <div class="form-floating my-3 w-100">
                <input type="text" class="form-control" id="order" value="0" name="order" required>
                <label for="order">Kolejność</label>
                <span class="text-danger">@error('order') {{$message}} @enderror</span>
            </div>

            <div class="d-flex justify-content-start align-items-center mt-4">
                <button type="submit" class="btn btn-lg btn-primary me-2"><i class="fa-solid fa-floppy-disk me-2"></i>Zapisz</button>
                <a href="{{route('admin.category')}}" class="btn btn-lg btn-secondary"><i class="fa-solid fa-x me-2"></i>Anuluj</a>
            </div>
        </form>
    </div>
</div>
@endsection