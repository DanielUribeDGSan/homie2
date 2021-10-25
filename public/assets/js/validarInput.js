
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
