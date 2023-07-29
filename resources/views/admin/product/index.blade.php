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
                            <div class="fw-bold">Wyświetlenia</div>
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">W Koszyku</div>
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">Sprzedanych</div>
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">Cena</div>
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
                @foreach($prod as $k => $p)
                <tr>
                    <th>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">{{$k+1}}</div>
                        </div>
                    </th>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div style="max-width:50px"><img alt="product_photo" src="{{asset('photos/'.$p->photo)}}" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('svg/photos.svg') }}`;"></div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">{{$p->name}}</div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            @if($p->category != null)
                            <div class="fw-bold">{{$p->category->plural}}</div>
                            @endif
                            @if($p->subcategory_id != null)
                            <div class="text-muted">{{$p->subcategory->plural}}</div>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">{{$p->views}}</div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">{{$p->order}}</div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">{{$p->sells}}</div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">{{$p->normal_price}}</div>
                            @if($p->sale_price != 0)
                            <div class="text-muted">{{$p->sale_price}}</div>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div><a href="{{route('admin.product.edit',$p->id)}}" class="btn btn-primary btn-lg me-2"><i class="fa-solid fa-pen-to-square"></i></a></div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div><a href="{{route('admin.product.delete',$p->id)}}" class="btn btn-danger btn-lg" onclick="return confirm('Czy na pewno chcesz usunąć ten produkt?');"><i class="fa-solid fa-trash"></i></a></div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $prod->links('client.saco.module.pagination') }}
    </div>
</div>
@endsection