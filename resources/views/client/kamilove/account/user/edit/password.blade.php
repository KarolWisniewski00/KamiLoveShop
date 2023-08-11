@extends('layout.kamilove')
@section('content')
<!--ACCOUNT-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
                    <h1>Konto - Edycja hasła</h1>
                </div>
                <div class="mb-3"><a href="{{route('user')}}"><span class="badge rounded-pill bg-custom"><i class="fa-solid fa-chevron-left me-2"></i>Powrót</span></a></div>
                <div class="col-12">
                    <form class="form text-center my-4" action="{{route('user.update', 'password')}}" method="POST">
                        <!--TOKEN-->
                        @csrf
                        @method('PUT')
                        <div class="form-floating my-3">
                            <input type="password" class="form-control" id="password_old" name="password_old">
                            <label for="password_old">Aktualne hasło</label>
                            <span class="text-danger">@error('password_old') {{$message}} @enderror</span>
                        </div>

                        <div class="form-floating my-3">
                            <input type="password" class="form-control" id="password" name="password">
                            <label for="password">Nowe hasło</label>
                            <span class="text-danger">@error('password') {{$message}} @enderror</span>
                        </div>

                        <div class="form-floating my-3">
                            <input type="password" class="form-control" id="password_confirm" name="password_confirm">
                            <label for="password_confirm">Powtórz nowe hasło</label>
                            <span class="text-danger">@error('password_confirm') {{$message}} @enderror</span>
                        </div>

                        <div class="d-flex justify-content-start align-items-center mt-4">
                            <button class="btn btn-custom-4 me-2" type="submit"><i class="fa-solid fa-floppy-disk"></i> Zapisz</button>
                            <a href="{{route('user')}}" class="btn btn-danger"><i class="fa-solid fa-xmark"></i> Anuluj</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--ACCOUNT-->
@endsection