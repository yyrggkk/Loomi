@extends('layouts.master')

@section('title', 'Loomi - Inbox')

@push('styles')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary: #095aa2;
            --secondary: #00f2fe;
            --dark: #121212;
            --light-dark: #1e1e1e;
            --text: #f5f5f5;
            --text-secondary: #a0a0a0;
            --border: #333333;
            --accent: #095aa2;
        }

        body {
            background-color: var(--dark);
            color: var(--text);
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: var(--light-dark);
            padding: 20px;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            z-index: 100;
        }

        .logo {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border);
        }

        .logo-img {
            width: 28px;
            height: 28px;
            border-radius: 6px;
            margin-right: 10px;
            object-fit: cover;
        }

        .logo h1 {
            font-size: 24px;
            font-weight: 700;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .nav-links {
            list-style: none;
            margin-top: 40%;
            margin-bottom: auto;
        }

        .nav-links li {
            margin-bottom: 15px;
        }
        .nav-links li:last-child {
            position: absolute;
            bottom: 0;
        }
        .nav-links a {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            color: var(--text);
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .nav-links a:hover, .nav-links a.active {
            background-color: rgba(138, 43, 226, 0.2);
            color: var(--primary);
        }

        .nav-links i {
            margin-right: 12px;
            font-size: 20px;
        }

        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 0;
            display: flex;
        }

        .inbox-sidebar {
            width: 400px;
            background-color: var(--light-dark);
            border-right: 1px solid var(--border);
            height: 100vh;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        .inbox-header {
            padding: 20px;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .inbox-header h2 {
            font-size: 24px;
        }

        .new-message-btn {
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .new-message-btn:hover {
            background-color: #0a4a8a;
        }

        .search-container {
            padding: 15px 20px;
            border-bottom: 1px solid var(--border);
        }

        .search-box {
            display: flex;
            align-items: center;
            background-color: var(--dark);
            border-radius: 20px;
            padding: 10px 15px;
        }

        .search-box i {
            color: var(--text-secondary);
            margin-right: 10px;
        }

        .search-box input {
            background: transparent;
            border: none;
            color: var(--text);
            width: 100%;
            outline: none;
        }

        .chat-list {
            flex: 1;
            overflow-y: auto;
        }

        .chat-item {
            display: flex;
            padding: 15px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .chat-item:hover, .chat-item.active {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .chat-avatar {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            margin-right: 15px;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
            font-size: 18px;
        }

        .chat-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .chat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
        }

        .chat-name {
            font-weight: 600;
            font-size: 16px;
        }

        .chat-time {
            font-size: 12px;
            color: var(--text-secondary);
        }

        .chat-preview {
            display: flex;
            align-items: center;
        }

        .chat-message {
            font-size: 14px;
            color: var(--text-secondary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 200px;
        }

        .unread-badge {
            background-color: var(--primary);
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            margin-left: 5px;
        }

        .chat-area {
            flex: 1;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .chat-header-area {
            padding: 15px 20px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .chat-user-info {
            display: flex;
            align-items: center;
        }

        .chat-user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 12px;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
        }

        .chat-user-name {
            font-weight: 600;
            font-size: 16px;
        }

        .chat-actions {
            display: flex;
            gap: 15px;
        }

        .chat-action-btn {
            background: none;
            border: none;
            color: var(--text-secondary);
            font-size: 18px;
            cursor: pointer;
            transition: color 0.3s;
        }

        .chat-action-btn:hover {
            color: var(--text);
        }

        .messages-container {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .message {
            max-width: 70%;
            padding: 12px 16px;
            border-radius: 18px;
            position: relative;
            word-wrap: break-word;
        }

        .message.sent {
            align-self: flex-end;
            background-color: var(--primary);
            border-bottom-right-radius: 4px;
        }

        .message.received {
            align-self: flex-start;
            background-color: var(--light-dark);
            border: 1px solid var(--border);
            border-bottom-left-radius: 4px;
        }

        .message-time {
            font-size: 11px;
            color: var(--text-secondary);
            margin-top: 5px;
            text-align: right;
        }

        .message-input-area {
            padding: 15px 20px;
            border-top: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .message-input {
            flex: 1;
            background-color: var(--light-dark);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 12px 20px;
            color: var(--text);
            outline: none;
            resize: none;
            height: 44px;
            font-family: inherit;
        }

        .message-input::placeholder {
            color: var(--text-secondary);
        }

        .send-btn {
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 50%;
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .send-btn:hover {
            background-color: #0a4a8a;
        }

        .attachment-btn {
            background: none;
            border: none;
            color: var(--text-secondary);
            font-size: 20px;
            cursor: pointer;
            transition: color 0.3s;
        }

        .attachment-btn:hover {
            color: var(--text);
        }

        .empty-chat {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 40px;
        }

        .empty-chat-icon {
            font-size: 64px;
            color: var(--text-secondary);
            margin-bottom: 20px;
        }

        .empty-chat h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .empty-chat p {
            color: var(--text-secondary);
            margin-bottom: 20px;
            max-width: 300px;
        }

        .start-chat-btn {
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .start-chat-btn:hover {
            background-color: #0a4a8a;
        }

        .chat-area .chat-header-area,
        .chat-area .messages-container,
        .chat-area .message-input-area {
            display: none;
        }

        .chat-area #emptyChat {
            display: flex;
        }
        
        .chat-area.chat-active #emptyChat {
            display: none;
        }

        .chat-area.chat-active .chat-header-area {
            display: flex;
        }
        .chat-area.chat-active .messages-container {
            display: flex;
        }
        .chat-area.chat-active .message-input-area {
            display: flex;
        }

        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1000;
            display: none;
            align-items: center;
            justify-content: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1;
            cursor: pointer;
        }

        .modal-content {
            background-color: var(--light-dark);
            width: 450px;
            max-width: 90%;
            border-radius: 10px;
            z-index: 2;
            display: flex;
            flex-direction: column;
            max-height: 80vh;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            border-bottom: 1px solid var(--border);
        }

        .modal-header h2 {
            font-size: 20px;
        }

        .modal-close-btn {
            background: none;
            border: none;
            color: var(--text-secondary);
            font-size: 28px;
            cursor: pointer;
            transition: color 0.3s;
        }

        .modal-close-btn:hover {
            color: var(--text);
        }

        .modal-body {
            padding: 20px;
            overflow-y: auto;
        }

        .modal-body .search-box {
            margin-bottom: 20px;
        }

        .follower-list {
            list-style: none;
        }

        .follower-item {
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .follower-item:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .follower-item .chat-avatar {
            width: 45px;
            height: 45px;
            margin-right: 12px;
            font-size: 16px;
        }

        .follower-item .follower-name {
            font-weight: 600;
        }

        @media (max-width: 1100px) {
            .sidebar {
                width: 80px;
                padding: 20px 10px;
            }
            
            .logo h1, .nav-links span {
                display: none;
            }
            
            .logo {
                justify-content: center;
            }
            
            .logo-img {
                margin-right: 0;
            }
            
            .nav-links a {
                justify-content: center;
                padding: 15px;
            }
            
            .nav-links i {
                margin-right: 0;
                font-size: 22px;
            }
            
            .main-content {
                margin-left: 80px;
            }
        }

        @media (max-width: 900px) {
            .inbox-sidebar {
                width: 100%;
            }
            
            .chat-area {
                display: none;
            }
            
            .chat-area.active {
                display: flex;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: var(--dark);
                z-index: 100;
                margin-left: 0;
            }
        }

        @media (max-width: 768px) {
            .search-box {
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                display: none;
            }
            
            .main-content {
                margin-left: 0;
            }
        }

        .back-to-inbox {
            display: none;
            background: none;
            border: none;
            color: var(--text);
            font-size: 18px;
            margin-right: 15px;
            cursor: pointer;
        }

        @media (max-width: 900px) {
            .back-to-inbox {
                display: block;
            }
        }
    </style>
@endpush

@section('content')
    <div class="main-content">
        <div class="inbox-sidebar">
            <div class="inbox-header">
                <h2>Messages</h2>
                <button class="new-message-btn">
                    <i class="fas fa-edit"></i>
                </button>
            </div>
            <div class="search-container">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search">
                </div>
            </div>
            <div class="chat-list">
                <div class="chat-item" data-chat="emma">
                    <div class="chat-avatar">ES</div>
                    <div class="chat-info">
                        <div class="chat-header">
                            <div class="chat-name">Emma Stone</div>
                            <div class="chat-time">2m ago</div>
                        </div>
                        <div class="chat-preview">
                            <div class="chat-message">Hey! How are you doing?</div>
                            <div class="unread-badge">3</div>
                        </div>
                    </div>
                </div>
                
                <div class="chat-item" data-chat="alex">
                    <div class="chat-avatar">AJ</div>
                    <div class="chat-info">
                        <div class="chat-header">
                            <div class="chat-name">Alex Johnson</div>
                            <div class="chat-time">1h ago</div>
                        </div>
                        <div class="chat-preview">
                            <div class="chat-message">Are we still meeting tomorrow?</div>
                        </div>
                    </div>
                </div>
                
                <div class="chat-item" data-chat="michael">
                    <div class="chat-avatar">MJ</div>
                    <div class="chat-info">
                        <div class="chat-header">
                            <div class="chat-name">Michael Jordan</div>
                            <div class="chat-time">3h ago</div>
                        </div>
                        <div class="chat-preview">
                            <div class="chat-message">Thanks for the support!</div>
                        </div>
                    </div>
                </div>
                
                <div class="chat-item" data-chat="sarah">
                    <div class="chat-avatar">SM</div>
                    <div class="chat-info">
                        <div class="chat-header">
                            <div class="chat-name">Sarah Miller</div>
                            <div class="chat-time">5h ago</div>
                        </div>
                        <div class="chat-preview">
                            <div class="chat-message">I sent you the photos</div>
                        </div>
                    </div>
                </div>
                
                <div class="chat-item" data-chat="david">
                    <div class="chat-avatar">DW</div>
                    <div class="chat-info">
                        <div class="chat-header">
                            <div class="chat-name">David Wilson</div>
                            <div class="chat-time">1d ago</div>
                        </div>
                        <div class="chat-preview">
                            <div class="chat-message">Let me know when you're free</div>
                        </div>
                    </div>
                </div>
                
                <div class="chat-item" data-chat="lisa">
                    <div class="chat-avatar">LR</div>
                    <div class="chat-info">
                        <div class="chat-header">
                            <div class="chat-name">Lisa Roberts</div>
                            <div class="chat-time">2d ago</div>
                        </div>
                        <div class="chat-preview">
                            <div class="chat-message">The party was amazing!</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="chat-area" id="chatArea">

            <div class="empty-chat" id="emptyChat">
                <i class="fas fa-envelope-open-text empty-chat-icon"></i>
                <h3>Your Messages</h3>
                <p>Select a chat on the left to start messaging.</p>
            </div>
        
            <div class="chat-header-area">
                <div class="chat-user-info">
                    <button class="back-to-inbox">
                        <i class="fas fa-arrow-left"></i>
                    </button>
                    <div class="chat-user-avatar">ES</div>
                    <div class="chat-user-name">Emma Stone</div>
                </div>
                <div class="chat-actions">
                    <button class="chat-action-btn">
                        <i class="fas fa-phone"></i>
                    </button>
                    <button class="chat-action-btn">
                        <i class="fas fa-video"></i>
                    </button>
                    <button class="chat-action-btn">
                        <i class="fas fa-info-circle"></i>
                    </button>
                </div>
            </div>
            
            <div class="messages-container">
                <div class="message received">
                    Hey there! How have you been?
                    <div class="message-time">10:30 AM</div>
                </div>
                
                <div class="message sent">
                    I'm doing great! Just got back from vacation.
                    <div class="message-time">10:32 AM</div>
                </div>
                
                <div class="message received">
                    That's awesome! Where did you go?
                    <div class="message-time">10:33 AM</div>
                </div>
                
                <div class="message sent">
                    We went to Bali. The beaches were incredible!
                    <div class="message-time">10:35 AM</div>
                </div>
                
                <div class="message received">
                    I'm so jealous! Send me some pictures when you have time.
                    <div class="message-time">10:36 AM</div>
                </div>
                
                <div class="message sent">
                    Definitely! I'll send them later today.
                    <div class="message-time">10:37 AM</div>
                </div>
            </div>
            
            <div class="message-input-area">
                <button class="attachment-btn">
                    <i class="fas fa-plus-circle"></i>
                </button>
                <textarea class="message-input" placeholder="Message..."></textarea>
                <button class="send-btn">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>
@endsection

@push('modals')
    <div class="modal" id="newMessageModal">
        <div class="modal-overlay"></div>
        <div class="modal-content">
            <div class="modal-header">
                <h2>New Message</h2>
                <button class="modal-close-btn" id="closeModalBtn">&times;</button>
            </div>
            <div class="modal-body">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search followers...">
                </div>
                <ul class="follower-list">
                    <li class="follower-item">
                        <div class="chat-avatar">AJ</div>
                        <div class="follower-name">Alex Johnson</div>
                    </li>
                    <li class="follower-item">
                        <div class="chat-avatar">MJ</div>
                        <div class="follower-name">Michael Jordan</div>
                    </li>
                    <li class="follower-item">
                        <div class="chat-avatar">SM</div>
                        <div class="follower-name">Sarah Miller</div>
                    </li>
                    <li class="follower-item">
                        <div class="chat-avatar">DW</div>
                        <div class="follower-name">David Wilson</div>
                    </li>
                    <li class="follower-item">
                        <div class="chat-avatar">LR</div>
                        <div class="follower-name">Lisa Roberts</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
    <script>
        document.querySelectorAll('.chat-item').forEach(item => {
            item.addEventListener('click', function() {
                document.querySelectorAll('.chat-item').forEach(i => {
                    i.classList.remove('active');
                });
                
                this.classList.add('active');
                
                const userName = this.querySelector('.chat-name').textContent;
                const userAvatar = this.querySelector('.chat-avatar').textContent;
                
                document.querySelector('.chat-user-name').textContent = userName;
                document.querySelector('.chat-user-avatar').textContent = userAvatar;
                
                const unreadBadge = this.querySelector('.unread-badge');
                if (unreadBadge) {
                    unreadBadge.remove();
                }
                
                document.getElementById('chatArea').classList.add('chat-active');
                
                if (window.innerWidth <= 900) {
                    document.getElementById('chatArea').classList.add('active');
                }
            });
        });
        
        document.querySelector('.back-to-inbox').addEventListener('click', function() {
            document.getElementById('chatArea').classList.remove('active');
        });
        
        document.querySelector('.send-btn').addEventListener('click', sendMessage);
        document.querySelector('.message-input').addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                sendMessage();
            }
        });
        
        function sendMessage() {
            const messageInput = document.querySelector('.message-input');
            const messageText = messageInput.value.trim();
            
            if (messageText) {
                const messagesContainer = document.querySelector('.messages-container');
                
                const messageElement = document.createElement('div');
                messageElement.classList.add('message', 'sent');
                
                const now = new Date();
                const timeString = now.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
                
                const textNode = document.createTextNode(messageText);
                const timeNode = document.createElement('div');
                timeNode.className = 'message-time';
                timeNode.textContent = timeString;

                messageElement.appendChild(textNode);
                messageElement.appendChild(timeNode);
                
                messagesContainer.appendChild(messageElement);
                
                messageInput.value = '';
                
                messagesContainer.scrollTop = messagesContainer.scrollHeight;
                
                setTimeout(simulateReply, 1000 + Math.random() * 2000);
            }
        }
        
        function simulateReply() {
            const replies = [
                "That's interesting!",
                'Tell me more about that.',
                "I see what you mean.",
                'That sounds great!',
                "I'll think about it.",
                'Thanks for sharing!'
            ];
            
            const randomReply = replies[Math.floor(Math.random() * replies.length)];
            const messagesContainer = document.querySelector('.messages-container');
            
            const messageElement = document.createElement('div');
            messageElement.classList.add('message', 'received');
            
            const now = new Date();
            const timeString = now.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
            
            const textNode = document.createTextNode(randomReply);
            const timeNode = document.createElement('div');
            timeNode.className = 'message-time';
            timeNode.textContent = timeString;

            messageElement.appendChild(textNode);
            messageElement.appendChild(timeNode);
            
            messagesContainer.appendChild(messageElement);
            
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }
        
        document.querySelector('.search-box input').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const chatItems = document.querySelectorAll('.chat-item');
            
            chatItems.forEach(item => {
                const chatName = item.querySelector('.chat-name').textContent.toLowerCase();
                if (chatName.includes(searchTerm)) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            });
        });
        
        const modal = document.getElementById('newMessageModal');
        const openModalBtn = document.querySelector('.new-message-btn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const modalOverlay = modal.querySelector('.modal-overlay');

        function openModal() {
            modal.classList.add('active');
        }

        function closeModal() {
            modal.classList.remove('active');
        }

        openModalBtn.addEventListener('click', openModal);
        closeModalBtn.addEventListener('click', closeModal);
        modalOverlay.addEventListener('click', closeModal);

        document.querySelectorAll('.follower-item').forEach(item => {
            item.addEventListener('click', function() {
                const followerName = this.querySelector('.follower-name').textContent;
                closeModal();
                alert('Starting new chat with ' + followerName);
            });
        });

        document.querySelector('#newMessageModal .search-box input').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const followers = document.querySelectorAll('.follower-item');
            
            followers.forEach(item => {
                const followerName = item.querySelector('.follower-name').textContent.toLowerCase();
                if (followerName.includes(searchTerm)) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    </script>
@endpush
