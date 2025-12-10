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
                    <div class="highlight-item" data-highlight-id="travel">
                        <div class="highlight-avatar">
                            <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?auto=format&fit=crop&w=200&q=80" alt="Travel highlight">
                        </div>
                        <span class="highlight-name">Travel</span>
                    </div>
                    <div class="highlight-item" data-highlight-id="food">
                        <div class="highlight-avatar">
                            <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?auto=format&fit=crop&w=200&q=80" alt="Food highlight">
                        </div>
                        <span class="highlight-name">Food</span>
                    </div>
                    <div class="highlight-item" data-highlight-id="fitness">
                        <div class="highlight-avatar">
                            <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?auto=format&fit=crop&w=200&q=80" alt="Fitness highlight">
                        </div>
                        <span class="highlight-name">Fitness</span>
                    </div>
                    <div class="highlight-item" data-highlight-id="beach">
                        <div class="highlight-avatar">
                            <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=200&q=80" alt="Beach highlight">
                        </div>
                        <span class="highlight-name">Beach</span>
                    </div>
                    <div class="highlight-item" data-highlight-id="nature">
                        <div class="highlight-avatar">
                            <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?auto=format&fit=crop&w=200&q=80" alt="Nature highlight">
                        </div>
                        <span class="highlight-name">Nature</span>
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
                    <span>Loopis</span>
                </a>
            </div>
        </section>

        <section class="profile-feed">
            <div class="profile-content-grid active" id="posts-content">
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
            </div>

            <div class="profile-content-grid" id="reels-content">
                <div class="reels-grid">
                    <div class="reel-card">
                        <div class="reel-thumb">
                            <video muted loop playsinline preload="metadata">
                                <source src="{{ asset('videos/bg.mp4') }}" type="video/mp4">
                            </video>
                            <div class="post-overlay">
                                <div class="post-stat">
                                    <i class="fas fa-heart" aria-hidden="true"></i>
                                    <span>12.4K</span>
                                </div>
                                <div class="post-stat">
                                    <i class="fas fa-comment" aria-hidden="true"></i>
                                    <span>864</span>
                                </div>
                            </div>
                        </div>
                        <div class="reel-meta">
                            <p>12.4K views · 1d</p>
                        </div>
                    </div>
                    <div class="reel-card">
                        <div class="reel-thumb">
                            <video muted loop playsinline preload="metadata">
                                <source src="{{ asset('videos/bg.mp4') }}" type="video/mp4">
                            </video>
                            <div class="post-overlay">
                                <div class="post-stat">
                                    <i class="fas fa-heart" aria-hidden="true"></i>
                                    <span>9.1K</span>
                                </div>
                                <div class="post-stat">
                                    <i class="fas fa-comment" aria-hidden="true"></i>
                                    <span>542</span>
                                </div>
                            </div>
                        </div>
                        <div class="reel-meta">
                            <p>9.1K views · 3d</p>
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

        /* Reels styling to match profile */
        .profile-content-grid {
            display: none;
        }

        .profile-content-grid.active {
            display: block;
        }

        .reels-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 8px;
        }

        .reel-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border);
            border-radius: 18px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .reel-thumb {
            position: relative;
            overflow: hidden;
            aspect-ratio: 1 / 1;
        }

        .reel-thumb video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .reel-card .post-overlay {
            opacity: 0;
        }

        .reel-card:hover .post-overlay {
            opacity: 1;
        }

        .reel-meta {
            padding: 12px 14px 14px;
        }

        .reel-meta p {
            color: var(--text-secondary);
            font-size: 14px;
        }

        /* Highlight story modal (match profile) */
        .highlight-modal {
            position: fixed;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.6);
            z-index: 120;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.2s ease;
        }

        .highlight-modal.active {
            opacity: 1;
            pointer-events: all;
        }

        .highlight-modal-content {
            width: 920px;
            max-width: 96%;
            max-height: 90vh;
            border-radius: 18px;
            background-color: var(--light-dark);
            border: 1px solid var(--border);
            padding: 20px;
            overflow: hidden;
            position: relative;
            z-index: 2;
        }

        .highlight-modal-overlay {
            position: absolute;
            inset: 0;
            background: transparent;
            z-index: 1;
        }

        .highlight-story-viewer {
            display: flex;
            gap: 20px;
            align-items: stretch;
            height: 100%;
            min-height: 0;
        }

        .highlight-story-main {
            flex: 1 1 65%;
            background-color: #111;
            border-radius: 18px;
            padding: 18px;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
            gap: 14px;
            min-height: 0;
        }

        .highlight-story-progress {
            display: flex;
            gap: 6px;
            margin-bottom: 8px;
        }

        .highlight-story-track {
            flex: 1;
            height: 3px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.2);
            overflow: hidden;
        }

        .highlight-story-fill {
            height: 100%;
            width: 0;
            background: #fff;
            transition: width 0.15s linear;
        }

        .highlight-story-track.completed .highlight-story-fill {
            width: 100%;
        }

        .highlight-story-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #fff;
            margin-bottom: 8px;
        }

        .highlight-story-user {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .highlight-story-user img {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.5);
            object-fit: cover;
        }

        .highlight-story-user strong {
            font-size: 15px;
        }

        .highlight-story-user span {
            display: block;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.7);
        }

        .highlight-story-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .highlight-icon-btn {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.4);
            background: rgba(0, 0, 0, 0.35);
            color: #fff;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s ease;
        }

        .highlight-icon-btn:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        .highlight-story-stage {
            flex: 1 1 auto;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            overflow: hidden;
            width: 100%;
            aspect-ratio: 9 / 16;
            height: clamp(360px, 60vh, 560px);
            background: #000;
            min-height: 0;
        }

        .highlight-story-media {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .highlight-story-media img,
        .highlight-story-media video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .highlight-story-media video {
            object-fit: contain;
            background: #000;
        }

        .highlight-story-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 2;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.4);
            background: rgba(0, 0, 0, 0.35);
            color: #fff;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s ease;
        }

        .highlight-story-nav.prev { left: 12px; }
        .highlight-story-nav.next { right: 12px; }

        .highlight-story-nav:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        .highlight-story-sidebar {
            flex: 0 0 260px;
            background: var(--dark);
            border-radius: 16px;
            padding: 15px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            border: 1px solid var(--border);
            height: 100%;
            min-height: 0;
        }

        .highlight-story-sidebar h3 {
            margin: 0;
            font-size: 15px;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .highlight-story-queue {
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding-right: 4px;
            flex: 1 1 auto;
        }

        .highlight-story-queue::-webkit-scrollbar {
            width: 8px;
        }

        .highlight-story-queue::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 999px;
        }

        .highlight-story-queue::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.45);
            border-radius: 999px;
        }

        .highlight-story-queue-item {
            background: transparent;
            border: 1px solid transparent;
            border-radius: 12px;
            padding: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            text-align: left;
            cursor: pointer;
            color: var(--text);
            transition: border-color 0.2s ease, background 0.2s ease;
        }

        .highlight-story-queue-item.active {
            border-color: var(--primary);
            background: rgba(255, 255, 255, 0.03);
        }

        .highlight-story-queue-thumb img {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid transparent;
            transition: border-color 0.2s ease, filter 0.2s ease;
        }

        .highlight-story-queue-meta {
            display: flex;
            flex-direction: column;
            font-size: 13px;
        }

        .highlight-story-queue-meta span:last-child {
            color: var(--text-secondary);
            font-size: 12px;
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

        @media (max-width: 768px) {
            .posts-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .reels-grid {
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

            .reels-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

@push('modals')
    <div class="highlight-modal" id="highlightStoryModal" aria-modal="true" role="dialog">
        <div class="highlight-modal-overlay" id="highlightStoryOverlay"></div>
        <div class="highlight-modal-content">
            <div class="highlight-story-viewer">
                <div class="highlight-story-main">
                    <div class="highlight-story-progress" id="highlightStoryProgress"></div>
                    <div class="highlight-story-header">
                        <div class="highlight-story-user">
                            <img src="https://i.pravatar.cc/150?img=1" alt="Highlight avatar" id="highlightStoryAvatar">
                            <div>
                                <strong id="highlightStoryTitle">Travel</strong>
                                <span id="highlightStoryTime">2d ago</span>
                            </div>
                        </div>
                        <div class="highlight-story-actions">
                            <button class="highlight-icon-btn" id="highlightStoryPause" aria-label="Pause highlight">
                                <i class="fas fa-pause"></i>
                            </button>
                            <button class="highlight-icon-btn" id="highlightStoryMute" aria-label="Mute highlight">
                                <i class="fas fa-volume-mute"></i>
                            </button>
                            <button class="highlight-icon-btn" id="highlightStoryClose" aria-label="Close highlight viewer">&times;</button>
                        </div>
                    </div>
                    <div class="highlight-story-stage">
                        <button class="highlight-story-nav prev" id="highlightStoryPrev" aria-label="Previous highlight">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <div class="highlight-story-media" id="highlightStoryMedia"></div>
                        <button class="highlight-story-nav next" id="highlightStoryNext" aria-label="Next highlight">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
                <div class="highlight-story-sidebar">
                    <h3>Highlights</h3>
                    <div class="highlight-story-queue" id="highlightStoryQueue"></div>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const navItems = document.querySelectorAll('.profile-user-page .nav-item');
            const contentGrids = document.querySelectorAll('.profile-user-page .profile-content-grid');
            const followBtn = document.getElementById('followBtn');

            navItems.forEach((item) => {
                item.addEventListener('click', (event) => {
                    event.preventDefault();
                    const tabToActivate = item.getAttribute('data-tab');

                    navItems.forEach((nav) => nav.classList.remove('active'));
                    item.classList.add('active');

                    contentGrids.forEach((grid) => {
                        if (grid.id === `${tabToActivate}-content`) {
                            grid.classList.add('active');
                        } else {
                            grid.classList.remove('active');
                        }
                    });
                });
            });

            document.querySelectorAll('.profile-user-page .post-item').forEach((post) => {
                post.addEventListener('click', () => alert('Opening post detail view'));
            });

            if (followBtn) {
                followBtn.addEventListener('click', () => {
                    const isFollowing = followBtn.textContent.trim() === 'Following';
                    followBtn.textContent = isFollowing ? 'Follow' : 'Following';
                    followBtn.style.backgroundColor = isFollowing ? 'var(--primary)' : '#333';
                });
            }

            // Highlight story viewer logic (mirrors profile)
            const highlightData = {
                travel: {
                    title: 'Travel',
                    ago: '2d ago',
                    src: "https://images.unsplash.com/photo-1506905925346-21bda4d32df4?auto=format&fit=crop&w=900&q=80",
                    poster: 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?auto=format&fit=crop&w=900&q=80'
                },
                food: {
                    title: 'Food',
                    ago: '3d ago',
                    src: "https://images.unsplash.com/photo-1565958011703-44f9829ba187?auto=format&fit=crop&w=900&q=80",
                    poster: 'https://images.unsplash.com/photo-1565958011703-44f9829ba187?auto=format&fit=crop&w=900&q=80'
                },
                fitness: {
                    title: 'Fitness',
                    ago: '4d ago',
                    src: "https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?auto=format&fit=crop&w=900&q=80",
                    poster: 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?auto=format&fit=crop&w=900&q=80'
                },
                beach: {
                    title: 'Beach',
                    ago: '5d ago',
                    src: "https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=900&q=80",
                    poster: 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=900&q=80'
                },
                nature: {
                    title: 'Nature',
                    ago: '1w ago',
                    src: "https://images.unsplash.com/photo-1441974231531-c6227db76b6e?auto=format&fit=crop&w=900&q=80",
                    poster: 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?auto=format&fit=crop&w=900&q=80'
                }
            };

            const highlightStoryModal = document.getElementById('highlightStoryModal');
            const highlightStoryOverlay = document.getElementById('highlightStoryOverlay');
            const highlightStoryMedia = document.getElementById('highlightStoryMedia');
            const highlightStoryProgress = document.getElementById('highlightStoryProgress');
            const highlightStoryQueue = document.getElementById('highlightStoryQueue');
            const highlightStoryAvatar = document.getElementById('highlightStoryAvatar');
            const highlightStoryTitle = document.getElementById('highlightStoryTitle');
            const highlightStoryTime = document.getElementById('highlightStoryTime');
            const highlightStoryPause = document.getElementById('highlightStoryPause');
            const highlightStoryMute = document.getElementById('highlightStoryMute');
            const highlightStoryClose = document.getElementById('highlightStoryClose');
            const highlightStoryPrev = document.getElementById('highlightStoryPrev');
            const highlightStoryNext = document.getElementById('highlightStoryNext');

            const highlightItems = document.querySelectorAll('.profile-user-page .highlight-item');
            const highlightOrder = Array.from(highlightItems).map(item => item.getAttribute('data-highlight-id'));

            const resolveAvatar = (id) => {
                const circleImg = document.querySelector(`.highlight-item[data-highlight-id="${id}"] img`);
                if (circleImg?.src) return circleImg.src;
                return 'https://i.pravatar.cc/150?img=1';
            };

            let highlightSequence = highlightOrder.map((id) => {
                const data = highlightData[id] || {};
                return {
                    id,
                    displayName: data.title || 'Highlight',
                    avatar: resolveAvatar(id),
                    lastActive: data.ago || 'Just now',
                    stories: [
                        {
                            type: 'video',
                            src: data.src || "{{ asset('videos/bg.mp4') }}",
                            duration: 7,
                            postedAgo: data.ago || 'Just now',
                            poster: data.poster
                        }
                    ]
                };
            });

            let activeHighlightIndex = 0;
            let activeStoryIndex = 0;
            let activeProgressFill = null;
            let highlightInterval = null;
            let highlightProgressTimer = null;
            let highlightProgressStart = 0;
            let highlightProgressDuration = 0;
            let activeHighlightVideo = null;
            let highlightPaused = false;
            let highlightMuted = true;

            const getActiveHighlight = () => highlightSequence[activeHighlightIndex];
            const getActiveStory = () => getActiveHighlight()?.stories[activeStoryIndex];

            const stopHighlightPlayback = () => {
                if (highlightInterval) {
                    clearInterval(highlightInterval);
                    highlightInterval = null;
                }
                if (highlightProgressTimer) {
                    cancelAnimationFrame(highlightProgressTimer);
                    highlightProgressTimer = null;
                }
                if (activeHighlightVideo) {
                    activeHighlightVideo.pause();
                    activeHighlightVideo.currentTime = 0;
                    activeHighlightVideo = null;
                }
            };

            const renderProgressBars = (highlight) => {
                if (!highlightStoryProgress) return;
                highlightStoryProgress.innerHTML = '';
                activeProgressFill = null;
                (highlight.stories || []).forEach((story, index) => {
                    const track = document.createElement('div');
                    track.className = 'highlight-story-track';
                    if (index < activeStoryIndex) {
                        track.classList.add('completed');
                    }
                    const fill = document.createElement('div');
                    fill.className = 'highlight-story-fill';
                    if (index < activeStoryIndex) {
                        fill.style.width = '100%';
                    }
                    track.appendChild(fill);
                    highlightStoryProgress.appendChild(track);
                    if (index === activeStoryIndex) {
                        activeProgressFill = fill;
                    }
                });
            };

            const startImageTimer = (durationSeconds) => {
                const seconds = durationSeconds && durationSeconds > 0 ? durationSeconds : 5;
                let elapsed = 0;
                const total = seconds * 1000;
                if (activeProgressFill) {
                    activeProgressFill.style.width = '0%';
                }
                highlightInterval = setInterval(() => {
                    if (highlightPaused) return;
                    elapsed += 50;
                    const ratio = Math.min(elapsed / total, 1);
                    if (activeProgressFill) {
                        activeProgressFill.style.width = `${ratio * 100}%`;
                    }
                    if (ratio >= 1) {
                        clearInterval(highlightInterval);
                        highlightInterval = null;
                        nextHighlightStory();
                    }
                }, 50);
            };

            const startProgressTimer = (durationMs) => {
                highlightProgressDuration = durationMs;
                highlightProgressStart = performance.now();
                const tick = (now) => {
                    if (highlightPaused) {
                        highlightProgressTimer = requestAnimationFrame(tick);
                        return;
                    }
                    const elapsed = now - highlightProgressStart;
                    const ratio = Math.min(elapsed / highlightProgressDuration, 1);
                    if (activeProgressFill) {
                        activeProgressFill.style.width = `${ratio * 100}%`;
                    }
                    if (ratio >= 1) {
                        nextHighlightStory();
                    } else {
                        highlightProgressTimer = requestAnimationFrame(tick);
                    }
                };
                highlightProgressTimer = requestAnimationFrame(tick);
            };

            const syncMuteState = () => {
                if (activeHighlightVideo) {
                    activeHighlightVideo.muted = highlightMuted;
                    activeHighlightVideo.volume = highlightMuted ? 0 : 1;
                }
                if (highlightStoryMute) {
                    const icon = highlightStoryMute.querySelector('i');
                    if (icon) {
                        icon.className = `fas fa-volume-${highlightMuted ? 'mute' : 'up'}`;
                    }
                }
            };

            const updatePauseButton = () => {
                if (!highlightStoryPause) return;
                const icon = highlightStoryPause.querySelector('i');
                if (icon) {
                    icon.className = `fas fa-${highlightPaused ? 'play' : 'pause'}`;
                }
            };

            const renderQueue = () => {
                if (!highlightStoryQueue) return;
                highlightStoryQueue.innerHTML = '';
                highlightSequence.forEach((entry, index) => {
                    const item = document.createElement('button');
                    item.type = 'button';
                    item.className = `highlight-story-queue-item${index === activeHighlightIndex ? ' active' : ''}`;
                    item.innerHTML = `
                        <div class="highlight-story-queue-thumb">
                            <img src="${entry.avatar}" alt="${entry.displayName}">
                        </div>
                        <div class="highlight-story-queue-meta">
                            <span>${entry.displayName}</span>
                            <span>${entry.lastActive}</span>
                        </div>
                    `;
                    item.addEventListener('click', () => {
                        goToHighlight(index, 0);
                    });
                    highlightStoryQueue.appendChild(item);
                });
            };

            const renderHighlightStory = () => {
                const highlight = getActiveHighlight();
                const story = getActiveStory();
                if (!highlight || !story || !highlightStoryMedia) return;

                stopHighlightPlayback();
                highlightPaused = false;
                updatePauseButton();

                if (highlightStoryTitle) highlightStoryTitle.textContent = highlight.displayName;
                if (highlightStoryAvatar) {
                    highlightStoryAvatar.src = highlight.avatar;
                    highlightStoryAvatar.alt = `${highlight.displayName} avatar`;
                }
                if (highlightStoryTime) highlightStoryTime.textContent = story.postedAgo || highlight.lastActive;

                renderProgressBars(highlight);
                renderQueue();

                highlightStoryMedia.innerHTML = '';

                if (story.type === 'video') {
                    const video = document.createElement('video');
                    video.src = story.src;
                    if (story.poster) video.poster = story.poster;
                    video.autoplay = true;
                    video.muted = highlightMuted;
                    video.playsInline = true;
                    video.controls = false;
                    video.loop = false;
                    highlightStoryMedia.appendChild(video);
                    activeHighlightVideo = video;

                    const updateVideoProgress = () => {
                        if (!activeProgressFill || !video.duration || Number.isNaN(video.duration)) return;
                        const ratio = Math.min(video.currentTime / video.duration, 1);
                        activeProgressFill.style.width = `${ratio * 100}%`;
                    };

                    video.addEventListener('timeupdate', updateVideoProgress);
                    video.addEventListener('ended', () => nextHighlightStory());
                    const beginTimedProgress = () => {
                        const durationMs = video.duration && !Number.isNaN(video.duration)
                            ? video.duration * 1000
                            : 7000;
                        startProgressTimer(durationMs);
                    };
                    if (video.readyState >= 1 && video.duration) {
                        updateVideoProgress();
                        beginTimedProgress();
                    } else {
                        video.addEventListener('loadedmetadata', () => {
                            updateVideoProgress();
                            beginTimedProgress();
                        }, { once: true });
                    }
                    syncMuteState();
                } else {
                    const img = document.createElement('img');
                    img.src = story.src;
                    img.alt = story.caption || highlight.displayName;
                    highlightStoryMedia.appendChild(img);
                    startProgressTimer((story.duration && story.duration > 0 ? story.duration : 5) * 1000);
                }
            };

            const goToHighlight = (index, storyIndex = 0) => {
                const total = highlightSequence.length;
                if (!total) return;
                activeHighlightIndex = ((index % total) + total) % total;
                const target = getActiveHighlight();
                activeStoryIndex = Math.min(Math.max(storyIndex, 0), (target?.stories.length || 1) - 1);
                renderHighlightStory();
            };

            const nextHighlightStory = () => {
                const highlight = getActiveHighlight();
                if (!highlight) return;
                if (activeStoryIndex < (highlight.stories.length - 1)) {
                    activeStoryIndex += 1;
                    renderHighlightStory();
                    return;
                }
                goToHighlight(activeHighlightIndex + 1, 0);
            };

            const prevHighlightStory = () => {
                if (!highlightSequence.length) return;
                if (activeStoryIndex > 0) {
                    activeStoryIndex -= 1;
                    renderHighlightStory();
                    return;
                }
                const total = highlightSequence.length;
                const targetIndex = ((activeHighlightIndex - 1) % total + total) % total;
                const targetHighlight = highlightSequence[targetIndex];
                const lastStoryIndex = Math.max((targetHighlight?.stories.length || 1) - 1, 0);
                goToHighlight(targetIndex, lastStoryIndex);
            };

            const closeHighlightModal = () => {
                stopHighlightPlayback();
                if (highlightStoryModal) {
                    highlightStoryModal.classList.remove('active');
                }
            };

            const openHighlightModal = (id) => {
                const targetIndex = highlightSequence.findIndex(entry => entry.id === id);
                goToHighlight(targetIndex === -1 ? 0 : targetIndex, 0);
                if (highlightStoryModal) {
                    highlightStoryModal.classList.add('active');
                }
            };

            if (highlightStoryOverlay) {
                highlightStoryOverlay.addEventListener('click', closeHighlightModal);
            }

            if (highlightStoryClose) {
                highlightStoryClose.addEventListener('click', closeHighlightModal);
            }

            if (highlightStoryPrev) {
                highlightStoryPrev.addEventListener('click', (event) => {
                    event.stopPropagation();
                    prevHighlightStory();
                });
            }

            if (highlightStoryNext) {
                highlightStoryNext.addEventListener('click', (event) => {
                    event.stopPropagation();
                    nextHighlightStory();
                });
            }

            if (highlightStoryMedia) {
                highlightStoryMedia.addEventListener('click', (event) => {
                    const bounds = highlightStoryMedia.getBoundingClientRect();
                    const clickX = event.clientX - bounds.left;
                    if (clickX < bounds.width / 2) {
                        prevHighlightStory();
                    } else {
                        nextHighlightStory();
                    }
                });
            }

            if (highlightStoryPause) {
                highlightStoryPause.addEventListener('click', (event) => {
                    event.stopPropagation();
                    highlightPaused = !highlightPaused;
                    updatePauseButton();
                    if (activeHighlightVideo) {
                        if (highlightPaused) {
                            activeHighlightVideo.pause();
                        } else {
                            activeHighlightVideo.play().catch(() => {});
                        }
                    }
                });
            }

            if (highlightStoryMute) {
                highlightStoryMute.addEventListener('click', (event) => {
                    event.stopPropagation();
                    highlightMuted = !highlightMuted;
                    syncMuteState();
                });
            }

            highlightItems.forEach((highlight) => {
                highlight.addEventListener('click', () => {
                    const id = highlight.getAttribute('data-highlight-id');
                    openHighlightModal(id);
                });
            });

            if (highlightSequence.length) {
                goToHighlight(0, 0);
            }

            // Hover-to-play for reel videos (match profile)
            const reelVideos = document.querySelectorAll('.profile-user-page .reel-thumb video');
            reelVideos.forEach(video => {
                const card = video.closest('.reel-card');
                if (!card) return;

                video.pause();
                video.currentTime = 0;

                card.addEventListener('mouseenter', () => {
                    video.play().catch(() => {});
                });

                card.addEventListener('mouseleave', () => {
                    video.pause();
                    video.currentTime = 0;
                });
            });
        });
    </script>
@endpush
