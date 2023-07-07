@extends('layout.dashboard')
@section('main')
<div class="row mb-3">
    <div class="col-12">
        <div class="d-flex flex-row justify-content-start align-items-center">
            <h1 class="my-4 font-display me-2">Produkty</h1>
            <a href="{{route('admin.product.create')}}"><span class="badge rounded-pill bg-primary"><i class="fa-solid fa-plus me-2"></i>Dodaj</span></a>
        </div>
    </div>
    <hr>
    <div class="col-12 mb-4" style="overflow:auto;">
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
                <tr>
                    <th>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">$key</div>
                        </div>
                    </th>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div style="max-width:50px"><img alt="product_photo" src="" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('svg/photos.svg') }}`;"></div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">name</div>
                            <div class="text-muted">short_description</div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="text-muted">subcategory->name</div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">SKU</div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">Tak</div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">normal_price</div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">sale_price</div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div><a href="" class="btn btn-primary btn-lg me-2"><i class="fa-solid fa-pen-to-square"></i></a></div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div><a href="" class="btn btn-secondary btn-lg" onclick="return confirm('Czy na pewno chcesz usunąć ten produkt?');"><i class="fa-solid fa-trash"></i></a></div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection