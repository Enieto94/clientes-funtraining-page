/**
 * Permite ingresar solo números
 */
function soloNumeros(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) return true;
    patron = /^[0-9]*$/;

    te = String.fromCharCode(tecla);
    return patron.test(te);
}

/**
 * Permite ingresar solo letras
 */
function soloLetras(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) return true;
    patron = /^([A-Za-zÑñáéíóúÁÉÍÓÚ ]+)$/;

    te = String.fromCharCode(tecla);
    return patron.test(te);
}

/**
 * Permite ingresar solo usuario
 */
function soloUsuario(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) return true;
    patron = /^([A-Za-zÑñáéíóúÁÉÍÓÚ0-9]+)$/;

    te = String.fromCharCode(tecla);
    return patron.test(te);
}

/**
 * Permite ingresar solo NIT
 */
function soloNit(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) return true;
    patron = /^([0-9-]+)$/;

    te = String.fromCharCode(tecla);
    return patron.test(te);
}

/**
 * Permite ingresar correos
 */
function soloEmail(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) return true;
    patron = /^([0-9A-Za-zÑñáéíóúÁÉÍÓÚ.@-_]+)$/;

    te = String.fromCharCode(tecla);
    return patron.test(te);
}

/**
 * Permite ingresar solo letras y números
 */
function soloLetrasNumeros(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) return true;
    patron = /^([0-9A-Za-zÑñáéíóúÁÉÍÓÚ,. ]+)$/;

    te = String.fromCharCode(tecla);
    return patron.test(te);
}

/**
 * Permite ingresar nombres de productos
 */
function soloNombresProductos(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) return true;
    patron = /^([0-9A-Za-zÑñáéíóúÁÉÍÓÚ,.\(\)\/ ]+)$/;

    te = String.fromCharCode(tecla);
    return patron.test(te);
}

/**
 * Permite ingresar solo contraseñas
 */
function soloPass(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) return true;
    patron = /^([0-9A-Za-zÑñáéíóúÁÉÍÓÚ@-_;.]+)$/;

    te = String.fromCharCode(tecla);
    return patron.test(te);
}

/**
 * Permite ingresar solo fechas
 */
function soloFecha(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) return true;
    patron = /^([0-9/]+)$/;

    te = String.fromCharCode(tecla);
    return patron.test(te);
}

/**
 * Permite solo direccion
 */
function soloDireccion(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) return true;
    patron = /^([0-9A-Za-zÑñáéíóúÁÉÍÓÚ#. ]+)$/;

    te = String.fromCharCode(tecla);
    return patron.test(te);
}

/**
 * Permite solo pagina web
 */
function soloDireccionWeb(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) return true;
    patron = /^([0-9A-Za-z-./:]+)$/;

    te = String.fromCharCode(tecla);
    return patron.test(te);
}

/**
 * Permite validar un campo select
 */
function validarSelect(texto, identificador) {

    if (texto != '') {
        $(identificador).val(texto);
    }
}

/**
 * Permite validar correo electrónico
 */
function validarEmail(txtMail) {
    var patron = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/;

    return patron.test(txtMail);
}

/**
 * Permite que solo se ingrese un maximo de caracteres en el input
 */
function validaMaximo(elemento, numMax) {
    var numTxt = elemento.val().length; // Número de caracteres actuales en el input
    var numero_maximo = numMax - 1;

    if (numTxt > numero_maximo) {
        return false;
    } else {
        return true;
    }
}

function validaMayorDeEdad(userBirthDate) {
    const thisYear = new Date().getFullYear();
    const eighteenYearsAgo = thisYear - 18;
    let userYear = new Date(userBirthDate).getFullYear();

    if (userYear > eighteenYearsAgo) {
        return false;
    }
    return true;
}

/**
 * This function capitalize a string
 * @return String capitalized
 */
function capitalizeString(arg_string) {
    return arg_string.charAt(0).toUpperCase() + arg_string.slice(1);
}

// Swal.fire({
//     position: 'top-end',
//     icon: 'success',
//     title: "Te has registrado satisfactoriamente!",
//     showConfirmButton: false,
//     timer: 1500
// });

function setCookie(cookieName, cookieValue, expirationDays = 1) {
    let date = new Date();
    date.setTime(date.getTime() + (expirationDays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + date.toUTCString();

    document.cookie = cookieName + "=" + cookieValue + ";" + expires + ";path=/";
}

function getCookie(cookieName) {
    const name = cookieName + "=";
    const decodedCookie = decodeURIComponent(document.cookie);
    const cookiesArray = decodedCookie.split(';');

    for (let i = 0; i < cookiesArray.length; i++) {
        let cookie = cookiesArray[i];

        while (cookie.charAt(0) === ' ') {
            cookie = cookie.substring(1);
        }

        if (cookie.indexOf(name) === 0) {
            return cookie.substring(name.length, cookie.length);
        }
    }

    return "";
}

/**
 * API
 */
const API_URL = 'http://localhost:8000/api';
// const API_URL = 'https://api.funtraining.net/api';

/**
 * AXIOS
 */
// const AXIOS_CONFIG = {
//     // validateStatus: function (status) {}
// }