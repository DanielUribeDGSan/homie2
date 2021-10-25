<div x-data class="mt-3">
    <form onsubmit="return roomiesForm(event)">
        <div class="form-group row" wire:ignore>
            <div class="col-lg-6 col-md-6 col-12 mt-2">
                <label class="col-form-label fw-100">Compartirá renta</label>
                <br />
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="compartira_renta" id="compartira_renta1"
                        value="Si" wire:model.defer="createForm.compartira_renta">
                    <label class="form-check-label" for="compartira_renta1">Si</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="compartira_renta" id="compartira_renta2"
                        value="No" wire:model.defer="createForm.compartira_renta">
                    <label class="form-check-label" for="compartira_renta2">No</label>
                </div>
                @if ($errors->has('createForm.compartira_renta'))
                    <span>{{ $errors->first('createForm.compartira_renta') }}</span>
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
            <div class="col-lg-6 col-md-6 col-12 mt-2">
                <label for="identificacion_oficial" class="col-form-label fw-100">Identificación oficial</label>
                <input type="file" accept="image/*,.pdf" class="form-input" id="identificacion_oficial"
                    wire:model.defer="identificacion_oficial">
                @if ($errors->has('identificacion_oficial'))
                    <span>{{ $errors->first('identificacion_oficial') }}</span>
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
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="fecha_nacimiento" class="col-form-label fw-100">Fecha de nacimiento</label>
                <input type="date" class="form-input" id="fecha_nacimiento"
                    wire:model.defer="createForm.fecha_nacimiento" autocomplete="off">
                @if ($errors->has('createForm.fecha_nacimiento'))
                    <span>{{ $errors->first('createForm.fecha_nacimiento') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="rfc" class="col-form-label fw-100">RFC</label>
                <input type="text" class="form-input" id="rfc" onkeyup="onlyLetrasNum(this)" maxlength="13"
                    wire:model.defer="createForm.rfc" autocomplete="off">
                @if ($errors->has('createForm.rfc'))
                    <span>{{ $errors->first('createForm.rfc') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="direccion_vivienda" class="col-form-label fw-100">Direccion vivienda actual</label>
                <input type="text" class="form-input" id="direccion_vivienda" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm.direccion_vivienda" autocomplete="off">
                @if ($errors->has('createForm.direccion_vivienda'))
                    <span>{{ $errors->first('createForm.direccion_vivienda') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group row" wire:ignore>
            <div class="col-lg-12 col-md-12 col-12 mt-3">
                <label for="documentacion" class="col-form-label fw-100">Documentación</label>
                <select class="form-input" id="documentacion" wire:model.defer="createForm.documentacion"
                    onchange="tipoDocumentacion()">
                    <option value="" selected disabled>Selecciona una opción</option>
                    <option value="Comprobantes de nómina timbrados SAT (3 últimos meses)">Comprobantes de nómina
                        timbrados SAT (3 últimos meses)</option>
                    <option value="Estados de cuenta completos (3 meses)">Estados de cuenta completos (3 meses)</option>

                </select>

                @if ($errors->has('createForm.documentacion'))
                    <span>{{ $errors->first('createForm.documentacion') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group row" wire:ignore>
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta">
                <label for="estado_cuenta1" class="col-form-label fw-100">Primer estado de cuenta</label>
                <input type="file" accept="image/*,.pdf" class="form-input" id="estado_cuenta1"
                    wire:model.defer="estado_cuenta1">
                @if ($errors->has('estado_cuenta1'))
                    <span>{{ $errors->first('estado_cuenta1') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta">
                <label for="estado_cuenta2" class="col-form-label fw-100">Segundo estado de cuenta</label>
                <input type="file" accept="image/*,.pdf" class="form-input" id="estado_cuenta2"
                    wire:model.defer="estado_cuenta2">
                @if ($errors->has('estado_cuenta2'))
                    <span>{{ $errors->first('estado_cuenta2') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta">
                <label for="estado_cuenta3" class="col-form-label fw-100">Tercer estado de cuenta</label>
                <input type="file" accept="image/*,.pdf" class="form-input" id="estado_cuenta3"
                    wire:model.defer="estado_cuenta3">
                @if ($errors->has('estado_cuenta3'))
                    <span>{{ $errors->first('estado_cuenta3') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 comprobante-nomina">
                <label for="comprobante_nomina1" class="col-form-label fw-100">Primer comprobante de nónima</label>
                <input type="file" accept="image/*,.pdf" class="form-input" id="comprobante_nomina1"
                    wire:model.defer="comprobante_nomina1">
                @if ($errors->has('comprobante_nomina1'))
                    <span>{{ $errors->first('comprobante_nomina1') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 comprobante-nomina">
                <label for="comprobante_nomina2" class="col-form-label fw-100">Segundo comprobante de nónima</label>
                <input type="file" accept="image/*,.pdf" class="form-input" id="comprobante_nomina2"
                    wire:model.defer="comprobante_nomina2">
                @if ($errors->has('comprobante_nomina2'))
                    <span>{{ $errors->first('comprobante_nomina2') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 comprobante-nomina">
                <label for="comprobante_nomina3" class="col-form-label fw-100">Tercer comprobante de nónima</label>
                <input type="file" accept="image/*,.pdf" class="form-input" id="comprobante_nomina3"
                    wire:model.defer="comprobante_nomina3">
                @if ($errors->has('comprobante_nomina3'))
                    <span>{{ $errors->first('comprobante_nomina3') }}</span>
                @endif
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12 mt-3" wire:ignore>
            <label class="col-form-label fw-100">Historial crediticio</label>
            <br />
            <div class="form-check form-check-inline mt-2">
                <input class="form-check-input" type="radio" name="historial_crediticio" id="historial_crediticio1"
                    value="Tengo tarjeta de crédito" wire:model.defer="createForm.historial_crediticio">
                <label class="form-check-label" for="historial_crediticio1">Tengo tarjeta de crédito</label>
            </div>
            <div class="form-check form-check-inline mt-2">
                <input class="form-check-input" type="radio" name="historial_crediticio" id="historial_crediticio2"
                    value="Tengo tarjeta de débito" wire:model.defer="createForm.historial_crediticio">
                <label class="form-check-label" for="historial_crediticio2">Tengo tarjeta de débito</label>
            </div>
            <div class="form-check form-check-inline mt-2">
                <input class="form-check-input" type="radio" name="historial_crediticio" id="historial_crediticio3"
                    value="No tengo tarjetas" wire:model.defer="createForm.historial_crediticio">
                <label class="form-check-label" for="historial_crediticio3">No tengo tarjetas</label>
            </div>
            @if ($errors->has('createForm.historial_crediticio'))
                <span>{{ $errors->first('createForm.historial_crediticio') }}</span>
            @endif
        </div>

        <div class="form-group row">
            <div class="col-6 mt-5">
                <button type="submit" class="btn btn-orange-sm" wire:loading.attr="disabled"
                    wire:loading.remove>Siguiente</button>
                <div wire:loading wire:loading.class="d-flex align-items-center">
                    <x-loading />
                </div>
            </div>
            <div class="col-6 mt-5 d-flex align-items-center justify-content-end">
                <article>
                    <h1 class="text-secundary">3/3</h1>
                </article>
            </div>
        </div>
    </form>
    <script>
        const roomiesForm = (e) => {
            e.preventDefault();

            const compartira_renta1 = document.querySelector('#compartira_renta1').checked;
            const compartira_renta2 = document.querySelector('#compartira_renta2').checked;
            const name = document.querySelector('#name').value;
            const last_name = document.querySelector('#last_name').value;
            const identificacion_oficial = document.querySelector('#identificacion_oficial').value;
            const email = document.querySelector('#email').value;
            const phone = document.querySelector('#phone').value;
            const fecha_nacimiento = document.querySelector('#fecha_nacimiento').value;
            const rfc = document.querySelector('#rfc').value;
            const direccion_vivienda = document.querySelector('#direccion_vivienda').value;
            const documentacion = document.querySelector('#documentacion').value;
            const estado_cuenta1 = document.querySelector('#estado_cuenta1').value
            const estado_cuenta2 = document.querySelector('#estado_cuenta2').value
            const estado_cuenta3 = document.querySelector('#estado_cuenta3').value
            const comprobante_nomina1 = document.querySelector('#comprobante_nomina1').value
            const comprobante_nomina2 = document.querySelector('#comprobante_nomina2').value
            const comprobante_nomina3 = document.querySelector('#comprobante_nomina3').value
            const historial_crediticio = document.querySelector('#historial_crediticio1').checked;
            const historial_crediticio2 = document.querySelector('#historial_crediticio2').checked;
            const historial_crediticio3 = document.querySelector('#historial_crediticio3').checked;




            if (!compartira_renta1 && !compartira_renta2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Compartirá Renta</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (name == '') {
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
            } else if (identificacion_oficial == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Identificación oficial</b>" no puede quedar vacío',
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
            } else if (fecha_nacimiento == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Fecha de nacimiento</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (rfc == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>RFC</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (direccion_vivienda == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Direccion vivienda actual</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (documentacion == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Documentación</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (documentacion == 'Comprobantes de nómina timbrados SAT (3 últimos meses)' && !
                comprobante_nomina1 && !comprobante_nomina2 && !comprobante_nomina3) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'Los campos "<b>Comprobantes de nómina</b>" no pueden quedar vacíos',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (documentacion == 'Estados de cuenta completos (3 meses)' && !estado_cuenta1 && !estado_cuenta2 &&
                !estado_cuenta3) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'Los campos "<b>Estados de cuenta</b>" no pueden quedar vacíos',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (!historial_crediticio && !historial_crediticio2 && !historial_crediticio3) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Historial crediticio</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            }
            Livewire.emitTo('arendatario.roomies', 'registrarFormulario');
        }
        const documentos_nomina = document.getElementsByClassName("comprobante-nomina");
        for (let i = 0; i < documentos_nomina.length; i++) {
            documentos_nomina[i].classList.add('d-none');
        }
        const estados_cuenta = document.getElementsByClassName("estados-cuenta");
        for (let i = 0; i < estados_cuenta.length; i++) {
            estados_cuenta[i].classList.add('d-none');
        }

        const tipoDocumentacion = () => {
            const documentacion = document.querySelector('#documentacion').value;

            if (documentacion == 'Comprobantes de nómina timbrados SAT (3 últimos meses)') {
                const documentos_nomina = document.getElementsByClassName("comprobante-nomina");
                for (let i = 0; i < documentos_nomina.length; i++) {
                    documentos_nomina[i].classList.remove('d-none');
                }

                const estados_cuenta = document.getElementsByClassName("estados-cuenta");
                for (let i = 0; i < estados_cuenta.length; i++) {
                    estados_cuenta[i].classList.add('d-none');
                }

                document.querySelector('#estado_cuenta1').value = "";
                document.querySelector('#estado_cuenta2').value = "";
                document.querySelector('#estado_cuenta3').value = "";
            } else if (documentacion == 'Estados de cuenta completos (3 meses)') {
                const documentos_nomina = document.getElementsByClassName("comprobante-nomina");
                for (let i = 0; i < documentos_nomina.length; i++) {
                    documentos_nomina[i].classList.add('d-none');
                }

                const estados_cuenta = document.getElementsByClassName("estados-cuenta");
                for (let i = 0; i < estados_cuenta.length; i++) {
                    estados_cuenta[i].classList.remove('d-none');
                }

                document.querySelector('#comprobante_nomina1').value = "";
                document.querySelector('#comprobante_nomina2').value = "";
                document.querySelector('#comprobante_nomina3').value = "";
            }
        }
    </script>

</div>
