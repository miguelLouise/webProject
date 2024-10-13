const responses = {
    "greetings": ["Hi! How can I help you?", "Hello! How can I assist you today?", "Hey! What can I do for you?"],
    "name": ["I am DormLink AI Bot, your assistant for Lavenders Place.", "I am DormLink Bot, here to help you with any questions."],
    "location": ["Lavenders Place is located at 1277 Lavanderos St, Sampaloc, Manila, Metro."],
    "amenities": ["We offer Elevator, Parking Lot, Wifi, Laundromat, Study Area, and Lobby."],
    "room availability": ["Please log in to the website to check available rooms and make reservations."],
    "room rates": ["Our room rates range from 9,500 pesos to 15,000 pesos per month, depending on the room type."],
    "reservation": ["To make a reservation, log in to the website and head to the Reservation section."],
    "maintenance": ["You can request maintenance services by logging into the website and using the Maintenance Request feature."],
    "contact": ["You can reach us via email at support@lavendersplace.com or call us at +123-456-7890."],
    "default": ["I'm sorry, I didn't understand that. Can you please rephrase your question?"]
};

function toggleChat() {
    const chatContainer = document.getElementById('chat-container');
    if (chatContainer.style.display === "none" || chatContainer.style.display === "") {
        chatContainer.style.display = "flex";
    } else {
        chatContainer.style.display = "none";
    }
}

function sendMessage() {
    const userInput = document.getElementById('user-input').value.trim().toLowerCase();
    
    if (userInput) {
        addMessage(userInput, 'user-message', 'Assets/userchat.png');

        // Display chat loader before showing bot response
        showLoader();

        // Get dynamic bot response based on user input
        const botResponse = getDynamicResponse(userInput);
        setTimeout(() => {
            hideLoader();
            addMessage(botResponse, 'bot-message', 'Assets/chatboticon.png');
        }, 1000);

        document.getElementById('user-input').value = '';
    }
}

function getDynamicResponse(userInput) {
    // Pattern matching for dynamic responses
    if (/(hi|hello|hey)/.test(userInput)) {
        return getRandomResponse("greetings");
    } else if (/(what's your name|who are you)/.test(userInput)) {
        return getRandomResponse("name");
    } else if (/(where are you located|location)/.test(userInput)) {
        return responses["location"][0];
    } else if (/(what amenities|amenities)/.test(userInput)) {
        return responses["amenities"][0];
    } else if (/(room availability|available rooms)/.test(userInput)) {
        return responses["room availability"][0];
    } else if (/(room rates|how much are the rooms)/.test(userInput)) {
        return responses["room rates"][0];
    } else if (/(make a reservation|reservation)/.test(userInput)) {
        return responses["reservation"][0];
    } else if (/(maintenance|fix something)/.test(userInput)) {
        return responses["maintenance"][0];
    } else if (/(contact|reach you)/.test(userInput)) {
        return responses["contact"][0];
    } else {
        return responses["default"][0];  // Default fallback
    }
}

function getRandomResponse(category) {
    const options = responses[category];
    return options[Math.floor(Math.random() * options.length)];
}

function addMessage(message, messageType, icon) {
    const messagesContainer = document.getElementById('chatbot-messages');
    const messageDiv = document.createElement('div');
    messageDiv.className = messageType;
    messageDiv.innerHTML = `<img src="${icon}" alt="User Icon" /> <p>${message}</p>`;
    messagesContainer.appendChild(messageDiv);
    messagesContainer.scrollTop = messagesContainer.scrollHeight; // Auto-scroll to the latest message
}

function showLoader() {
    document.getElementById('chat-loader').style.display = 'flex';
}

function hideLoader() {
    document.getElementById('chat-loader').style.display = 'none';
}
