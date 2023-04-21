@extends('layouts.main')
@section('title', 'Regulamin')
@section('description', 'Nasz regulamin to ważny dokument, który określa zasady funkcjonowania naszego sklepu internetowego. Zawiera on najważniejsze informacje dotyczące zamówień, płatności, dostaw, reklamacji oraz zwrotów. Dokument ten reguluje prawa i obowiązki zarówno sklepu, jak i klientów. Zachęcamy do zapoznania się z naszym regulaminem przed dokonaniem zakupów w naszym sklepie internetowym. W razie jakichkolwiek pytań lub wątpliwości, nasi konsultanci są do Państwa dyspozycji.')
@section('extra-meta')
@endsection
@section('content')
<!--RULES-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
                    <h1>Regulamin</h1>
                </div>
                <div class="col-12">
                    @foreach($rules as $rule)
                    @if ($rule->type == true)
                    <div class="d-flex justify-content-start align-items-center text-start my-4">
                        <h1>{{$rule->content}}</h1>
                    </div>
                    @else
                    <div class="d-flex justify-content-start align-items-center text-start my-4">
                        <p class="text-muted">{{$rule->content}}</p>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--END RULES-->
@endsection