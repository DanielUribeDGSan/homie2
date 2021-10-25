<div x-data class="mt-3">
    <form onsubmit="return referenciasForm(event)">
        <div class="form-group row">
            <div class="col-lg-6 col-md-6 col-12 mt-2">
                <label for="name" class="col-form-label fw-100">Nombre</label>
                <input type="text" class="form-input" id="name" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm.name" autocomplete="off">
                @if ($errors->has('createForm.name'))
                    <span>{{ $errors->first('createForm.name') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2">
                <label for="last_name" class="col-form-label fw-100">Apellidos</label>
                <input type="text" class="form-input" id="last_name" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm.last_name" autocomplete="off">
                @if ($errors->has('createForm.last_name'))
                    <span>{{ $errors->first('createForm.last_name') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2">
                <label for="email" class="col-form-label fw-100 mt-2">Correo
                    electrónico</label>
                <input type="email" class="form-input" id="email" maxlength="255"
                    wire:model.defer="createForm.email" autocomplete="off">
                @if ($errors->has('createForm.email'))
                    <span>{{ $errors->first('createForm.email') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2">
                <label for="phone" class="col-form-label fw-100 mt-2">Teléfono</label>
                <input type="text" class="form-input" id="phone" onkeyup="onlyNum(this)" maxlength="20"
                    wire:model.defer="createForm.phone" autocomplete="off">
                @if ($errors->has('createForm.phone'))
                    <span>{{ $errors->first('createForm.phone') }}</span>
                @endif
            </div>
            <div class="col-6 mt-5">
                <button type="submit" class="btn btn-orange-sm" wire:loading.attr="disabled"
                    wire:loading.remove>Siguiente</button>
                <div wire:loading wire:loading.class="d-flex align-items-center">
                    <x-loading />
                </div>
            </div>
            <div class="col-6 mt-5 d-flex align-items-center justify-content-end">
                <article>
                    <h1 class="text-secundary">2/3</h1>
                </article>
            </div>
        </div>
    </form>
    <script>
        const referenciasForm = (e) => {
            e.preventDefault();

            const name = document.querySelector('#name').value;
            const last_name = document.querySelector('#last_name').value;
            const phone = document.querySelector('#phone').value;
            const email = document.querySelector('#email').value;


            if (name == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Nombre</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (last_name == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Apellidos</b>" no puede quedar vacío',
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
            }
            Livewire.emitTo('arendatario.referencias', 'registrarFormulario');
        }
    </script>

</div>
