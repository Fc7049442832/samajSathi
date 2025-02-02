{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persistent Draggable Div</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        /* Hidden modal by default */
        #customModal {
            display: none;
            position: absolute;
            top: 100;
            left: 100px;
            width: 400px;
            height: 500px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border: 1px solid #ccc;
            border-radius: 8px;
            z-index: 1000;
        }

        /* Header of the modal (for dragging) */
        #modalHeader {
            cursor: move;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        /* Close button */
        #modalClose {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 5%;
            width: 25px;
            height: 25px;
            cursor: pointer;
            text-align: center;
        }

        /* Content of the modal */
        #modalContent {
            padding: 20px;
            height: calc(100% - 50px); /* Adjust height to exclude header */
        }
    </style>
</head>
<body>
    <a href="#" id="openModalLink">Open Div</a>

    <div id="customModal">
        <div id="modalHeader">
            Chat Box
            <button id="modalClose">×</button>
        </div>
        <div id="modalContent">
            <p>This is a draggable and resizable div. You can move it around the screen.</p>
        </div>
    </div>

    <script>
        const modal = document.getElementById('customModal');
        const openModalLink = document.getElementById('openModalLink');
        const closeModalButton = document.getElementById('modalClose');
        const modalHeader = document.getElementById('modalHeader');

        // Function to open modal
        function openModal() {
            modal.style.display = 'block';
            localStorage.setItem('modalState', 'open'); // Save state
        }

        // Function to close modal
        function closeModal() {
            modal.style.display = 'none';
            localStorage.setItem('modalState', 'closed'); // Save state
        }

        // Event listener to open modal
        openModalLink.addEventListener('click', (e) => {
            e.preventDefault();
            openModal();
        });

        // Event listener to close modal
        closeModalButton.addEventListener('click', closeModal);

        // Check localStorage to persist modal state
        if (localStorage.getItem('modalState') === 'open') {
            openModal();
        }

        // Dragging functionality
        let isDragging = false;
        let offsetX, offsetY;

        modalHeader.addEventListener('mousedown', (e) => {
            isDragging = true;
            offsetX = e.clientX - modal.offsetLeft;
            offsetY = e.clientY - modal.offsetTop;
            document.body.style.userSelect = 'none'; // Disable text selection
        });

        document.addEventListener('mousemove', (e) => {
            if (isDragging) {
                modal.style.left = `${e.clientX - offsetX}px`;
                modal.style.top = `${e.clientY - offsetY}px`;
            }
        });

        document.addEventListener('mouseup', () => {
            isDragging = false;
            document.body.style.userSelect = ''; // Re-enable text selection
        });
    </script>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Design</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .chat-container {
            max-width: 600px;
            margin: 20px auto;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }

        .chat-box {
            flex: 1;
            padding: 10px;
            overflow-y: auto;
            display: flex;
            flex-direction: column-reverse;
            border: 1px solid #ccc;
        }

        .message {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }

        .message img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .message span {
            background-color: #f1f1f1;
            padding: 8px 12px;
            border-radius: 15px;
            max-width: 70%;
            word-wrap: break-word;
        }

        .date {
            text-align: center;
            font-size: 12px;
            margin: 5px 0;
            color: #888;
        }

        .chat-input {
            display: flex;
            border-top: 1px solid #ccc;
            padding: 10px;
            background-color: #f9f9f9;
        }

        .chat-input input[type="text"] {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }

        .chat-input button {
            padding: 8px 16px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .chat-input button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <!-- Chat Box -->
        <div class="chat-box" id="chatBox">
            <!-- Date -->
            <div class="date">23-01-2025</div>

            <!-- Messages -->
            <div class="message">
                <img src="https://via.placeholder.com/40" alt="User Image">
                <span>Hi</span>
            </div>
            <div class="message">
                <img src="https://via.placeholder.com/40" alt="User Image">
                <span>Hello</span>
            </div>
        </div>

        <!-- Input Box -->
        <div class="chat-input">
            <input type="text" id="messageInput" placeholder="Type a message...">
            <button id="sendButton">Send</button>
        </div>
    </div>

    <script>
        const chatBox = document.getElementById('chatBox');
        const sendButton = document.getElementById('sendButton');
        const messageInput = document.getElementById('messageInput');

        // Scroll to the bottom when the page loads
        window.onload = function () {
            chatBox.scrollTop = chatBox.scrollHeight;
        };

        // Add a new message
        sendButton.addEventListener('click', function () {
            const messageText = messageInput.value.trim();

            if (messageText !== '') {
                const messageDiv = document.createElement('div');
                messageDiv.classList.add('message');

                // Create image
                const img = document.createElement('img');
                img.src = 'https://via.placeholder.com/40'; // Default placeholder
                img.alt = 'User Image';

                // Create message span
                const span = document.createElement('span');
                span.textContent = messageText;

                // Append image and span to the message div
                messageDiv.appendChild(img);
                messageDiv.appendChild(span);

                // Add the new message to the chat box
                chatBox.prepend(messageDiv);

                // Clear the input field
                messageInput.value = '';
            }
        });
    </script>
</body>
</html>

