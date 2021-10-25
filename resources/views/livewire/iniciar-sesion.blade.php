<div x-data class="mt-3">
    <form onsubmit="return formLogin(event)">
        <div class="form-group row">
            <div class="col-lg-6 col-md-6 col-12 mt-2">
                <label for="email" class="col-form-label fw-100 mt-2">Correo
                    electrónico</label>
                <input type="text" class="form-input" id="email" maxlength="255" wire:model.defer="formLogin.email"
                    autocomplete="off">
                @if ($errors->has('formLogin.email'))
                    <span>{{ $errors->first('formLogin.email') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2">
                <label for="password" class="col-form-label fw-100 mt-2">Contraseña</label>
                <input type="password" class="form-input" id="password" onkeyup="verPassword(this)" maxlength="255"
                    wire:model.defer="formLogin.password" autocomplete="off">
                <small id="verPassword"></small>
                @if ($errors->has('formLogin.password'))
                    <span>{{ $errors->first('formLogin.password') }}</span>
                @endif
            </div>
            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-orange-sm" wire:loading.attr="disabled"
                    wire:loading.remove>Entrar</button>
                <div wire:loading wire:loading.class="d-flex align-items-center">
                    <x-loading />
                </div>
            </div>
        </div>
    </form>
    <script>
        const formLogin = (e) => {
            e.preventDefault();
            const email = document.querySelector('#email').value;
            const password = document.querySelector('#password').value;

            if (email == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Ups...',
                    html: 'El campo "<b>Email</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (!validar_email(email)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Ups...',
                    text: 'Tu email no es valido, escribelo correctamente',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (password == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Ups...',
                    html: 'El campo "<b>Contraseña</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            }

            Livewire.emitTo('iniciar-sesion', 'validarDatos');
        }
    </script>
    @push('script')
        <script>
            Livewire.on('errorLogin', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Datos incorrectos',
                    html: 'El correo electrónico o la contraseña son incorrectos',
                    confirmButtonText: 'Aceptar',
                });
            });
        </script>
    @endpush
</div>
