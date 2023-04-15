@extends('layouts.admin')
@section('main')
<!--PRODUCTS-->
<h1>Produkty <span class="bg-custom-1 rounded-pill badge">{{count($products)}}</span></h1>
<a href="{{route('products_new')}}" class="btn btn-lg btn-custom-1 shadow my-3"><i class="fa-solid fa-plus"></i> Dodaj nowy</a>
<hr>
<div class="row">
    <div class="col-12 mb-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">#</div>
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">Zdjęcie</div>
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">Nazwa</div>
                            <div class="text-muted">opis</div>
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">Kategoria</div>
                            <div class="text-muted">podkategoria</div>
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">SKU</div>
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">Nowość</div>
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">Cena regularna</div>
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">Cena promocyjna</div>
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">Edytuj</div>
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">Usuń</div>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $product)
                <tr>
                    <th>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">{{$key}}</div>
                        </div>
                    </th>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div style="max-width:50px"><img alt="product_photo" src="{{ asset('photos/'.$product->photo)}}" class="img-fluid"></div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">{{$product->name}}</div>
                            <div class="text-muted">{{$product->short_description}}</div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            @foreach ($categories as $category)
                            @if($category->id == $product->category_id)
                            <div class="fw-bold">{{$category->name}}</div>
                            @endif
                            @endforeach
                            @foreach ($subcategories as $subcategory)
                            @if($subcategory->id == $product->subcategory_id)
                            <div class="text-muted">{{$subcategory->name}}</div>
                            @endif
                            @endforeach
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">{{$product->SKU}}</div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            @if($product->new != 0)
                            <div class="fw-bold">Tak</div>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">{{$product->normal_price}}</div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            @if($product->sale_price !=0)
                            <div class="fw-bold">{{$product->sale_price}}</div>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div><a href="{{url ('/admin/products/edit/'.$product->id)}}" class="btn btn-custom-1 rounded text-white fs-1"><i class="fa-solid fa-pen-to-square"></i></a></div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div><a href="{{url ('/admin/products/delete/'.$product->id)}}" class="btn btn-custom-2 rounded text-white fs-1" onclick="return confirm('Czy na pewno chcesz usunąć ten produkt?');"><i class="fa-solid fa-trash"></i></a></div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!--END PRODUCTS-->
@endsection