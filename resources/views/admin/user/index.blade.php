@extends('layout.dashboard')
@section('main')
<!--START-->
<div class="row mb-3">
    <div class="col-12">
        <div class="d-flex flex-row justify-content-start align-items-center">
            <h1 class="my-4 font-display me-2">Użytkownicy</h1>
        </div>
    </div>
    <hr>
    <div class="col-12" style="overflow:auto;">
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
                            <div class="fw-bold">Imię</div>
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">Nazwisko</div>
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">email</div>
                        </div>
                    </th>
                    <th scope="col">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">Usuwanie</div>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($user as $k => $u)
                <tr>
                    <th>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">{{$k+1}}</div>
                        </div>
                    </th>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">{{$u->name}}</div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">{{$u->surname}}</div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div class="fw-bold">{{$u->email}}</div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div><a href="" class="btn btn-lg btn-danger {{ session('login_id') == $u->id ? 'disabled' : '' }}"><i class="fa-solid fa-trash"></i></a></div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $user->links('client.saco.module.pagination') }}
    </div>
</div>
@endsection