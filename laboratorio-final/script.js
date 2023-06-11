const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

formulario.noValidate = true;

const expresiones = {
	name: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, 
    apellido1: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
	email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,  //tiene que tener un @
    password: /^.{8,}$/, 
}


var inputNombre = document.getElementById('name');
var inputApellido1 = document.getElementById('apellido1');
var inputEmail = document.getElementById('email');
var inputpassword = document.getElementById("password");
var inputpasswordConfirm = document.getElementById('passwordConfirm');

var spanNombre = document.getElementById('nombreErroneo');
var spanApellido1 = document.getElementById('apellido1');
var spanEmail = document.getElementById('emailErroneo');
var spanpassword= document.getElementById('passwordErronea');
var spanpasswordConfirm = document.getElementById('passwordConfirmadaErronea');


inputNombre.oninput = function () {
    validarNombre();
};


inputApellido1.oninput = function () {
    validarApellido1();
};

inputEmail.oninput = function () {
    validarEmail();
};

inputpassword.oninput = function () {
    validarpassword ();
};

inputpasswordConfirm.oninput = function () {
    validarpasswordConfirm ();
}; 


function validarNombre() {
    if (!inputNombre.value) {
        spanNombre.style.display = "block"
        spanNombre.innerHTML = 'Rellene este campo';
        inputNombre.classList.add('input-nombre')
    } else if
        (!expresiones.name.test(inputNombre.value)) {
        inputNombre.setAttribute("valid", false)
        spanNombre.style.display = "block"
        spanNombre.innerHTML = 'Nombre inv&aacute;lido';
        inputNombre.classList.add('input-nombre')
    } else {
        spanNombre.style.display = "none"
        spanNombre.innerHTML = '';
    }
};


function validarApellido1() {
    if (!inputApellido1.value) {
        spanApellido1.style.display = "block"
        spanApellido1.innerHTML = 'Rellene este campo';
        inputApellido1.classList.add('input-apellido1')
    } else if
        (!expresiones.apellido1.test(inputApellido1.value)) {
        inputApellido1.setAttribute("valid", false)
        spanApellido1.style.display = "block"
        spanApellido1.innerHTML = 'Apellido no válido';
        inputApellido1.classList.add('input-apellido1')
    } else {
        spanApellido1.style.display = "none"
        spanApellido1.innerHTML = '';
    }
};


function validarEmail() {
    if (!inputEmail.value) {
        spanEmail.style.display = "block"
        spanEmail.innerHTML = 'Rellene este campo';
        inputEmail.classList.add('input-email')
    } else if
        (!expresiones.email.test(inputEmail.value)) {
        inputEmail.setAttribute("valid", false)
        spanEmail.style.display = "block"
        spanEmail.innerHTML = 'Email inv&aacute;lido';
        inputEmail.classList.add('input-email')
    } else {
        spanEmail.style.display = "none"
        spanEmail.innerHTML = '';
    }
};

function validarpassword () {
    if (!inputpassword.value) {
        spanpassword.style.display = "block"
        spanpassword.innerHTML = 'Rellene este campo';
        inputpassword.classList.add('input-password')
    } else if
        (!expresiones.password.test(inputpassword.value)) {
        inputpassword.setAttribute("valid", false)
        spanpassword.style.display = "block"
        spanpassword.innerHTML = 'Debe contener al menos 8 carácteres';
        inputpassword.classList.add('input-password')
    } else {
        spanpassword.style.display = "none"
        spanpassword.innerHTML = '';
    }
};



formulario.onsubmit = function (e) {
    e.preventDefault();
    this.checkValidity()
        ? alert('La inscripción se ha completado correctamente :)!!')
        : (
            validarNombre(),
            validarApellido1(),
            validarEmail(),
            validarpassword()
        );
};
