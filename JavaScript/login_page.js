// Existing password visibility toggle
const eye = document.getElementById("hide");
const password = document.getElementById("password");

<<<<<<< HEAD
$(document).ready(function(){
    $(".message_container").show().delay(4000).fadeOut(50);
});
=======
eye.onclick = () => {
    if (password.type === "password") {
        password.type = "text";
        eye.className = 'bi-eye-fill';
    } else {
        password.type = "password";
        eye.className = 'bi-eye-slash-fill';
    }
};
>>>>>>> 08aa88696f7510739278db19c899069ffdc27a13

// Existing input trimming logic
const input = document.getElementById("name");
input.value = input.value.trim();

// ========================
// Toast Notification Logic
// ========================
document.addEventListener("DOMContentLoaded", function () {
    // Function to display a Toast
    function showToast(message, type) {
        const toastContainer = document.createElement("div");
        toastContainer.className = `toast-container ${type}`;
        toastContainer.innerText = message;

        document.body.appendChild(toastContainer);

        // Automatically remove the toast after 3 seconds
        setTimeout(() => {
            toastContainer.remove();
        }, 3000);
    }

    // Handle form submission
    const loginForm = document.getElementById("login");
    loginForm.addEventListener("submit", function (e) {
        const username = document.getElementById("name").value.trim();
        const userPassword = document.getElementById("password").value.trim();

        if (!username || !userPassword) {
            e.preventDefault(); // Prevent form submission if fields are empty
            showToast("Please fill out all fields.", "error");
        } else {
            // Allow form submission to proceed to the next page
            showToast("Logging in...", "success");
        }
    });
});

// ========================
// CSS for Toast Notification
// ========================
const style = document.createElement("style");
style.innerHTML = `
.toast-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #323232;
    color: white;
    padding: 10px 15px;
    border-radius: 5px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    font-family: 'Montserrat', sans-serif;
    z-index: 1000;
    animation: fadeInOut 3s ease;
}

.toast-container.success {
    background-color: #28a745;
}

.toast-container.error {
    background-color: #dc3545;
}

@keyframes fadeInOut {
    0%, 90% {
        opacity: 1;
        transform: translateY(0);
    }
    100% {
        opacity: 0;
        transform: translateY(20px);
    }
}
`;
document.head.appendChild(style);
// End of Toast Notification logic
