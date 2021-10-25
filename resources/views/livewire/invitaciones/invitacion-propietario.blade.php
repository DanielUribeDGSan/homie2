<div x-data class="mt-3">
    <form onsubmit="return registrarFormInvitacionPropietario(event)">
        <div class="form-group row">
            <label for="name" class="col-12 col-form-label fw-100">Nombre completo</label>
            <div class="col-lg-12 col-md-12 col-12">
                <input type="text" class="form-input" id="name" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm.name" autocomplete="off">
                @if ($errors->has('createForm.name'))
                    <span>{{ $errors->first('createForm.name') }}</span>
                @endif
            </div>
            <label for="email" class="col-12 col-form-label fw-100 mt-2">Correo
                electrónico</label>
            <div class="col-lg-12 col-md-12 col-12">
                <input type="text" class="form-input" id="email" maxlength="255" wire:model.defer="createForm.email"
                    autocomplete="off">
                @if ($errors->has('createForm.email'))
                    <span>{{ $errors->first('createForm.email') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <label for="phone" class="col-form-label fw-100 mt-2">Teléfono</label>
                <input type="text" class="form-input" id="phone" onkeyup="onlyNum(this)" maxlength="20"
                    wire:model.defer="createForm.phone" autocomplete="off">
                @if ($errors->has('createForm.phone'))
                    <span>{{ $errors->first('createForm.phone') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <label for="password" class="col-form-label fw-100 mt-2">Contraseña</label>
                <input type="password" class="form-input" id="password" onkeyup="verPassword(this)" maxlength="255"
                    wire:model.defer="createForm.password" autocomplete="off">
                <small id="verPassword"></small>
                @if ($errors->has('createForm.password'))
                    <span>{{ $errors->first('createForm.password') }}</span>
                @endif
            </div>
            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-orange-sm" wire:loading.attr="disabled"
                    wire:loading.remove>Registrarme</button>
                <div wire:loading wire:loading.class="d-flex align-items-center">
                    <x-loading />
                </div>
            </div>
        </div>
    </form>
    <script>
        const registrarFormInvitacionPropietario = (e) => {
            e.preventDefault();

            const name = document.querySelector('#name').value;
            const phone = document.querySelector('#phone').value;
            const email = document.querySelector('#email').value;
            const password = document.querySelector('#password').value;
            const type = document.querySelector('#type').value;

            if (name == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Nombre</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (phone == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Teléfono</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (phone.length < 10 || phone.length > 20) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El número no es valido',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (email == '') {
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
            } else if (password.length < 6) {
                Swal.fire({
                    icon: 'error',
                    title: 'Ups...',
                    html: 'El campo "<b>Contraseña</b>" es invalido, por lo menos debe de tenr 6 dígitos',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (type == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Ups...',
                    html: 'El campo "<b>Tipo de usuario</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            }

            Livewire.emitTo('invitaciones', 'invitacion-propietario');
        }
    </script>
</div>
