// login.js

document.addEventListener('DOMContentLoaded', function () {
    // Toggle password visibility (Login Form)
    const togglePassword = document.getElementById('togglePassword');
    const passwordField = document.getElementById('password');
    if (togglePassword && passwordField) {
        togglePassword.addEventListener('click', function () {
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;

            const icon = togglePassword.querySelector('i');
            if (icon) {
                icon.classList.toggle('ri-eye-line', type === 'password');
                icon.classList.toggle('ri-eye-off-line', type === 'text');
            }
        });
    }

    // Toggle password visibility (Register Form)
    const toggleRegisterPassword = document.getElementById('toggleRegisterPassword');
    const registerPasswordField = document.getElementById('registerPassword');
    if (toggleRegisterPassword && registerPasswordField) {
        toggleRegisterPassword.addEventListener('click', function () {
            const type = registerPasswordField.type === 'password' ? 'text' : 'password';
            registerPasswordField.type = type;

            const icon = toggleRegisterPassword.querySelector('i');
            if (icon) {
                icon.classList.toggle('ri-eye-line', type === 'password');
                icon.classList.toggle('ri-eye-off-line', type === 'text');
            }
        });
    }

    // Toggle confirm password visibility
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const confirmPasswordField = document.getElementById('confirmPassword');
    if (toggleConfirmPassword && confirmPasswordField) {
        toggleConfirmPassword.addEventListener('click', function () {
            const type = confirmPasswordField.type === 'password' ? 'text' : 'password';
            confirmPasswordField.type = type;

            const icon = toggleConfirmPassword.querySelector('i');
            if (icon) {
                icon.classList.toggle('ri-eye-line', type === 'password');
                icon.classList.toggle('ri-eye-off-line', type === 'text');
            }
        });
    }

    // Custom checkbox toggle
    const checkbox = document.getElementById('remember');
    const customCheckbox = document.getElementById('customCheckbox');
    if (checkbox && customCheckbox) {
        const checkIcon = customCheckbox.querySelector('i');
        customCheckbox.addEventListener('click', function () {
            checkbox.checked = !checkbox.checked;

            if (checkbox.checked) {
                customCheckbox.classList.add('bg-primary', 'border-primary');
                if (checkIcon) checkIcon.classList.remove('hidden');
            } else {
                customCheckbox.classList.remove('bg-primary', 'border-primary');
                if (checkIcon) checkIcon.classList.add('hidden');
            }
        });
    }

    // Login/Register form switch
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const showRegister = document.getElementById('showRegister');
    const showLogin = document.getElementById('showLogin');

    if (showRegister && loginForm && registerForm) {
        showRegister.addEventListener('click', function (e) {
            e.preventDefault();
            loginForm.classList.add('hidden');
            registerForm.classList.remove('hidden');
        });
    }

    if (showLogin && loginForm && registerForm) {
        showLogin.addEventListener('click', function (e) {
            e.preventDefault();
            registerForm.classList.add('hidden');
            loginForm.classList.remove('hidden');
        });
    }
});
