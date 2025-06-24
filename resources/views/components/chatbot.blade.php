<style>
    #chatbot-container {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 9999;
        font-family: 'Segoe UI', sans-serif;
    }

    #chatbot-toggle {
        background-color: blue;
        color: white;
        border-radius: 50%;
        width: 55px;
        height: 55px;
        text-align: center;
        font-size: 28px;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        border: none;
    }

    #chatbot-box {
        width: 300px;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        background: #fff;
        display: none;
        flex-direction: column;
    }

    #chatbot-header {
        background-color: blue;
        color: white;
        padding: 12px;
        font-weight: bold;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    #chatbot-body {
        padding: 10px;
        background-color: #f9f9f9;
        font-size: 14px;
        height: 260px;
        overflow-y: auto;
    }

    #chatbot-input {
        border-top: 1px solid #ccc;
        display: flex;
    }

    #chat-input {
        flex: 1;
        padding: 8px;
        border: none;
    }
</style>

<div id="chatbot-container">
    <!-- Toggle Button -->
    <button id="chatbot-toggle">💬</button>

    <!-- Chat Box -->
    <div id="chatbot-box">
        <div id="chatbot-header">
            AI Chatbot
            <button onclick="toggleChatbot()" style="background: none; border: none; color: white; font-size: 16px;">✖</button>
        </div>
        <div style="padding: 10px; background-color: #f0fff0;">
            👋 Hi! Ask me anything about this website’s features.
        </div>
        <div id="chatbot-body"></div>
        <div id="chatbot-input">
            <input id="chat-input" type="text" placeholder="Ask a question..." />
        </div>
    </div>
</div>

<script>
    const chatToggleBtn = document.getElementById('chatbot-toggle');
    const chatBox = document.getElementById('chatbot-box');
    const chatLog = document.getElementById('chatbot-body');
    const chatInput = document.getElementById('chat-input');

    function toggleChatbot() {
        if (chatBox.style.display === 'none' || chatBox.style.display === '') {
            chatBox.style.display = 'flex';
            chatToggleBtn.style.display = 'none';
        } else {
            chatBox.style.display = 'none';
            chatToggleBtn.style.display = 'block';
        }
    }

    chatToggleBtn.addEventListener('click', toggleChatbot);

    chatInput.addEventListener('keypress', function (e) {
        if (e.key === 'Enter' && chatInput.value.trim() !== '') {
            const message = chatInput.value;
            chatLog.innerHTML += `<div><strong>You:</strong> ${message}</div>`;
            chatInput.value = '';

            fetch('/chatbot', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ message })
            })
            .then(res => res.json())
            .then(data => {
                chatLog.innerHTML += `<div><strong>Bot:</strong> ${data.reply}</div>`;
                chatLog.scrollTop = chatLog.scrollHeight;
            })
            .catch(() => {
                chatLog.innerHTML += `<div><strong>Bot:</strong> Sorry, something went wrong.</div>`;
            });
        }
    });
</script>
