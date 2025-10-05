<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ChatGPT Clone</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        :root {
            --primary: #10a37f;

            --dark-bg: #343541;
            --dark-chat: #444654;
            --dark-text: #ffffff;
            --dark-input: #40414f;

            --light-bg: #f9f9f9;
            --light-chat: #e5e5e5;
            --light-text: #111111;
            --light-input: #ffffff;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: var(--dark-bg);
            color: var(--dark-text);
            transition: all 0.3s ease;
        }

        header {
            background-color: #202123;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 0 8px rgba(0,0,0,0.2);
        }

        header h2 {
            margin: 0;
            color: var(--primary);
        }

        .header-controls {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 8px 14px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
        }

        .logout-btn {
            background-color: var(--primary);
            color: white;
        }

        .mode-btn {
            background: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
        }

        .logout-btn:hover {
            background-color: #0e8266;
        }

        .mode-btn:hover {
            background-color: var(--primary);
            color: white;
        }

        #chatbox {
            max-width: 900px;
            margin: 30px auto;
            height: 70vh;
            overflow-y: auto;
            background-color: var(--dark-chat);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.4);
        }

        #chatbox p {
            background-color: var(--dark-input);
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 12px;
        }

        #chatForm {
            max-width: 900px;
            margin: 0 auto 30px auto;
            display: flex;
            gap: 10px;
        }

        #message {
            flex: 1;
            padding: 14px;
            border-radius: 8px;
            border: none;
            font-size: 16px;
            background-color: var(--dark-input);
            color: white;
        }

        #message.light {
            background-color: var(--light-input);
            color: black;
        }

        body.light {
            background-color: var(--light-bg);
            color: var(--light-text);
        }

        body.light header {
            background-color: #e3e3e3;
        }

        body.light #chatbox {
            background-color: var(--light-chat);
        }

        body.light #chatbox p {
            background-color: var(--light-input);
            color: var(--light-text);
        }

        body.light .logout-btn {
            background-color: var(--primary);
        }

        body.light .mode-btn {
            border-color: var(--primary);
            color: var(--primary);
        }

        body.light .mode-btn:hover {
            background-color: var(--primary);
            color: white;
        }

        #typing {
            font-style: italic;
            color: #aaa;
            margin-top: 5px;
            margin-left: 10px;
        }

    </style>
</head>
<body>

<header>
    <h2>ChatGPT Clone</h2>
    <div class="header-controls">
        <button class="btn mode-btn" onclick="toggleMode()">Toggle Mode</button>
        <a href="logout.php" class="btn logout-btn">Logout</a>
    </div>
</header>

<div id="chatbox"></div>
<div id="typing"></div>

<form id="chatForm">
    <input type="text" id="message" placeholder="Ask me anything..." required>
    <button class="btn logout-btn" type="submit">Send</button>
</form>

<script>
    const chatbox = document.getElementById("chatbox");
    const typingIndicator = document.getElementById("typing");

    document.getElementById("chatForm").onsubmit = async function (e) {
        e.preventDefault();
        let msg = document.getElementById("message").value.trim();
        if (!msg) return;

        chatbox.innerHTML += `<p><strong>You:</strong> ${msg}</p>`;
        scrollChat();
        document.getElementById("message").value = '';

        typingIndicator.innerText = "AI is typing...";
        
        const response = await fetch('send_message.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: 'message=' + encodeURIComponent(msg)
        });

        const data = await response.text();
        typingIndicator.innerText = '';
        chatbox.innerHTML += `<p><strong>AI:</strong> ${data}</p>`;
        scrollChat();
    };

    function scrollChat() {
        chatbox.scrollTop = chatbox.scrollHeight;
    }

    function toggleMode() {
        document.body.classList.toggle("light");
        document.getElementById("message").classList.toggle("light");
    }
</script>

</body>
</html>
