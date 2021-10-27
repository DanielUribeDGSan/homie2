<div x-data class="mt-3" wire:ignore>
    <form onsubmit="return datosPersonales(event)">
        <div class="form-group row">
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="titulo_propiedad" class="col-form-label fw-100">Título de la propiedad</label>
                <select class="form-input" id="titulo_propiedad" wire:model.defer="createForm.titulo_propiedad"
                    onchange="tituloPropiedad()">
                    <option value="" selected disabled>Selecciona una opción</option>
                    <option value="Primeras 5 hojas de las escrituras">Primeras 5 hojas de las escrituras</option>
                    <option value="Contrato de compra-venta">Contrato de compra-venta</option>
                    <option value="Poder notarial">Poder notarial</option>
                </select>
                @if ($errors->has('createForm.titulo_propiedad'))
                    <span>{{ $errors->first('createForm.titulo_propiedad') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 d-none escrituras">
                <label class="col-form-label fw-100">Primeras 5 hojas de las escrituras</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="escrituras"
                    wire:model.defer="escrituras">
                <label for="escrituras" class="form-input-file text-center" id="file_escrituras"><i
                        class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('escrituras'))
                    <span>{{ $errors->first('escrituras') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 d-none contrato_compraventa">
                <label class="col-form-label fw-100"> Contrato de compra-venta</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="contrato_compraventa"
                    wire:model.defer="contrato_compraventa">
                <label for="contrato_compraventa" class="form-input-file text-center" id="file_contrato_compraventa"><i
                        class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('contrato_compraventa'))
                    <span>{{ $errors->first('contrato_compraventa') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 d-none poder_notarial">
                <label class="col-form-label fw-100"> Poder notarial</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="poder_notarial"
                    wire:model.defer="poder_notarial">
                <label for="poder_notarial" class="form-input-file text-center" id="file_poder_notarial"><i
                        class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('poder_notarial'))
                    <span>{{ $errors->first('poder_notarial') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label class="col-form-label fw-100"> Comprobante de domicilio</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="comprobante_domicilio"
                    wire:model.defer="comprobante_domicilio">
                <label for="comprobante_domicilio" class="form-input-file text-center"
                    id="file_comprobante_domicilio"><i class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('comprobante_domicilio'))
                    <span>{{ $errors->first('comprobante_domicilio') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label class="col-form-label fw-100">¿Admite mascotas?</label><br />
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="admite_mascotas" id="admite_mascotas1" value="Si"
                        wire:model.defer="createForm.admite_mascotas" onchange="cantidadMascotas()">
                    <label class="form-check-label" for="admite_mascotas1">Si</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="admite_mascotas" id="admite_mascotas2" value="No"
                        wire:model.defer="createForm.admite_mascotas" onchange="cantidadMascotas()">
                    <label class="form-check-label" for="admite_mascotas2">No</label>
                </div>
                @if ($errors->has('createForm.admite_mascotas'))
                    <span>{{ $errors->first('createForm.admite_mascotas') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 d-none cantidad-mascotas">
                <label for="cantidad_mascotas" class="col-form-label fw-100">¿Cantidad de mascotas admitidas?</label>
                <input type="text" class="form-input" id="cantidad_mascotas" onkeyup="onlyNum(this)" maxlength="255"
                    wire:model.defer="createForm.cantidad_mascotas" autocomplete="off">
                @if ($errors->has('createForm.cantidad_mascotas'))
                    <span>{{ $errors->first('createForm.cantidad_mascotas') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label class="col-form-label fw-100">¿Tiene estacionamiento?</label><br />
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="tiene_estacionamiento"
                        id="tiene_estacionamiento1" value="Si" wire:model.defer="createForm.tiene_estacionamiento">
                    <label class="form-check-label" for="tiene_estacionamiento1">Si</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="tiene_estacionamiento"
                        id="tiene_estacionamiento2" value="No" wire:model.defer="createForm.tiene_estacionamiento">
                    <label class="form-check-label" for="tiene_estacionamiento2">No</label>
                </div>
                @if ($errors->has('createForm.tiene_estacionamiento'))
                    <span>{{ $errors->first('createForm.tiene_estacionamiento') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="servicios" class="col-form-label fw-100">Servicios</label>
                <select class="form-input" id="servicios" wire:model.defer="createForm.servicios">
                    <option value="" selected disabled>Selecciona una opción</option>
                    <option value="Incluido en el precio de renta">Incluido en el precio de renta</option>
                    <option value="No incluido en el precio de renta">No incluido en el precio de renta</option>
                </select>
                @if ($errors->has('createForm.servicios'))
                    <span>{{ $errors->first('createForm.servicios') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label class="col-form-label fw-100">¿Se encuentra amueblado?</label><br />
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="esta_amueblado" id="esta_amueblado1" value="Si"
                        wire:model.defer="createForm.esta_amueblado">
                    <label class="form-check-label" for="esta_amueblado1">Si</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="esta_amueblado" id="esta_amueblado2" value="No"
                        wire:model.defer="createForm.esta_amueblado">
                    <label class="form-check-label" for="esta_amueblado2">No</label>
                </div>
                @if ($errors->has('createForm.esta_amueblado'))
                    <span>{{ $errors->first('createForm.esta_amueblado') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label class="col-form-label fw-100"> Identificación oficial</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="identificacion_oficial"
                    wire:model.defer="identificacion_oficial">
                <label for="identificacion_oficial" class="form-input-file text-center"
                    id="file_identificacion_oficial"><i class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('identificacion_oficial'))
                    <span>{{ $errors->first('identificacion_oficial') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="metodo_pago" class="col-form-label fw-100">Método de pago - como va a recibir el
                    pago</label>
                <select class="form-input" id="metodo_pago" onchange="solicitarNumeroCuenta()"
                    wire:model.defer="createForm.metodo_pago">
                    <option value="" selected disabled>Selecciona una opción</option>
                    <option value="Sr Pago">Sr Pago</option>
                    <option value="Transferencia bancaria">Transferencia bancaria</option>
                </select>
                @if ($errors->has('createForm.metodo_pago'))
                    <span>{{ $errors->first('createForm.metodo_pago') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 d-none numero_cuenta">
                <label for="numero_cuenta" class="col-form-label fw-100">Número de cuenta</label>
                <input type="text" class="form-input" id="numero_cuenta" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm.numero_cuenta" autocomplete="off">
                @if ($errors->has('createForm.numero_cuenta'))
                    <span>{{ $errors->first('createForm.numero_cuenta') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label class="col-form-label fw-100">¿El propietario puede facturar?</label><br />
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="puede_facturar" id="puede_facturar1" value="Si"
                        wire:model.defer="createForm.puede_facturar">
                    <label class="form-check-label" for="puede_facturar1">Si</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="puede_facturar" id="puede_facturar2" value="No"
                        wire:model.defer="createForm.puede_facturar">
                    <label class="form-check-label" for="puede_facturar2">No</label>
                </div>
                @if ($errors->has('createForm.puede_facturar'))
                    <span>{{ $errors->first('createForm.puede_facturar') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="precio" class="col-form-label fw-100">Precio de la propiedad</label>
                <input type="text" class="form-input" id="precio" onkeyup="onlyNumPrecio(this)" maxlength="13"
                    wire:model.defer="createForm.precio" autocomplete="off">
                @if ($errors->has('createForm.precio'))
                    <span>{{ $errors->first('createForm.precio') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="direccion" class="col-form-label fw-100">Dirección</label>
                <input type="text" class="form-input" id="direccion" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm.direccion" autocomplete="off">
                @if ($errors->has('createForm.direccion'))
                    <span>{{ $errors->first('createForm.direccion') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <div class="col-6 mt-5">
                <button type="submit" class="btn btn-orange-sm btn-loading">Registrar datos</button>
                <div class="loading-btn d-none">
                    <x-loading />
                </div>
            </div>
            <div class="col-6 mt-5 d-flex align-items-center justify-content-end">
                <article>
                    <h1 class="text-secundary">1/1</h1>
                </article>
            </div>
        </div>
    </form>
    <script>
        const datosPersonales = (e) => {
            e.preventDefault();

            const titulo_propiedad = document.querySelector('#titulo_propiedad').value;
            const escrituras = document.querySelector('#escrituras').value;
            const contrato_compraventa = document.querySelector('#contrato_compraventa').value;
            const poder_notarial = document.querySelector('#poder_notarial').value;
            const comprobante_domicilio = document.querySelector('#comprobante_domicilio').value;
            const admite_mascotas1 = document.querySelector('#admite_mascotas1').checked;
            const admite_mascotas2 = document.querySelector('#admite_mascotas2').checked;
            const cantidad_mascotas = document.querySelector('#cantidad_mascotas').value;
            const tiene_estacionamiento1 = document.querySelector('#tiene_estacionamiento1').checked;
            const tiene_estacionamiento2 = document.querySelector('#tiene_estacionamiento2').checked;
            const servicios = document.querySelector('#servicios').value;
            const esta_amueblado1 = document.querySelector('#esta_amueblado1').checked;
            const esta_amueblado2 = document.querySelector('#esta_amueblado2').checked;
            const identificacion_oficial = document.querySelector('#identificacion_oficial').value;
            const metodo_pago = document.querySelector('#metodo_pago').value;
            const numero_cuenta = document.querySelector('#numero_cuenta').value;
            const puede_facturar1 = document.querySelector('#puede_facturar1').checked;
            const puede_facturar2 = document.querySelector('#puede_facturar2').checked;
            const precio = document.querySelector('#precio').value;
            const direccion = document.querySelector('#direccion').value;
            // Livewire.emitTo('propietario.datos-personales', 'registrarFormulario');
            if (titulo_propiedad == "") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Título de la propiedad</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (escrituras == "" && titulo_propiedad == 'Primeras 5 hojas de las escrituras') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Primeras 5 hojas de las escrituras</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (contrato_compraventa == '' && titulo_propiedad == 'Contrato de compra-venta') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Contrato de compra-venta</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (poder_notarial == '' && titulo_propiedad == 'Poder notarial') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Poder notarial</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (comprobante_domicilio == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Comprobante de domicilio</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (!admite_mascotas1 && !admite_mascotas2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>¿Admite mascotas?</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (admite_mascotas1 && cantidad_mascotas == "") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>¿Cantidad de mascotas admitidas?</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (!tiene_estacionamiento1 && !tiene_estacionamiento2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>¿Tiene estacionamiento?</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (servicios == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Servicios</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (!esta_amueblado1 && !esta_amueblado2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>¿Se encuentra amueblado?</b>" no puede quedar vacío',
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
            } else if (metodo_pago == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Método de pago - como va a recibir el pago</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (metodo_pago == 'Transferencia bancaria' && numero_cuenta == "") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Número de cuenta</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (!puede_facturar1 && !puede_facturar2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>¿El propietario puede facturar?</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (precio == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Precio de la propiedad</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (direccion == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Dirección</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            }

            document.querySelector('.btn-loading').classList.add('d-none');
            document.querySelector('.loading-btn').classList.remove('d-none');

            setTimeout(function() {
                Livewire.emitTo('propietario.datos-personales', 'registrarFormulario');
            }, 2000);

        }

        const cantidadMascotas = () => {
            const admite_mascotas1 = document.querySelector('#admite_mascotas1').checked;
            const admite_mascotas2 = document.querySelector('#admite_mascotas2').checked;
            if (admite_mascotas1) {
                document.querySelector('.cantidad-mascotas').classList.remove('d-none');
            } else if (admite_mascotas2) {
                document.querySelector('.cantidad-mascotas').classList.add('d-none');
                document.querySelector('#cantidad_mascotas').value = "";

            }
        }

        const tituloPropiedad = () => {
            const titulo_propiedad = document.querySelector('#titulo_propiedad').value;
            const escrituras = document.querySelector('.escrituras');
            const contrato_compraventa = document.querySelector('.contrato_compraventa');
            const poder_notarial = document.querySelector('.poder_notarial');

            if (titulo_propiedad == 'Primeras 5 hojas de las escrituras') {
                contrato_compraventa.classList.add('d-none');
                poder_notarial.classList.add('d-none');
                escrituras.classList.remove('d-none');

                document.querySelector('#poder_notarial').value = "";
                document.querySelector('#contrato_compraventa').value = "";

                document.querySelector(`#file_poder_notarial`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';
                document.querySelector(`#file_contrato_compraventa`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';

            } else if (titulo_propiedad == 'Contrato de compra-venta') {
                contrato_compraventa.classList.remove('d-none');
                poder_notarial.classList.add('d-none');
                escrituras.classList.add('d-none');

                document.querySelector('#poder_notarial').value = "";
                document.querySelector('#escrituras').value = "";

                document.querySelector(`#file_poder_notarial`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';
                document.querySelector(`#file_escrituras`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';


            } else if (titulo_propiedad == 'Poder notarial') {
                contrato_compraventa.classList.add('d-none');
                poder_notarial.classList.remove('d-none');
                escrituras.classList.add('d-none');

                document.querySelector('#escrituras').value = "";
                document.querySelector('#contrato_compraventa').value = "";

                document.querySelector(`#file_contrato_compraventa`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';
                document.querySelector(`#file_escrituras`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';
            }

        }

        const solicitarNumeroCuenta = () => {
            const metodo_pago = document.querySelector('#metodo_pago').value;
            if (metodo_pago == 'Transferencia bancaria') {
                document.querySelector('.numero_cuenta').classList.remove('d-none');

            } else if (metodo_pago == 'Sr Pago') {
                document.querySelector('.numero_cuenta').classList.add('d-none');
                document.querySelector('#numero_cuenta').value = "";

            }
        }
    </script>
    @push('script')
        <script>
            Livewire.on('errorDocumentosPropietario', function() {
                document.querySelector('.btn-loading').classList.remove('d-none');
                document.querySelector('.loading-btn').classList.add('d-none');
                Swal.fire({
                    icon: 'warning',
                    title: 'Espera un momento...',
                    html: 'Tus documentos aún no se suben, espera 10 segundos mas.',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            });
        </script>
    @endpush

</div>
