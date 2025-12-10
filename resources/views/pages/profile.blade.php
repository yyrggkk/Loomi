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
                    <div class="highlight-item">
                        <div class="highlight-avatar">
                            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=200&q=80" alt="City trips">
                        </div>
                        <span class="highlight-name">City Trips</span>
                    </div>
                    <div class="highlight-item">
                        <div class="highlight-avatar">
                            <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=200&q=80" alt="Studio">
                        </div>
                        <span class="highlight-name">Studio</span>
                    </div>
                    <div class="highlight-item">
                        <div class="highlight-avatar">
                            <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=200&q=80" alt="Moodboards">
                        </div>
                        <span class="highlight-name">Moodboards</span>
                    </div>
                    <div class="highlight-item">
                        <div class="highlight-avatar">
                            <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=200&q=80" alt="Launches">
                        </div>
                        <span class="highlight-name">Launches</span>
                    </div>
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

            document.querySelectorAll('.highlight-item').forEach((highlight) => {
                highlight.addEventListener('click', () => {
                    const highlightName = highlight.querySelector('.highlight-name').textContent;
                    alert(`Viewing ${highlightName} highlight`);
                });
            });

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
