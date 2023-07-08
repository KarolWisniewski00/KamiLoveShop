@extends('layouts.main')
@section('meta')
<title>Kasa | KamiLove Fashion sklep online</title>
@endsection
@section('content')
<!--ORDER-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-7">
                <form class="form text-center my-4" action="{{route('order_new_form')}}" method="POST">
                    <!--TOKEN-->
                    @csrf
                    <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
                        <h1>Kasa</h1>
                    </div>

                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="name" value="{{$user->name}}" name="name" required>
                        <label for="name">Imię</label>
                        <span class="text-danger">@error('name') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="surname" value="{{$user->surname}}" name="surname" required>
                        <label for="surname">Nazwisko</label>
                        <span class="text-danger">@error('surname') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="email" class="form-control" id="email" value="{{$user->email}}" name="email" required>
                        <label for="email">Email</label>
                        <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="company" value="{{old('company')}}" name="company">
                        <label for="company">Nazwa firmy (opcjonalne)</label>
                        <span class="text-danger">@error('company') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="post" value="{{old('post')}}" name="post" required>
                        <label for="post">Kod pocztowy</label>
                        <span class="text-danger">@error('post') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="street" value="{{old('street')}}" name="street" required>
                        <label for="street">Ulica</label>
                        <span class="text-danger">@error('street') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="street_extra" value="{{old('street_extra')}}" name="street_extra">
                        <label for="street_extra">Ciąg dalszy adresu (opcjonalne)</label>
                        <span class="text-danger">@error('street_extra') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="city" value="{{old('city')}}" name="city" required>
                        <label for="city">Miasto</label>
                        <span class="text-danger">@error('city') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="phone" value="{{old('phone')}}" name="phone" required>
                        <label for="phone">Numer telefonu</label>
                        <span class="text-danger">@error('phone') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="extra" value="{{old('extra')}}" name="extra">
                        <label for="extra">Uwagi dotyczące zamówienia (opcjonalne)</label>
                        <span class="text-danger">@error('extra') {{$message}} @enderror</span>
                    </div>

                    <div class="form-check text-start">
                        <input class="form-check-input" type="checkbox" value="" id="rules" required>
                        <label class="form-check-label" for="rules">
                            Oświadczam, że zapoznałem/am się z treścią strony <a href="{{route('rules')}}">regulamin</a>
                        </label>
                    </div>
                    <input type="hidden" name="value" value="{{$sum+16}}">
                    <button class="btn btn-custom-1 my-4" type="submit">Kupuję i płacę</button>
                    <a href="{{route('busket')}}" class="btn btn-custom-2 my-4" type="button">Anuluj</a>
                </form>
            </div>
            <div class="col-12 col-md-5" style="overflow:auto;">
                <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
                    <h1>Twoje zamówienie</h1>
                </div>
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
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($buskets)==0)
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <div class="fw-bold">Twój koszyk jest pusty!</div>
                                </div>
                            </th>
                            <th></th>
                            <th></th>
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
                                    @foreach($products as $p)
                                    @if ($p->id == $busket->product_id)
                                    <div style="max-width:50px"><img alt="product_photo" src="{{ asset('photos/'.$p->photo)}}" class="img-fluid"></div>
                                    @endif
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    @foreach($products as $p)
                                    @if ($p->id == $busket->product_id)
                                    <div class="fw-bold">{{$p->name}} {{$busket->size_value}}</div>
                                    @endif
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    @foreach($products as $p)
                                    @if ($p->id == $busket->product_id)
                                    <div class="fw-bold">{{$p->SKU}}</div>
                                    @endif
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    @foreach($products as $p)
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
                                    <div class="fw-bold">{{$busket->quantity}}</div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    @foreach($products as $p)
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
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <h4>Podsumowanie koszyka</h4>
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
                <h4 class="mt-4">Przelew bankowy</h4>
                <p class="text-muted">Prosimy o wpłatę bezpośrednio na nasze konto bankowe.<span class="text-danger"> Proszę użyć numeru zamówienia jako tytuł płatności.</span> Twoje zamówienie zostanie zrealizowane po zaksięgowaniu wpłaty na naszym koncie.</p>
                <p>Twoje dane osobowe zostaną wykorzystane do realizacji Twojego zamówienia oraz do innych celów opisanych w zakładce <a href="{{route('policy')}}">polityka prywatności</a></p>
            </div>
        </div>
    </div>
</section>
<!--END ORDER-->
@endsection