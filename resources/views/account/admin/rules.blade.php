@extends('layouts.admin')
@section('main')
<!--RULES-->
<h1>Regulamin <span class="bg-custom-1 rounded-pill badge">{{count($rules)}}</span></h1>
<hr>
<div class="row">
    <div class="col">
        @if ($new == 0)
        <!--DEFAULT-->
        <a href="{{ route('rules_admin_new')}}" class="border p-4 shadow d-flex flex-column justify-content-center align-items-center rounded h-100">
            <div class="bg-custom-1 p-4 rounded text-white fs-1"><i class="fa-solid fa-plus"></i></div>
        </a>
        <!--END DEFAULT-->
        @else
        <!--NEW-->
        <form class="border p-4 shadow d-flex flex-column justify-content-center align-items-center rounded h-100 form text-center p-4" method="POST" action="{{route('rules_admin_new_form')}}">
            <p class="text-muted">Utwórz nową zasadę</p>
            <!--TOKEN-->
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
                <input type="text" class="form-control" id="content" value="" name="content" required>
                <label for="content">Zawartość</label>
                <span class="text-danger">@error('content') {{$message}} @enderror</span>
            </div>

            <div class="form-floating my-3 w-100">
                <input type="text" class="form-control" id="order" value="0" name="order">
                <label for="order">Kolejność</label>
                <span class="text-danger">@error('order') {{$message}} @enderror</span>
            </div>

            <div class="d-flex justify-content-start align-items-center mt-4">
                <button class="btn btn-custom-1 me-2" type="submit"><i class="fa-solid fa-floppy-disk"></i> Zapisz</button>
                <a href="{{route('rules_admin')}}" class="btn btn-custom-2"><i class="fa-solid fa-xmark"></i> Anuluj</a>
            </div>
        </form>
        <!--END NEW-->
        @endif
    </div>
    @foreach($rules as $rule)
    @if ($rule->id == $id)
    <!--EDIT-->
    <div class="col-12">
        <form class="border p-4 shadow d-flex flex-column justify-content-center align-items-center rounded h-100 form text-center p-4" method="POST" action="{{url ('/admin/rules/edit/'.$rule->id)}}">
            <p class="text-muted">Edytuj zasadę</p>
            <!--TOKEN-->
            @csrf
            <div class="input-group my-3 w-100">
                <label class="input-group-text" for="type">Typ</label>
                <select class="form-select" id="type" name="type" required>
                    @if ($rule->type == 1)
                    <option selected value="1">Nagłówek</option>
                    @else
                    <option selected value="0">Paragraf</option>
                    @endif
                    <option value="1">Nagłówek</option>
                    <option value="0">Paragraf</option>
                </select>
                <span class="text-danger">@error('type') {{$message}} @enderror</span>
            </div>

            <div class="form-floating my-3 w-100">
                <input type="text" class="form-control" id="content" value="{{$rule->content}}" name="content" required>
                <label for="content">Zawartość</label>
                <span class="text-danger">@error('content') {{$message}} @enderror</span>
            </div>

            <div class="form-floating my-3 w-100">
                <input type="text" class="form-control" id="order" value="{{$rule->order}}" name="order">
                <label for="order">Kolejność</label>
                <span class="text-danger">@error('order') {{$message}} @enderror</span>
            </div>

            <div class="d-flex justify-content-start align-items-center mt-4">
                <button class="btn btn-custom-1 me-2" type="submit"><i class="fa-solid fa-floppy-disk"></i> Zapisz</button>
                <a href="{{route('rules_admin')}}" class="btn btn-custom-2"><i class="fa-solid fa-xmark"></i> Anuluj</a>
            </div>
        </form>
    </div>
    <!--END EDIT-->
    @else
    <!--DEFAULT-->
    <div class="col-12 mb-4">
        <div class="border p-4 shadow d-flex flex-column justify-content-center align-items-center rounded h-100">
            @if ($rule->type == true)
            <div class="d-flex justify-content-start align-items-center text-start my-4">
                <h1>{{$rule->content}}</h1>
            </div>
            @else
            <div class="d-flex justify-content-start align-items-center text-start my-4">
                <p class="text-muted">{{$rule->content}}</p>
            </div>
            @endif
            <div class="mt-4 d-flex flex-row justify-content-center align-items-center">
                <a href="{{url ('/admin/rules/edit/'.$rule->id)}}" class="bg-custom-1 p-4 rounded text-white fs-1 me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="{{url ('/admin/rules/delete/'.$rule->id)}}" class="bg-custom-2 p-4 rounded text-white fs-1" onclick="return confirm('Czy na pewno chcesz usunąć tą sekcję?');"><i class="fa-solid fa-trash"></i></a>
            </div>
        </div>
    </div>
    <!--END DEFAULT-->
    @endif
    @endforeach
</div>
<!--END RULES-->
@endsection