
function onlyLetrasNum(input) {
    var regex = /[$%&|<>#.]/;
    input.value = input.value.replace(regex, "");
}

function onlyEmail(input) {
    var regex = /[$%&|<>#]/;
    input.value = input.value.replace(regex, "");
}

function onlyNum(input) {
    var regex = /[^+12345678910]/gi;;
    input.value = input.value.replace(regex, "");
}

const validar_email = (email) => {
    const regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
};

const verPassword = (input) => {
    const inputVerPssword = document.querySelector('#verPassword');
    inputVerPssword.innerHTML = `${input.value}`;
}

const showFile = (id, name) => {

    const file_label = document.querySelector(`#file_${id}`);

    if (name.length > 18) {
        file_label.innerHTML = `Archivo seleccionado: ${name.substr(0, 18)}...`;
    } else {
        file_label.innerHTML = `Archivo seleccionado: ${name}`;
    }
}

$(document).on('change', 'input[type="file"]', function () {

    const fileName = this.files[0].name;
    const fileSize = this.files[0].size;

    if (fileSize > 2000000) {
        Swal.fire({
            icon: 'warning',
            title: 'Tamaño no permitido',
            html: 'El archivo no debe de ser mayor a 2 megas',
            confirmButtonText: 'Aceptar',
        });
        this.value = '';
        document.querySelector(`#file_${this.id}`).innerHTML = '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';

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
            showFile(this.id, this.files[0].name);
        } else {
            Swal.fire({
                icon: 'warning',
                title: 'Formato incorrecto',
                html: 'El formato de tu archivo no es valido. <br/>Formatos validos ( .jpg | .jpeg | .png | .pdf)',
                confirmButtonText: 'Aceptar',
            });

            document.querySelector(`#file_${this.id}`).innerHTML = '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';
            this.value = '';
        }

    }
});