@extends('layouts.admin')
@section('main')
<!--NEW-->
@if ($edit == 0)
<form class="form text-center my-4" action="{{route('products_new_form')}}" method="POST" enctype="multipart/form-data">
    @else
    <form class="form text-center my-4" action="{{url ('/admin/products/edit/'.$product->id)}}" method="POST" enctype="multipart/form-data">
        @endif
        <!--TOKEN-->
        @csrf
        <div class="form-floating my-3">
            <input type="text" class="form-control" id="name" value="@if($edit != 0){{$product->name}}@endif" name="name" required>
            <label for="name">Nazwa</label>
            <span class="text-danger">@error('name') {{$message}} @enderror</span>
        </div>

        <div class="form-floating my-3">
            <input type="text" class="form-control" id="short_description" value="@if($edit != 0){{$product->short_description}}@endif" name="short_description">
            <label for="short_description">Krótki opis</label>
            <span class="text-danger">@error('short_description') {{$message}} @enderror</span>
        </div>

        <div class="form-floating my-3">
            <input type="text" class="form-control" id="long_description" value="@if($edit != 0){{$product->long_description}}@endif" name="long_description">
            <label for="long_description">Długi opis</label>
            <span class="text-danger">@error('long_description') {{$message}} @enderror</span>
        </div>

        <div class="form-check my-3 d-flex flex-row justify-content-start align-items-center">
            @if($edit != 0)
            @if($product->new == 1)
            <input class="form-check-input" type="checkbox" value="1" id="new" name="new" checked>
            @else
            <input class="form-check-input" type="checkbox" value="1" id="new" name="new">
            @endif
            @else
            <input class="form-check-input" type="checkbox" value="1" id="new" name="new" checked>
            @endif
            <label class="form-check-label ps-2" for="new">
                Nowość
            </label>
        </div>

        <div class="form-floating my-3">
            <input type="text" class="form-control" id="normal_price" value="@if($edit != 0){{$product->normal_price}}@endif" name="normal_price" required>
            <label for="normal_price">Cena regularna</label>
            <span class="text-danger">@error('normal_price') {{$message}} @enderror</span>
        </div>

        <div class="form-floating my-3">
            <input type="text" class="form-control" id="sale_price" value="@if($edit != 0){{$product->sale_price}}@endif" name="sale_price">
            <label for="sale_price">Cena promocyjna</label>
            <span class="text-danger">@error('sale_price') {{$message}} @enderror</span>
        </div>

        <div class="form-floating my-3">
            <input type="text" class="form-control" id="SKU" value="@if($edit != 0){{$product->SKU}}@endif" name="SKU" required>
            <label for="SKU">SKU</label>
            <span class="text-danger">@error('SKU') {{$message}} @enderror</span>
        </div>

        <div class="input-group my-3 w-100">
            <label class="input-group-text" for="category_id">Kategoria</label>
            <select class="form-select" id="category_id" name="category_id">
                @if($edit != 0)
                @if($product->category_id != null)
                @foreach ($categories as $category)
                @if ($category->id == $product->category_id)
                <option selected value="{{$product->category_id}}">{{$category->plural}}</option>
                @endif
                @endforeach
                <option value="Wybierz">Wybierz</option>
                @else
                <option selected>Wybierz</option>
                @endif
                @else
                <option selected>Wybierz</option>
                @endif
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->plural}}</option>
                @endforeach
            </select>
            <span class="text-danger">@error('category_id') {{$message}} @enderror</span>
        </div>

        <div class="input-group my-3 w-100">
            <label class="input-group-text" for="subcategory_id">Podkategoria</label>
            <select class="form-select" id="subcategory_id" name="subcategory_id">
                @if($edit != 0)
                @if($product->subcategory_id != null)
                @foreach ($subcategories as $subcategory)
                @if ($subcategory->id == $product->subcategory_id)
                @foreach ($categories as $category)
                @if($subcategory->category_id == $category->id)
                <option selected value="{{$product->subcategory_id}}">{{$category->name}} > {{$subcategory->plural}}</option>
                @endif
                @endforeach
                @endif
                @endforeach
                <option value="Wybierz">Wybierz</option>
                @else
                <option selected>Wybierz</option>
                @endif
                @else
                <option selected>Wybierz</option>
                @endif
                @foreach ($subcategories as $subcategory)
                @foreach ($categories as $category)
                @if($subcategory->category_id == $category->id)
                <option value="{{$subcategory->id}}">{{$category->name}} > {{$subcategory->plural}}</option>
                @endif
                @endforeach
                @endforeach
            </select>
            <span class="text-danger">@error('subcategory_id') {{$message}} @enderror</span>
        </div>

        <div class="form-floating my-3 w-100">
            <input type="file" class="form-control" id="photo" name="photo" accept="image/png, image/jpeg, image/jpg">
            <label for="photo">Zdjęcie główne</label>
            <span class="text-danger">@error('photo') {{$message}} @enderror</span>
        </div>


        <div class="d-flex justify-content-start align-items-center mt-4">
            <button class="btn btn-custom-1 me-2" type="submit"><i class="fa-solid fa-floppy-disk"></i> Zapisz</button>
            <a href="{{route('products')}}" class="btn btn-custom-2"><i class="fa-solid fa-xmark"></i> Anuluj</a>
        </div>
    </form>

    <!--END NEW-->
    @endsection