<div x-data class="mt-3">

    <form onsubmit="return registrarFormInquilinoAPropietario(event)">
        <div class="form-group row">
            <div class="col-lg-6 col-md-6 col-12 mt-2">
                <label for="precio" class="col-form-label fw-100">Precio de la propiedad</label>
                <input type="text" class="form-input" id="precio" onkeyup="onlyNum(this)" maxlength="255"
                    wire:model.defer="createForm.precio" autocomplete="off">
                @if ($errors->has('createForm.precio'))
                    <span>{{ $errors->first('createForm.precio') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2">
                <label for="direccion" class="col-form-label fw-100">Dirección</label>
                <input type="text" class="form-input" id="direccion" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm.direccion" autocomplete="off">
                @if ($errors->has('createForm.direccion'))
                    <span>{{ $errors->first('createForm.direccion') }}</span>
                @endif
            </div>
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
            <div class="col-lg-6 col-md-6 col-12">
                <label for="email" class="col-form-label fw-100 mt-2">Correo
                    electrónico</label>
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
            <div class="col-12 mt-4">
                <hr />
                <article>
                    <h1 class="text-secundary">Datos del inquilino</h1>
                </article>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2">
                <label for="name2" class="col-form-label fw-100">Nombre</label>
                <input type="text" class="form-input" id="name2" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm2.name" autocomplete="off">
                @if ($errors->has('createForm2.name'))
                    <span>{{ $errors->first('createForm2.name') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2">
                <label for="last_name2" class="col-form-label fw-100">Apellidos</label>
                <input type="text" class="form-input" id="last_name2" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm2.last_name" autocomplete="off">
                @if ($errors->has('createForm2.last_name'))
                    <span>{{ $errors->first('createForm2.last_name') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <label for="email2" class="col-form-label fw-100 mt-2">Correo
                    electrónico</label>
                <input type="text" class="form-input" id="email2" maxlength="255"
                    wire:model.defer="createForm2.email" autocomplete="off">
                @if ($errors->has('createForm2.email'))
                    <span>{{ $errors->first('createForm2.email') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <label for="phone2" class="col-form-label fw-100 mt-2">Teléfono</label>
                <input type="text" class="form-input" id="phone2" onkeyup="onlyNum(this)" maxlength="20"
                    wire:model.defer="createForm2.phone" autocomplete="off">
                @if ($errors->has('createForm2.phone'))
                    <span>{{ $errors->first('createForm2.phone') }}</span>
                @endif
            </div>
            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-orange-sm" wire:loading.attr="disabled"
                    wire:loading.remove>Registrar datos</button>
                <div wire:loading wire:loading.class="d-flex align-items-center">
                    <x-loading />
                </div>
            </div>
        </div>
    </form>
    <!-- Button trigger modal -->
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="modalReferido" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalReferidoLabel" aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalReferidoLabel">¿Cuentas con un código de invitación?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-lg-12 col-md-12 col-12 mt-2">
                            <label for="referred_guest" class="col-form-label fw-100">Ingresa tu código</label>
                            <input type="text" class="form-input" id="referred_guest" onkeyup="onlyLetrasNum(this)"
                                maxlength="10" wire:model.defer="createFormReferido.referred_guest" autocomplete="off">
                            @if ($errors->has('createFormReferido.referred_guest'))
                                <span>{{ $errors->first('createFormReferido.referred_guest') }}</span>
                            @endif
                        </div>
                        <div class="col-12 mt-3">
                            <button type="button" class="btn btn-orange-sm btn-loading-code" wire:click='validarCodigo'
                                id="registrarCode">Registrar
                                código</button>

                            <div class="d-flex align-items-center loading-code-btn d-none">
                                <x-loading />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-yellow-sm" data-bs-dismiss="modal">No tengo un
                        código</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const registrarFormInquilinoAPropietario = (e) => {
            e.preventDefault();

            const name = document.querySelector('#name').value;
            const last_name = document.querySelector('#last_name').value;
            const phone = document.querySelector('#phone').value;
            const email = document.querySelector('#email').value;

            const name2 = document.querySelector('#name2').value;
            const last_name2 = document.querySelector('#last_name2').value;
            const phone2 = document.querySelector('#phone2').value;
            const email2 = document.querySelector('#email2').value;

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
            } else if (name2 == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Nombre</b>" del inquilino no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (last_name2 == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Apellidos</b>" del inquilino no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (phone2 == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Teléfono</b>" del inquilino no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (phone2.length < 10 || phone2.length > 20) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El número del inquilino no es valido',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (email2 == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Ups...',
                    html: 'El campo "<b>Email</b>" del inquilino no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (!validar_email(email2)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Ups...',
                    text: 'El email del inquilino no es valido, escribelo correctamente',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            }

            Livewire.emitTo('broker.datos-personales', 'registrarFormulario');
        }
    </script>
    @push('script')
        <script>
            Livewire.on('errorCode', function() {
                Swal.fire({
                    icon: 'warning',
                    title: 'Código no econtrado',
                    html: 'El código de invitación que registraste no existe',
                    confirmButtonText: 'Aceptar',
                });
                document.querySelector('#referred_guest').value = "";
                document.querySelector('.loading-code-btn').classList.add('d-none');
                document.querySelector('.btn-loading-code').classList.remove('d-none');
                return false;
            });
            Livewire.on('successCode', function() {
                Swal.fire({
                    title: 'Código registrado',
                    text: 'Has apoyado a al broker que te invito correctamente',
                    imageUrl: "{{ asset('assets/images/svg/ilustracion-1.svg') }}",
                    imageWidth: 400,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                    confirmButtonText: 'Aceptar',

                })
                $("#close-modal").click();
                document.querySelector('.loading-code-btn').classList.add('d-none');
                document.querySelector('.btn-loading-code').classList.remove('d-none');
                return false;
            });


            $("#registrarCode").click(function() {
                document.querySelector('.loading-code-btn').classList.remove('d-none');
                document.querySelector('.btn-loading-code').classList.add('d-none');
            });
        </script>
        @if (!Auth::user()->referred_guest)
            <script>
                const myModal = new bootstrap.Modal(document.getElementById("modalReferido"), {});
                document.onreadystatechange = function() {
                    myModal.show();
                };
            </script>
        @endif
    @endpush

</div>
