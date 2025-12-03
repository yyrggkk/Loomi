@extends('layouts.master')

@section('title', 'Loomi - Home')

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

        /* Sidebar Styles */
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

        /* Main Content Styles */
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

        /* Stories Section */
        .stories-section {
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 18px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .stories-container {
            display: flex;
            overflow-x: auto;
            padding: 10px 0;
            gap: 15px;
        }

        .story {
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
            min-width: 80px;
        }

        .story-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            padding: 3px;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .story-avatar img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--dark);
        }

        .story-username {
            font-size: 12px;
            color: var(--text-secondary);
            max-width: 80px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* Feed Section */
        .feed {
            max-width: 600px;
            margin: 0 auto;
        }

        .post {
            background-color: var(--light-dark);
            border-radius: 15px;
            margin-bottom: 25px;
            overflow: hidden;
            border: 1px solid var(--border);
        }

        .post-header {
            display: flex;
            align-items: center;
            padding: 15px;
        }

        .post-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
        }

        .post-user {
            flex: 1;
        }

        .post-username {
            font-weight: 600;
            margin-bottom: 2px;
        }

        .post-time {
            font-size: 12px;
            color: var(--text-secondary);
        }

        .post-options {
            color: var(--text-secondary);
            cursor: pointer;
        }

        .post-content {
            padding: 0 15px 15px;
        }

        .post-text {
            margin-bottom: 10px;
            line-height: 1.5;
        }

        /* Updated Post Media Styles */
        .post-media {
            width: 100%;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 15px;
            position: relative;
            background-color: #000;
        }

        /* Single image/video styling */
        .post-media.single {
            aspect-ratio: 1 / 1;
            max-height: 600px;
        }

        .post-media.single img,
        .post-media.single video {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
        }
        .post-media video {
            cursor: pointer;
        }
        /* --- Center Play/Pause Button --- */
        .video-play-pause-btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 70px; 
            height: 70px;
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 20; 
            font-size: 28px;
            padding-left: 5px; 
            
            opacity: 0;
            pointer-events: none; 
            transition: opacity 0.2s ease;
        }

        .post-media.paused .video-play-pause-btn {
            opacity: 1;
            pointer-events: all; 
        }

        /* --- Progress Bar --- */
        .video-progress-container {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 8px; 
            background-color: rgba(255, 255, 255, 0.3);
            cursor: pointer;
            z-index: 15; 
        }

        .video-progress-bar {
            height: 100%;
            width: 0%; 
            background-color: var(--primary); 
            pointer-events: none; 
        }

        .video-mute-btn {
            position: absolute;
            bottom: 20px;
            right: 15px;
            width: 30px;
            height: 30px;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 20;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .video-mute-btn:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
        /* Multi-image styling */
        .post-media.multi {
            aspect-ratio: 1 / 1;
            max-height: 600px;
            
        }

        .media-item {
            position: relative;
            overflow: hidden;
            width: 100%;
            height: 100%;
        }

        .media-item img,
        .media-item video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .media-count {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 14px;
        }

        .media-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 10px;
            z-index: 10;
        }

        .nav-btn {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .nav-btn:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        .media-indicators {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 5px;
        }

        .indicator {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            transition: background-color 0.3s;
        }

        .indicator.active {
            background-color: white;
        }

        .post-stats {
            display: flex;
            justify-content: space-between;
            padding: 0 15px 10px;
            color: var(--text-secondary);
            font-size: 14px;
        }

        .post-actions {
            display: flex;
            justify-content: space-around;
            padding: 10px 15px;
            border-top: 1px solid var(--border);
        }

        .post-action {
            display: flex;
            align-items: center;
            color: var(--text-secondary);
            cursor: pointer;
            transition: color 0.3s ease;
            padding: 5px 15px;
            border-radius: 5px;
        }

        .post-action:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .post-action i {
            margin-right: 8px;
            font-size: 18px;
        }

        .post-action.liked {
            color: #e74c3c;
        }

        .post-action.commented {
            color: #3498db;
        }

        .post-action.shared {
            color: #2ecc71;
        }

        /* --- Modal Styles --- */
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
            width: 500px;
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
            flex-shrink: 0;
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

        /* --- Comment Modal Styles --- */
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
            background: var(--dark);
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
            flex-shrink: 0;
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
        
        /* --- Share Modal Styles --- */
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
        
        .share-item .post-avatar { 
            width: 45px;
            height: 45px;
            margin-right: 12px;
            font-size: 16px;
        }
        
        .share-item .post-username { 
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
            cursor: pointer;
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

        /* --- Notification & Activity Modal Styles --- */
        .activity-list {
            list-style: none;
            padding: 0;
            overflow-y: auto;
            flex: 1;
        }
        
        .activity-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px 20px;
            border-bottom: 1px solid var(--border);
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .activity-item:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }
        
        .activity-item .post-avatar { 
            width: 45px;
            height: 45px;
            font-size: 16px;
            flex-shrink: 0;
        }
        
        .activity-text {
            flex: 1;
            font-size: 14px;
            line-height: 1.5;
        }
        
        .activity-text strong {
            font-weight: 600;
            color: var(--text);
        }
        
        .activity-time {
            color: var(--text-secondary);
            font-size: 12px;
            margin-left: 5px;
        }
        
        .activity-thumbnail {
            width: 45px;
            height: 45px;
            object-fit: cover;
            border-radius: 4px;
            flex-shrink: 0;
        }
        
        /* --- Upload Modal Styles --- */
        .upload-drop-area {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px;
            margin: 20px;
            border: 2px dashed var(--border);
            border-radius: 10px;
            background-color: var(--dark);
            color: var(--text-secondary);
            text-align: center;
        }
        
        .upload-drop-area i {
            font-size: 48px;
            margin-bottom: 15px;
        }
        
        .upload-drop-area p {
            font-size: 16px;
            margin-bottom: 15px;
        }
        
        .upload-select-btn {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
        }
        
        #fileInput {
            display: none;
        }
        
        .upload-preview-area {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 10px;
            padding: 0 20px 20px;
            overflow-y: auto;
        }
        
        .preview-image {
            width: 100%;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid var(--border);
        }
        
        .upload-form {
            padding: 20px;
            border-top: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .upload-caption {
            background-color: var(--dark);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 10px 15px;
            color: var(--text);
            outline: none;
            resize: none;
            height: 80px;
            font-family: inherit;
        }
        
        .upload-post-btn {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
        }
        
        /* --- NEW: Story Viewer Modal Styles --- */

        @keyframes fillProgress {
            from { width: 0%; }
            to { width: 100%; }
        }

        #storyModal {
            background-color: rgba(0, 0, 0, 0.9);
            z-index: 2000;
        }

        .story-viewer {
            width: 100%;
            height: 100%;
            max-width: 450px; /* Phone-like aspect ratio */
            max-height: 95vh;
            background-color: #000;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .story-close-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 30px;
            color: white;
            background: none;
            border: none;
            cursor: pointer;
            z-index: 20;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.7);
        }

        .story-progress-bars {
            display: flex;
            gap: 4px;
            padding: 10px;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 15;
        }

        .progress-bar {
            flex: 1;
            height: 3px;
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 2px;
            overflow: hidden;
        }

        .progress-bar-fill {
            height: 100%;
            width: 0%;
            background-color: #fff;
        }
        
        .progress-bar-fill.active {
            animation: fillProgress 5s linear forwards;
        }

        .progress-bar-fill.paused {
            animation-play-state: paused;
        }

        .story-user-info {
            position: absolute;
            top: 25px; /* Below progress bars */
            left: 15px;
            z-index: 15;
            display: flex;
            align-items: center;
            gap: 10px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.7);
        }

        .story-user-info img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: 2px solid var(--secondary);
        }
        
        .story-user-info .story-username {
            font-size: 14px;
            font-weight: 600;
            color: #fff;
        }

        .story-media {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .story-media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .story-nav {
            position: absolute;
            top: 0;
            height: 100%;
            width: 50%;
            z-index: 10;
            cursor: pointer;
        }
        .story-nav.prev {
            left: 0;
        }
        .story-nav.next {
            right: 0;
        }


        /* Responsive Design */
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
            .main-content { margin-left: 80px; }
        }

        @media (max-width: 768px) {
            .search-bar { width: 200px; }
            .user-actions i:nth-child(2), .user-actions i:nth-child(3) { display: none; }
            .story-viewer { max-width: 100%; height: 100%; max-height: 100%; border-radius: 0; }
        }

        @media (max-width: 576px) {
            .sidebar { display: none; }
            .main-content { margin-left: 0; }
            .search-bar { width: 150px; }
        }
    </style>
