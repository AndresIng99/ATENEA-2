newFunction();
function newFunction() {
    const importeSlider = document.getElementById("importeSlider");
    const importeValue = document.getElementById("importeValue");
    const plazoSlider = document.getElementById("plazoSlider");
    const plazoValue = document.getElementById("plazoValue");

    importeSlider.addEventListener("input", () => {
        importeValue.textContent = `$${importeSlider.value.replace(/\B(?=(\d{3})+(?!\d))/g, ",")}`;
    });

    plazoSlider.addEventListener("input", () => {
        plazoValue.textContent = `${plazoSlider.value} días`;
    });
}


var buttons = document.getElementsByName('register_btn');
for (var i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener('click', function() {
        window.location.href = 'registro.php'; // Reemplaza 'registro.html' con la URL de la página a la que deseas redirigir al usuario.
    });
}


// Maneja el evento submit del formulario
document.getElementById('registrationForm').addEventListener('submit', function(event) {
    // Previene el envío predeterminado del formulario
    event.preventDefault();

    // Redirige al usuario después de enviar el formulario
    window.location.href = 'database.php';
});



