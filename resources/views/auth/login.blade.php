@extends('layouts.main')
@section('content')
<!--LOGIN-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form class="form text-center my-4" action="{{route('login_form')}}" method="POST">
                    <!--TOKEN-->
                    @csrf
                    <h1 class="h3 mb-3 fw-normal">Logowanie</h1>

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

                    <div><a href="">Zapomaniałeś hasła?</a></div>
                    <div><a href="{{ url('register')}}">Nie masz konta? Rejestracja</a></div>

                    <button class="btn btn-custom-1 my-4" type="submit">Zaloguj</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!--END LOGIN-->
@endsection