@endpush

@section('content')
    <div class="main-content">
        @include('partials.header', ['searchPlaceholder' => 'Search Loomi'])

        <div class="stories-section">
            <div class="section-title">
                <h2>Stories</h2>
            </div>
            <div class="stories-container">
                <div class="story">
                    <div class="story-avatar">
                        <img src="https://i.pravatar.cc/150?img=1" alt="User">
                    </div>
                    <div class="story-username">Your Story</div>
                </div>
                <div class="story">
                    <div class="story-avatar">
                        <img src="https://i.pravatar.cc/150?img=12" alt="User">
                    </div>
                    <div class="story-username">Emma</div>
                </div>
                <div class="story">
                    <div class="story-avatar">
                        <img src="https://i.pravatar.cc/150?img=8" alt="User">
                    </div>
                    <div class="story-username">Alex</div>
                </div>
                <div class="story">
                    <div class="story-avatar">
                        <img src="https://i.pravatar.cc/150?img=5" alt="User">
                    </div>
                    <div class="story-username">Sarah</div>
                </div>
                <div class="story">
                    <div class="story-avatar">
                        <img src="https://i.pravatar.cc/150?img=11" alt="User">
                    </div>
                    <div class="story-username">Mike</div>
                </div>
                <div class="story">
                    <div class="story-avatar">
                        <img src="https://i.pravatar.cc/150?img=3" alt="User">
                    </div>
                    <div class="story-username">Lisa</div>
                </div>
                <div class="story">
                    <div class="story-avatar">
                        <img src="https://i.pravatar.cc/150?img=7" alt="User">
                    </div>
                    <div class="story-username">David</div>
                </div>
            </div>
        </div>

        <div class="feed">
            <div class="post">
                <div class="post-header">
                    <div class="post-avatar">JS</div>
                    <div class="post-user">
                        <div class="post-username">John Smith</div>
                        <div class="post-time">2 hours ago</div>
                    </div>
                    <div class="post-options">
                        <i class="fas fa-ellipsis-h"></i>
                    </div>
                </div>
                <div class="post-content">
                    <div class="post-text">
                        Just visited this amazing place! The view was absolutely breathtaking. 
                        Can't wait to go back again soon! 🌄
                    </div>
                    <div class="post-media single">
                        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Mountain view">
                    </div>
                </div>
                <div class="post-stats">
                    <div class="post-likes">245 likes</div>
                    <div class="post-comments">36 comments</div>
                </div>
                <div class="post-actions">
                    <div class="post-action like-btn">
                        <i class="far fa-heart"></i> Like
                    </div>
                    <div class="post-action comment-btn">
                        <i class="far fa-comment"></i> Comment
                    </div>
                    <div class="post-action share-btn">
                        <i class="far fa-share-square"></i> Share
                    </div>
                </div>
            </div>

            <div class="post">
                <div class="post-header">
                    <div class="post-avatar">TJ</div>
                    <div class="post-user">
                        <div class="post-username">Taylor Johnson</div>
                        <div class="post-time">3 days ago</div>
                    </div>
                    <div class="post-options">
                        <i class="fas fa-ellipsis-h"></i>
                    </div>
                </div>
                <div class="post-content">
                    <div class="post-text">
                        Check out my new dance routine! Been practicing this for weeks. What do you think? 💃
                    </div>
                    <div class="post-media single">
                        <video autoplay muted loop playsinline>
                            <source src="bg.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <div class="video-play-pause-btn">
                            <i class="fas fa-play"></i>
                        </div>
                        <div class="video-progress-container">
                            <div class="video-progress-bar"></div>
                        </div>
                        <div class="video-mute-btn">
                            <i class="fas fa-volume-mute"></i>
                        </div>
                    </div>
                </div>
                <div class="post-stats">
                    <div class="post-likes">421 likes</div>
                    <div class="post-comments">53 comments</div>
                </div>
                <div class="post-actions">
                    <div class="post-action like-btn">
                        <i class="far fa-heart"></i> Like
                    </div>
                    <div class="post-action comment-btn">
                        <i class="far fa-comment"></i> Comment
                    </div>
                    <div class="post-action share-btn">
                        <i class="far fa-share-square"></i> Share
                    </div>
                </div>
            </div>
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
                </ul>
            <div class="copy-link-area">
                <div class="copy-link-input" id="postLinkInput">https://loomi.app/p/xyz123</div>
                <button class="copy-link-btn" id="copyLinkBtn">Copy</button>
            </div>
        </div>
    </div>

    <div class="modal" id="notificationsModal">
        <div class="modal-overlay"></div>
        <div class="modal-content">
            <div class="modal-header">
                <h2>Notifications</h2>
                <button class="modal-close-btn">&times;</button>
            </div>
            <ul class="activity-list">
                </ul>
        </div>
    </div>
    
    <div class="modal" id="activityModal">
        <div class="modal-overlay"></div>
        <div class="modal-content">
            <div class="modal-header">
                <h2>Activity</h2>
                <button class="modal-close-btn">&times;</button>
            </div>
             <ul class="activity-list">
                </ul>
        </div>
    </div>
    
    <div class="modal" id="uploadModal">
        <div class="modal-overlay"></div>
        <div class="modal-content">
            <div class="modal-header">
                <h2>Create new post</h2>
                <button class="modal-close-btn">&times;</button>
            </div>
            <div class="upload-drop-area" id="dropArea">
                <i class="fas fa-photo-video"></i>
                <p>Drag photos and videos here</p>
                <label for="fileInput" class="upload-select-btn">
                    Select from computer
                </label>
                <input type="file" id="fileInput" multiple accept="image/*,video/*">
            </div>
            <div class="upload-preview-area" id="previewArea"></div>
            <div class="upload-form">
                <textarea class="upload-caption" placeholder="Write a caption..."></textarea>
                <button class="upload-post-btn">Post</button>
            </div>
        </div>
    </div>

    <div class="modal" id="storyModal">
        <button class="story-close-btn" id="storyModalClose">&times;</button>
        <div class="story-viewer">
            
            <div class="story-progress-bars" id="storyProgressBars">
                </div>

            <div class="story-user-info" id="storyModalUser">
                <img src="" alt="avatar">
                <span class="story-username"></span>
            </div>
            
            <div class="story-media" id="storyModalMedia">
                <img src="" alt="Story content">
            </div>

            <div class="story-nav prev" id="storyNavPrev"></div>
            <div class="story-nav next" id="storyNavNext"></div>
        </div>
    </div>
