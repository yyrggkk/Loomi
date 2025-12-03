@extends('layouts.master')

@section('title', 'Loomi - Explore')

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
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid var(--border);
        }

        .search-bar {
            display: flex;
            align-items: center;
            background-color: var(--light-dark);
            border-radius: 20px;
            padding: 8px 15px;
            width: 300px;
        }

        .search-bar i {
            color: var(--text-secondary);
            margin-right: 10px;
        }

        .search-bar input {
            background: transparent;
            border: none;
            color: var(--text);
            width: 100%;
            outline: none;
        }

        .user-actions {
            display: flex;
            align-items: center;
        }

        .user-actions i {
            font-size: 20px;
            margin-left: 20px;
            cursor: pointer;
            color: var(--text-secondary);
            transition: color 0.3s ease;
        }

        .user-actions i:hover {
            color: var(--primary);
        }

        .user-profile {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            margin-left: 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .explore-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .search-suggestions {
            margin-bottom: 30px;
        }

        .suggestions-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .suggestions-carousel-wrapper {
            position: relative;
        }

        .suggestions-grid {
            display: flex;
            overflow-x: hidden;
            scroll-behavior: smooth;
            gap: 15px;
            padding: 10px 0;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .suggestions-grid::-webkit-scrollbar {
            display: none;
        }

        .scroll-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            background-color: rgba(255, 255, 255, 0.9);
            color: #121212;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            font-size: 14px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.3s, background-color 0.3s;
            opacity: 0;
        }
        
        .suggestions-carousel-wrapper:hover .scroll-btn {
            opacity: 1;
        }

        .scroll-btn:hover {
            background-color: white;
        }

        .scroll-btn.left {
            left: 5px;
        }

        .scroll-btn.right {
            right: 5px;
        }
        
        .scroll-btn.hidden {
            opacity: 0 !important;
            pointer-events: none;
        }

        .suggestion-item {
            background-color: var(--light-dark);
            border-radius: 12px;
            padding: 15px;
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border: 1px solid var(--border);
            min-width: 250px;
        }

        .suggestion-item:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .suggestion-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
            font-size: 16px;
        }

        .suggestion-info {
            flex: 1;
        }

        .suggestion-name {
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 2px;
        }

        .suggestion-desc {
            font-size: 12px;
            color: var(--text-secondary);
        }

        .follow-btn {
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 6px 12px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .follow-btn:hover {
            background-color: #0a4a8a;
        }

        .trending-posts {
            margin-bottom: 30px;
        }

        .trending-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .posts-masonry {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 4px;
        }

        .masonry-item {
            position: relative;
            cursor: pointer;
            overflow: hidden;
            background-color: var(--light-dark);
        }

        .masonry-item img,
        .masonry-item video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
            display: block;
        }

        .masonry-item:hover img,
        .masonry-item:hover video {
            transform: scale(1.05);
        }

        .media-type-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            color: white;
            z-index: 5;
            font-size: 14px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.7);
        }

        .masonry-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 10;
        }

        .masonry-item:hover .masonry-overlay {
            opacity: 1;
        }

        .masonry-stat {
            display: flex;
            align-items: center;
            gap: 5px;
            color: white;
            font-weight: 600;
        }

        .masonry-stat i {
            font-size: 16px;
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

        @media (max-width: 768px) {
            .search-bar {
                width: 200px;
            }
            
            .user-actions i:nth-child(2), .user-actions i:nth-child(3) {
                display: none;
            }
            
            .posts-masonry {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                display: none;
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .search-bar {
                width: 150px;
            }
            
            .posts-masonry {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

@section('content')
    <div class="main-content">
        @include('partials.header', ['searchPlaceholder' => 'Search', 'searchInputId' => 'searchInput'])

        <div class="explore-content">
            <div class="search-suggestions">
                <h2 class="suggestions-title">Suggested for you</h2>
                
                <div class="suggestions-carousel-wrapper">
                    <button class="scroll-btn left" id="scrollLeftBtn">
                        <i class="fas fa-chevron-left"></i>
                    </button>

                    <div class="suggestions-grid">
                        <div class="suggestion-item">
                            <div class="suggestion-avatar">TS</div>
                            <div class="suggestion-info">
                                <div class="suggestion-name">Travel Stories</div>
                                <div class="suggestion-desc">Travel & Adventure</div>
                            </div>
                            <button class="follow-btn">Follow</button>
                        </div>
                        
                        <div class="suggestion-item">
                            <div class="suggestion-avatar">FC</div>
                            <div class="suggestion-info">
                                <div class="suggestion-name">Food Chronicles</div>
                                <div class="suggestion-desc">Food & Recipes</div>
                            </div>
                            <button class="follow-btn">Follow</button>
                        </div>
                        
                        <div class="suggestion-item">
                            <div class="suggestion-avatar">FG</div>
                            <div class="suggestion-info">
                                <div class="suggestion-name">Fitness Goals</div>
                                <div class="suggestion-desc">Health & Fitness</div>
                            </div>
                            <button class="follow-btn">Follow</button>
                        </div>
                        
                        <div class="suggestion-item">
                            <div class="suggestion-avatar">AP</div>
                            <div class="suggestion-info">
                                <div class="suggestion-name">Artistic Photos</div>
                                <div class="suggestion-desc">Photography</div>
                            </div>
                            <button class="follow-btn">Follow</button>
                        </div>
                        
                        <div class="suggestion-item">
                            <div class="suggestion-avatar">TD</div>
                            <div class="suggestion-info">
                                <div class="suggestion-name">Tech Daily</div>
                                <div class="suggestion-desc">Technology</div>
                            </div>
                            <button class="follow-btn">Follow</button>
                        </div>
                    </div>

                    <button class="scroll-btn right" id="scrollRightBtn">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>

            <div class="trending-posts">
                <h2 class="trending-title">Trending Now</h2>
                <div class="posts-masonry">
                    <div class="masonry-item">
                        <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" alt="Beach">
                        <div class="masonry-overlay">
                            <div class="masonry-stat">
                                <i class="fas fa-heart"></i>
                                <span>1.2K</span>
                            </div>
                            <div class="masonry-stat">
                                <i class="fas fa-comment"></i>
                                <span>245</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="masonry-item">
                        <video autoplay muted loop playsinline>
                            <source src="videos/my_video_1.mp4" type="video/mp4">
                        </video>
                        <div class="media-type-icon">
                            <i class="fas fa-play"></i>
                        </div>
                        <div class="masonry-overlay">
                            <div class="masonry-stat">
                                <i class="fas fa-heart"></i>
                                <span>3.4K</span>
                            </div>
                            <div class="masonry-stat">
                                <i class="fas fa-comment"></i>
                                <span>451</span>
                            </div>
                        </div>
                    </div>

                    <div class="masonry-item">
                        <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" alt="Forest">
                        <div class="masonry-overlay">
                            <div class="masonry-stat">
                                <i class="fas fa-heart"></i>
                                <span>892</span>
                            </div>
                            <div class="masonry-stat">
                                <i class="fas fa-comment"></i>
                                <span>167</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="masonry-item">
                        <img src="https://images.unsplash.com/photo-1511988617509-a57c8a288659?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" alt="City">
                        <div class="masonry-overlay">
                            <div class="masonry-stat">
                                <i class="fas fa-heart"></i>
                                <span>756</span>
                            </div>
                            <div class="masonry-stat">
                                <i class="fas fa-comment"></i>
                                <span>134</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="masonry-item">
                        <video autoplay muted loop playsinline>
                            <source src="videos/my_video_2.mp4" type="video/mp4">
                        </video>
                        <div class="media-type-icon">
                            <i class="fas fa-play"></i>
                        </div>
                        <div class="masonry-overlay">
                            <div class="masonry-stat">
                                <i class="fas fa-heart"></i>
                                <span>5.1K</span>
                            </div>
                            <div class="masonry-stat">
                                <i class="fas fa-comment"></i>
                                <span>876</span>
                            </div>
                        </div>
                    </div>

                    <div class="masonry-item">
                        <img src="https://images.unsplash.com/photo-1542831371-29b0f74f9713?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto-format&fit=crop&w=500&q=80" alt="Code">
                        <div class="masonry-overlay">
                            <div class="masonry-stat">
                                <i class="fas fa-heart"></i>
                                <span>2.1K</span>
                            </div>
                            <div class="masonry-stat">
                                <i class="fas fa-comment"></i>
                                <span>421</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="masonry-item">
                        <img src="https://images.unsplash.com/photo-1551029506-0807df4e2031?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" alt="Fashion">
                        <div class="masonry-overlay">
                            <div class="masonry-stat">
                                <i class="fas fa-heart"></i>
                                <span>1.5K</span>
                            </div>
                            <div class="masonry-stat">
                                <i class="fas fa-comment"></i>
                                <span>289</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="masonry-item">
                        <img src="https://images.unsplash.com/photo-1542744095-291d1f67b221?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" alt="Workspace">
                        <div class="masonry-overlay">
                            <div class="masonry-stat">
                                <i class="fas fa-heart"></i>
                                <span>934</span>
                            </div>
                            <div class="masonry-stat">
                                <i class="fas fa-comment"></i>
                                <span>156</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('.follow-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.stopPropagation();
                if (this.textContent === 'Follow') {
                    this.textContent = 'Following';
                    this.style.backgroundColor = '#333';
                } else {
                    this.textContent = 'Follow';
                    this.style.backgroundColor = '';
                }
            });
        });

        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            if (searchTerm.length > 2) {
                console.log('Searching for:', searchTerm);
            }
        });

        document.querySelectorAll('.masonry-item').forEach(item => {
            item.addEventListener('click', function() {
                alert('Opening post detail view');
            });
        });

        document.querySelectorAll('.suggestion-item').forEach(item => {
            item.addEventListener('click', function() {
                const suggestionName = this.querySelector('.suggestion-name').textContent;
                alert(`Viewing ${suggestionName} profile`);
            });
        });

        const suggestionsGrid = document.querySelector('.suggestions-grid');
        const scrollLeftBtn = document.getElementById('scrollLeftBtn');
        const scrollRightBtn = document.getElementById('scrollRightBtn');
        
        const cardScrollAmount = 250 + 15;

        function checkScrollButtons() {
            if (!suggestionsGrid) return;
            
            if (suggestionsGrid.scrollLeft <= 0) {
                scrollLeftBtn.classList.add('hidden');
            } else {
                scrollLeftBtn.classList.remove('hidden');
            }

            const maxScroll = suggestionsGrid.scrollWidth - suggestionsGrid.clientWidth;
            
            if (suggestionsGrid.scrollLeft >= maxScroll - 1) {
                scrollRightBtn.classList.add('hidden');
            } else {
                scrollRightBtn.classList.remove('hidden');
            }
        }

        scrollLeftBtn.addEventListener('click', () => {
            suggestionsGrid.scrollLeft -= cardScrollAmount;
        });

        scrollRightBtn.addEventListener('click', () => {
            suggestionsGrid.scrollLeft += cardScrollAmount;
        });

        suggestionsGrid.addEventListener('scroll', checkScrollButtons);

        window.addEventListener('load', function() {
            console.log('Explore page loaded');
            checkScrollButtons();
        });
    </script>
@endpush
