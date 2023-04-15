@extends('layouts.main')
@section('content')
<!--ABOUT-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
                    <h1>Zwroty i reklamacje</h1>
                </div>
                <div class="col-12">
                    @foreach($return as $ret)
                    @if ($ret->type == true)
                    <div class="d-flex justify-content-start align-items-center text-start my-4">
                        <h1>{{$ret->content}}</h1>
                    </div>
                    @else
                    <div class="d-flex justify-content-start align-items-center text-start my-4">
                        <p class="text-muted">{{$ret->content}}</p>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--END ABOUT-->
@endsection