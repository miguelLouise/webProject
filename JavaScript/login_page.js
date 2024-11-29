// window.addEventListener('popstate', function() {
//     console.log('Back button clicked!');
//     // Add your desired actions here
//   });

$(document).ready(function(){
    $(".message_container").show().delay(4000).fadeOut(50);
});

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