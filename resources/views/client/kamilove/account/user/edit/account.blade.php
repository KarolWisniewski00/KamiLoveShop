@extends('layout.kamilove')
@section('meta')
<title>Konto | KamiLove Fashion sklep online</title>
@endsection
@section('content')
<!--ACCOUNT-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
                    <h1>Konto - Edycja konta</h1>
                </div>
                <div class="mb-3"><a href="{{route('user')}}"><span class="badge rounded-pill bg-custom"><i class="fa-solid fa-chevron-left me-2"></i>Powrót</span></a></div>
                <div class="col-12">
                    <form class="form text-center my-4" action="{{route('user.update','account')}}" method="POST">
                        <!--TOKEN-->
                        @csrf
                        @method('PUT')

                        <div class="form-floating my-3">
                            <input type="text" class="form-control" id="name" value="{{$user->name}}" name="name" required>
                            <label for="name">Imię</label>
                            <span class="text-danger">@error('name') {{$message}} @enderror</span>
                        </div>

                        <div class="form-floating my-3">
                            <input type="text" class="form-control" id="surname" value="{{$user->surname}}" name="surname" required>
                            <label for="surname">Nazwisko</label>
                            <span class="text-danger">@error('surname') {{$message}} @enderror</span>
                        </div>

                        <div class="form-floating my-3">
                            <input type="email" class="form-control" id="email" value="{{$user->email}}" name="email" required>
                            <label for="email">Email</label>
                            <span class="text-danger">@error('email') {{$message}} @enderror</span>
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