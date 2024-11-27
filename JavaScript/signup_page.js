window.history.forward();

        const eye = document.getElementById("hide");
        const password = document.getElementById("password");

        eye.onclick = (icon) => {
            if (password.type == "password") {
                password.type = "text";
                eye.className = 'bi-eye-fill';
            } else {
                password.type = "password";
                eye.className = 'bi-eye-slash-fill';
            }
        }

        const input = document.getElementById("name");
        input.value = input.value.trim();

