<div class="off-canvas-active">
    <a class="off-canvas-close"><i class=" ti-close "></i></a>
    <div class="off-canvas-wrap">
        {{-- <div class="welcome-text off-canvas-margin-padding">
             <p>Default Welcome Msg! </p>
         </div> --}}
        <div class="mobile-menu-wrap off-canvas-margin-padding-2">
            <div id="mobile-menu" class="slinky-mobile-menu text-left">
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
                    <li>
                        @auth
                            <a class="btn btn-orange-sm ocultar-md" title="registrate"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                    class="fas fa-sign-out-alt"></i></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf </form>
                        @else
                            <a class="btn btn-yellow link_ref ocultar-md" title="registrate"
                                href="{{ route('registro') }}">Registrate</a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
