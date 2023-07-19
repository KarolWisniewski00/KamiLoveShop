@extends('layout.saco')
@section('content')
<!--HISTORY-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
                    <h1>Twoje zamówienia</h1>
                </div>
                @include('client.saco.module.user-nav')

                <div class="col-12" style="overflow:auto;">
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
                                        <div class="fw-bold">Numer zamówienia</div>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">Cena</div>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">Status</div>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">Data</div>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">Podgląd</div>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($orders)==0)
                            <tr>
                                <th colspan="5">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="row">
                                            <div class="col-12 offset-md-3 col-md-6">
                                                <div class="d-flex flex-column justify-content-center align-items-center">
                                                    <img class="img-fluid" alt="" src="{{asset('svg/saco-order.svg')}}">
                                                    <div class="h4 m-0 p-0 my-3">Nie znaleziono zamówień!</div>
                                                    <a href="{{route('category.show','default')}}" class="btn btn-custom-2 my-3 btn-lg"><i class="fa-solid fa-cart-shopping me-2"></i>Zrób zakupy</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            @else
                            @foreach($orders as $k => $order)
                            <tr>
                                <th>
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">{{$k+1}}</div>
                                    </div>
                                </th>
                                <td>
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">{{$order->number}}</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">{{$order->value}} PLN</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        @if($order->status == "Oczekujące na płatność" || $order->status == 'Anulowano')
                                        <div class="fw-bold text-danger">{{$order->status}}</div>
                                        @else
                                        <div class="fw-bold text-custom-4">{{$order->status}}</div>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-row justify-content-center align-items-center">
                                        <div class="fw-bold">{{$order->created_at}}</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div><a href="{{route('user.order.show', $order->id )}}" class="btn btn-sm btn-custom rounded text-white"><i class="fa-solid fa-magnifying-glass"></i></a></div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!--END HISTORY-->
@endsection