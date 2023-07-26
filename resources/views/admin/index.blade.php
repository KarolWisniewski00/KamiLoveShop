@extends('layout.dashboard')
@section('main')
<!--START-->
<div class="row mb-3">
    <div class="col-12">
        <div class="d-flex flex-row justify-content-start align-items-center">
            <h1 class="my-4 font-display me-2">Zamówienia</h1>
        </div>
    </div>
    <hr>
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
                            <div class="fw-bold">Imię</div>
                            <div class="text-muted">Nazwisko</div>
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">Adres</div>
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
                    <th></th>
                    <th>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">Brak zamówień!</div>
                        </div>
                    </th>
                    <th></th>
                    <th></th>
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
                            <div class="fw-bold">{{$order->name}}</div>
                            <div class="text-muted">{{$order->surname}}</div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">{{$order->street}}</div>
                            @if ($order->street_extra != null)
                            <div class="text-muted">{{$order->street_extra}}</div>
                            @endif
                            <div class="text-muted">{{$order->city}}</div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            @if($order->status == "Oczekujące na płatność" || $order->status == "Anulowano")
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
                            <div><a href="{{url('/order/'.$order->id)}}" class="btn btn-lg btn-primary"><i class="fa-solid fa-magnifying-glass"></i></a></div>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        {{ $orders->links('client.saco.module.pagination') }}
    </div>
</div>

<!--END START-->
@endsection