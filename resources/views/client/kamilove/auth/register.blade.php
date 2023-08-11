@extends('layout.kamilove')
@section('content')
<!--REGISTER-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form class="form text-center my-4" action="{{route('register.store')}}" method="POST">
                    <!--TOKEN-->
                    @csrf
                    <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
                        <h1>Rejestracja</h1>
                    </div>

                    <div class="form-floating my-3">
                        <input type="email" class="form-control" id="email" value="{{old('email')}}" name="email" required>
                        <label for="email">Email</label>
                        <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="name" value="{{old('name')}}" name="name" required>
                        <label for="name">Imię</label>
                        <span class="text-danger">@error('name') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="text" class="form-control" id="surname" value="{{old('surname')}}" name="surname" required>
                        <label for="surname">Nazwisko</label>
                        <span class="text-danger">@error('surname') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="password" class="form-control" id="password" name="password" required>
                        <label for="password">Hasło</label>
                        <span class="text-danger">@error('password') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm" required>
                        <label for="password_confirm">Powtórz hasło</label>
                        <span class="text-danger">@error('password_confirm') {{$message}} @enderror</span>
                    </div>

                    <div><a href="{{ route('login')}}">Masz konto? Logowanie</a></div>

                    <button class="btn btn-custom-1 my-4" type="submit"><i class="fa-solid fa-arrow-right me-2"></i>Rejestracja</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!--END REGISTER-->
@endsection