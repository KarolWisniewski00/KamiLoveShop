@extends('layout.saco')
@section('content')
<!--LOGIN-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form class="form text-center my-4" action="{{route('login.store')}}" method="POST">
                    <!--TOKEN-->
                    @csrf
                    <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
                        <h1>Logowanie</h1>
                    </div>

                    <div class="form-floating my-3">
                        <input type="email" class="form-control" id="email" value="{{old('email')}}" name="email" required>
                        <label for="email">Email</label>
                        <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="password" class="form-control" id="password" name="password" required>
                        <label for="password">Hasło</label>
                        <span class="text-danger">@error('password') {{$message}} @enderror</span>
                    </div>

                    <!--<div><a href="">Zapomaniałeś hasła?</a></div>-->
                    <div><a href="{{route('register')}}">Nie masz konta? Rejestracja</a></div>

                    <button class="btn btn-custom my-4" type="submit">Zaloguj</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!--END LOGIN-->
@endsection