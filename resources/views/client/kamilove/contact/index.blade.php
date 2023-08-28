@extends('layout.kamilove')
@section('meta')
<title>Kontakt | KamiLove Fashion sklep online</title>
<meta property="og:title" content="Kontakt | KamiLove Fashion sklep online - Sukienki, Biżuteria, Akcesoria" />
<meta name="twitter:title" content="Kontakt | KamiLove Fashion sklep online - Sukienki, Biżuteria, Akcesoria" />
<meta name="description" content="Kontakt">
<meta property="og:description" content="Kontakt" />
<meta name="twitter:description" content="Kontakt" />
@endsection
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
                            <img src="{{ asset('photos/logo.png')}}" alt="logo" class="img-fluid" style="max-height: 6em;">
                        </a>
                    </div>
                    <div class="d-flex flex-column justify-content-start align-items-start text-start my-4">
                        <h3 class="my-4">Nasze dane firmowe</h3>
                        <p class="text-muted">KamiLove Fashion KAMILA KOŃCZYNSKA</p>
                        <p class="text-muted">NIP:7642581350</p>
                        <h3 class="my-4">Nasze dane bankowe</h3>
                        <h6>Revolut</h6>
                        <p class="text-muted">Revolut Bank UAB (spółką zarejestrowaną w Republice Litewskiej pod numerem 304580906, której siedziba i centrala znajduje się pod adresem Konstitucijos ave. 21B, 08130 Wilno, Republika Litewska)</p>
                        <p class="text-muted fw-bold">Konto: 28291000060000000002485597</p>
                        <p class="text-muted fw-bold">@kamila9h9w</p>
                        <p class="text-muted fw-bold">IBAN: LT893250068406076082</p>
                        <p class="text-muted fw-bold">BIC: REVOLT21</p>
                    </div>
                    <h3 class="my-4">Kontakt</h3>
                    <div class="d-flex justify-content-start align-items-center text-start my-4">
                        <p class="text-muted"><a href="mailto:Kamilakonczynska@wp.pl">Kamilakonczynska@wp.pl</a></p>
                    </div>
                    <div class="d-flex justify-content-start align-items-center text-start my-4">
                        <p class="text-muted"><a href="tel:+48 509 205 500">+48 509 205 500</a></p>
                    </div>
                    <div class="d-flex justify-content-start align-items-center text-start my-4">
                        <p class="text-muted">ul. Lutycka 66C/15, 64-920 Piła</p>
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