@endpush

@push('scripts')
    <script>
        // --- Modal Opening & Closing Logic ---
        
        const commentModal = document.getElementById('commentModal');
        const shareModal = document.getElementById('shareModal');
        const notificationsModal = document.getElementById('notificationsModal');
        const activityModal = document.getElementById('activityModal');
        const uploadModal = document.getElementById('uploadModal');
        const storyModal = document.getElementById('storyModal'); // New Story Modal

        function openModal(modal) {
            if (modal) modal.classList.add('active');
        }

        document.querySelectorAll('.modal').forEach(modal => {
            const overlay = modal.querySelector('.modal-overlay');
            const closeBtn = modal.querySelector('.modal-close-btn');
            
            function closeModal() {
                modal.classList.remove('active');
                if (modal.id === 'storyModal') {
                    closeStoryModal(); // Special close function for stories
                }
            }
            
            if (overlay) overlay.addEventListener('click', closeModal);
            if (closeBtn) closeBtn.addEventListener('click', closeModal);
        });

        // Story modal has its own close button
        document.getElementById('storyModalClose').addEventListener('click', closeStoryModal);


        // --- Wire Up Header Buttons ---
        document.getElementById('openUploadBtn').addEventListener('click', () => openModal(uploadModal));
        document.getElementById('openActivityBtn').addEventListener('click', () => openModal(activityModal));
        document.getElementById('openNotificationsBtn').addEventListener('click', () => openModal(notificationsModal));

        // --- Wire Up Post Buttons ---
        
        document.querySelectorAll('.post .comment-btn').forEach(button => {
            button.addEventListener('click', () => openModal(commentModal));
        });
        
        document.querySelectorAll('.post .share-btn').forEach(button => {
            button.addEventListener('click', () => openModal(shareModal));
        });

        // --- Modal-Specific Functionality (Comments, Share, Upload) ---
        // ... (All your existing logic for these modals) ...
        
        // --- (Copied from previous step for completeness) ---
        // 1. Comment Modal
        document.querySelector('#commentModal .comment-send-btn').addEventListener('click', () => {
            const input = document.querySelector('#commentModal .comment-input');
            const text = input.value.trim();
            if (text) {
                const list = document.querySelector('#commentModal .comment-list');
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

        // 2. Share Modal
        document.getElementById('copyLinkBtn').addEventListener('click', (e) => {
            const link = document.getElementById('postLinkInput').textContent;
            navigator.clipboard.writeText(link).then(() => {
                e.target.textContent = 'Copied!';
                setTimeout(() => { e.target.textContent = 'Copy'; }, 2000);
            });
        });
        
        document.querySelectorAll('#shareModal .send-btn-small').forEach(btn => {
            btn.addEventListener('click', () => {
                const user = btn.closest('.share-item').querySelector('.post-username').textContent;
                alert(`Sent to ${user}!`);
            });
        });

        // 3. Upload Modal
        const dropArea = document.getElementById('dropArea');
        const fileInput = document.getElementById('fileInput');
        const previewArea = document.getElementById('previewArea');
        fileInput.addEventListener('change', (e) => handleFiles(e.target.files));
        dropArea.addEventListener('dragover', (e) => { e.preventDefault(); dropArea.style.borderColor = 'var(--primary)'; });
        dropArea.addEventListener('dragleave', () => { dropArea.style.borderColor = 'var(--border)'; });
        dropArea.addEventListener('drop', (e) => {
            e.preventDefault();
            dropArea.style.borderColor = 'var(--border)';
            handleFiles(e.dataTransfer.files);
        });
        function handleFiles(files) {
            previewArea.innerHTML = ''; 
            if (files.length === 0) return;
            Array.from(files).forEach(file => {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'preview-image';
                        previewArea.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                }
            });
        }
        document.querySelector('.upload-post-btn').addEventListener('click', () => {
             alert('Post created! (Simulation)');
             uploadModal.classList.remove('active');
             previewArea.innerHTML = '';
             document.querySelector('.upload-caption').value = '';
        });
        // --- (End of copied logic) ---


        // --- Other Page Logic (Likes, Video Player) ---
        // ... (Your existing logic for post likes and video players) ...
        
        // --- (Copied from previous step for completeness) ---
        document.querySelectorAll('.like-btn').forEach(button => {
            button.addEventListener('click', function() { /* ... like logic ... */ });
        });
        document.querySelectorAll('.post video').forEach(video => {
            /* ... all video player logic (play/pause, mute, progress) ... */
        });
        document.querySelectorAll('.post-media.multi').forEach(mediaContainer => {
            /* ... all multi-image carousel logic ... */
        });
        // --- (End of copied logic) ---


        // --- NEW: Story Viewer Logic ---
        
        const allStories = document.querySelectorAll('.story');
        let storyData = [];
        let currentStoryIndex = 0;
        let storyAnimationTimeout;
        let currentProgressBarFill;

        allStories.forEach((story, index) => {
            story.addEventListener('click', () => {
                openStoryModal(index);
            });
        });

        function openStoryModal(clickedIndex) {
            storyData = []; // Re-build story data array
            allStories.forEach(storyEl => {
                storyData.push({
                    img: storyEl.querySelector('.story-avatar img').src,
                    username: storyEl.querySelector('.story-username').textContent
                });
            });
            
            currentStoryIndex = clickedIndex;
            showStory(currentStoryIndex);
            storyModal.classList.add('active');
        }

        function showStory(index) {
            // Get data
            const story = storyData[index];
            
            // 1. Update Media
            document.querySelector('#storyModalMedia img').src = story.img;
            
            // 2. Update User Info
            const userInfo = document.getElementById('storyModalUser');
            userInfo.querySelector('img').src = story.img;
            userInfo.querySelector('.story-username').textContent = story.username;

            // 3. Build/Reset Progress Bars
            const progressBarsContainer = document.getElementById('storyProgressBars');
            progressBarsContainer.innerHTML = ''; // Clear old bars
            
            storyData.forEach((_, i) => {
                const barWrapper = document.createElement('div');
                barWrapper.className = 'progress-bar';
                
                const barFill = document.createElement('div');
                barFill.className = 'progress-bar-fill';
                
                if (i < index) {
                    barFill.style.width = '100%'; // Already watched
                }
                
                barWrapper.appendChild(barFill);
                progressBarsContainer.appendChild(barWrapper);
            });

            // 4. Animate Current Bar
            currentProgressBarFill = progressBarsContainer.children[index].querySelector('.progress-bar-fill');
            
            // Clear any previous animation
            if (storyAnimationTimeout) clearTimeout(storyAnimationTimeout);
            
            // Start the new animation
            setTimeout(() => {
                currentProgressBarFill.classList.add('active');
                
                storyAnimationTimeout = setTimeout(showNextStory, 5000); // 5000ms = 5s (matches CSS)
            }, 10);
        }

        function showNextStory() {
            if (currentStoryIndex < storyData.length - 1) {
                currentStoryIndex++;
                showStory(currentStoryIndex);
            } else {
                closeStoryModal();
            }
        }

        function showPrevStory() {
            if (currentStoryIndex > 0) {
                currentStoryIndex--;
                showStory(currentStoryIndex);
            }
        }

        function closeStoryModal() {
            if (storyAnimationTimeout) clearTimeout(storyAnimationTimeout);
            if (currentProgressBarFill) currentProgressBarFill.classList.remove('active');
            storyModal.classList.remove('active');
        }

        document.getElementById('storyNavNext').addEventListener('click', showNextStory);
        document.getElementById('storyNavPrev').addEventListener('click', showPrevStory);

        const storyViewer = document.querySelector('.story-viewer');
        storyViewer.addEventListener('mousedown', () => {
            if (currentProgressBarFill) currentProgressBarFill.classList.add('paused');
            if (storyAnimationTimeout) clearTimeout(storyAnimationTimeout);
        });

        storyViewer.addEventListener('mouseup', () => {
            if (currentProgressBarFill) currentProgressBarFill.classList.remove('paused');
            storyAnimationTimeout = setTimeout(showNextStory, 5000); 
        });
        
    </script>
@endpush
