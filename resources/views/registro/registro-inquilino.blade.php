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
                        <h1 class="text-secundary">Registro</h1>
                        @livewire('form-register-inquilino',['transaccion_user' => $transaccion_user,'email_user' =>
                        $email_user])
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout-web>
