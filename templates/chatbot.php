<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<!-- <<<<<<< HEAD -->
    <link rel="stylesheet" href="../css/chatbot.css">
<!-- ======= -->
    <link rel="stylesheet" href="css/chatbot.css">
<!-- >>>>>>> b0cc85137c6d46428583eb24896a9ebcf38175d8 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <div class="chatbot_icon" onclick="toggleChat()">
    <img src="Assets/chatboticon.png" alt="Chatbot Icon" style="width: 28px; height: 28px;">
    </div>

    <div class="chat-container" id="chat-container">
        <div class="chat-header">
            <h2>LavBot</h2>
        </div>
        <div id="chatbot-messages" class="chat-messages">
            <!-- Chat messages will appear here -->
        </div>
        <div id="chat-loader" class="chat-loader">
            <img src="Assets/chatloader.gif" alt="Loading..."/>
        </div>
        <div class="input-container">
            <input type="text" id="user-input" placeholder="Type a message..." onkeypress="if(event.key === 'Enter') sendMessage()">
            <button onclick="sendMessage()">Send</button>
        </div>
        <div class="close_icon" onclick="toggleChat()">✖️</div>
    </div>

    <script src="javascript/chatbot.js"></script>

</body>

</html>