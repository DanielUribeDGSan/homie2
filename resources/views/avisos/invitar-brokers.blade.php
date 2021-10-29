<x-layout-web>
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12">
                    <img class="img-fluid mt-lg mt-md-5 mt-5" src="{{ asset('assets/images/svg/ilustracion-1.svg') }}"
                        alt="ilustacion homie" />
                </div>
                <div class="col-lg-6 col-md-12 col-12 d-flex align-items-center justify-content-center">
                    <div class="h-auto">
                        <h1 class="text-primary">Recuerda que tienes muchos beneficios al invitar mas brokers
                        </h1>

                        <p class="mt-3">Copia tu código y comparterlo a otros brokers, para tener mas
                            beneficios</p>
                        <p class="mt-3">Código personal: <span
                                class="text-orange">{{ Auth::user()->referred_id }}</span>
                        </p>
                        <div class="col-12 ">
                            <a class="btn btn-yellow-sm mt-3" href="{{ route('registro_completado') }}">Terminar
                                proceso</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <script>
        document.querySelector('.header-bottom').classList.remove('sticky-bar');
    </script>
</x-layout-web>
