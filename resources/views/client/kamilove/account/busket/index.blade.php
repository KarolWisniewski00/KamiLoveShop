@extends('layout.kamilove')
@section('content')
<!--BUSKET-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
                    <h1>Koszyk</h1>
                </div>
                @include('client.kamilove.module.user-nav')
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
                                        <div class="fw-bold">SKU</div>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">Cena</div>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">Ilość</div>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">Łącznie</div>
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
                            @if (count($buskets)==0)
                            <tr>
                                <th colspan="8">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="row">
                                            <div class="col-12 offset-md-3 col-md-6">
                                                <div class="d-flex flex-column justify-content-center align-items-center">
                                                    <img class="img-fluid" alt="" src="{{asset('svg/kamilove-shopping.svg')}}">
                                                    <div class="h4 m-0 p-0 my-3">Twój koszyk jest pusty!</div>
                                                    <a href="{{route('category.show','default')}}" class="btn btn-custom-1 my-3 btn-lg"><i class="fa-solid fa-cart-shopping me-2"></i>Zrób zakupy</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            @else
                            @foreach($buskets as $k => $busket)
                            <tr>
                                <th>
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">{{$k+1}}</div>
                                    </div>
                                </th>
                                <td>
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        @foreach($pro_prod as $p)
                                        @if ($p->id == $busket->product_id)
                                        <div style="max-width:50px"><img alt="product_photo" src="{{ asset('photos/'.$p->photo)}}" class="img-fluid" onerror="this.onerror=null; this.src=`{{ asset('svg/photos.svg') }}`;"></div>
                                        @endif
                                        @endforeach
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        @foreach($pro_prod as $p)
                                        @if ($p->id == $busket->product_id)
                                        <div class="fw-bold">{{$p->name}} {{$busket->size_value}}</div>
                                        @endif
                                        @endforeach
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        @foreach($pro_prod as $p)
                                        @if ($p->id == $busket->product_id)
                                        <div class="fw-bold">{{$p->SKU}}</div>
                                        @endif
                                        @endforeach
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-row justify-content-center align-items-center">
                                        @foreach($pro_prod as $p)
                                        @if ($p->id == $busket->product_id)
                                        @if ($p->sale_price != 0)
                                        <div class="text-muted me-2" style="text-decoration: line-through;padding-top:1px;">{{$p->normal_price}} PLN</div>
                                        <div class="fw-bold"> {{$p->sale_price}} PLN</div>
                                        @else
                                        <div class="fw-bold"> {{$p->normal_price}} PLN</div>
                                        @endif
                                        @endif
                                        @endforeach
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-row justify-content-center align-items-center">
                                        @foreach($pro_prod as $p)
                                        @if ($p->id == $busket->product_id)
                                        <form method="POST" action="{{route('user.busket.minus')}}">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="product_id" value="{{$p->id}}">
                                            <input type="hidden" name="quantity" value="-1">
                                            <input type="hidden" name="size_value" value="{{$busket->size_value}}">
                                            <button type="submit" class="btn btn-sm btn-danger me-2" onclick="return confirm('Czy na pewno chcesz usunąć ten produkt?');">
                                                <i class="fa-solid fa-minus"></i>
                                            </button>
                                        </form>
                                        <div class="fw-bold">{{$busket->quantity}}</div>
                                        <form method="POST" action="{{route('user.busket.plus')}}">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="product_id" value="{{$p->id}}">
                                            <input type="hidden" name="quantity" value="1">
                                            <input type="hidden" name="size_value" value="{{$busket->size_value}}">
                                            <button type="submit" class="btn btn-sm btn-custom-4 ms-2">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
                                        </form>
                                        @endif
                                        @endforeach
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        @foreach($pro_prod as $p)
                                        @if ($p->id == $busket->product_id)
                                        @if ($p->sale_price != 0)
                                        <div class="fw-bold"> {{$p->sale_price * $busket->quantity}} PLN</div>
                                        @else
                                        <div class="fw-bold"> {{$p->normal_price * $busket->quantity}} PLN</div>
                                        @endif
                                        @endif
                                        @endforeach
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div><a href="{{route('user.busket.delete',$busket->id)}}" class="btn btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć ten produkt?');"><i class="fa-solid fa-trash"></i></a></div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div>
                        <h1>Podsumowanie koszyka</h1>
                        <ul class="list-group ">
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Wysyłka PDP + 16 PLN</div>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">Łącznie</div>
                                    @if (count($buskets)==0)
                                    16 PLN
                                    @else
                                    {{$sum+16}} PLN
                                    @endif
                                </div>
                            </li>
                        </ul>
                        <div class="d-flex justify-content-start align-items-center mt-4">
                            @if (count($buskets)!=0)
                            <a href="{{route('user.order.create')}}" class="me-2 btn btn-custom-1"><i class="fa-solid fa-forward me-2"></i>Przejdź do płatności</a>
                            @endif
                            <a href="{{route('category.show','default')}}" class="btn btn-custom-2"><i class="fa-solid fa-cart-shopping me-2"></i>Kup coś jeszcze</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--END BUSKET-->
@endsection