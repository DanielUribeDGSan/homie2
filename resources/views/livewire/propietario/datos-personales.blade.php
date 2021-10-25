<div x-data class="mt-3">
    <form onsubmit="return datosPersonales(event)">
        <div class="form-group row" wire:ignore>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="escrituras" class="col-form-label fw-100">Primeras 5 hojas de las escrituras</label>
                <input type="file" accept="image/*,.pdf" class="form-input" id="escrituras"
                    wire:model.defer="escrituras">
                @if ($errors->has('escrituras'))
                    <span>{{ $errors->first('escrituras') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="contrato_compraventa" class="col-form-label fw-100"> Contrato de compra-venta</label>
                <input type="file" accept="image/*,.pdf" class="form-input" id="contrato_compraventa"
                    wire:model.defer="contrato_compraventa">
                @if ($errors->has('contrato_compraventa'))
                    <span>{{ $errors->first('contrato_compraventa') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="poder_notarial" class="col-form-label fw-100"> Poder notarial</label>
                <input type="file" accept="image/*,.pdf" class="form-input" id="poder_notarial"
                    wire:model.defer="poder_notarial">
                @if ($errors->has('poder_notarial'))
                    <span>{{ $errors->first('poder_notarial') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="comprobante_domicilio" class="col-form-label fw-100"> Comprobante de domicilio</label>
                <input type="file" accept="image/*,.pdf" class="form-input" id="comprobante_domicilio"
                    wire:model.defer="comprobante_domicilio">
                @if ($errors->has('comprobante_domicilio'))
                    <span>{{ $errors->first('comprobante_domicilio') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label class="col-form-label fw-100">¿Admite mascotas?</label><br />
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="admite_mascotas" id="admite_mascotas1" value="Si"
                        wire:model.defer="createForm.admite_mascotas">
                    <label class="form-check-label" for="admite_mascotas1">Si</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="admite_mascotas" id="admite_mascotas2" value="No"
                        wire:model.defer="createForm.admite_mascotas">
                    <label class="form-check-label" for="admite_mascotas2">No</label>
                </div>
                @if ($errors->has('createForm.admite_mascotas'))
                    <span>{{ $errors->first('createForm.admite_mascotas') }}</span>
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
                <label for="identificacion_oficial" class="col-form-label fw-100"> Identificación oficial</label>
                <input type="file" accept="image/*,.pdf" class="form-input" id="identificacion_oficial"
                    wire:model.defer="identificacion_oficial">
                @if ($errors->has('identificacion_oficial'))
                    <span>{{ $errors->first('identificacion_oficial') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="metodo_pago" class="col-form-label fw-100">Método de pago - como va a recibir el
                    pago</label>
                <select class="form-input" id="metodo_pago" wire:model.defer="createForm.metodo_pago">
                    <option value="" selected disabled>Selecciona una opción</option>
                    <option value="Sr Pago">Sr Pago</option>
                    <option value="Transferencia bancaria">Transferencia bancaria</option>
                </select>
                @if ($errors->has('createForm.metodo_pago'))
                    <span>{{ $errors->first('createForm.metodo_pago') }}</span>
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
                <input type="text" class="form-input" id="precio" onkeyup="onlyNum(this)" maxlength="13"
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
                <button type="submit" class="btn btn-orange-sm" wire:loading.attr="disabled"
                    wire:loading.remove>Registrar datos</button>
                <div wire:loading wire:loading.class="d-flex align-items-center">
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
    <script wire:ignore>
        const datosPersonales = (e) => {
            e.preventDefault();

            const escrituras = document.querySelector('#escrituras').value;
            const contrato_compraventa = document.querySelector('#contrato_compraventa').value;
            const poder_notarial = document.querySelector('#poder_notarial').value;
            const comprobante_domicilio = document.querySelector('#comprobante_domicilio').value;
            const admite_mascotas1 = document.querySelector('#admite_mascotas1').checked;
            const admite_mascotas2 = document.querySelector('#admite_mascotas2').checked;
            const tiene_estacionamiento1 = document.querySelector('#tiene_estacionamiento1').checked;
            const tiene_estacionamiento2 = document.querySelector('#tiene_estacionamiento2').checked;
            const servicios = document.querySelector('#servicios').value;
            const esta_amueblado1 = document.querySelector('#esta_amueblado1').checked;
            const esta_amueblado2 = document.querySelector('#esta_amueblado2').checked;
            const identificacion_oficial = document.querySelector('#identificacion_oficial').value;
            const metodo_pago = document.querySelector('#metodo_pago').value;
            const puede_facturar1 = document.querySelector('#puede_facturar1').checked;
            const puede_facturar2 = document.querySelector('#puede_facturar2').checked;
            const precio = document.querySelector('#precio').value;
            const direccion = document.querySelector('#direccion').value;
            // Livewire.emitTo('propietario.datos-personales', 'registrarFormulario');

            if (escrituras == "") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Primeras 5 hojas de las escrituras</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (contrato_compraventa == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Contrato de compra-venta</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (poder_notarial == '') {
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

            Livewire.emitTo('propietario.datos-personales', 'registrarFormulario');
        }
    </script>

</div>
