document.addEventListener('DOMContentLoaded', function() {
    var emailInput = document.getElementById('email');
    var passwordInput = document.getElementById('password');
    var emailError = document.getElementById('emailError');
    var passwordError = document.getElementById('passwordError');

    emailInput.addEventListener('input', function() {
        if (!validateEmail(emailInput.value)) {
            emailError.style.display = 'block';
        } else {
            emailError.style.display = 'none';
        }
    });

    passwordInput.addEventListener('input', function() {
        if (!validatePassword(passwordInput.value)) {
            passwordError.style.display = 'block';
        } else {
            passwordError.style.display = 'none';
        }
    });

    function validateEmail(email) {
        // Expression régulière pour valider un email
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function validatePassword(password) {
        // Expression régulière pour valider le mot de passe
        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,}$/;
        return passwordRegex.test(password);
    }
});
