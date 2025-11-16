document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("loginForm");

    if (!form) return;

    form.addEventListener("submit", (e) => {
        e.preventDefault();

        const email = document.getElementById("email");
        const password = document.getElementById("password");
        let isValid = true;

        // Validación de email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!email.value.trim() || !emailRegex.test(email.value)) {
            email.classList.add("is-invalid");
            isValid = false;
        } else {
            email.classList.remove("is-invalid");
        }

        // Validación de password
        if (!password.value.trim()) {
            password.classList.add("is-invalid");
            isValid = false;
        } else {
            password.classList.remove("is-invalid");
        }

        if (!isValid) return;

        // Idioma actual
        const currentLang = localStorage.getItem("loginLang") || "en";

        // ⚠️ RUTA CORREGIDA — usa TEMPLATE LITERAL REAL
        fetch(`../lang/login-${currentLang}.json`)
            .then((res) => res.json())
            .then((data) => {
                alert(data.login_success || "Login successful!");
            })
            .catch(() => {
                alert("Error loading language file.");
            });

        form.reset();
    });
});
