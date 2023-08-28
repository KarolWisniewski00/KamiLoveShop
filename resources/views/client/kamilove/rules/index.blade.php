@extends('layout.kamilove')
@section('meta')
<title>Regulamin | KamiLove Fashion sklep online</title>
<meta property="og:title" content="Regulamin | KamiLove Fashion sklep online - Sukienki, Biżuteria, Akcesoria" />
<meta name="twitter:title" content="Regulamin | KamiLove Fashion sklep online - Sukienki, Biżuteria, Akcesoria" />
<meta name="description" content="Regulamin">
<meta property="og:description" content="Regulamin" />
<meta name="twitter:description" content="Regulamin" />
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