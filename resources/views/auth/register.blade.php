@extends('layouts.main')
@section('content')
<!--REGISTER-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form class="form text-center my-5" action="{{route('register_form')}}" method="POST">
                    <!--TOKEN-->
                    @csrf
                    <h1 class="h3 mb-3 fw-normal">Rejestracja</h1>

                    <div class="form-floating my-3">
                        <input type="email" class="form-control rounded-0" id="email" value="{{old('email')}}" name="email" required>
                        <label for="email">Email</label>
                        <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="text" class="form-control rounded-0" id="name" value="{{old('name')}}" name="name" required>
                        <label for="name">Imię</label>
                        <span class="text-danger">@error('name') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="text" class="form-control rounded-0" id="surname" value="{{old('surname')}}" name="surname" required>
                        <label for="surname">Nazwisko</label>
                        <span class="text-danger">@error('surname') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="password" class="form-control rounded-0" id="password" name="password" required>
                        <label for="password">Hasło</label>
                        <span class="text-danger">@error('password') {{$message}} @enderror</span>
                    </div>

                    <div class="form-floating my-3">
                        <input type="password" class="form-control rounded-0" id="password_confirm" name="password_confirm" required>
                        <label for="password_confirm">Powtórz hasło</label>
                        <span class="text-danger">@error('password_confirm') {{$message}} @enderror</span>
                    </div>

                    <div><a href="{{ url('login')}}">Masz konto? Logowanie</a></div>

                    <button class="w-100 btn btn-lg btn-custom my-3 rounded-0" type="submit">Rejestracja</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!--END REGISTER-->
@endsection