@extends('layouts.master')

@section('title', 'Loomi - Profile')

@section('content')
    <div class="profile-page">
        @include('partials.header', [
            'searchPlaceholder' => 'Search Loomi',
            'userInitials' => 'AR'
        ])

        <section class="profile-header">
            <div class="profile-info">
                <div class="profile-avatar">
                    <div class="avatar-container" id="avatarContainer">
                        <img src="https://images.unsplash.com/photo-1544723795-3fb6469f5b39?auto=format&fit=crop&w=400&q=80" alt="Profile avatar" id="profileAvatar">
                    </div>
                </div>
                <div class="profile-details">
                    <div class="profile-top-row">
                        <h1 class="profile-username" id="profileUsername">@@alicia.rose</h1>
                        <div class="profile-actions">
                            <button class="btn btn-secondary" id="editProfileBtn">Edit Profile</button>
                            <button class="btn btn-secondary">Share Profile</button>
                        </div>
                    </div>
                    <div class="stats">
                        <div class="stat">
                            <span class="stat-count">245</span>
                            <span class="stat-label">Posts</span>
                        </div>
                        <div class="stat">
                            <span class="stat-count">4,120</span>
                            <span class="stat-label">Followers</span>
                        </div>
                        <div class="stat">
                            <span class="stat-count">892</span>
                            <span class="stat-label">Following</span>
                        </div>
                    </div>
                    <div class="profile-bio">
                        <div class="profile-name" id="profileName">Alicia Rose</div>
                        <p class="profile-bio-text" id="profileBio">
                            Creative director &amp; lifestyle storyteller.<br>
                            Obsessed with bold color palettes and cozy city corners.
                        </p>
                    </div>
                </div>
            </div>

            <div class="highlights">
                <div class="highlights-title">
                    Highlights
                    <button class="highlight-add" id="addHighlight">
                        <i class="fas fa-plus" aria-hidden="true"></i>
                        Add
                    </button>
                </div>
                <div class="highlights-container">
                    <div class="highlight-item" data-highlight-id="city-trips">
                        <div class="highlight-avatar">
                            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=200&q=80" alt="City trips">
                        </div>
                        <span class="highlight-name">City Trips</span>
                    </div>
                    <div class="highlight-item" data-highlight-id="studio">
                        <div class="highlight-avatar">
                            <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=200&q=80" alt="Studio">
                        </div>
                        <span class="highlight-name">Studio</span>
                    </div>
                    <div class="highlight-item" data-highlight-id="moodboards">
                        <div class="highlight-avatar">
                            <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=200&q=80" alt="Moodboards">
                        </div>
                        <span class="highlight-name">Moodboards</span>
                    </div>
                    <div class="highlight-item" data-highlight-id="launches">
                        <div class="highlight-avatar">
                            <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=200&q=80" alt="Launches">
                        </div>
                        <span class="highlight-name">Launches</span>
                    </div>
                </div>
            </div>

            <div class="highlights-watch" id="highlightsWatch">
                <div class="highlight-player">
                    <div class="highlight-progress" id="highlightProgress"></div>
                    <button class="highlight-close" aria-label="Close highlights" id="highlightClose">&times;</button>
                    <button class="highlight-skip prev" aria-label="Previous highlight" id="highlightPrev"></button>
                    <button class="highlight-skip next" aria-label="Next highlight" id="highlightNext"></button>
                    <video id="highlightVideo" muted playsinline preload="metadata">
                        <source src="{{ asset('videos/bg.mp4') }}" type="video/mp4">
                    </video>
                    <div class="highlight-overlay">
                        <div>
                            <h3 id="highlightTitle">City Trips</h3>
                            <p id="highlightDesc">City lights, coffee stops, and late-night edits.</p>
                            <div class="highlight-meta-row">
                                <span id="highlightViews">32.4K views</span>
                                <span aria-hidden="true">·</span>
                                <span id="highlightAgo">2d ago</span>
                            </div>
                        </div>
                        <button class="btn btn-secondary" id="highlightReplay">Replay</button>
                    </div>
                </div>
                <div class="highlight-thumbs" id="highlightThumbs">
                    <button class="thumb" data-highlight-id="city-trips">
                        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=200&q=80" alt="City Trips thumbnail">
                        <span>City Trips</span>
                    </button>
                    <button class="thumb" data-highlight-id="studio">
                        <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=200&q=80" alt="Studio thumbnail">
                        <span>Studio</span>
                    </button>
                    <button class="thumb" data-highlight-id="moodboards">
                        <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=200&q=80" alt="Moodboards thumbnail">
                        <span>Moodboards</span>
                    </button>
                    <button class="thumb" data-highlight-id="launches">
                        <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=200&q=80" alt="Launches thumbnail">
                        <span>Launches</span>
                    </button>
                </div>
            </div>
        </section>

        <section class="profile-content">
            <div class="profile-nav">
                <a class="nav-item active" data-tab="posts">
                    <i class="fas fa-table-cells" aria-hidden="true"></i>
                    <span>Posts</span>
                </a>
                <a class="nav-item" data-tab="reels">
                    <i class="fas fa-clapperboard" aria-hidden="true"></i>
                    <span>Loopis</span>
                </a>
            </div>

            <div class="profile-content-grid active" id="posts-content">
                <div class="posts-grid">
                    <div class="post-item">
                        <img src="https://images.unsplash.com/photo-1529333166437-7750a6dd5a70?auto=format&fit=crop&w=600&q=80" alt="Creative desk">
                        <div class="post-overlay">
                            <div class="post-stat">
                                <i class="fas fa-heart" aria-hidden="true"></i>
                                <span>1,204</span>
                            </div>
                            <div class="post-stat">
                                <i class="fas fa-comment" aria-hidden="true"></i>
                                <span>114</span>
                            </div>
                        </div>
                    </div>
                    <div class="post-item">
                        <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=600&q=80" alt="Portrait">
                        <div class="post-overlay">
                            <div class="post-stat">
                                <i class="fas fa-heart" aria-hidden="true"></i>
                                <span>982</span>
                            </div>
                            <div class="post-stat">
                                <i class="fas fa-comment" aria-hidden="true"></i>
                                <span>78</span>
                            </div>
                        </div>
                    </div>
                    <div class="post-item">
                        <img src="https://images.unsplash.com/photo-1521572267360-ee0c2909d518?auto=format&fit=crop&w=600&q=80" alt="Workspace">
                        <div class="post-overlay">
                            <div class="post-stat">
                                <i class="fas fa-heart" aria-hidden="true"></i>
                                <span>764</span>
                            </div>
                            <div class="post-stat">
                                <i class="fas fa-comment" aria-hidden="true"></i>
                                <span>56</span>
                            </div>
                        </div>
                    </div>
                    <div class="post-item">
                        <img src="https://images.unsplash.com/photo-1470246973918-29a93221c455?auto=format&fit=crop&w=600&q=80" alt="City walk">
                        <div class="post-overlay">
                            <div class="post-stat">
                                <i class="fas fa-heart" aria-hidden="true"></i>
                                <span>1,582</span>
                            </div>
                            <div class="post-stat">
                                <i class="fas fa-comment" aria-hidden="true"></i>
                                <span>210</span>
                            </div>
                        </div>
                    </div>
                    <div class="post-item">
                        <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=600&q=80" alt="Plants">
                        <div class="post-overlay">
                            <div class="post-stat">
                                <i class="fas fa-heart" aria-hidden="true"></i>
                                <span>654</span>
                            </div>
                            <div class="post-stat">
                                <i class="fas fa-comment" aria-hidden="true"></i>
                                <span>38</span>
                            </div>
                        </div>
                    </div>
                    <div class="post-item">
                        <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=600&q=80" alt="Sunset">
                        <div class="post-overlay">
                            <div class="post-stat">
                                <i class="fas fa-heart" aria-hidden="true"></i>
                                <span>1,024</span>
                            </div>
                            <div class="post-stat">
                                <i class="fas fa-comment" aria-hidden="true"></i>
                                <span>64</span>
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
                                    <span>24K</span>
                                </div>
                                <div class="post-stat">
                                    <i class="fas fa-comment" aria-hidden="true"></i>
                                    <span>1.2K</span>
                                </div>
                            </div>
                        </div>
                        <div class="reel-meta">
                            <p>24K views · 2d</p>
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
                                    <span>19K</span>
                                </div>
                                <div class="post-stat">
                                    <i class="fas fa-comment" aria-hidden="true"></i>
                                    <span>870</span>
                                </div>
                            </div>
                        </div>
                        <div class="reel-meta">
                            <p>19K views · 5d</p>
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

        .profile-page {
            width: 100%;
            padding: 24px 32px;
            display: flex;
            flex-direction: column;
            gap: 32px;
        }

        .profile-header {
            background-color: var(--light-dark);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 32px;
        }

        .profile-info {
            display: flex;
            gap: 32px;
            margin-bottom: 32px;
        }

        .profile-avatar {
            flex: 0 0 220px;
            display: flex;
            justify-content: center;
        }

        .avatar-container {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            padding: 4px;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .avatar-container img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--dark);
        }

        .profile-details {
            flex: 1;
        }

        .profile-top-row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
        }

        .profile-username {
            font-size: 32px;
            font-weight: 300;
        }

        .profile-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .btn {
            padding: 10px 18px;
            border-radius: 10px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-secondary {
            background-color: transparent;
            border: 1px solid var(--border);
            color: var(--text);
        }

        .btn-secondary:hover {
            background-color: rgba(255, 255, 255, 0.08);
        }

        .btn-icon {
            background: none;
            border: 1px solid var(--border);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            color: var(--text);
        }

        .btn-icon:hover {
            background-color: rgba(255, 255, 255, 0.08);
        }

        .stats {
            display: flex;
            gap: 32px;
            margin-bottom: 20px;
        }

        .stat {
            display: flex;
            flex-direction: column;
        }

        .stat-count {
            font-size: 18px;
            font-weight: 600;
        }

        .stat-label {
            font-size: 14px;
            color: var(--text-secondary);
        }

        .profile-bio-text {
            line-height: 1.6;
            color: var(--text-secondary);
            margin: 12px 0;
        }

        .profile-website {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
        }

        .profile-website:hover {
            text-decoration: underline;
        }

        .highlights-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .highlight-add {
            background: none;
            border: 1px dashed var(--border);
            color: var(--text-secondary);
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .highlights-container {
            display: flex;
            gap: 24px;
            overflow-x: auto;
        }

        .highlights-watch {
            margin-top: 20px;
            background: radial-gradient(circle at 20% 20%, rgba(9, 90, 162, 0.15), transparent 40%),
                        radial-gradient(circle at 80% 10%, rgba(0, 242, 254, 0.12), transparent 35%),
                        rgba(255, 255, 255, 0.02);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 16px;
            display: none;
            grid-template-columns: 1.4fr 0.9fr;
            gap: 16px;
            align-items: stretch;
        }

        .highlights-watch.active {
            display: grid;
        }

        .highlight-player {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            background: #000;
            min-height: 260px;
        }

        .highlight-progress {
            position: absolute;
            top: 12px;
            left: 12px;
            right: 12px;
            display: flex;
            gap: 6px;
            z-index: 3;
        }

        .highlight-progress .bar {
            flex: 1;
            height: 4px;
            background: rgba(255, 255, 255, 0.25);
            border-radius: 999px;
            overflow: hidden;
        }

        .highlight-progress .fill {
            height: 100%;
            width: 0%;
            background: #fff;
            transition: width 0.1s linear;
        }

        .highlight-close {
            position: absolute;
            top: 10px;
            right: 10px;
            border: none;
            background: rgba(0, 0, 0, 0.55);
            color: #fff;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            cursor: pointer;
            z-index: 3;
        }

        .highlight-skip {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 50%;
            background: transparent;
            border: none;
            z-index: 2;
            cursor: pointer;
        }

        .highlight-skip.prev { left: 0; }
        .highlight-skip.next { right: 0; }

        .highlight-skip:focus-visible { outline: 2px solid var(--primary); }

        .highlight-player video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .highlight-overlay {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            padding: 20px;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.05));
            color: #fff;
            gap: 12px;
        }

        .highlight-overlay h3 {
            margin: 0;
            font-size: 18px;
        }

        .highlight-overlay p {
            margin: 6px 0;
            color: rgba(255, 255, 255, 0.85);
        }

        .highlight-meta-row {
            display: flex;
            gap: 8px;
            font-size: 13px;
            color: rgba(255, 255, 255, 0.8);
        }

        .highlight-thumbs {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 10px;
            align-self: stretch;
        }

        .thumb {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 8px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            cursor: pointer;
            color: var(--text);
            text-align: left;
            transition: border-color 0.2s, transform 0.2s;
        }

        .thumb:hover {
            border-color: var(--primary);
            transform: translateY(-2px);
        }

        .thumb img {
            width: 100%;
            aspect-ratio: 1 / 1;
            object-fit: cover;
            border-radius: 8px;
        }

        .thumb span {
            font-size: 13px;
            color: var(--text-secondary);
        }

        /* Highlight story modal (mirrors home stories) */
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

        @media (max-width: 992px) {
            .highlight-story-viewer {
                flex-direction: column;
                height: auto;
            }

            .highlight-story-sidebar {
                flex: 0 0 auto;
                width: 100%;
                max-height: 220px;
                height: auto;
            }

            .highlight-story-queue {
                max-height: 160px;
            }

            .highlight-story-stage {
                height: clamp(360px, 65vh, 600px);
            }
        }

        @media (max-width: 768px) {
            .highlight-modal-content {
                padding: 15px;
            }

            .highlight-story-main {
                padding: 12px;
            }

            .highlight-story-sidebar {
                max-height: 250px;
            }

            .highlight-story-stage {
                height: clamp(320px, 60vh, 520px);
            }
        }

        @media (max-width: 576px) {
            .highlight-modal-content {
                padding: 10px;
            }

            .highlight-story-sidebar {
                max-height: 200px;
                padding: 10px;
            }

            .highlight-story-stage {
                height: clamp(260px, 55vh, 420px);
            }
        }

        .highlight-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
            min-width: 80px;
        }

        .highlight-avatar {
            width: 84px;
            height: 84px;
            border-radius: 50%;
            padding: 3px;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            margin-bottom: 8px;
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
        }

        .profile-content {
            background-color: var(--light-dark);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 0 32px 32px;
        }

        .profile-nav {
            display: flex;
            justify-content: center;
            gap: 32px;
            border-bottom: 1px solid var(--border);
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 18px 0;
            font-size: 12px;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--text-secondary);
            border-bottom: 1px solid transparent;
            cursor: pointer;
        }

        .nav-item.active {
            color: var(--text);
            border-bottom-color: var(--text);
        }

        .profile-content-grid {
            display: none;
            padding-top: 32px;
        }

        .profile-content-grid.active {
            display: block;
        }

        .posts-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .post-item {
            position: relative;
            aspect-ratio: 1 / 1;
            overflow: hidden;
            border-radius: 16px;
            cursor: pointer;
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
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 24px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .post-item:hover .post-overlay {
            opacity: 1;
        }

        .post-stat {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #fff;
            font-weight: 600;
        }

        .reels-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
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

        .reel-thumb img,
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
            padding: 14px;
        }

        .reel-meta h4 {
            margin-bottom: 6px;
            font-size: 16px;
        }

        .reel-meta p {
            color: var(--text-secondary);
            font-size: 14px;
        }

        .edit-modal {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
            z-index: 100;
        }

        .edit-modal.active {
            opacity: 1;
            pointer-events: all;
        }

        .edit-modal-content {
            width: 520px;
            background: var(--light-dark);
            border-radius: 24px;
            border: 1px solid var(--border);
            padding: 24px;
        }

        .edit-modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .edit-modal-header h3 {
            font-size: 20px;
        }

        .modal-close {
            border: none;
            background: none;
            color: var(--text);
            font-size: 24px;
            cursor: pointer;
        }

        .modal-avatar {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 16px;
        }

        .modal-avatar img {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            object-fit: cover;
        }

        .avatar-controls button {
            background: none;
            border: 1px solid var(--border);
            padding: 6px 12px;
            border-radius: 8px;
            color: var(--text);
            cursor: pointer;
            margin-right: 8px;
        }

        .edit-form {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .form-field {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-field label {
            font-size: 12px;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-field input,
        .form-field textarea {
            background: transparent;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 10px 14px;
            color: var(--text);
            resize: none;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 20px;
        }

        .modal-button {
            padding: 10px 18px;
            border-radius: 10px;
            border: none;
            font-weight: 600;
            cursor: pointer;
        }

        .modal-button.secondary {
            background: transparent;
            border: 1px solid var(--border);
            color: var(--text);
        }

        .modal-button.primary {
            background: var(--primary);
            color: #fff;
        }

        @media (max-width: 1024px) {
            .profile-info {
                flex-direction: column;
                align-items: center;
            }

            .profile-avatar {
                flex: none;
            }

            .stats {
                width: 100%;
                justify-content: space-around;
            }
        }

        @media (max-width: 768px) {
            .profile-page {
                padding: 24px;
            }

            .profile-content {
                padding: 0 20px 20px;
            }

            .posts-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .reels-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .profile-page {
                padding: 16px;
            }

            .profile-content {
                padding: 0 16px 16px;
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
    <div class="edit-modal" id="editModal" role="dialog" aria-modal="true" aria-labelledby="editProfileTitle">
        <div class="edit-modal-content">
            <div class="edit-modal-header">
                <h3 id="editProfileTitle">Edit Profile</h3>
                <button class="modal-close" id="closeModal" aria-label="Close edit profile modal">&times;</button>
            </div>

            <div class="modal-avatar">
                <img src="https://images.unsplash.com/photo-1544723795-3fb6469f5b39?auto=format&fit=crop&w=400&q=80" alt="Profile avatar preview" id="modalAvatar">
                <div class="avatar-controls">
                    <button id="changePhotoBtn" type="button">Change Photo</button>
                    <button id="removePhotoBtn" type="button">Remove Photo</button>
                </div>
            </div>

            <div class="edit-form">
                <div class="form-field">
                    <label for="editName">Name</label>
                    <input type="text" id="editName" value="Alicia Rose">
                </div>
                <div class="form-field">
                    <label for="editUsername">Username</label>
                    <input type="text" id="editUsername" value="@@alicia.rose">
                </div>
                <div class="form-field">
                    <label for="editBio">Bio</label>
                    <textarea id="editBio" rows="3">Creative director &amp; lifestyle storyteller.
Obsessed with bold color palettes and cozy city corners.</textarea>
                </div>
                <div class="form-field">
                    <label for="editWebsite">Website</label>
                    <input type="text" id="editWebsite" value="https://aliciarose.studio">
                </div>
            </div>

            <div class="modal-actions">
                <button class="modal-button secondary" id="cancelEdit" type="button">Cancel</button>
                <button class="modal-button primary" id="saveProfile" type="button">Save Changes</button>
            </div>
        </div>
    </div>

    <div class="highlight-modal" id="highlightStoryModal" aria-modal="true" role="dialog">
        <div class="highlight-modal-overlay" id="highlightStoryOverlay"></div>
        <div class="highlight-modal-content">
            <div class="highlight-story-viewer">
                <div class="highlight-story-main">
                    <div class="highlight-story-progress" id="highlightStoryProgress"></div>
                    <div class="highlight-story-header">
                        <div class="highlight-story-user">
                            <img src="https://images.unsplash.com/photo-1544723795-3fb6469f5b39?auto=format&fit=crop&w=200&q=80" alt="Highlight avatar" id="highlightStoryAvatar">
                            <div>
                                <strong id="highlightStoryTitle">City Trips</strong>
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
            const editProfileBtn = document.getElementById('editProfileBtn');
            const editModal = document.getElementById('editModal');
            const closeModal = document.getElementById('closeModal');
            const cancelEdit = document.getElementById('cancelEdit');
            const saveProfile = document.getElementById('saveProfile');
            const changePhotoBtn = document.getElementById('changePhotoBtn');
            const removePhotoBtn = document.getElementById('removePhotoBtn');
            const avatarContainer = document.getElementById('avatarContainer');
            const userProfileBadge = document.querySelector('.user-profile');

            if (!editProfileBtn || !editModal) {
                return;
            }

            const getCurrentBio = () =>
                document
                    .getElementById('profileBio')
                    .innerHTML.replace(/<br\s*\/?>(\r?\n)?/gi, '\n')
                    .trim();

            const openModal = () => {
                editModal.classList.add('active');
                document.getElementById('editName').value = document.getElementById('profileName').textContent;
                document.getElementById('editUsername').value = document.getElementById('profileUsername').textContent;
                document.getElementById('editBio').value = getCurrentBio();
                document.getElementById('editWebsite').value = document.getElementById('profileWebsite').textContent;
            };

            const closeModalHandler = () => {
                editModal.classList.remove('active');
            };

            editProfileBtn.addEventListener('click', openModal);
            avatarContainer.addEventListener('click', openModal);
            closeModal.addEventListener('click', closeModalHandler);
            cancelEdit.addEventListener('click', closeModalHandler);

            saveProfile.addEventListener('click', () => {
                document.getElementById('profileName').textContent = document.getElementById('editName').value;
                document.getElementById('profileUsername').textContent = document.getElementById('editUsername').value;
                document.getElementById('profileBio').innerHTML = document.getElementById('editBio').value.replace(/\n/g, '<br>');
                const websiteValue = document.getElementById('editWebsite').value;
                const websiteElement = document.getElementById('profileWebsite');
                websiteElement.textContent = websiteValue;
                websiteElement.href = websiteValue;
                if (userProfileBadge) {
                    userProfileBadge.textContent = document
                        .getElementById('editUsername')
                        .value.substring(0, 2)
                        .toUpperCase();
                }
                closeModalHandler();
                alert('Profile updated successfully!');
            });

            changePhotoBtn.addEventListener('click', () => {
                alert('In a real application, this would open a file picker to select a new profile photo.');
            });

            removePhotoBtn.addEventListener('click', () => {
                const defaultAvatar = 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png';
                document.getElementById('profileAvatar').src = defaultAvatar;
                document.getElementById('modalAvatar').src = defaultAvatar;
                alert('Profile photo removed');
            });

            document.getElementById('addHighlight').addEventListener('click', () => {
                alert('In a real application, this would open a dialog to create a new story highlight.');
            });

            const navItems = document.querySelectorAll('.nav-item');
            const contentGrids = document.querySelectorAll('.profile-content-grid');

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

            document.querySelectorAll('.post-item').forEach((post) => {
                post.addEventListener('click', () => alert('Opening post detail view'));
            });

            // Highlight story viewer (match home stories modal behavior)
            const highlightData = {
                'city-trips': {
                    title: 'City Trips',
                    desc: 'City lights, coffee stops, and late-night edits.',
                    views: '32.4K views',
                    ago: '2d ago',
                    src: "{{ asset('videos/bg.mp4') }}",
                    poster: 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=900&q=80'
                },
                'studio': {
                    title: 'Studio',
                    desc: 'Lighting tests, color checks, and moodboards.',
                    views: '19.8K views',
                    ago: '3d ago',
                    src: "{{ asset('videos/bg.mp4') }}",
                    poster: 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=900&q=80'
                },
                'moodboards': {
                    title: 'Moodboards',
                    desc: 'Texture pulls and palette drafts.',
                    views: '11.2K views',
                    ago: '5d ago',
                    src: "{{ asset('videos/bg.mp4') }}",
                    poster: 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=900&q=80'
                },
                'launches': {
                    title: 'Launches',
                    desc: 'Sneak peeks before they go live.',
                    views: '27.6K views',
                    ago: '1w ago',
                    src: "{{ asset('videos/bg.mp4') }}",
                    poster: 'https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=900&q=80'
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

            const highlightOrder = Array.from(document.querySelectorAll('.highlight-item')).map(item => item.getAttribute('data-highlight-id'));
            const thumbFallbackOrder = Array.from(document.querySelectorAll('#highlightThumbs .thumb')).map(btn => btn.getAttribute('data-highlight-id'));
            const resolvedOrder = highlightOrder.length ? highlightOrder : thumbFallbackOrder;

            const resolveAvatar = (id) => {
                const circleImg = document.querySelector(`.highlight-item[data-highlight-id="${id}"] img`);
                if (circleImg?.src) return circleImg.src;
                const thumbImg = document.querySelector(`#highlightThumbs .thumb[data-highlight-id="${id}"] img`);
                if (thumbImg?.src) return thumbImg.src;
                return 'https://images.unsplash.com/photo-1544723795-3fb6469f5b39?auto=format&fit=crop&w=200&q=80';
            };

            let highlightSequence = resolvedOrder.map((id) => {
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
                    if (video.readyState >= 1) {
                        updateVideoProgress();
                    } else {
                        video.addEventListener('loadedmetadata', updateVideoProgress, { once: true });
                    }
                    syncMuteState();
                } else {
                    const img = document.createElement('img');
                    img.src = story.src;
                    img.alt = story.caption || highlight.displayName;
                    highlightStoryMedia.appendChild(img);
                    startImageTimer(story.duration);
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

            document.querySelectorAll('.highlight-item').forEach((highlight) => {
                highlight.addEventListener('click', () => {
                    const id = highlight.getAttribute('data-highlight-id');
                    openHighlightModal(id);
                });
            });

            document.querySelectorAll('#highlightThumbs .thumb').forEach((thumb) => {
                thumb.addEventListener('click', () => {
                    const id = thumb.getAttribute('data-highlight-id');
                    openHighlightModal(id);
                });
            });

            if (highlightSequence.length) {
                goToHighlight(0, 0);
            }

            // Hover-to-play for reel videos; reset to first frame on leave (like explore trending videos).
            const reelVideos = document.querySelectorAll('.reel-thumb video');
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
