var aleatorio = Math.floor(Math.random() * 100) + 1;
var intentos = 0;


function comprobarNumero() {
    var numero_usuario = parseInt(document.getElementById('num_usuario').value);
    var resultado = document.getElementById('resultado');


    if (isNaN(numero_usuario) || numero_usuario < 1 || numero_usuario > 100) {
        resultado.textContent = 'Por favor ingrese un número válido';
    }else{
        intentos++;
        if (numero_usuario === aleatorio) {
            resultado.textContent = 'Bien Jugado has Acertado el número en '+ intentos +' intentos';
        } else if (numero_usuario < aleatorio){
            resultado.textContent = 'estas por debajo del número a adivinar';
        }else{
            resultado.textContent = 'estas por encima del número a adivinar';
        }
    }
}