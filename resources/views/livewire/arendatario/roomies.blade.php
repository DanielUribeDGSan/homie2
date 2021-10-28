<div x-data class="mt-3" wire:ignore>
    <form onsubmit="return roomiesForm(event)">
        <div class="form-group row">
            <div class="col-lg-6 col-md-6 col-12 mt-2">
                <label class="col-form-label fw-100">Compartirá renta</label>
                <br />
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="compartira_renta" id="compartira_renta1"
                        value="Si" wire:model.defer="createForm.compartira_renta" onchange="compartiraRenta()">
                    <label class="form-check-label" for="compartira_renta1">Si</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="compartira_renta" id="compartira_renta2"
                        value="No" wire:model.defer="createForm.compartira_renta" onchange="compartiraRenta()">
                    <label class="form-check-label" for="compartira_renta2">No</label>
                </div>
                @if ($errors->has('createForm.compartira_renta'))
                    <span>{{ $errors->first('createForm.compartira_renta') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie">
                <label for="cantidad_roomies" class="col-form-label fw-100 ">Cantidad de roomies</label>
                <select class="form-input" id="cantidad_roomies" wire:model.defer="createForm.cantidad_roomies"
                    onchange="validarCantidadRoomies()">
                    <option value="" selected disabled>Selecciona una opción</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>

                </select>

                @if ($errors->has('createForm.cantidad_roomies'))
                    <span>{{ $errors->first('createForm.cantidad_roomies') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 ocultar-roomie">
                <label for="name" class="col-form-label fw-100">Nombre</label>
                <input type="text" class="form-input" id="name" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm.name" autocomplete="off">
                @if ($errors->has('createForm.name'))
                    <span>{{ $errors->first('createForm.name') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 ocultar-roomie">
                <label for="last_name" class="col-form-label fw-100">Apellidos</label>
                <input type="text" class="form-input" id="last_name" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm.last_name" autocomplete="off">
                @if ($errors->has('createForm.last_name'))
                    <span>{{ $errors->first('createForm.last_name') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 ocultar-roomie">
                <label class="col-form-label fw-100">Identificación oficial</label>
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
            <div class="col-lg-6 col-md-6 col-12 mt-2 ocultar-roomie">
                <label for="email" class="col-form-label fw-100 mt-2">Correo
                    electrónico</label>
                <input type="email" class="form-input" id="email" maxlength="255"
                    wire:model.defer="createForm.email" autocomplete="off">
                @if ($errors->has('createForm.email'))
                    <span>{{ $errors->first('createForm.email') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 ocultar-roomie">
                <label for="phone" class="col-form-label fw-100 mt-2">Teléfono</label>
                <input type="text" class="form-input" id="phone" onkeyup="onlyNumPhone(this)" maxlength="20"
                    wire:model.defer="createForm.phone" autocomplete="off">
                @if ($errors->has('createForm.phone'))
                    <span>{{ $errors->first('createForm.phone') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie">
                <label for="fecha_nacimiento" class="col-form-label fw-100">Fecha de nacimiento</label>
                <input type="date" class="form-input" id="fecha_nacimiento"
                    wire:model.defer="createForm.fecha_nacimiento" autocomplete="off">
                @if ($errors->has('createForm.fecha_nacimiento'))
                    <span>{{ $errors->first('createForm.fecha_nacimiento') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie">
                <label for="rfc" class="col-form-label fw-100">RFC</label>
                <input type="text" class="form-input" id="rfc" onkeyup="onlyLetrasNum(this)" maxlength="13"
                    wire:model.defer="createForm.rfc" autocomplete="off">
                @if ($errors->has('createForm.rfc'))
                    <span>{{ $errors->first('createForm.rfc') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie">
                <label for="direccion_vivienda" class="col-form-label fw-100">Direccion vivienda actual</label>
                <input type="text" class="form-input" id="direccion_vivienda" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm.direccion_vivienda" autocomplete="off">
                @if ($errors->has('createForm.direccion_vivienda'))
                    <span>{{ $errors->first('createForm.direccion_vivienda') }}</span>
                @endif
            </div>
            <div class="col-lg-12 col-md-12 col-12 mt-3 ocultar-roomie">
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
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta ocultar-roomie">
                <label class="col-form-label fw-100">Primer estado de cuenta</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="estado_cuenta1"
                    wire:model.defer="estado_cuenta1">
                <label for="estado_cuenta1" class="form-input-file text-center" id="file_estado_cuenta1"><i
                        class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('estado_cuenta1'))
                    <span>{{ $errors->first('estado_cuenta1') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta ocultar-roomie">
                <label class="col-form-label fw-100">Segundo estado de cuenta</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="estado_cuenta2"
                    wire:model.defer="estado_cuenta2">
                <label for="estado_cuenta2" class="form-input-file text-center" id="file_estado_cuenta2"><i
                        class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('estado_cuenta2'))
                    <span>{{ $errors->first('estado_cuenta2') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta ocultar-roomie">
                <label class="col-form-label fw-100">Tercer estado de cuenta</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="estado_cuenta3"
                    wire:model.defer="estado_cuenta3">
                <label for="estado_cuenta3" class="form-input-file text-center" id="file_estado_cuenta3"><i
                        class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('estado_cuenta3'))
                    <span>{{ $errors->first('estado_cuenta3') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 comprobante-nomina ocultar-roomie">
                <label class="col-form-label fw-100">Selecciona tus 6 archivos de nomina, de tus ultimos 3 meses</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="comprobante_nomina1"
                    name="nominas[]" wire:model.defer="nominas" multiple onchange="validarCantidadFiles()">
                <label for="comprobante_nomina1" class="form-input-file text-center" id="file_comprobante_nomina1"><i
                        class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tus archivos</label>
                @if ($errors->has('nominas'))
                    <span>{{ $errors->first('nominas') }}</span>
                @endif
            </div>

            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie">
                <label class="col-form-label fw-100">Historial crediticio</label>
                <br />
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="historial_crediticio1" id="historial_crediticio1"
                        value="Tengo tarjeta de crédito" wire:model.defer="createForm.historial_crediticio">
                    <label class="form-check-label" for="historial_crediticio1">Tengo tarjeta de crédito</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="historial_crediticio1" id="historial_crediticio2"
                        value="Tengo tarjeta de débito" wire:model.defer="createForm.historial_crediticio">
                    <label class="form-check-label" for="historial_crediticio2">Tengo tarjeta de débito</label>
                </div>
                @if ($errors->has('createForm.historial_crediticio'))
                    <span>{{ $errors->first('createForm.historial_crediticio') }}</span>
                @endif
            </div>
        </div>

        {{-- __________________________________ Roomie2 __________________________________ --}}
        <div class="form-group row">
            <div class="col-lg-12 col-md-6 col-12 mt-2 ocultar-roomie roomie1">
                <hr />
                <h2 class=" fw-100 text-secundary">Datos del primer roomie</h2>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 ocultar-roomie roomie1">
                <label for="name" class="col-form-label fw-100">Nombre</label>
                <input type="text" class="form-input" id="name" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm2.name" autocomplete="off">
                @if ($errors->has('createForm2.name'))
                    <span>{{ $errors->first('createForm2.name') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 ocultar-roomie roomie1">
                <label for="last_name" class="col-form-label fw-100">Apellidos</label>
                <input type="text" class="form-input" id="last_name" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm2.last_name" autocomplete="off">
                @if ($errors->has('createForm2.last_name'))
                    <span>{{ $errors->first('createForm2.last_name') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 ocultar-roomie roomie1">
                <label class="col-form-label fw-100">Identificación oficial</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="identificacion_oficial2"
                    wire:model.defer="identificacion_oficial2">
                <label for="identificacion_oficial2" class="form-input-file text-center"
                    id="file_identificacion_oficial2"><i class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('identificacion_oficial2'))
                    <span>{{ $errors->first('identificacion_oficial2') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 ocultar-roomie roomie1">
                <label for="email" class="col-form-label fw-100 mt-2">Correo
                    electrónico</label>
                <input type="email" class="form-input" id="email" maxlength="255"
                    wire:model.defer="createForm2.email" autocomplete="off">
                @if ($errors->has('createForm2.email'))
                    <span>{{ $errors->first('createForm2.email') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 ocultar-roomie roomie1">
                <label for="phone" class="col-form-label fw-100 mt-2">Teléfono</label>
                <input type="text" class="form-input" id="phone" onkeyup="onlyNumPhone(this)" maxlength="20"
                    wire:model.defer="createForm2.phone" autocomplete="off">
                @if ($errors->has('createForm2.phone'))
                    <span>{{ $errors->first('createForm2.phone') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie roomie1">
                <label for="fecha_nacimiento" class="col-form-label fw-100">Fecha de nacimiento</label>
                <input type="date" class="form-input" id="fecha_nacimiento"
                    wire:model.defer="createForm2.fecha_nacimiento" autocomplete="off">
                @if ($errors->has('createForm2.fecha_nacimiento'))
                    <span>{{ $errors->first('createForm2.fecha_nacimiento') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie roomie1">
                <label for="rfc" class="col-form-label fw-100">RFC</label>
                <input type="text" class="form-input" id="rfc" onkeyup="onlyLetrasNum(this)" maxlength="13"
                    wire:model.defer="createForm2.rfc" autocomplete="off">
                @if ($errors->has('createForm2.rfc'))
                    <span>{{ $errors->first('createForm2.rfc') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie roomie1">
                <label for="direccion_vivienda" class="col-form-label fw-100">Direccion vivienda actual</label>
                <input type="text" class="form-input" id="direccion_vivienda" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm2.direccion_vivienda" autocomplete="off">
                @if ($errors->has('createForm2.direccion_vivienda'))
                    <span>{{ $errors->first('createForm2.direccion_vivienda') }}</span>
                @endif
            </div>
            <div class="col-lg-12 col-md-12 col-12 mt-3 ocultar-roomie roomie1">
                <label for="documentacion" class="col-form-label fw-100">Documentación</label>
                <select class="form-input" id="documentacion" wire:model.defer="createForm2.documentacion"
                    onchange="tipoDocumentacion()">
                    <option value="" selected disabled>Selecciona una opción</option>
                    <option value="Comprobantes de nómina timbrados SAT (3 últimos meses)">Comprobantes de nómina
                        timbrados SAT (3 últimos meses)</option>
                    <option value="Estados de cuenta completos (3 meses)">Estados de cuenta completos (3 meses)</option>

                </select>

                @if ($errors->has('createForm2.documentacion'))
                    <span>{{ $errors->first('createForm2.documentacion') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta ocultar-roomie roomie1">
                <label class="col-form-label fw-100">Primer estado de cuenta</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="estado_cuenta_roomie1"
                    wire:model.defer="estado_cuenta_roomie1">
                <label for="estado_cuenta_roomie1" class="form-input-file text-center"
                    id="file_estado_cuenta_roomie1"><i class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('estado_cuenta_roomie1'))
                    <span>{{ $errors->first('estado_cuenta_roomie1') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta ocultar-roomie roomie1">
                <label class="col-form-label fw-100">Segundo estado de cuenta</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="estado_cuenta_roomie2"
                    wire:model.defer="estado_cuenta_roomie2">
                <label for="estado_cuenta_roomie2" class="form-input-file text-center"
                    id="file_estado_cuenta_roomie2"><i class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('estado_cuenta_roomie2'))
                    <span>{{ $errors->first('estado_cuenta_roomie2') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta ocultar-roomie roomie1">
                <label class="col-form-label fw-100">Tercer estado de cuenta</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="estado_cuenta_roomie3"
                    wire:model.defer="estado_cuenta_roomie3">
                <label for="estado_cuenta_roomie3" class="form-input-file text-center"
                    id="file_estado_cuenta_roomie3"><i class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('estado_cuenta_roomie3'))
                    <span>{{ $errors->first('estado_cuenta_roomie3') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 comprobante-nomina ocultar-roomie roomie1">
                <label class="col-form-label fw-100">Selecciona tus 6 archivos de nomina, de tus ultimos 3
                    meses</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="comprobante_nomina2"
                    name="nominas2[]" wire:model.defer="nominas2" multiple onchange="validarCantidadFiles()">
                <label for="comprobante_nomina2" class="form-input-file text-center" id="file_comprobante_nomina2"><i
                        class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tus archivos</label>
                @if ($errors->has('nominas2'))
                    <span>{{ $errors->first('nominas2') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie roomie1">
                <label class="col-form-label fw-100">Historial crediticio</label>
                <br />
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="historial_crediticio11"
                        id="historial_crediticio11" value="Tengo tarjeta de crédito"
                        wire:model.defer="createForm2.historial_crediticio">
                    <label class="form-check-label" for="historial_crediticio11">Tengo tarjeta de crédito</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="historial_crediticio11"
                        id="historial_crediticio22" value="Tengo tarjeta de débito"
                        wire:model.defer="createForm2.historial_crediticio">
                    <label class="form-check-label" for="historial_crediticio22">Tengo tarjeta de débito</label>
                </div>
                @if ($errors->has('createForm2.historial_crediticio'))
                    <span>{{ $errors->first('createForm2.historial_crediticio') }}</span>
                @endif
            </div>
        </div>
        {{-- __________________________________ Roomie3 __________________________________ --}}
        <div class="form-group row">
            <div class="col-lg-12 col-md-6 col-12 mt-2 ocultar-roomie roomie2">
                <hr />
                <h2 class=" fw-100 text-secundary">Datos del segundo roomie</h2>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 ocultar-roomie roomie2">
                <label for="name" class="col-form-label fw-100">Nombre</label>
                <input type="text" class="form-input" id="name" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm3.name" autocomplete="off">
                @if ($errors->has('createForm3.name'))
                    <span>{{ $errors->first('createForm3.name') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 ocultar-roomie roomie2">
                <label for="last_name" class="col-form-label fw-100">Apellidos</label>
                <input type="text" class="form-input" id="last_name" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm3.last_name" autocomplete="off">
                @if ($errors->has('createForm3.last_name'))
                    <span>{{ $errors->first('createForm3.last_name') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 ocultar-roomie roomie2">
                <label class="col-form-label fw-100">Identificación oficial</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="identificacion_oficial3"
                    wire:model.defer="identificacion_oficial3">
                <label for="identificacion_oficial3" class="form-input-file text-center"
                    id="file_identificacion_oficial3"><i class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('identificacion_oficial3'))
                    <span>{{ $errors->first('identificacion_oficial3') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 ocultar-roomie roomie2">
                <label for="email" class="col-form-label fw-100 mt-2">Correo
                    electrónico</label>
                <input type="email" class="form-input" id="email" maxlength="255"
                    wire:model.defer="createForm3.email" autocomplete="off">
                @if ($errors->has('createForm3.email'))
                    <span>{{ $errors->first('createForm3.email') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 ocultar-roomie roomie2">
                <label for="phone" class="col-form-label fw-100 mt-2">Teléfono</label>
                <input type="text" class="form-input" id="phone" onkeyup="onlyNumPhone(this)" maxlength="20"
                    wire:model.defer="createForm3.phone" autocomplete="off">
                @if ($errors->has('createForm3.phone'))
                    <span>{{ $errors->first('createForm3.phone') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie roomie2">
                <label for="fecha_nacimiento" class="col-form-label fw-100">Fecha de nacimiento</label>
                <input type="date" class="form-input" id="fecha_nacimiento"
                    wire:model.defer="createForm3.fecha_nacimiento" autocomplete="off">
                @if ($errors->has('createForm3.fecha_nacimiento'))
                    <span>{{ $errors->first('createForm3.fecha_nacimiento') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie roomie2">
                <label for="rfc" class="col-form-label fw-100">RFC</label>
                <input type="text" class="form-input" id="rfc" onkeyup="onlyLetrasNum(this)" maxlength="13"
                    wire:model.defer="createForm3.rfc" autocomplete="off">
                @if ($errors->has('createForm3.rfc'))
                    <span>{{ $errors->first('createForm3.rfc') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie roomie2">
                <label for="direccion_vivienda" class="col-form-label fw-100">Direccion vivienda actual</label>
                <input type="text" class="form-input" id="direccion_vivienda" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm3.direccion_vivienda" autocomplete="off">
                @if ($errors->has('createForm3.direccion_vivienda'))
                    <span>{{ $errors->first('createForm3.direccion_vivienda') }}</span>
                @endif
            </div>
            <div class="col-lg-12 col-md-12 col-12 mt-3 ocultar-roomie roomie2">
                <label for="documentacion" class="col-form-label fw-100">Documentación</label>
                <select class="form-input" id="documentacion" wire:model.defer="createForm3.documentacion"
                    onchange="tipoDocumentacion()">
                    <option value="" selected disabled>Selecciona una opción</option>
                    <option value="Comprobantes de nómina timbrados SAT (3 últimos meses)">Comprobantes de nómina
                        timbrados SAT (3 últimos meses)</option>
                    <option value="Estados de cuenta completos (3 meses)">Estados de cuenta completos (3 meses)</option>

                </select>

                @if ($errors->has('createForm3.documentacion'))
                    <span>{{ $errors->first('createForm3.documentacion') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta ocultar-roomie roomie2">
                <label class="col-form-label fw-100">Primer estado de cuenta</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="estado_cuenta_roomie11"
                    wire:model.defer="estado_cuenta_roomie11">
                <label for="estado_cuenta_roomie11" class="form-input-file text-center"
                    id="file_estado_cuenta_roomie11"><i class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('estado_cuenta_roomie11'))
                    <span>{{ $errors->first('estado_cuenta_roomie11') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta ocultar-roomie roomie2">
                <label class="col-form-label fw-100">Segundo estado de cuenta</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="estado_cuenta_roomie22"
                    wire:model.defer="estado_cuenta_roomie22">
                <label for="estado_cuenta_roomie22" class="form-input-file text-center"
                    id="file_estado_cuenta_roomie22"><i class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('estado_cuenta_roomie22'))
                    <span>{{ $errors->first('estado_cuenta_roomie22') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta ocultar-roomie roomie2">
                <label class="col-form-label fw-100">Tercer estado de cuenta</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="estado_cuenta_roomie33"
                    wire:model.defer="estado_cuenta_roomie33">
                <label for="estado_cuenta_roomie33" class="form-input-file text-center"
                    id="file_estado_cuenta_roomie33"><i class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('estado_cuenta_roomie33'))
                    <span>{{ $errors->first('estado_cuenta_roomie33') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 comprobante-nomina ocultar-roomie roomie2">
                <label class="col-form-label fw-100">Selecciona tus 6 archivos de nomina, de tus ultimos 3
                    meses</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="comprobante_nomina3"
                    name="nominas3[]" wire:model.defer="nominas3" multiple onchange="validarCantidadFiles()">
                <label for="comprobante_nomina3" class="form-input-file text-center" id="file_comprobante_nomina3"><i
                        class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tus archivos</label>
                @if ($errors->has('nominas3'))
                    <span>{{ $errors->first('nominas3') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie roomie2">
                <label class="col-form-label fw-100">Historial crediticio</label>
                <br />
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="historial_crediticio111"
                        id="historial_crediticio111" value="Tengo tarjeta de crédito"
                        wire:model.defer="createForm3.historial_crediticio">
                    <label class="form-check-label" for="historial_crediticio111">Tengo tarjeta de crédito</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="historial_crediticio111"
                        id="historial_crediticio222" value="Tengo tarjeta de débito"
                        wire:model.defer="createForm3.historial_crediticio">
                    <label class="form-check-label" for="historial_crediticio222">Tengo tarjeta de débito</label>
                </div>
                @if ($errors->has('createForm3.historial_crediticio'))
                    <span>{{ $errors->first('createForm3.historial_crediticio') }}</span>
                @endif
            </div>
        </div>
        {{-- __________________________________ Roomie4 __________________________________ --}}
        <div class="form-group row">
            <div class="col-lg-12 col-md-6 col-12 mt-2 ocultar-roomie roomie3">
                <hr />
                <h2 class=" fw-100 text-secundary">Datos del tercer roomie</h2>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 ocultar-roomie roomie3">
                <label for="name" class="col-form-label fw-100">Nombre</label>
                <input type="text" class="form-input" id="name" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm4.name" autocomplete="off">
                @if ($errors->has('createForm4.name'))
                    <span>{{ $errors->first('createForm4.name') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 ocultar-roomie roomie3">
                <label for="last_name" class="col-form-label fw-100">Apellidos</label>
                <input type="text" class="form-input" id="last_name" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm4.last_name" autocomplete="off">
                @if ($errors->has('createForm4.last_name'))
                    <span>{{ $errors->first('createForm4.last_name') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 ocultar-roomie roomie3">
                <label class="col-form-label fw-100">Identificación oficial</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="identificacion_oficial4"
                    wire:model.defer="identificacion_oficial4">
                <label for="identificacion_oficial4" class="form-input-file text-center"
                    id="file_identificacion_oficial4"><i class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('identificacion_oficial4'))
                    <span>{{ $errors->first('identificacion_oficial4') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 ocultar-roomie roomie3">
                <label for="email" class="col-form-label fw-100 mt-2">Correo
                    electrónico</label>
                <input type="email" class="form-input" id="email" maxlength="255"
                    wire:model.defer="createForm4.email" autocomplete="off">
                @if ($errors->has('createForm4.email'))
                    <span>{{ $errors->first('createForm4.email') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 ocultar-roomie roomie3">
                <label for="phone" class="col-form-label fw-100 mt-2">Teléfono</label>
                <input type="text" class="form-input" id="phone" onkeyup="onlyNumPhone(this)" maxlength="20"
                    wire:model.defer="createForm4.phone" autocomplete="off">
                @if ($errors->has('createForm4.phone'))
                    <span>{{ $errors->first('createForm4.phone') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie roomie3">
                <label for="fecha_nacimiento" class="col-form-label fw-100">Fecha de nacimiento</label>
                <input type="date" class="form-input" id="fecha_nacimiento"
                    wire:model.defer="createForm4.fecha_nacimiento" autocomplete="off">
                @if ($errors->has('createForm4.fecha_nacimiento'))
                    <span>{{ $errors->first('createForm4.fecha_nacimiento') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie roomie3">
                <label for="rfc" class="col-form-label fw-100">RFC</label>
                <input type="text" class="form-input" id="rfc" onkeyup="onlyLetrasNum(this)" maxlength="13"
                    wire:model.defer="createForm4.rfc" autocomplete="off">
                @if ($errors->has('createForm4.rfc'))
                    <span>{{ $errors->first('createForm4.rfc') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie roomie3">
                <label for="direccion_vivienda" class="col-form-label fw-100">Direccion vivienda actual</label>
                <input type="text" class="form-input" id="direccion_vivienda" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm4.direccion_vivienda" autocomplete="off">
                @if ($errors->has('createForm4.direccion_vivienda'))
                    <span>{{ $errors->first('createForm4.direccion_vivienda') }}</span>
                @endif
            </div>
            <div class="col-lg-12 col-md-12 col-12 mt-3 ocultar-roomie roomie3">
                <label for="documentacion" class="col-form-label fw-100">Documentación</label>
                <select class="form-input" id="documentacion" wire:model.defer="createForm4.documentacion"
                    onchange="tipoDocumentacion()">
                    <option value="" selected disabled>Selecciona una opción</option>
                    <option value="Comprobantes de nómina timbrados SAT (3 últimos meses)">Comprobantes de nómina
                        timbrados SAT (3 últimos meses)</option>
                    <option value="Estados de cuenta completos (3 meses)">Estados de cuenta completos (3 meses)</option>

                </select>

                @if ($errors->has('createForm4.documentacion'))
                    <span>{{ $errors->first('createForm4.documentacion') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta ocultar-roomie roomie3">
                <label class="col-form-label fw-100">Primer estado de cuenta</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="estado_cuenta_roomie111"
                    wire:model.defer="estado_cuenta_roomie111">
                <label for="estado_cuenta_roomie111" class="form-input-file text-center"
                    id="file_estado_cuenta_roomie111"><i class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('estado_cuenta_roomie111'))
                    <span>{{ $errors->first('estado_cuenta_roomie111') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta ocultar-roomie roomie3">
                <label class="col-form-label fw-100">Segundo estado de cuenta</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="estado_cuenta_roomie222"
                    wire:model.defer="estado_cuenta_roomie222">
                <label for="estado_cuenta_roomie222" class="form-input-file text-center"
                    id="file_estado_cuenta_roomie222"><i class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('estado_cuenta_roomie222'))
                    <span>{{ $errors->first('estado_cuenta_roomie222') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta ocultar-roomie roomie3">
                <label class="col-form-label fw-100">Tercer estado de cuenta</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="estado_cuenta_roomie333"
                    wire:model.defer="estado_cuenta_roomie333">
                <label for="estado_cuenta_roomie333" class="form-input-file text-center"
                    id="file_estado_cuenta_roomie333"><i class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('estado_cuenta_roomie333'))
                    <span>{{ $errors->first('estado_cuenta_roomie333') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 comprobante-nomina ocultar-roomie roomie3">
                <label class="col-form-label fw-100">Selecciona tus 6 archivos de nomina, de tus ultimos 3
                    meses</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="comprobante_nomina4"
                    name="nominas4[]" wire:model.defer="nominas4" multiple onchange="validarCantidadFiles()">
                <label for="comprobante_nomina4" class="form-input-file text-center" id="file_comprobante_nomina4"><i
                        class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tus archivos</label>
                @if ($errors->has('nominas4'))
                    <span>{{ $errors->first('nominas4') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie roomie3">
                <label class="col-form-label fw-100">Historial crediticio</label>
                <br />
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="historial_crediticio1111"
                        id="historial_crediticio1111" value="Tengo tarjeta de crédito"
                        wire:model.defer="createForm4.historial_crediticio">
                    <label class="form-check-label" for="historial_crediticio1111">Tengo tarjeta de crédito</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="historial_crediticio1111"
                        id="historial_crediticio2222" value="Tengo tarjeta de débito"
                        wire:model.defer="createForm4.historial_crediticio">
                    <label class="form-check-label" for="historial_crediticio2222">Tengo tarjeta de débito</label>
                </div>
                @if ($errors->has('createForm4.historial_crediticio'))
                    <span>{{ $errors->first('createForm4.historial_crediticio') }}</span>
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
            const cantidad_roomies = document.querySelector('#cantidad_roomies').value;
            const name = document.querySelector('#name').value;
            const last_name = document.querySelector('#last_name').value;
            const identificacion_oficial = document.querySelector('#identificacion_oficial').value;
            const email = document.querySelector('#email').value;
            const phone = document.querySelector('#phone').value;
            const fecha_nacimiento = document.querySelector('#fecha_nacimiento').value;
            const rfc = document.querySelector('#rfc').value;
            const direccion_vivienda = document.querySelector('#direccion_vivienda').value;
            const documentacion = document.querySelector('#documentacion').value;
            const estado_cuenta1 = document.querySelector('#estado_cuenta1').value;
            const estado_cuenta2 = document.querySelector('#estado_cuenta2').value;
            const estado_cuenta3 = document.querySelector('#estado_cuenta3').value;
            const comprobante_nomina1 = document.querySelector('#comprobante_nomina1').value;
            const historial_crediticio = document.querySelector('#historial_crediticio1').checked;
            const historial_crediticio2 = document.querySelector('#historial_crediticio2').checked;

            if (!compartira_renta1 && !compartira_renta2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Compartirá Renta</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (cantidad_roomies == '' && compartira_renta1) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Nombre</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (name == '' && compartira_renta1) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Nombre</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (last_name == '' && compartira_renta1) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Apellidos</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (identificacion_oficial == '' && compartira_renta1) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Identificación oficial</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (email == '' && compartira_renta1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Ups...',
                    html: 'El campo "<b>Email</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (!validar_email(email) && compartira_renta1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Ups...',
                    text: 'Tu email no es valido, escribelo correctamente',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (phone == '' && compartira_renta1) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Teléfono</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (phone.length < 10 && compartira_renta1 || phone.length > 20 && compartira_renta1) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El número no es valido',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (fecha_nacimiento == '' && compartira_renta1) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Fecha de nacimiento</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (rfc == '' && compartira_renta1) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>RFC</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (direccion_vivienda == '' && compartira_renta1) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Direccion vivienda actual</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (documentacion == '' && compartira_renta1) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Documentación</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (documentacion == 'Comprobantes de nómina timbrados SAT (3 últimos meses)' && !
                comprobante_nomina1 && compartira_renta1) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'Los campos "<b>Comprobantes de nómina</b>" no pueden quedar vacíos',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (documentacion == 'Estados de cuenta completos (3 meses)' && !estado_cuenta1 && !estado_cuenta2 &&
                !estado_cuenta3 && compartira_renta1) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'Los campos "<b>Estados de cuenta</b>" no pueden quedar vacíos',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (!historial_crediticio && !historial_crediticio2 && compartira_renta1) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Historial crediticio</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            }

            document.querySelector('.btn-loading').classList.add('d-none');
            document.querySelector('.loading-btn').classList.remove('d-none');

            setTimeout(function() {
                Livewire.emitTo('arendatario.roomies', 'registrarFormulario');
            }, 2000);

        }

        const documentos_nomina = document.getElementsByClassName("comprobante-nomina");
        for (let i = 0; i < documentos_nomina.length; i++) {
            documentos_nomina[i].classList.add('d-none');
        }

        const estados_cuenta = document.getElementsByClassName("estados-cuenta");
        for (let i = 0; i < estados_cuenta.length; i++) {
            estados_cuenta[i].classList.add('d-none');
        }

        const roomie1 = document.getElementsByClassName("roomie1");
        for (let i = 0; i < roomie1.length; i++) {
            roomie1[i].classList.add('d-none');
        }

        const roomie2 = document.getElementsByClassName("roomie2");
        for (let i = 0; i < roomie2.length; i++) {
            roomie2[i].classList.add('d-none');
        }

        const roomie3 = document.getElementsByClassName("roomie3");
        for (let i = 0; i < roomie3.length; i++) {
            roomie3[i].classList.add('d-none');
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

                document.querySelector(`#file_estado_cuenta1`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';
                document.querySelector(`#file_estado_cuenta2`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';
                document.querySelector(`#file_estado_cuenta3`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';

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

                document.querySelector(`#file_comprobante_nomina1`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tus archivos';
            }
        }

        const validarCantidadFiles = () => {
            const fileUpload = $("#comprobante_nomina1");

            if (parseInt(fileUpload.get(0).files.length) > 6 || parseInt(fileUpload.get(0).files.length) < 6) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Archivos incorrectos',
                    html: 'Tienes que seleccionar 6 archivos',
                    confirmButtonText: 'Aceptar',
                });
                document.querySelector('#comprobante_nomina1').value = "";
                document.querySelector(`#file_comprobante_nomina1`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tus archivos';
                return false;
            } else {
                for (let index = 0; index < fileUpload.get(0).files.length; index++) {

                    const fileName = fileUpload.get(0).files[index].name;
                    const fileSize = fileUpload.get(0).files[index].size;

                    if (fileSize > 2000000) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Tamaño no permitido',
                            html: `El archivo ${fileName} no debe de ser mayor a 2 megas`,
                            confirmButtonText: 'Aceptar',
                        });
                        document.querySelector('#comprobante_nomina1').value = "";
                        document.querySelector(`#file_comprobante_nomina1`).innerHTML =
                            '<i class="far fa-file-pdf "></i> Da click aquí para subir tus archivos';

                    } else {

                        let ext = fileName.split('.').pop();
                        ext = ext.toLowerCase();

                        const arrExtenciones = [
                            "jpg",
                            "JPG",
                            "jpeg",
                            "JPEG",
                            "png",
                            "PNG",
                            "pdf",
                            "PDF"
                        ];

                        let validarExtencion = arrExtenciones.includes(ext);
                        if (validarExtencion) {
                            document.querySelector('#file_comprobante_nomina1').innerHTML = '6 archivos seleccionados';
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Formato incorrecto',
                                html: `El archivo ${fileName} no tiene un formato valido. <br/>Formatos validos ( .jpg | .jpeg | .png | .pdf)`,
                                confirmButtonText: 'Aceptar',
                            });

                            document.querySelector('#comprobante_nomina1').value = "";
                            document.querySelector(`#file_comprobante_nomina1`).innerHTML =
                                '<i class="far fa-file-pdf "></i> Da click aquí para subir tus archivos';
                        }
                    }
                }
            }
        }

        const compartiraRenta = () => {
            const compartira_renta1 = document.querySelector('#compartira_renta1').checked;
            const compartira_renta2 = document.querySelector('#compartira_renta2').checked;

            if (compartira_renta1) {
                const roomies = document.getElementsByClassName(" ocultar-roomie");
                for (let i = 0; i < roomies.length; i++) {
                    roomies[i].classList.remove('d-none');
                }
            } else if (compartira_renta2) {
                const roomies = document.getElementsByClassName(" ocultar-roomie");
                for (let i = 0; i < roomies.length; i++) {
                    roomies[i].classList.add('d-none');
                }
            }

        }
        const validarCantidadRoomies = () => {
            const cantidad_roomies = document.querySelector('#cantidad_roomies').value;
            if (cantidad_roomies == '1') {
                const roomie1 = document.getElementsByClassName("roomie1");
                for (let i = 0; i < roomie1.length; i++) {
                    roomie1[i].classList.remove('d-none');
                }
                const roomie2 = document.getElementsByClassName("roomie2");
                for (let i = 0; i < roomie2.length; i++) {
                    roomie2[i].classList.add('d-none');
                }
                const roomie3 = document.getElementsByClassName("roomie3");
                for (let i = 0; i < roomie3.length; i++) {
                    roomie3[i].classList.add('d-none');
                }
            } else if (cantidad_roomies == '2') {
                const roomie2 = document.getElementsByClassName("roomie2");
                for (let i = 0; i < roomie2.length; i++) {
                    roomie2[i].classList.remove('d-none');
                }
                const roomie1 = document.getElementsByClassName("roomie1");
                for (let i = 0; i < roomie1.length; i++) {
                    roomie1[i].classList.remove('d-none');
                }
                const roomie3 = document.getElementsByClassName("roomie3");
                for (let i = 0; i < roomie3.length; i++) {
                    roomie3[i].classList.add('d-none');
                }
            } else if (cantidad_roomies == '3') {
                const roomie3 = document.getElementsByClassName("roomie3");
                for (let i = 0; i < roomie3.length; i++) {
                    roomie3[i].classList.remove('d-none');
                }

                const roomie2 = document.getElementsByClassName("roomie2");
                for (let i = 0; i < roomie2.length; i++) {
                    roomie2[i].classList.remove('d-none');
                }
                const roomie1 = document.getElementsByClassName("roomie1");
                for (let i = 0; i < roomie1.length; i++) {
                    roomie1[i].classList.remove('d-none');
                }
            }
        }
    </script>

    @push('script')
        <script>
            Livewire.on('errorDocumentosRoomies', function() {
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
