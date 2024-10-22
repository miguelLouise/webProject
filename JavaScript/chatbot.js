const responses = {
    "greetings": ["Hi! How can I help you?", "Hello! How can I assist you today?", "Hey! What can I do for you?"],
    "name": ["I am LavBot, your assistant for Lavenders Place.", "I am LavBot, here to help you with any questions."],
    "location": ["Lavenders Place is located at 1277 Lavanderos St, Sampaloc, Manila, Metro."],
    "hay": ["I'm always good! How can I assist you?"],
    "welcome": ["Thank you for choosing our Lavenders Place! We are committed to providing a safe and comfortable environment for all our residents."],
    "security": ["Our building ensures top-level security with 24-hour security personnel on-site to maintain a safe environment. Additionally, CCTV surveillance cameras are installed on every floor, providing constant monitoring and ensuring that all areas are well-covered for the safety and peace of mind of our residents."],
    "offer": ["We offer 4 types of studio type rooms with different rates and room inclusions."],
    "studio1": ["Here are the details of our first studio type: Studio Room 1 9,500.00 monthly 1 month advance and 2 months deposit. ( 1 ) minimum one year contract. Maximum of 3 persons only. Semi-furnished unit Exclusive water and electric bill. With one double deck, one bed, cabinet, table, chair, ceiling fan & aircon. Free wifi internet in each room. Good for student, reviewee, working couple with no baby. "],
    "studio2": ["Here are the details of our second studio type: Studio Room 2 10,500.00 monthly 1 month advance and 2 months deposit. Minimum ( 1 ) one year contract. Maximum of 4 persons only. Semi-furnished unit. Exclusive water and electric bill. With two ( 2 ) double deck, one cabinet, table, chair, ceiling fan & aircon. Free wifi internet in each room. Good for student, reviewee, working couple with no baby. "],
    "studio3": ["Here are the details of our third studio type: Studio Room 3 10,500.00 monthly 1 month advance and 2 months deposit. Six ( 6 ) month's to one ( 1 ) year minimum contract. Maximum of 4 persons only. Semi-furnished unit. Exclusive water and electric bill. With two ( 2 ) double deck, one cabinet, table, chair, ceiling fan & aircon. Free wifi internet in each room. Good for student, reviewee, working couple with no baby. "],
    "studio4": ["Here are the details of our fourth studio type: Studio Room 4 15,000.00 monthly 1 month advance and 2 months deposit. ( 1 ) one year contract. Maximum of 6 persons only. Semi-furnished unit. Exclusive water and electric bill. With three ( 3 ) double deck, one cabinet, table, chair, ceiling fan & aircon. Free wifi internet in each room. Good for student, reviewee, working couple with no baby. "],
    "amenities": ["We offer Elevator, Parking Lot, Wifi, Laundromat, Study Area, and Lobby."],
    "studyarea": ["Most of our tenants and dorm occupants are students and employees, So we provided a very nice ambiance and comfortable study area with wifi for their works"],
    "elevator": ["Yes, Lavenders Place is a 7 storey building, we have 24 hour elevator service."],
    "lobby": ["Our Lobby is located at first floor entrance area."],
    "parking": ["Yes, We do have spacious parking area for your vehicles. Car Parking and Motorcicle Parking space."],
    "laundry": ["We provided laundromat for all of our tenants, you will never worry to wash your clothes."],
    "wifi": ["Yes, we have a WIFI internet connection for every room. We also have provided wifi at our lobby and study area."],
    "room availability": ["Please log in to the website to check available rooms and make reservations."],
    "room rates": ["Our room rates range from 9,500 pesos to 15,000 pesos per month, depending on the room type."],
    "reservation": ["To make a reservation, log in to the website and head to the Reservation section."],
    "maintenance": ["You can request maintenance services by logging into the website and using the Maintenance Request feature."],
    "contact": ["You can reach us via email at 1277apartments@gmail.com or call us at 0997 731 6010."],
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
    } else if (/(security|cctv|survailance)/.test(userInput)) {
        return responses["security"][0];
    } else if (/(thanks|thank you|great)/.test(userInput)) {
        return responses["welcome"][0];
    } else if (/(are you okay|how are You)/.test(userInput)) {
        return responses["hay"][0];
    } else if (/(what do you offer|rooms|what do you have)/.test(userInput)) {
        return responses["offer"][0];
    } else if (/(first studio|stuio room 1|room type 1|first room type)/.test(userInput)) {
        return responses["studio1"][0];
    } else if (/(second studio|stuio room 2|room type 2|second room type)/.test(userInput)) {
        return responses["studio2"][0];
    } else if (/(third studio|stuio room 3|room type 3|third room type)/.test(userInput)) {
        return responses["studio3"][0];
    } else if (/(fourth studio|stuio room 4|room type 4|fourth room type)/.test(userInput)) {
        return responses["studio4"][0];
    } else if (/(what amenities|amenities)/.test(userInput)) {
        return responses["amenities"][0];
    } else if (/(study area|work area|study)/.test(userInput)) {
        return responses["studyarea"][0];
    } else if (/(elevator)/.test(userInput)) {
        return responses["elevator"][0];
    } else if (/(lobby)/.test(userInput)) {
        return responses["lobby"][0];
    } else if (/(Parking|Car Parking|Parking Space)/.test(userInput)) {
        return responses["parking"][0];
    } else if (/(laundry|wash clothes|laundromat)/.test(userInput)) {
        return responses["laundromat"][0];
    } else if (/(wifi|internet)/.test(userInput)) {
        return responses["wifi"][0];
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
    messagesContainer.scrollTop = messagesContainer.scrollHeight; // Auto-scroll to latest message
}

function showLoader() {
    document.getElementById('chat-loader').style.display = 'flex';
}

function hideLoader() {
    document.getElementById('chat-loader').style.display = 'none';
}
