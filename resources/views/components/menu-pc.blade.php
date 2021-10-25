<div>
    <header class="header-area header-responsive-padding header-height-1">
        <div class="header-bottom sticky-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-6 col-6">
                        <div class="logo">
                            <a class="link_ref" href="{{ route('home') }}"><img
                                    src="{{ asset('assets/images/logo/logo.svg') }}" alt="logo HOMIE"></a>
                        </div>
                    </div>
                    <div class="col-lg-8 d-none d-lg-block d-flex justify-content-center">
                        <div class="main-menu text-center">
                            <nav>
                                <ul>
                                    <li><a href="{{ route('home') }}" class="link_ref">Inicio</a>
                                    </li>
                                    <li><a data-scroll href="{{ route('home') . '#broker' }}">Soy Broker</a>
                                    </li>
                                    <li><a data-scroll href="{{ route('home') . '#propietario' }}">Soy Propietario</a>
                                    </li>
                                    <li><a data-scroll href="{{ route('home') . '#inquilino' }}">Quiero Rentar</a>
                                    </li>
                                    <li><a href="" class="link_ref">FAQ</a>
                                    </li>
                                    @auth
                                    @else
                                        <li><a href="{{ route('iniciar_sesion') }}" class="link_ref">Iniciar
                                                sesión</a>
                                        </li>
                                    @endauth

                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-6">
                        <div class="header-action-wrap">
                            <div class="header-action-style">
                                @auth
                                    <a class="btn btn-orange-sm ocultar-md" title="registrate"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                            class="fas fa-sign-out-alt"></i></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf </form>
                                @else
                                    <a class="btn btn-yellow link_ref ocultar-md" title="registrate"
                                        href="{{ route('registro') }}">Registrate</a>
                                @endauth
                            </div>

                            <div class="header-action-style d-block d-lg-none">
                                <a class="mobile-menu-active-button" href="#"><i class="fas fa-bars icon-menu"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
