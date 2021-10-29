<x-layout-web>
    <section class="section-registro min-vh100">
        <div class="row p-0 m-0">
            <div class="col-lg-4 p-0 bg-gris">
                <img class="img-fluid registro__img" src="{{ asset('assets/images/svg/ilustracion-4.svg') }}"
                    alt="ilustacion homie" />
            </div>
            <div class="col-lg-8">
                <div class="container">
                    <div class="p-3">
                        @if (!Auth::user()->referred_guest)
                            <a type="button" class="btn-code" data-bs-toggle="modal"
                                data-bs-target="#modalReferido">
                                ¿Tienes un código de invitación?
                            </a>
                        @endif
                        <h1 class="text-secundary mt-3">Datos del propietario</h1>
                        @livewire('broker.datos-personales',['transaccion_user' => $transaccion_user])
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout-web>
