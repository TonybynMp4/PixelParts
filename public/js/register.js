document.addEventListener('DOMContentLoaded', function() {
    /* password
    passwordConfirmation
     */
    const password = document.getElementById('password');
    const passwordConfirmation = document.getElementById('passwordConfirmation');

    password.addEventListener('input', function() {
        console.log(password.value.length);
        if (password.value.length < 8) {
            password.setCustomValidity('Le mot de passe doit contenir au moins 8 caractères');
        } else {
            password.setCustomValidity('');
        }

        if (password.value !== passwordConfirmation.value) {
            passwordConfirmation.setCustomValidity('Mots de passe non identiques');
        } else {
            passwordConfirmation.setCustomValidity('');
        }
    });

    passwordConfirmation.addEventListener('input', function() {
        if (password.value !== passwordConfirmation.value) {
            passwordConfirmation.setCustomValidity('Mots de passe non identiques');
        } else {
            passwordConfirmation.setCustomValidity('');
        }
    });
});