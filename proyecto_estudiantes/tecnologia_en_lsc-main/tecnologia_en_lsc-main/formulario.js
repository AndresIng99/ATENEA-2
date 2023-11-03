const formulario = document.getElementById('register_modal');
const inputs = document.querySelectorAll('#register_modal input');

const expresiones = {
    pass: /^{4,12}$/, // 4 a 12 digitos.
}

const validarFormulario = (e) => {
    switch (e.target.name) {
        case "pass":
            if(expresiones.pass.test(e.target.value)) {
            } else {
                document.getElementById('inputcontra').classList.add('register_modal_incorrecto');
            }
        break;
        case "pass2":

        break;
        case "pass2":  
        
        break;
    }
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
    e.preventDefault();
});