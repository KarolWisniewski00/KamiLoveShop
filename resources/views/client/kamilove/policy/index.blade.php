@extends('layout.kamilove')
@section('meta')
<title>Polityka prywatności | KamiLove Fashion sklep online</title>
<meta property="og:title" content="Polityka prywatności | KamiLove Fashion sklep online - Sukienki, Biżuteria, Akcesoria" />
<meta name="twitter:title" content="Polityka prywatności | KamiLove Fashion sklep online - Sukienki, Biżuteria, Akcesoria" />
<meta name="description" content="Polityka prywatności">
<meta property="og:description" content="Polityka prywatności" />
<meta name="twitter:description" content="Polityka prywatności" />
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