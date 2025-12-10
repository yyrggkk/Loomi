@extends('layouts.master')

@section('title', 'Loomi - Loopi')

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
            --text: #f5f5ff;
            --text-secondary: #a0a0a0;
            --border: #333333;
        }

        body {
            background-color: var(--dark);
            color: var(--text);
            min-height: 100vh;
            overflow: hidden;
        }

        .loomi-layout {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }

        .loomi-main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .sidebar {
            width: 250px;
            background-color: var(--light-dark);
            padding: 20px;
            height: 100vh;
            overflow-y: auto;
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            z-index: 100;
            flex-shrink: 0;
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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        .loopi-feed {
            width: 100%;
            max-width: 420px;
            height: 95vh;
            max-height: 800px;
            border-radius: 15px;
            overflow: hidden;
            position: relative;
            background-color: #000;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            scroll-snap-type: y mandatory;
            scroll-behavior: smooth;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        
        .loopi-feed::-webkit-scrollbar {
            display: none;
        }

        .loopi-item {
            width: 100%;
            height: 100%;
            position: relative;
            scroll-snap-align: start;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .loopi-video {
            width: 100%;
            height: 100%;
            object-fit: contain;
            cursor: pointer;
            background-color: #000;
        }

        .loopi-nav {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-left: 20px;
        }

        .loopi-nav-btn {
            background-color: var(--light-dark);
            color: var(--text);
            border: 1px solid var(--border);
            border-radius: 50%;
            width: 50px;
            height: 50px;
            cursor: pointer;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s, opacity 0.3s;
        }

        .loopi-nav-btn:hover {
            background-color: #333;
        }

        .loopi-progress-container {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background-color: rgba(255, 255, 255, 0.2);
            z-index: 20;
            cursor: pointer;
        }

        .loopi-progress-bar {
            width: 0%;
            height: 100%;
            background-color: #fff;
            transition: width 0.1s linear;
            pointer-events: none;
        }

        .loopi-overlay {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            display: flex;
            align-items: flex-end;
            color: white;
            pointer-events: none;
            background: linear-gradient(to top, rgba(0,0,0,0.4) 0%, transparent 30%);
            padding: 20px;
            padding-bottom: 30px;
        }

        .loopi-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 10px;
            pointer-events: auto;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
        }

        .loopi-user {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .loopi-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 16px;
        }

        .loopi-username {
            font-weight: 600;
        }
        
        .follow-btn-small {
            background: none;
            border: 1px solid white;
            color: white;
            padding: 4px 10px;
            border-radius: 5px;
            font-size: 12px;
            cursor: pointer;
        }

        .loopi-caption {
            font-size: 14px;
            line-height: 1.4;
        }
        .loopi-caption strong {
            color: var(--secondary);
            cursor: pointer;
        }

        .loopi-actions {
            display: flex;
            flex-direction: column;
            gap: 25px;
            pointer-events: auto;
        }

        .action-btn {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            font-size: 13px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
        }
        
        .action-btn i {
            font-size: 28px;
            transition: transform 0.2s ease, color 0.2s ease;
        }

        .action-btn.liked .fa-heart {
            color: #ff3b5c;
            transform: scale(1.1);
        }

        .play-pause-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 60px;
            color: rgba(255, 255, 255, 0.8);
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .loopi-item.paused .play-pause-icon {
            opacity: 1;
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
            border: 1px solid var(--border);
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
        
        .comment-list {
            list-style: none;
            padding: 15px 20px;
            overflow-y: auto;
            flex: 1;
        }
        
        .comment-item {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }
        
        .comment-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--light-dark);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 600;
            flex-shrink: 0;
        }
        
        .comment-body {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }
        
        .comment-username {
            font-weight: 600;
            font-size: 14px;
        }
        
        .comment-text {
            font-size: 14px;
            line-height: 1.5;
        }
        
        .comment-time {
            font-size: 12px;
            color: var(--text-secondary);
        }
        
        .comment-input-area {
            padding: 10px 20px;
            border-top: 1px solid var(--border);
            display: flex;
            gap: 10px;
        }
        
        .comment-input {
            flex: 1;
            background-color: var(--dark);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 10px 15px;
            color: var(--text);
            outline: none;
        }
        
        .comment-send-btn {
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            cursor: pointer;
        }
        
        .share-list {
            list-style: none;
            padding: 10px;
            overflow-y: auto;
            max-height: 300px;
        }
        
        .share-item {
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .share-item:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }
        
        .share-item .loopi-avatar {
            width: 45px;
            height: 45px;
            margin-right: 12px;
            font-size: 16px;
        }
        
        .share-item .loopi-username {
            font-weight: 600;
            flex: 1;
        }
        
        .send-btn-small {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 6px 15px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 12px;
        }
        
        .copy-link-area {
            padding: 20px;
            border-top: 1px solid var(--border);
            display: flex;
            gap: 10px;
        }
        
        .copy-link-input {
            flex: 1;
            background-color: var(--dark);
            border: 1px solid var(--border);
            color: var(--text-secondary);
            padding: 10px 15px;
            border-radius: 8px;
            font-size: 14px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        .copy-link-btn {
            background-color: var(--light-dark);
            border: 1px solid var(--border);
            color: var(--text);
            font-weight: 600;
            padding: 0 15px;
            border-radius: 8px;
            cursor: pointer;
        }

        @media (max-width: 1100px) {
            .sidebar {
                width: 80px;
                padding: 20px 10px;
            }
            .logo h1, .nav-links span { display: none; }
            .logo { justify-content: center; }
            .logo-img { margin-right: 0; }
            .nav-links a { justify-content: center; padding: 15px; }
            .nav-links i { margin-right: 0; font-size: 22px; }
            
            .loopi-feed {
                height: 100vh;
                max-height: 100%;
                border-radius: 0;
            }
            .loopi-nav {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .sidebar { display: none; }
            .main-content {
                padding: 0;
            }
            .loopi-feed {
                width: 100%;
                max-width: 100%;
            }
            .loopi-overlay {
                padding: 15px;
                padding-bottom: 30px;
            }
        }
    </style>
@endpush

@section('content')
    <div class="main-content">
        <div class="loopi-feed" id="loopiFeed">
            <div class="loopi-item">
                <video class="loopi-video" loop muted playsinline>
                    <source src="{{ asset('videos/bg.mp4') }}" type="video/mp4">
                </video>
                
                <div class="loopi-progress-container">
                    <div class="loopi-progress-bar"></div>
                </div>

                <div class="loopi-overlay">
                    <div class="loopi-info">
                        <div class="loopi-user">
                            <div class="loopi-avatar">ES</div>
                            <div class="loopi-username">@emma_stone</div>
                            <button class="follow-btn-small">Follow</button>
                        </div>
                        <div class="loopi-caption">
                            This is my first video on Loopi! So excited to be here. 
                            <strong>#new</strong> <strong>#loomi</strong>
                        </div>
                    </div>
                    
                    <div class="loopi-actions">
                        <button class="action-btn like-btn">
                            <i class="fas fa-heart"></i>
                            <span>1.2K</span>
                        </button>
                        <button class="action-btn comment-btn">
                            <i class="fas fa-comment-dots"></i>
                            <span>345</span>
                        </button>
                        <button class="action-btn share-btn">
                            <i class="fas fa-share"></i>
                            <span>123</span>
                        </button>
                        <button class="action-btn volume-btn">
                            <i class="fas fa-volume-mute"></i>
                        </button>
                    </div>
                </div>
                
                <div class="play-pause-icon">
                    <i class="fas fa-play"></i>
                </div>
            </div>
            
            <div class="loopi-item">
                <video class="loopi-video" loop muted playsinline>
                    <source src="#" type="video/mp4">
                </video>
                
                <div class="loopi-progress-container">
                    <div class="loopi-progress-bar"></div>
                </div>

                <div class="loopi-overlay">
                    <div class="loopi-info">
                        <div class="loopi-user">
                            <div class="loopi-avatar">MJ</div>
                            <div class="loopi-username">@michael_j</div>
                            <button class="follow-btn-small">Follow</button>
                        </div>
                        <div class="loopi-caption">
                            Morning workout vibes. <strong>#fitness</strong> <strong>#goals</strong>
                        </div>
                    </div>
                    
                    <div class="loopi-actions">
                        <button class="action-btn like-btn">
                            <i class="fas fa-heart"></i>
                            <span>5.8K</span>
                        </button>
                        <button class="action-btn comment-btn">
                            <i class="fas fa-comment-dots"></i>
                            <span>987</span>
                        </button>
                        <button class="action-btn share-btn">
                            <i class="fas fa-share"></i>
                            <span>456</span>
                        </button>
                        <button class="action-btn volume-btn">
                            <i class="fas fa-volume-mute"></i>
                        </button>
                    </div>
                </div>
                
                <div class="play-pause-icon">
                    <i class="fas fa-play"></i>
                </div>
            </div>

            <div class="loopi-item">
                <video class="loopi-video" loop muted playsinline>
                    <source src="#" type="video/mp4">
                </video>
                
                <div class="loopi-progress-container">
                    <div class="loopi-progress-bar"></div>
                </div>

                <div class="loopi-overlay">
                    <div class="loopi-info">
                        <div class="loopi-user">
                            <div class="loopi-avatar">FC</div>
                            <div class="loopi-username">@food_chronicles</div>
                            <button class="follow-btn-small">Follow</button>
                        </div>
                        <div class="loopi-caption">
                            You have to try this pasta recipe! 🍝
                            <strong>#recipe</strong> <strong>#food</strong>
                        </div>
                    </div>
                    
                    <div class="loopi-actions">
                        <button class="action-btn like-btn">
                            <i class="fas fa-heart"></i>
                            <span>3.1K</span>
                        </button>
                        <button class="action-btn comment-btn">
                            <i class="fas fa-comment-dots"></i>
                            <span>602</span>
                        </button>
                        <button class="action-btn share-btn">
                            <i class="fas fa-share"></i>
                            <span>219</span>
                        </button>
                        <button class="action-btn volume-btn">
                            <i class="fas fa-volume-mute"></i>
                        </button>
                    </div>
                </div>
                
                <div class="play-pause-icon">
                    <i class="fas fa-play"></i>
                </div>
            </div>

        </div>

        <div class="loopi-nav">
            <button class="loopi-nav-btn" id="loopiPrev">
                <i class="fas fa-chevron-up"></i>
            </button>
            <button class="loopi-nav-btn" id="loopiNext">
                <i class="fas fa-chevron-down"></i>
            </button>
        </div>

    </div>
@endsection

@push('modals')
    <div class="modal" id="commentModal">
        <div class="modal-overlay"></div>
        <div class="modal-content">
            <div class="modal-header">
                <h2>Comments</h2>
                <button class="modal-close-btn">&times;</button>
            </div>
            
            <ul class="comment-list">
                <li class="comment-item">
                    <div class="comment-avatar">MJ</div>
                    <div class="comment-body">
                        <span class="comment-username">@michael_j</span>
                        <p class="comment-text">This looks amazing! 🔥</p>
                        <span class="comment-time">2h ago</span>
                    </div>
                </li>
                <li class="comment-item">
                    <div class="comment-avatar">FC</div>
                    <div class="comment-body">
                        <span class="comment-username">@food_chronicles</span>
                        <p class="comment-text">Welcome to Loopi! Great first video.</p>
                        <span class="comment-time">1h ago</span>
                    </div>
                </li>
                <li class="comment-item">
                    <div class="comment-avatar">ES</div>
                    <div class="comment-body">
                        <span class="comment-username">@emma_stone</span>
                        <p class="comment-text">Thanks everyone! 🙏</p>
                        <span class="comment-time">30m ago</span>
                    </div>
                </li>
            </ul>
            
            <div class="comment-input-area">
                <input type="text" class="comment-input" placeholder="Add a comment...">
                <button class="comment-send-btn">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="modal" id="shareModal">
        <div class="modal-overlay"></div>
        <div class="modal-content">
            <div class="modal-header">
                <h2>Share to</h2>
                <button class="modal-close-btn">&times;</button>
            </div>
            
            <ul class="share-list">
                <li class="share-item">
                    <div class="loopi-avatar">MJ</div>
                    <span class="loopi-username">@michael_j</span>
                    <button class="send-btn-small">Send</button>
                </li>
                <li class="share-item">
                    <div class="loopi-avatar">FC</div>
                    <span class="loopi-username">@food_chronicles</span>
                    <button class="send-btn-small">Send</button>
                </li>
                <li class="share-item">
                    <div class="loopi-avatar">AJ</div>
                    <span class="loopi-username">@alex_j</span>
                    <button class="send-btn-small">Send</button>
                </li>
            </ul>
            
            <div class="copy-link-area">
                <div class="copy-link-input" id="videoLinkInput">https://loomi.app/v/xyz123</div>
                <button class="copy-link-btn" id="copyLinkBtn">Copy</button>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const videoItems = document.querySelectorAll('.loopi-item');
            const loopiFeed = document.getElementById('loopiFeed');
            
            const options = {
                root: loopiFeed,
                rootMargin: '0px',
                threshold: 0.5
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    const video = entry.target.querySelector('video');
                    if (entry.isIntersecting) {
                        video.play().catch(e => console.log('Autoplay was prevented:', e));
                        window.currentActiveVideo = video;
                    } else {
                        video.pause();
                    }
                });
            }, options);

            videoItems.forEach(item => {
                observer.observe(item);
            });

            videoItems.forEach(item => {
                const video = item.querySelector('video');
                const progressBar = item.querySelector('.loopi-progress-bar');

                if(progressBar) {
                    video.addEventListener('timeupdate', () => {
                        if (video.duration) {
                            const percent = (video.currentTime / video.duration) * 100;
                            progressBar.style.width = `${percent}%`;
                        }
                    });
                }
                
                item.addEventListener('click', (e) => {
                    if (e.target.classList.contains('loopi-item') || e.target.classList.contains('loopi-video')) {
                        if (video.paused) {
                            video.play();
                            item.classList.remove('paused');
                        } else {
                            video.pause();
                            item.classList.add('paused');
                        }
                    }
                });
            });
            
            document.querySelectorAll('.like-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    btn.classList.toggle('liked');
                });
            });

            const commentModal = document.getElementById('commentModal');
            document.querySelectorAll('.comment-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    commentModal.classList.add('active');
                });
            });

            const shareModal = document.getElementById('shareModal');
            document.querySelectorAll('.share-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    shareModal.classList.add('active');
                });
            });

            document.querySelectorAll('.volume-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const video = btn.closest('.loopi-item').querySelector('video');
                    const icon = btn.querySelector('i');
                    
                    if (video.muted) {
                        video.muted = false;
                        icon.classList.remove('fa-volume-mute');
                        icon.classList.add('fa-volume-high');
                    } else {
                        video.muted = true;
                        icon.classList.remove('fa-volume-high');
                        icon.classList.add('fa-volume-mute');
                    }
                });
            });

            const prevBtn = document.getElementById('loopiPrev');
            const nextBtn = document.getElementById('loopiNext');

            if (loopiFeed && prevBtn && nextBtn) {
                nextBtn.addEventListener('click', () => {
                    loopiFeed.scrollBy({ top: loopiFeed.clientHeight, behavior: 'smooth' });
                });
                
                prevBtn.addEventListener('click', () => {
                    loopiFeed.scrollBy({ top: -loopiFeed.clientHeight, behavior: 'smooth' });
                });

                function checkNavButtons() {
                    const scrollAmount = loopiFeed.scrollTop;
                    const maxScroll = loopiFeed.scrollHeight - loopiFeed.clientHeight;

                    prevBtn.style.opacity = (scrollAmount <= 0) ? '0.3' : '1';
                    prevBtn.style.pointerEvents = (scrollAmount <= 0) ? 'none' : 'auto';
                    
                    nextBtn.style.opacity = (scrollAmount >= maxScroll - 1) ? '0.3' : '1';
                    nextBtn.style.pointerEvents = (scrollAmount >= maxScroll - 1) ? 'none' : 'auto';
                }

                loopiFeed.addEventListener('scroll', checkNavButtons);
                setTimeout(checkNavButtons, 150);

                const isTyping = target => {
                    if (!target) return false;
                    const tag = target.tagName?.toLowerCase();
                    return tag === 'input' || tag === 'textarea' || target.isContentEditable;
                };

                document.addEventListener('keydown', event => {
                    if (isTyping(event.target)) return;
                    if (event.key === 'ArrowDown') {
                        event.preventDefault();
                        loopiFeed.scrollBy({ top: loopiFeed.clientHeight, behavior: 'smooth' });
                        checkNavButtons();
                    }
                    if (event.key === 'ArrowUp') {
                        event.preventDefault();
                        loopiFeed.scrollBy({ top: -loopiFeed.clientHeight, behavior: 'smooth' });
                        checkNavButtons();
                    }
                });
            }
            
            document.querySelectorAll('.loopi-progress-container').forEach(container => {
                const video = container.closest('.loopi-item').querySelector('.loopi-video');

                container.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const barWidth = container.clientWidth;
                    const clickX = e.offsetX;
                    
                    if (video.duration) {
                        const newTime = (clickX / barWidth) * video.duration;
                        video.currentTime = newTime;
                    }
                });
            });

            document.querySelectorAll('.modal').forEach(modal => {
                const overlay = modal.querySelector('.modal-overlay');
                const closeBtn = modal.querySelector('.modal-close-btn');
                
                function closeModal() {
                    modal.classList.remove('active');
                }
                
                overlay.addEventListener('click', closeModal);
                closeBtn.addEventListener('click', closeModal);
            });
            
            document.querySelector('.comment-send-btn').addEventListener('click', () => {
                const input = document.querySelector('.comment-input');
                const text = input.value.trim();
                
                if (text) {
                    const list = document.querySelector('.comment-list');
                    const newComment = document.createElement('li');
                    newComment.className = 'comment-item';
                    newComment.innerHTML = `
                        <div class="comment-avatar">ME</div>
                        <div class="comment-body">
                            <span class="comment-username">@me</span>
                            <p class="comment-text">${text}</p>
                            <span class="comment-time">Just now</span>
                        </div>
                    `;
                    list.appendChild(newComment);
                    list.scrollTop = list.scrollHeight;
                    input.value = '';
                }
            });
            
            document.getElementById('copyLinkBtn').addEventListener('click', (e) => {
                e.stopPropagation();
                const link = document.getElementById('videoLinkInput').textContent;
                
                navigator.clipboard.writeText(link).then(() => {
                    e.target.textContent = 'Copied!';
                    setTimeout(() => {
                        e.target.textContent = 'Copy';
                    }, 2000);
                });
            });
            
            document.querySelectorAll('.share-item .send-btn-small').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const user = btn.closest('.share-item').querySelector('.loopi-username').textContent;
                    alert(`Sent to ${user}!`);
                });
            });

        });
    </script>
@endpush
