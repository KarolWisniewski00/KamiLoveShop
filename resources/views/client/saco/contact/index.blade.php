@extends('layout.saco')
@section('content')
<!--CONTACT-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column justify-content-center align-items-center text-center my-4">
                    <h1>Kontakt</h1>
                </div>
                <div class="col-12">
                    <div class="d-flex justify-content-start align-items-center text-start my-4">
                        <a href="{{route('index')}}" class="d-flex align-items-center mb-2 mb-md-0 me-md-auto text-dark text-decoration-none">
                            <img src="{{ asset('photos/logo.png')}}" alt="logo" class="img-fluid" style="max-height: 6em;" onerror="this.onerror=null; this.src=`{{ asset('svg/photos.svg') }}`;">
                        </a>
                    </div>
                    <div class="d-flex flex-column justify-content-start align-items-start text-start my-4">
                        <h3 class="my-4">Nasze dane firmowe</h3>
                        <p class="text-muted">PEŁNA NAZWA FIRMY</p>
                        <p class="text-muted">NIP:123456789</p>
                        <h3 class="my-4">Nasze dane bankowe</h3>
                        <h6>Nazwa banku</h6>
                        <p class="text-muted fw-bold">Numer konta: 28291000060000000002485597</p>
                        <p class="text-muted fw-bold">IBAN: LT893250068406076082</p>
                        <p class="text-muted fw-bold">BIC: REVOLT21</p>
                    </div>
                    <h3 class="my-4">Kontakt</h3>
                    <div class="d-flex justify-content-start align-items-center text-start my-4">
                        <p class="text-muted"><a href="mailto:przykład@wp.pl">przykład@wp.pl</a></p>
                    </div>
                    <div class="d-flex justify-content-start align-items-center text-start my-4">
                        <p class="text-muted"><a href="tel:+48 123 123 123">+48 123 123 123</a></p>
                    </div>
                    <div class="d-flex justify-content-start align-items-center text-start my-4">
                        <p class="text-muted">adres, 11-111 Miasto</p>
                    </div>
                    <div class="d-flex justify-content-start align-items-center text-start my-4">
                        <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d64072.41759616913!2d16.71516559732531!3d53.15732037281285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4703e5d27ff4d757%3A0x9c9b747aa954d452!2sLutycka%2066C%2F15%2C%2064-920%20Pi%C5%82a!5e1!3m2!1spl!2spl!4v1682084864866!5m2!1spl!2spl" style="border:0; min-height:40em;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--END CONTACT-->
@endsection