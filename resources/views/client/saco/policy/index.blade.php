@extends('layout.saco')
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