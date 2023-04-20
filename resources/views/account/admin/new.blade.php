@extends('layouts.admin')
@section('main')
<!--NEW-->
@if ($edit == 0)
<form class="form text-center my-4" id="form" action="{{route('products_new_form')}}" method="POST" enctype="multipart/form-data">
    <p class="text-muted">Utwórz nowy produkt</p>
    @else
    <form class="form text-center my-4" id="form" action="{{url ('/admin/products/edit/'.$product->id)}}" method="POST" enctype="multipart/form-data">
        <p class="text-muted">Edytuj produkt</p>
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
            <input type="text" class="form-control" id="order" value="@if($edit != 0){{$product->order}}@else {{0}} @endif" name="order">
            <label for="order">Kolejność</label>
            <span class="text-danger">@error('order') {{$message}} @enderror</span>
        </div>

        @if ($edit == 0)
        <div class="form-floating my-3 w-100">
            <input type="file" class="form-control" id="photo" name="photo" accept="image/png, image/jpeg, image/jpg">
            <label for="photo">Zdjęcie główne</label>
            <span class="text-danger">@error('photo') {{$message}} @enderror</span>
        </div>
        <script>
            var count_photo = 2;
        </script>
        @else
        <div class="form-floating my-3 w-100">
            <input type="file" class="form-control" id="photo" name="photo" accept="image/png, image/jpeg, image/jpg">
            <label for="photo">Zdjęcie główne</label>
            <span class="text-danger">@error('photo') {{$message}} @enderror</span>
        </div>
        <script>
            var count_photo = 2;
        </script>
        @endif

        <div class="photos">

        </div>

        <button class="btn btn-lg btn-custom-1 shadow my-3 add-photo" type="button"><i class="fa-solid fa-plus"></i> Dodaj nowe zdjęcie</button>

        @if ($edit == 0)
        <div class="input-group my-3 w-100">
            <label class="input-group-text" for="size_1">Rozmiar_1</label>
            <select class="form-select" name="size_1">
                <option value="Wybierz">Wybierz</option>
                @foreach ($sizes as $size)
                <option value="{{$size->value}}">{{$size->value}}</option>
                @endforeach
            </select>
            <span class="text-danger">@error('size_1') {{$message}} @enderror</span>
        </div>
        <script>
            var count = 2;
        </script>
        @else
        @if (count($brokers) == 0)
        <div class="input-group my-3 w-100">
            <label class="input-group-text" for="size_1">Rozmiar_1</label>
            <select class="form-select" name="size_1">
                <option value="Wybierz">Wybierz</option>
                @foreach ($sizes as $size)
                <option value="{{$size->value}}">{{$size->value}}</option>
                @endforeach
            </select>
            <span class="text-danger">@error('size_1') {{$message}} @enderror</span>
        </div>
        <script>
            var count = 2;
        </script>
        @else
        @foreach($brokers as $key => $broker)
        <div class="input-group my-3 w-100">
            <label class="input-group-text" for="size_{{$key+1}}">Rozmiar_{{$key+1}}</label>
            <select class="form-select" name="size_{{$key+1}}">
                @foreach ($sizes as $size)
                @if ($broker->size_id == $size->id)
                <option value="{{$size->value}}">{{$size->value}}</option>
                @endif
                @endforeach
                <option value="Wybierz">Wybierz</option>
                @foreach ($sizes as $size)
                <option value="{{$size->value}}">{{$size->value}}</option>
                @endforeach
            </select>
            <span class="text-danger">@error('size_{{$key}}') {{$message}} @enderror</span>
        </div>
        @endforeach
        <script>
            var count = {!! json_encode(count($brokers)+1) !!};
        </script>
        @endif
        @endif

        <div class="sizes">

        </div>

        <button class="btn btn-lg btn-custom-2 shadow my-3 add-size" type="button"><i class="fa-solid fa-plus"></i> Dodaj nowy rozmiar</button>

        <div class="d-flex justify-content-start align-items-center mt-4">
            <button class="btn btn-custom-1 me-2" type="submit"><i class="fa-solid fa-floppy-disk"></i> Zapisz</button>
            <a href="{{route('products')}}" class="btn btn-custom-2"><i class="fa-solid fa-xmark"></i> Anuluj</a>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--END NEW-->
    <script>
        $('.add-size').click(function() {
            $('.sizes').append(`
            <div class="input-group my-3 w-100">
            <label class="input-group-text" for="size_${count}">Rozmiar_${count}</label>
            <select class="form-select" name="size_${count}">
                <option value="Wybierz">Wybierz</option>
                @foreach ($sizes as $size)
                <option value="{{$size->value}}">{{$size->value}}</option>
                @endforeach
            </select>
            <span class="text-danger">@error('size_${count}') {{$message}} @enderror</span>
            </div>`)
            count++;
        })
        $('.add-photo').click(function() {
            $('.photos').append(`
            <div class="form-floating my-3 w-100">
                <input type="file" class="form-control" id="photo" name="photo_${count_photo}" accept="image/png, image/jpeg, image/jpg">
                <label for="photo_${count_photo}">Zdjęcie ${count_photo}</label>
                <span class="text-danger">@error('photo_${count_photo}') {{$message}} @enderror</span>
            </div>`)
            count_photo++;
        })
        $('#form').on('submit', function() {
            $('#form').append(`
            <input type="hidden" name="count" value="${count-1}">
            <input type="hidden" name="count_photo" value="${count_photo-1}">`)
            return true;
        });
    </script>
    @endsection