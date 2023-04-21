@extends('layouts.main')
@section('title', 'Zwroty i reklamacje')
@section('description', 'Chcemy, aby zakupy w naszym sklepie internetowym były dla naszych klientów zawsze udane i satysfakcjonujące. W razie jakichkolwiek problemów z zakupionymi produktami, nasi klienci mogą skorzystać z naszej procedury zwrotów lub reklamacji. W naszej sekcji "Zwroty i reklamacje" opisujemy, jakie warunki należy spełnić, aby skorzystać z tych usług oraz jakie kroki należy podjąć. Zachęcamy do zapoznania się z tymi informacjami i w razie jakichkolwiek pytań lub wątpliwości, nasi konsultanci są do Państwa dyspozycji.')
@section('extra-meta')
@endsection
@section('content')
<!--RETURN-->
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
<!--END RETURN-->
@endsection