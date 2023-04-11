@extends('layouts.main')
@section('content')
<!--BUSKET-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
                    <h1>Koszyk</h1>
                </div>
                @include('layouts.account')
                <div class="col-12">
                    <div class="text-center fw-bold mt-4 pt-4" style="font-size: 1.4em;">Twój koszyk jest pusty!</div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--END BUSKET-->
@endsection