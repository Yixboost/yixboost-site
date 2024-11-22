<?php
session_start();

// Check of de gebruiker is ingelogd
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];
$messagesFile = 'messages.json';
$contacts = [];

// Laad contacten uit het berichtenbestand
if (file_exists($messagesFile)) {
    $messages = json_decode(file_get_contents($messagesFile), true);

    foreach ($messages as $message) {
        if ($message['sender'] === $username && !in_array($message['recipient'], $contacts)) {
            $contacts[] = $message['recipient'];
        } elseif ($message['recipient'] === $username && !in_array($message['sender'], $contacts)) {
            $contacts[] = $message['sender'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .chat-bubble {
            max-width: 60%;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        .sent {
            background-color: #34D399;
            color: white;
        }
        .received {
            background-color: #4B5563;
            color: white;
        }
        #modal {
            background: rgba(0, 0, 0, 0.5);
        }
        #modal-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            max-width: 90%;
        }
        #modal-content button {
            margin-top: 10px;
        }
    </style>
</head>
<body class="bg-gray-900 text-white h-screen flex">
    <!-- Sidebar -->
    <div class="w-1/4 bg-gray-800 flex flex-col">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <h1 class="text-xl font-bold">Chats</h1>
            <div class="flex space-x-4">
                <i class="fas fa-edit cursor-pointer" onclick="openModal()"></i>
            </div>
        </div>
        <div class="p-4">
            <input id="searchInput" class="w-full p-2 bg-gray-700 rounded text-gray-300" placeholder="Search or start a new chat" type="text" onkeyup="filterContacts()"/>
        </div>
        <div id="contactList" class="flex-1 overflow-y-auto">
            <?php if (empty($contacts)): ?>
                <p class="text-gray-400 text-center">Geen contacten</p>
            <?php else: ?>
                <?php foreach ($contacts as $contact): ?>
                    <div class="contact-item flex items-center p-4 hover:bg-gray-700 cursor-pointer" onclick="selectContact('<?php echo $contact; ?>')">
                        <div class="flex-1">
                            <span class="font-medium"><?php echo $contact; ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Chat Area -->
    <div class="w-3/4 flex flex-col">
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <div class="flex items-center">
                <span id="selectedContactName" class="font-medium">Selecteer een contact om te beginnen met chatten</span>
            </div>
        </div>
        <div class="flex-1 p-4 bg-gray-900 relative overflow-y-auto" id="chatMessages">
            <p class="text-gray-400 text-center">Selecteer een contact om te beginnen met chatten.</p>
        </div>
        <div id="messageForm" style="display:none;" class="w-full p-4">
            <form id="sendMessageForm" class="flex items-center w-full">
                <input type="hidden" id="recipient" name="recipient">
                <input id="messageInput" class="flex-grow p-2 bg-gray-700 rounded-l text-gray-300" placeholder="Type a message" type="text">
                <button type="submit" class="bg-blue-500 p-2 rounded-r text-white">Send</button>
            </form>
        </div>
    </div>

    <!-- Modal voor nieuwe contactpersoon -->
    <div id="modal" class="fixed inset-0 flex items-center justify-center hidden">
        <div id="modal-content">
            <h2 class="text-xl font-semibold">Nieuwe contact toevoegen</h2>
            <input id="newContactInput" class="w-full p-2 border rounded mt-2" type="text" placeholder="Vul de gebruikersnaam in">
            <button onclick="startNewChat()" class="bg-blue-500 text-white p-2 rounded mt-2">Start Chat</button>
            <button onclick="closeModal()" class="bg-gray-500 text-white p-2 rounded mt-2">Annuleren</button>
        </div>
    </div>

    <script>
        let selectedContact = '';

        function filterContacts() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const contactList = document.getElementById('contactList');
            const contacts = contactList.getElementsByClassName('contact-item');

            for (let i = 0; i < contacts.length; i++) {
                const name = contacts[i].getElementsByTagName('span')[0];
                if (name.innerHTML.toLowerCase().indexOf(filter) > -1) {
                    contacts[i].style.display = '';
                } else {
                    contacts[i].style.display = 'none';
                }
            }
        }

        function selectContact(contactName) {
            selectedContact = contactName;
            document.getElementById('selectedContactName').innerText = contactName;
            document.getElementById('recipient').value = contactName;
            document.getElementById('messageForm').style.display = 'flex';

            fetch(`load_messages.php?recipient=${contactName}`)
                .then(response => response.json())
                .then(data => {
                    const chatMessages = document.getElementById('chatMessages');
                    chatMessages.innerHTML = '';

                    if (data.length === 0) {
                        chatMessages.innerHTML = '<p class="text-gray-400 text-center">Geen berichten.</p>';
                    } else {
                        data.forEach(message => {
                            const messageDiv = document.createElement('div');
                            messageDiv.className = message.sender === '<?= $username ?>' ? 'flex justify-end mb-4' : 'flex justify-start mb-4';
                            messageDiv.innerHTML = `<div class="chat-bubble ${message.sender === '<?= $username ?>' ? 'sent' : 'received'}">
                                <p>${message.message}</p>
                            </div>`;
                            chatMessages.appendChild(messageDiv);
                        });
                    }
                })
                .catch(error => console.error('Error loading messages:', error));
        }

        function startNewChat() {
            const newContact = document.getElementById('newContactInput').value.trim();

            if (!newContact) {
                alert('Voer een gebruikersnaam in.');
                return;
            }

            // Stuur het initiële bericht
            const formData = new FormData();
            formData.append('message', 'Dit is het begin van deze chat');
            formData.append('recipient', newContact);

            fetch('messages_send.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(messageData => {
                if (messageData.success) {
                    location.reload(); // Herlaad om de nieuwe chat te tonen
                } else {
                    console.error('Error sending initial message:', messageData.error);
                }
            })
            .catch(error => console.error('Error starting chat:', error));
        }

        function openModal() {
            document.getElementById('modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }
    </script>
</body>
</html>
