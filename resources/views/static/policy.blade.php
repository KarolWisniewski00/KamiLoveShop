@extends('layouts.main')
@section('title', 'Polityka prywatności')
@section('description', 'Szanujemy prywatność naszych klientów i dbamy o ochronę ich danych osobowych. W naszej Polityce Prywatności opisujemy, jakie dane zbieramy od naszych klientów oraz w jaki sposób są one wykorzystywane. Dokładamy wszelkich starań, aby nasze działania były zgodne z obowiązującymi przepisami prawa oraz normami etycznymi. Zachęcamy do zapoznania się z naszą Polityką Prywatności i w razie jakichkolwiek pytań lub wątpliwości, nasi konsultanci są do Państwa dyspozycji.')
@section('extra-meta')
@endsection
@section('content')
<!--POLICY-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
                    <h1>Polityka prywatności</h1>
                </div>
                <div class="col-12">
                    @foreach($policy as $polic)
                    @if ($polic->type == true)
                    <div class="d-flex justify-content-start align-items-center text-start my-4">
                        <h1>{{$polic->content}}</h1>
                    </div>
                    @else
                    <div class="d-flex justify-content-start align-items-center text-start my-4">
                        <p class="text-muted">{{$polic->content}}</p>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--END POLICY-->
@endsection