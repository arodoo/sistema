<div class="container">
    <a class="navbar-brand" href="#page-top"><img src="{{ asset('landing/assets/img/rei1.png') }}" alt="only rei" /></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars ms-1"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
            <li class="nav-item"><a class="nav-link" href="{{ route('landing.index') }}">HUUNGA Servicios</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('landing.portafolio') }}">HUUNGA Portafolio</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('landing.acerca') }}">HUUNGA Acerca de</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('landing.equipo') }}">HUUNGA Equipo</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('landing.contacto') }}">HUUNGA Contacto</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">HUUNGA Acceso</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">HUUNGA Registro</a></li>
        </ul>
    </div>
</div>