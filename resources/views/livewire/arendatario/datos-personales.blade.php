<div x-data class="mt-3" wire:ignore>
    <form onsubmit="return datosPersonales(event)">
        <div class="form-group row">
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label class="col-form-label fw-100">Tipo de persona</label><br />
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="tipo_persona" id="tipo_persona1" value="Moral"
                        wire:model.defer="createForm.tipo_persona">
                    <label class="form-check-label" for="tipo_persona1">Moral</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="tipo_persona" id="tipo_persona2" value="Fisica"
                        wire:model.defer="createForm.tipo_persona">
                    <label class="form-check-label" for="tipo_persona2">Fisica</label>
                </div>
                @if ($errors->has('createForm.tipo_persona'))
                    <span>{{ $errors->first('createForm.tipo_persona') }}</span>
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
                <label for="fecha_nacimiento" class="col-form-label fw-100">Fecha de nacimiento</label>
                <input type="date" class="form-input" id="fecha_nacimiento"
                    wire:model.defer="createForm.fecha_nacimiento" autocomplete="off">
                @if ($errors->has('createForm.fecha_nacimiento'))
                    <span>{{ $errors->first('createForm.fecha_nacimiento') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="estado_civil" class="col-form-label fw-100">Estado civil</label>
                <select class="form-input" id="estado_civil" wire:model.defer="createForm.estado_civil">
                    <option value="" selected disabled>Selecciona una opción</option>
                    <option value="Soltero">Soltero</option>
                    <option value="Casado">Casado</option>
                    <option value="Otro">Otro</option>
                </select>
                @if ($errors->has('createForm.estado_civil'))
                    <span>{{ $errors->first('createForm.estado_civil') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="ingresos_netos" class="col-form-label fw-100">Ingresos netos mensuales</label>
                <input type="text" class="form-input" id="ingresos_netos" onkeyup="onlyNum(this)" maxlength="255"
                    wire:model.defer="createForm.ingresos_netos" autocomplete="off">
                @if ($errors->has('createForm.ingresos_netos'))
                    <span>{{ $errors->first('createForm.ingresos_netos') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
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
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="direccion_vivienda" class="col-form-label fw-100">Direccion vivienda actual</label>
                <input type="text" class="form-input" id="direccion_vivienda" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm.direccion_vivienda" autocomplete="off">
                @if ($errors->has('createForm.direccion_vivienda'))
                    <span>{{ $errors->first('createForm.direccion_vivienda') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="institucion_educativa" class="col-form-label fw-100">Institución Educativa</label>
                <input type="text" class="form-input" id="institucion_educativa" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm.institucion_educativa" autocomplete="off">
                @if ($errors->has('createForm.institucion_educativa'))
                    <span>{{ $errors->first('createForm.institucion_educativa') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
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
                @if ($errors->has('createForm.historial_crediticio'))
                    <span>{{ $errors->first('createForm.historial_crediticio') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label class="col-form-label fw-100">Trabajo</label>
                <br />
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="trabajo" id="trabajo1" value="Empleado"
                        wire:model.defer="createForm.trabajo" onchange="trabajoEmpleado()">
                    <label class="form-check-label" for="trabajo1">Empleado</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="trabajo" id="trabajo2" value="Independiente"
                        wire:model.defer="createForm.trabajo" onchange="trabajoIndependiente()">
                    <label class="form-check-label" for="trabajo2">Independiente</label>
                </div>
                @if ($errors->has('createForm.trabajo'))
                    <span>{{ $errors->first('createForm.trabajo') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6 col-md-6 col-12 mt-3 nombre-empresa">
                <label for="empresa" class="col-form-label fw-100">Nombre de la empresa</label>
                <input type="text" class="form-input" id="empresa" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm.empresa" autocomplete="off">
                @if ($errors->has('createForm.empresa'))
                    <span>{{ $errors->first('createForm.empresa') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 actividad-empresa">
                <label for="actividad_empresa" class="col-form-label fw-100">Actividad de la empresa</label>
                <input type="text" class="form-input" id="actividad_empresa" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm.actividad_empresa" autocomplete="off">
                @if ($errors->has('createForm.actividad_empresa'))
                    <span>{{ $errors->first('createForm.actividad_empresa') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
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
        <div class="form-group row">
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta">
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
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta">
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
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta">
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
            <div class="col-lg-6 col-md-6 col-12 mt-3 comprobante-nomina">
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

        </div>
        <div class="form-group row">
            <div class="col-6 mt-5">
                <button type="submit" class="btn btn-orange-sm btn-loading">Siguiente</button>
                <div class="loading-btn d-none">
                    <x-loading />
                </div>
            </div>
            <div class="col-6 mt-5 d-flex align-items-center justify-content-end">
                <article>
                    <h1 class="text-secundary">1/3</h1>
                </article>
            </div>
        </div>
    </form>
    <script>
        const datosPersonales = (e) => {
            e.preventDefault();

            const tipo_persona = document.querySelector('#tipo_persona1').checked;
            const tipo_persona2 = document.querySelector('#tipo_persona2').checked;
            const rfc = document.querySelector('#rfc').value;
            const fecha_nacimiento = document.querySelector('#fecha_nacimiento').value;
            const estado_civil = document.querySelector('#estado_civil').value;
            const ingresos_netos = document.querySelector('#ingresos_netos').value;
            const identificacion_oficial = document.querySelector('#identificacion_oficial').value;
            const direccion_vivienda = document.querySelector('#direccion_vivienda').value;
            const institucion_educativa = document.querySelector('#institucion_educativa').value;
            const historial_crediticio = document.querySelector('#historial_crediticio1').checked;
            const historial_crediticio2 = document.querySelector('#historial_crediticio2').checked;
            const trabajo = document.querySelector('#trabajo1').checked;
            const trabajo2 = document.querySelector('#trabajo2').checked;
            const empresa = document.querySelector('#empresa').value;
            const actividad_empresa = document.querySelector('#actividad_empresa').value;
            const documentacion = document.querySelector('#documentacion').value;
            const estado_cuenta1 = document.querySelector('#estado_cuenta1').value;
            const estado_cuenta2 = document.querySelector('#estado_cuenta2').value;
            const estado_cuenta3 = document.querySelector('#estado_cuenta3').value;
            const comprobante_nomina1 = document.querySelector('#comprobante_nomina1').value;

            if (!tipo_persona && !tipo_persona2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Tipo de persona</b>" no puede quedar vacío',
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
            } else if (fecha_nacimiento == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Fecha de nacimiento</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (estado_civil == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Estado civil</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (ingresos_netos == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Ingresos netos mensuales</b>" no puede quedar vacío',
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
            } else if (direccion_vivienda == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Direccion vivienda actual</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (institucion_educativa == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Institución Educativa</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (!historial_crediticio && !historial_crediticio2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Historial crediticio</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (!trabajo && !trabajo2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Trabajo</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (empresa == '' && trabajo) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Nombre de la empresa</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (actividad_empresa == '' && trabajo2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Actividad de la empresa</b>" no puede quedar vacío',
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
                comprobante_nomina1) {
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
            }

            document.querySelector('.btn-loading').classList.add('d-none');
            document.querySelector('.loading-btn').classList.remove('d-none');

            setTimeout(function() {
                Livewire.emitTo('arendatario.datos-personales', 'registrarFormulario');
            }, 2000);

        }

        document.querySelector('.nombre-empresa').classList.add('d-none');
        document.querySelector('.actividad-empresa').classList.add('d-none');

        const documentos_nomina = document.getElementsByClassName("comprobante-nomina");
        for (let i = 0; i < documentos_nomina.length; i++) {
            documentos_nomina[i].classList.add('d-none');
        }
        const estados_cuenta = document.getElementsByClassName("estados-cuenta");
        for (let i = 0; i < estados_cuenta.length; i++) {
            estados_cuenta[i].classList.add('d-none');
        }

        const trabajoEmpleado = () => {
            const trabajo = document.querySelector('#trabajo1').checked;
            const nombre_empresa = document.querySelector('.nombre-empresa');
            const actividad_empresa = document.querySelector('.actividad-empresa');

            if (trabajo) {
                actividad_empresa.classList.remove('d-block');
                actividad_empresa.classList.add('d-none');
                nombre_empresa.classList.remove('d-none');
            }
        }

        const trabajoIndependiente = () => {
            const trabajo2 = document.querySelector('#trabajo2').checked;
            const nombre_empresa = document.querySelector('.nombre-empresa');
            const actividad_empresa = document.querySelector('.actividad-empresa');

            if (trabajo2) {
                nombre_empresa.classList.remove('d-block');
                nombre_empresa.classList.add('d-none');
                actividad_empresa.classList.remove('d-none');
            }
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
    </script>

    @push('script')
        <script>
            Livewire.on('errorDocumentos', function() {
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
