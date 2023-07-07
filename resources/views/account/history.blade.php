@extends('layouts.main')
@section('meta')
<title>Zamówienia | KamiLove Fashion sklep online</title>
@endsection
@section('content')
<!--HISTORY-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
                    <h1>Twoje zamówienia</h1>
                </div>
                @include('layouts.account')

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
                                <th></th>
                                <th></th>
                                <th>
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="fw-bold">Brak zamówień!</div>
                                    </div>
                                </th>
                                <th></th>
                                <th></th>
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
                                        <div><a href="{{url('/order/'.$order->id)}}" class="btn btn-sm btn-custom-2 rounded text-white fs-1"><i class="fa-solid fa-magnifying-glass"></i></a></div>
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