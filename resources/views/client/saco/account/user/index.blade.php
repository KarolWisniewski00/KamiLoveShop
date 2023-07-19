@extends('layout.saco')
@section('content')
<!--ACCOUNT-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
                    <h1>Konto</h1>
                </div>
                @include('client.saco.module.user-nav')
                <div class="col-12">
                    <!--VIEW-->
                    <ul class="list-group ">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Imię</div>
                                {{$user->name}}
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Nazwisko</div>
                                {{$user->surname}}
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Email</div>
                                {{$user->email}}
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Hasło</div>
                                ********
                            </div>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-start align-items-center mt-4">
                        <a href="{{route('user.edit', 'account')}}" class="me-2 btn btn-custom"><i class="fa-solid fa-pen-to-square me-2"></i>Edytuj konto</a>
                        <a href="{{route('user.edit', 'password')}}" class="me-2 btn btn-custom-2"><i class="fa-solid fa-key me-2"></i>Edytuj hasło</a>
                        <a href="{{route('user.delete')}}" class="btn btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć to konto?');"><i class="fa-solid fa-trash me-2"></i>Usuń konto</a>
                    </div>
                    <!--END VIEW-->
                </div>
            </div>
        </div>
    </div>
</section>
<!--ACCOUNT-->
@endsection