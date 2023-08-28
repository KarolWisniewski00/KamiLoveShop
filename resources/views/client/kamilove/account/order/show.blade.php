@extends('layout.kamilove')
@section('meta')
<title>Zamówienie {{$order->number}} | KamiLove Fashion sklep online</title>
@endsection
@section('content')
<!--RESUME-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
                    <h1>Twoje zamówienia</h1>
                </div>
                @include('client.kamilove.module.user-nav')
                <div class="mb-3"><a href="{{route('user.order')}}"><span class="badge rounded-pill bg-custom-1"><i class="fa-solid fa-chevron-left me-2"></i>Powrót</span></a></div>
                <div class="my-4">
                    <h3 class="my-4">Dziękujemy, otrzymaliśmy Twoje zamówienie</h3>
                    <p class="text-muted fw-bold">Numer zamówienia: {{$order->number}}</p>
                    @if ($order->status == 'Oczekujące na płatność' || $order->status == 'Anulowano')
                    <p class="text-muted fw-bold">Status: <span class="text-danger">{{$order->status}}</span></p>
                    @elseif($order->status == "W trakcie realizacji")
                    <p class="text-muted fw-bold">Status: <span class="text-warning">{{$order->status}}</span></p>
                    @else
                    <p class="text-muted fw-bold">Status: <span class="text-custom-4">{{$order->status}}</span></p>
                    @endif
                    <p class="text-muted">Data: {{$order->created_at}}</p>
                    <p class="text-muted">Łącznie: {{$order->value}} PLN</p>
                    <p class="text-muted">Metoda płatności: Przelew bankowy</p>
                </div>
            </div>
            <div class="col-12 col-md-6 my-4">
                <h3 class="my-4">Dane klienta</h3>
                <p class="text-muted">Imię: {{$order->name}}</p>
                <p class="text-muted">Nazwisko: {{$order->surname}}</p>
                <p class="text-muted">Email: {{$order->email}}</p>
                <p class="text-muted">Numer telefonu: {{$order->phone}}</p>
                @if ($order->company != null)
                <p class="text-muted">Nazwa firmy: {{$order->company}}</p>
                @endif
                <p class="text-muted">Ulica: {{$order->street}}</p>
                @if ($order->street_extra != null)
                <p class="text-muted">Ciąg dalsy adresu: {{$order->street_extra}}</p>
                @endif
                <p class="text-muted">Miasto: {{$order->city}}</p>
                @if($order->extra != null)
                <p class="text-muted">Uwagi dotyczące zamówienia: {{$order->extra}}</p>
                @endif
            </div>
            <div class="col-12 col-md-6 my-4">
                <h3 class="my-4">Nasze dane firmowe</h3>
                <p class="text-muted">PEŁNA NAZWA FIRMY</p>
                <p class="text-muted">NIP:123456789</p>
                <h3 class="my-4">Nasze dane bankowe</h3>
                <h6>Nazwa banku</h6>
                <p class="text-muted fw-bold">Numer konta: 28291000060000000002485597</p>
                <p class="text-muted fw-bold">IBAN: LT893250068406076082</p>
                <p class="text-muted fw-bold">BIC: REVOLT21</p>
                <p class="text-danger fw-bold">Dowód zakupu będzie wysłany wraz z paczką.</p>
            </div>
            <div class="col-12 my-4" style="overflow:auto;">
                <h3 class="my-4">Szczegóły zamówienia</h3>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($extras as $k => $extra)
                        <tr>
                            <th>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="fw-bold">{{$k+1}}</div>
                                </div>
                            </th>
                            <td>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    @foreach($products as $p)
                                    @if ($p->id == $extra->product_id)
                                    <div style="max-width:50px"><img alt="product_photo" src="{{ asset('photos/'.$p->photo)}}" class="img-fluid"></div>
                                    @endif
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="fw-bold">{{$extra->name}} {{$extra->size_value}}</div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    @if ($extra->sale_price != 0)
                                    <div class="text-muted me-2" style="text-decoration: line-through;padding-top:1px;">{{$extra->normal_price}} PLN</div>
                                    <div class="fw-bold"> {{$extra->sale_price}} PLN</div>
                                    @else
                                    <div class="fw-bold"> {{$extra->normal_price}} PLN</div>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <div class="fw-bold">{{$extra->quantity}}</div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    @if ($extra->sale_price != 0)
                                    <div class="fw-bold"> {{$extra->sale_price * $extra->quantity}} PLN</div>
                                    @else
                                    <div class="fw-bold"> {{$extra->normal_price * $extra->quantity}} PLN</div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    <ul class="list-group ">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Wysyłka PDP + 16 PLN</div>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Przelew bankowy</div>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                @if ($order->status == 'Oczekujące na płatność' || $order->status == 'Anulowano')
                                <div class="fw-bold text-danger">{{$order->status}}</div>
                                @else
                                <div class="fw-bold text-custom-4">{{$order->status}}</div>
                                @endif
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Łącznie</div>
                                {{$order->value}} PLN
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="d-flex justify-content-start align-items-center mt-4">
                <a href="{{route('user.order')}}" class="btn btn-custom-1"><i class="fa-solid fa-chevron-left me-2"></i>Pwrót</a>
            </div>
        </div>
    </div>
</section>
<!--END RESUME-->
@endsection