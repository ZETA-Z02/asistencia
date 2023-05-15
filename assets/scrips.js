const form = document.getElementById('my-form');
const passwordInput = form.elements['contraseña'];
const confirmPasswordInput = form.elements['contraseña1'];

function resetConfirmPasswordValidation() {
    confirmPasswordInput.setCustomValidity('');
    form.reportValidity();
}

confirmPasswordInput.addEventListener('input', resetConfirmPasswordValidation);

form.addEventListener('submit', function(event) {
    const password = passwordInput.value;
    const confirmPassword = confirmPasswordInput.value;

    if (password !== confirmPassword) {
        console.log("Las contraseñas NO coinciden");
        confirmPasswordInput.setCustomValidity("Las contraseñas no coinciden");
        form.reportValidity();
        event.preventDefault(); // Cancela el envío del formulario
    } else {
        console.log("Las contraseñas coinciden");
        form.submit();

        
    }
});