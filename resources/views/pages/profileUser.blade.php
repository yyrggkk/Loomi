@extends('layouts.master')

@section('title', 'Loomi - Profile (User)')

@section('content')
    <div class="profile-user-page">
        @include('partials.header', [
            'searchPlaceholder' => 'Search Loomi',
            'userInitials' => 'JS'
        ])

        <section class="profile-header">
            <div class="profile-info">
                <div class="profile-avatar">
                    <div class="avatar-container">
                        <img src="https://i.pravatar.cc/300?img=1" alt="John Smith avatar">
                    </div>
                </div>
                <div class="profile-details">
                    <div class="profile-stats">
                        <h1 class="profile-username">johnsmith</h1>
                        <div class="profile-actions">
                            <button class="btn btn-primary" id="followBtn">Follow</button>
                            <button class="btn btn-secondary">Message</button>
                            <button class="btn-icon" aria-label="Add user">
                                <i class="fas fa-user-plus" aria-hidden="true"></i>
                            </button>
                            <button class="btn-icon" aria-label="More options">
                                <i class="fas fa-ellipsis-h" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                    <div class="stats">
                        <div class="stat">
                            <div class="stat-count">245</div>
                            <div class="stat-label">Posts</div>
                        </div>
                        <div class="stat">
                            <div class="stat-count">1,284</div>
                            <div class="stat-label">Followers</div>
                        </div>
                        <div class="stat">
                            <div class="stat-count">563</div>
                            <div class="stat-label">Following</div>
                        </div>
                    </div>
                    <div class="profile-bio">
                        <div class="profile-name">John Smith</div>
                        <p class="profile-bio-text">
                            Digital creator &amp; photographer 📸<br>
                            Exploring the world one photo at a time<br>
                            📍 New York City
                        </p>
                    </div>
                </div>
            </div>

            <div class="highlights">
                <div class="highlights-title">Highlights</div>
                <div class="highlights-container">
                    <div class="highlight-item">
                        <div class="highlight-avatar">
                            <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?auto=format&fit=crop&w=200&q=80" alt="Travel highlight">
                        </div>
                        <div class="highlight-name">Travel</div>
                    </div>
                    <div class="highlight-item">
                        <div class="highlight-avatar">
                            <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?auto=format&fit=crop&w=200&q=80" alt="Food highlight">
                        </div>
                        <div class="highlight-name">Food</div>
                    </div>
                    <div class="highlight-item">
                        <div class="highlight-avatar">
                            <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?auto=format&fit=crop&w=200&q=80" alt="Fitness highlight">
                        </div>
                        <div class="highlight-name">Fitness</div>
                    </div>
                    <div class="highlight-item">
                        <div class="highlight-avatar">
                            <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=200&q=80" alt="Beach highlight">
                        </div>
                        <div class="highlight-name">Beach</div>
                    </div>
                    <div class="highlight-item">
                        <div class="highlight-avatar">
                            <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?auto=format&fit=crop&w=200&q=80" alt="Nature highlight">
                        </div>
                        <div class="highlight-name">Nature</div>
                    </div>
                </div>
            </div>

            <div class="profile-nav">
                <a href="#" class="nav-item active" data-tab="posts">
                    <i class="fas fa-table-cells" aria-hidden="true"></i>
                    <span>Posts</span>
                </a>
                <a href="#" class="nav-item" data-tab="reels">
                    <i class="fas fa-clapperboard" aria-hidden="true"></i>
                    <span>Reels</span>
                </a>
                <a href="#" class="nav-item" data-tab="saved">
                    <i class="fas fa-bookmark" aria-hidden="true"></i>
                    <span>Saved</span>
                </a>
            </div>
        </section>

        <section class="profile-feed">
            <div class="posts-grid">
                <div class="post-item">
                    <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?auto=format&fit=crop&w=500&q=80" alt="Mountain view">
                    <div class="post-overlay">
                        <div class="post-stat">
                            <i class="fas fa-heart" aria-hidden="true"></i>
                            <span>245</span>
                        </div>
                        <div class="post-stat">
                            <i class="fas fa-comment" aria-hidden="true"></i>
                            <span>36</span>
                        </div>
                    </div>
                </div>
                <div class="post-item">
                    <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?auto=format&fit=crop&w=500&q=80" alt="Food">
                    <div class="post-overlay">
                        <div class="post-stat">
                            <i class="fas fa-heart" aria-hidden="true"></i>
                            <span>189</span>
                        </div>
                        <div class="post-stat">
                            <i class="fas fa-comment" aria-hidden="true"></i>
                            <span>42</span>
                        </div>
                    </div>
                </div>
                <div class="post-item">
                    <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?auto=format&fit=crop&w=500&q=80" alt="Workout">
                    <div class="post-overlay">
                        <div class="post-stat">
                            <i class="fas fa-heart" aria-hidden="true"></i>
                            <span>521</span>
                        </div>
                        <div class="post-stat">
                            <i class="fas fa-comment" aria-hidden="true"></i>
                            <span>67</span>
                        </div>
                    </div>
                </div>
                <div class="post-item">
                    <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=500&q=80" alt="Beach">
                    <div class="post-overlay">
                        <div class="post-stat">
                            <i class="fas fa-heart" aria-hidden="true"></i>
                            <span>312</span>
                        </div>
                        <div class="post-stat">
                            <i class="fas fa-comment" aria-hidden="true"></i>
                            <span>28</span>
                        </div>
                    </div>
                </div>
                <div class="post-item">
                    <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?auto=format&fit=crop&w=500&q=80" alt="Forest">
                    <div class="post-overlay">
                        <div class="post-stat">
                            <i class="fas fa-heart" aria-hidden="true"></i>
                            <span>428</span>
                        </div>
                        <div class="post-stat">
                            <i class="fas fa-comment" aria-hidden="true"></i>
                            <span>51</span>
                        </div>
                    </div>
                </div>
                <div class="post-item">
                    <img src="https://images.unsplash.com/photo-1464822759844-4c9a1c5d0c9c?auto=format&fit=crop&w=500&q=80" alt="Mountains">
                    <div class="post-overlay">
                        <div class="post-stat">
                            <i class="fas fa-heart" aria-hidden="true"></i>
                            <span>367</span>
                        </div>
                        <div class="post-stat">
                            <i class="fas fa-comment" aria-hidden="true"></i>
                            <span>39</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

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

        body.loomi-body {
            background-color: var(--dark);
            color: var(--text);
        }

        .loomi-layout {
            display: flex;
            min-height: 100vh;
            background-color: var(--dark);
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

        .nav-links a:hover,
        .nav-links a.active {
            background-color: rgba(138, 43, 226, 0.2);
            color: var(--primary);
        }

        .nav-links i {
            margin-right: 12px;
            font-size: 20px;
        }

        .loomi-main {
            flex: 1;
            margin-left: 250px;
            padding: 32px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0 20px;
            margin-bottom: 24px;
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

        .profile-user-page {
            width: 100%;
            padding: 32px;
            color: var(--text);
        }

        .profile-header {
            max-width: 935px;
            margin: 0 auto 44px;
            padding: 0 20px;
        }

        .profile-info {
            display: flex;
            margin-bottom: 44px;
        }

        .profile-avatar {
            flex: 0 0 290px;
            display: flex;
            justify-content: center;
        }

        .avatar-container {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            padding: 4px;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .avatar-container img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--dark);
        }

        .profile-details {
            flex: 1;
        }

        .profile-username {
            font-size: 28px;
            font-weight: 300;
            margin-right: 20px;
        }

        .profile-actions {
            display: flex;
            gap: 8px;
            margin-bottom: 20px;
        }

        .btn {
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--primary);
            color: #fff;
            border: none;
        }

        .btn-secondary {
            background-color: transparent;
            color: var(--text);
            border: 1px solid var(--border);
        }

        .btn-icon {
            background: none;
            border: none;
            color: var(--text);
            font-size: 16px;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .btn-icon:hover,
        .btn-secondary:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .stats {
            display: flex;
            gap: 40px;
            margin-bottom: 20px;
        }

        .stat {
            text-align: center;
        }

        .stat-count {
            font-weight: 600;
            font-size: 16px;
        }

        .stat-label {
            font-size: 14px;
            color: var(--text-secondary);
        }

        .profile-bio-text {
            line-height: 1.5;
            margin-bottom: 10px;
        }

        .highlights {
            margin-bottom: 44px;
        }

        .highlights-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .highlights-container {
            display: flex;
            gap: 24px;
            overflow-x: auto;
            padding: 8px 0;
        }

        .highlight-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
            min-width: 80px;
        }

        .highlight-avatar {
            width: 77px;
            height: 77px;
            border-radius: 50%;
            padding: 2px;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .highlight-avatar img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--dark);
        }

        .highlight-name {
            font-size: 12px;
            color: var(--text-secondary);
            max-width: 80px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .profile-nav {
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: center;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 16px 0;
            margin: 0 20px;
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            border-top: 1px solid transparent;
            margin-top: -1px;
        }

        .nav-item.active {
            color: var(--text);
            border-top-color: var(--text);
        }

        .profile-feed {
            max-width: 935px;
            margin: 0 auto;
            padding: 0 20px 60px;
        }

        .posts-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 4px;
        }

        .post-item {
            aspect-ratio: 1 / 1;
            position: relative;
            cursor: pointer;
            overflow: hidden;
        }

        .post-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .post-item:hover img {
            transform: scale(1.05);
        }

        .post-overlay {
            position: absolute;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 30px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .post-item:hover .post-overlay {
            opacity: 1;
        }

        .post-stat {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #fff;
            font-weight: 600;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            max-width: 935px;
            margin: 0 auto;
        }

        .empty-icon {
            font-size: 64px;
            color: var(--text-secondary);
            margin-bottom: 16px;
        }

        .empty-title {
            font-size: 28px;
            font-weight: 300;
            margin-bottom: 16px;
        }

        .empty-text {
            color: var(--text-secondary);
            margin-bottom: 24px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        @media (max-width: 1100px) {
            .profile-info {
                flex-direction: column;
                text-align: center;
            }

            .profile-avatar {
                margin-bottom: 20px;
            }

            .stats {
                justify-content: center;
            }
        }

        @media (max-width: 768px) {
            .posts-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .profile-user-page {
                padding: 16px;
            }

            .posts-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const navItems = document.querySelectorAll('.profile-user-page .nav-item');
            const postsGrid = document.querySelector('.profile-user-page .posts-grid');
            const profileHeader = document.querySelector('.profile-user-page .profile-header');
            const followBtn = document.getElementById('followBtn');

            const getTabContent = (tab) => {
                switch (tab) {
                    case 'reels':
                        return {
                            icon: 'clapperboard',
                            title: 'No Reels Yet',
                            text: 'When you share reels, they will appear on your profile.'
                        };
                    case 'saved':
                        return {
                            icon: 'bookmark',
                            title: 'No Saved Posts',
                            text: 'Save photos and videos that you want to see again.'
                        };
                    default:
                        return {
                            icon: 'table-cells',
                            title: 'No Posts Yet',
                            text: 'When you share photos, they will appear on your profile.'
                        };
                }
            };

            const renderEmptyState = (tab) => {
                const existingEmpty = document.querySelector('.profile-user-page .empty-state');
                if (existingEmpty) {
                    existingEmpty.remove();
                }

                if (tab === 'posts') {
                    postsGrid.style.display = 'grid';
                    return;
                }

                postsGrid.style.display = 'none';
                const content = getTabContent(tab);
                const empty = document.createElement('div');
                empty.className = 'empty-state';
                empty.innerHTML = `
                    <div class="empty-icon">
                        <i class="fas fa-${content.icon}" aria-hidden="true"></i>
                    </div>
                    <h2 class="empty-title">${content.title}</h2>
                    <p class="empty-text">${content.text}</p>
                `;
                profileHeader.insertAdjacentElement('afterend', empty);
            };

            navItems.forEach((item) => {
                item.addEventListener('click', (event) => {
                    event.preventDefault();
                    navItems.forEach((nav) => nav.classList.remove('active'));
                    item.classList.add('active');
                    renderEmptyState(item.dataset.tab);
                });
            });

            document.querySelectorAll('.profile-user-page .post-item').forEach((post) => {
                post.addEventListener('click', () => alert('Opening post detail view'));
            });

            document.querySelectorAll('.profile-user-page .highlight-item').forEach((highlight) => {
                highlight.addEventListener('click', () => {
                    const name = highlight.querySelector('.highlight-name').textContent;
                    alert(`Viewing ${name} highlight`);
                });
            });

            if (followBtn) {
                followBtn.addEventListener('click', () => {
                    const isFollowing = followBtn.textContent.trim() === 'Following';
                    followBtn.textContent = isFollowing ? 'Follow' : 'Following';
                    followBtn.style.backgroundColor = isFollowing ? 'var(--primary)' : '#333';
                });
            }
        });
    </script>
@endpush
