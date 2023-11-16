// Maneja el evento submit del formulario
document.getElementById('registrationForm').addEventListener('submit', function(event) {
    // Previene el envío predeterminado del formulario
    event.preventDefault();

    // Redirige al usuario después de enviar el formulario
    window.location.href = 'database.php';
});


