<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="..//css//chatbot.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="chatbot_container" id="chatbot_ctn">
        <div class="chatbot_div">
            <div class="chatbot_header">
                chatbot header

            </div>
        </div>
    </div>
    <div class="chatbot_icon" id="chatbot_btn">
        <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#42326E" id="chtbt_icon">
            <path d="M440-120v-66.67h333.33V-484q0-121.46-85.38-206.06-85.38-84.61-207.95-84.61t-207.95 84.61q-85.38 84.6-85.38 206.06v244H160q-33 0-56.5-23.5T80-320v-80q0-21 10.5-39.5T120-469l3-53q8-68 39.5-126t79-101q47.5-43 109-67T480-840q68 0 129 24t109 66.5Q766-707 797-649t40 126l3 52q19 9 29.5 27t10.5 38v92q0 20-10.5 38T840-249v62.33q0 27.5-19.58 47.09Q800.83-120 773.33-120H440Zm-80.12-286.67q-14.21 0-23.71-9.61-9.5-9.62-9.5-23.84 0-14.21 9.61-23.71 9.62-9.5 23.84-9.5 14.21 0 23.71 9.61 9.5 9.62 9.5 23.84 0 14.21-9.61 23.71-9.62 9.5-23.84 9.5Zm240 0q-14.21 0-23.71-9.61-9.5-9.62-9.5-23.84 0-14.21 9.61-23.71 9.62-9.5 23.84-9.5 14.21 0 23.71 9.61 9.5 9.62 9.5 23.84 0 14.21-9.61 23.71-9.62 9.5-23.84 9.5ZM241-462q-7-106 64-182t177-76q87.67 0 152.83 57.17Q700-605.67 714-519q-89.67-1-164.17-49.67-74.5-48.66-115.02-129.33Q419-618 367.5-555.5T241-462Z" />
        </svg>
    </div>

    <!-- Javascript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chatbotBtn = document.getElementById('chatbot_btn');
            const chatbotCtn = document.getElementById("chatbot_ctn");

            chatbotBtn.addEventListener("click", function() {
                const aaa = window.getComputedStyle(chatbotCtn);
                const property = window.getComputedStyle(chatbotCtn).getPropertyValue("display");

                if (property == "none") {
                    chatbotCtn.style.display = "block";
                } else {
                    chatbotCtn.style.display = "none";
                }
                console.log(aaa.display);
            })
        })
    </script>
</body>

</html>