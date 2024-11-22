<?php
session_start();

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION['username'])) {
    header("Location: yixboost.nl.eu.org/yixboost");
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://yixboost.nl.eu.org/yixboost/assets/font-awesome-6-pro-main/css/all.min.css">
    <style>
        /* Algemene stijlen voor donkere modus */
        body.dark-mode {
            background-color: #1e1e1e;
            color: #ffffff;
        }

        body.dark-mode .header {
            background-color: #1e1e1e;
            border-bottom: 1px solid #333;
        }

        body.dark-mode .chat-list {
            background-color: #1e1e1e;
            border-right: 2px solid #333;
            color: #ffffff;
        }

        body.dark-mode .chat-list .list-group-item {
            background-color: #333;
            color: #ffffff;
            border: 1px solid #444;
        }

        body.dark-mode .chat-list .list-group-item.active {
            background-color: #555;
            border: 1px solid #666;
        }

        body.dark-mode .chat-box {
            background-color: #1e1e1e;
            color: #ffffff;
        }

        body.dark-mode .message {
            color: #ffffff;
        }

        body.dark-mode .message-left .message {
            background-color: #333;
        }

        body.dark-mode .message-right .message {
            background-color: #555;
        }

        body.dark-mode .input-group input {
            background-color: #333;
            color: #ffffff;
            border: 1px solid #444;
        }

        body.dark-mode .input-group input::placeholder {
            color: #aaa;
        }

        /* Stijlen voor modals in donkere modus */
        body.dark-mode .modal-content {
            background-color: #1e1e1e;
            color: #ffffff;
            border: 1px solid #333;
        }

        body.dark-mode .modal-header {
            border-bottom: 1px solid #333;
        }

        body.dark-mode .modal-header .modal-title {
            color: #ffffff;
        }

        body.dark-mode .modal-body {
            color: #ffffff;
        }

        body.dark-mode .modal-footer {
            border-top: 1px solid #333;
        }

        body.dark-mode .btn-secondary {
            background-color: #444;
            color: #ffffff;
            border: 1px solid #555;
        }

        body.dark-mode .btn-secondary:hover {
            background-color: #555;
            border: 1px solid #666;
        }

        body.dark-mode .btn-primary {
            background-color: #007bff;
            color: #ffffff;
            border: 1px solid #007bff;
        }

        body.dark-mode .btn-primary:hover {
            background-color: #0056b3;
            border: 1px solid #004494;
        }

        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
        }

        .chat-container {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .header {
            display: flex;
            justify-content: space-between; /* Zorg ervoor dat de elementen aan de uiteinden van de header worden uitgelijnd */
            align-items: center; /* Centreer de items verticaal */
            background-color: #f8f9fa;
            padding: 15px;
            border-bottom: 1px solid #dee2e6;
            height: 50px;
        }

        .header h3 {
            margin: 0;
            font-size: 24px;
        }

        .header i {
            /* Voeg extra ruimte rondom het icoon toe indien nodig */
            margin-left: auto; /* Zorg ervoor dat het icoon naar de rechterkant schuift */
        }

        .chat-content {
            display: flex;
            flex: 1;
            overflow: hidden;
        }

        .chat-list {
            width: 300px; /* Zet een vaste breedte voor de chat-lijst */
            border-right: 2px solid black;
            padding-right: 10px;
            overflow: auto; /* Zorg ervoor dat je kunt scrollen */
        }

        .chat-box {
            flex: 1;
            display: flex;
            flex-direction: column;
            margin-left: 20px;
        }

        #chat-box {
            padding: 20px;
            box-sizing: border-box;
            flex: 1;
            overflow-y: auto; /* Zorg ervoor dat er gescrold kan worden */
        }

        .message {
            max-width: 60%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 15px;
            word-wrap: break-word;
            position: relative;
            display: inline-block;
        }

        .message-left {
            display: flex;
            justify-content: flex-start;
        }

        .message-left .message {
            background-color: #e2e2e2;
            margin-left: 10px;
        }

        .message-right {
            display: flex;
            justify-content: flex-end;
        }

        .message-right .message {
            background-color: #007bff;
            color: white;
            margin-right: 10px;
        }

        .input-group {
            display: flex;
            align-items: center;
            margin-top: auto;
            width: 100%;
            padding: 10px; /* Padding toegevoegd om wat ruimte rondom de input en knop te creëren */
            box-sizing: border-box;
        }

        .input-group input {
            flex: 1;
            margin-right: 10px; /* Ruimte tussen input en knop */
            padding: 10px;
            border-radius: 15px; /* Rond de hoeken van de input */
            box-sizing: border-box;
        }

        .input-group .btn {
            padding: 10px 20px; /* Voeg padding toe aan de knop voor betere uitstraling */
            border-radius: 15px; /* Rond de hoeken van de knop */
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <div class="header">
            <h3>Yixboost Chat</h3>
            <i class="fas fa-sun fa-2x" id="toggle-mode" style="cursor: pointer;"></i>
        </div>

        <div class="chat-content">
            <div class="container-fluid d-flex">
                <div class="col-md-4 chat-list d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Friends</h4>
                        <i class="fas fa-plus-circle fa-2x text-primary" id="add-chat-icon" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#addChatModal"></i>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <input type="text" id="search-chat" class="form-control" placeholder="Zoek in je contacten...">
                    </div>
                    <ul class="list-group" id="chat-list">
                        <!-- Lijst van chats komt hier -->
                    </ul>
                </div>
                <div class="col-md-8 chat-box">
                    <div class="messages-container" id="chat-box">
                        <!-- Berichten komen hier -->
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" id="message" class="form-control" placeholder="Type a message...">
                        <button class="btn btn-primary" id="send-btn"><i class="fa-solid fa-paper-plane"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal voor het toevoegen van een nieuwe gebruiker -->
    <div class="modal fade" id="addChatModal" tabindex="-1" aria-labelledby="addChatModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addChatModalLabel">Nieuwe gebruiker toevoegen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <input type="text" id="new-chat-user" class="form-control" placeholder="Gebruikersnaam...">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sluiten</button>
                    <button type="button" class="btn btn-primary" id="add-chat-btn">Voeg toe</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const chatList = document.getElementById('chat-list');
        const chatBox = document.getElementById('chat-box');
        const messageInput = document.getElementById('message');
        const sendBtn = document.getElementById('send-btn');
        const newChatUserInput = document.getElementById('new-chat-user');
        const addChatBtn = document.getElementById('add-chat-btn');
        const searchChatInput = document.getElementById('search-chat');
        let currentChat = null;
        let lastMessageTimestamp = null;

        // Function to load messages from data.json
        function loadMessages() {
            if (!currentChat) return;

            // Clear the chat box to avoid duplication or outdated messages
            chatBox.innerHTML = '';

            fetch('data.json')
                .then(response => response.json())
                .then(data => {
                    data.messages.forEach(message => {
                        if ((message.username === '<?php echo $username; ?>' && message.recipient === currentChat) ||
                            (message.username === currentChat && message.recipient === '<?php echo $username; ?>')) {
                            
                            const messageWrapper = document.createElement('div');
                            messageWrapper.classList.add('mb-2', message.username === '<?php echo $username; ?>' ? 'message-right' : 'message-left');
                            
                            const messageElement = document.createElement('div');
                            messageElement.classList.add('message');
                            messageElement.textContent = message.text;
                            
                            messageWrapper.appendChild(messageElement);
                            chatBox.appendChild(messageWrapper);

                            // Update the last message timestamp
                            lastMessageTimestamp = new Date(message.timestamp);
                        }
                    });

                    // Scroll chat box to the bottom
                    chatBox.scrollTop = chatBox.scrollHeight;
                });
        }

        // Function to add a new chat
        function addChat() {
            const newChatUser = newChatUserInput.value.trim();
            if (!newChatUser || newChatUser === '<?php echo $username; ?>') return;

            if (!isChatExists(newChatUser)) {
                const chatItem = document.createElement('li');
                chatItem.classList.add('list-group-item', 'chat-item');
                chatItem.textContent = newChatUser;
                chatItem.addEventListener('click', function() {
                    currentChat = newChatUser;
                    document.querySelectorAll('.chat-item').forEach(item => item.classList.remove('active'));
                    chatItem.classList.add('active');
                    loadMessages();
                });
                chatList.appendChild(chatItem);
            }
            newChatUserInput.value = '';
        }

        // Function to check if a chat already exists
        function isChatExists(username) {
            let exists = false;
            document.querySelectorAll('.chat-item').forEach(chatItem => {
                if (chatItem.textContent === username) {
                    exists = true;
                }
            });
            return exists;
        }

        // Function to filter chats
        function filterChats() {
            const searchTerm = searchChatInput.value.toLowerCase();
            document.querySelectorAll('.chat-item').forEach(chatItem => {
                const chatName = chatItem.textContent.toLowerCase();
                if (chatName.includes(searchTerm)) {
                    chatItem.style.display = '';
                } else {
                    chatItem.style.display = 'none';
                }
            });
        }

        // Event listeners
        sendBtn.addEventListener('click', function() {
            const message = messageInput.value.trim();
            if (!message || !currentChat) return;

            fetch('send_message.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ text: message, recipient: currentChat })
            }).then(() => {
                messageInput.value = '';
                // Reload messages after sending
                loadMessages();
            });
        });

        messageInput.addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                sendBtn.click();
            }
        });

        addChatBtn.addEventListener('click', addChat);
        searchChatInput.addEventListener('input', filterChats);

        // Initialize chat list with existing chats
        function loadChatList() {
            fetch('data.json')
                .then(response => response.json())
                .then(data => {
                    const chatUsers = new Set();
                    data.messages.forEach(message => {
                        if (message.username === '<?php echo $username; ?>') {
                            chatUsers.add(message.recipient);
                        } else if (message.recipient === '<?php echo $username; ?>') {
                            chatUsers.add(message.username);
                        }
                    });

                    chatUsers.forEach(user => {
                        const chatItem = document.createElement('li');
                        chatItem.classList.add('list-group-item', 'chat-item');
                        chatItem.textContent = user;
                        chatItem.addEventListener('click', function() {
                            currentChat = user;
                            document.querySelectorAll('.chat-item').forEach(item => item.classList.remove('active'));
                            chatItem.classList.add('active');
                            loadMessages();
                        });
                        chatList.appendChild(chatItem);
                    });
                });
        }

        // Load chat list and messages on page start
        loadChatList();

        // Load messages when the page starts
        window.addEventListener('load', function() {
            if (currentChat) {
                loadMessages();
            }
        });
    </script>
    
    <script>
        const toggleModeIcon = document.getElementById('toggle-mode');
        const body = document.body;

        // Check the saved mode from localStorage
        const savedMode = localStorage.getItem('theme');
        if (savedMode === 'dark') {
            body.classList.add('dark-mode');
            toggleModeIcon.classList.remove('fa-sun');
            toggleModeIcon.classList.add('fa-moon');
        } else {
            body.classList.remove('dark-mode');
            toggleModeIcon.classList.remove('fa-moon');
            toggleModeIcon.classList.add('fa-sun');
        }

        // Function to toggle between dark and light mode
        function toggleMode() {
            if (body.classList.contains('dark-mode')) {
                body.classList.remove('dark-mode');
                localStorage.setItem('theme', 'light');
                toggleModeIcon.classList.remove('fa-moon');
                toggleModeIcon.classList.add('fa-sun');
            } else {
                body.classList.add('dark-mode');
                localStorage.setItem('theme', 'dark');
                toggleModeIcon.classList.remove('fa-sun');
                toggleModeIcon.classList.add('fa-moon');
            }
        }

        toggleModeIcon.addEventListener('click', toggleMode);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
