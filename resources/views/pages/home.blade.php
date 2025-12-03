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

        body.loomi-body {
            background-color: var(--dark);
            color: var(--text);
            min-height: 100vh;
        }

        .loomi-main {
            width: calc(100% - 250px);
            margin-left: 250px;
            display: block;
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
            flex: 1 1 auto;
            width: 100%;
            max-width: none;
            padding: 20px 40px;
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

        .story.watched .story-avatar {
            background: rgba(255, 255, 255, 0.08);
        }

        .story.watched .story-avatar img {
            filter: grayscale(0.6);
            opacity: 0.6;
            border-color: rgba(255, 255, 255, 0.15);
        }

        .story.watched .story-username {
            color: rgba(255, 255, 255, 0.5);
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
            touch-action: none;
            user-select: none;
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
        
        /* --- Story Viewer Styles --- */
        .story-modal-content {
            width: 920px;
            max-width: 96%;
            max-height: 90vh;
            border-radius: 18px;
            background-color: var(--light-dark);
            border: 1px solid var(--border);
            padding: 20px;
            overflow: hidden;
        }

        .story-viewer {
            display: flex;
            gap: 20px;
            align-items: stretch;
            height: 100%;
            min-height: 0;
        }

        .story-viewer-main {
            flex: 1 1 65%;
            background-color: #111;
            border-radius: 18px;
            padding: 18px;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
            max-width: none;
            margin: 0;
            gap: 14px;
            min-height: 0;
        }

        .story-progress-bars {
            display: flex;
            gap: 6px;
            margin-bottom: 14px;
        }

        .story-progress-track {
            flex: 1;
            height: 3px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.2);
            overflow: hidden;
        }

        .story-progress-fill {
            height: 100%;
            width: 0;
            background: #fff;
            transition: width 0.15s linear;
        }

        .story-progress-track.completed .story-progress-fill {
            width: 100%;
        }

        .story-viewer-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #fff;
            margin-bottom: 12px;
        }

        .story-viewer-user {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .story-viewer-user img {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.5);
            object-fit: cover;
        }

        .story-viewer-user strong {
            font-size: 15px;
        }

        .story-viewer-meta {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }

        .story-viewer-meta span {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.7);
        }

        .story-viewer-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .story-pause-btn,
        .story-mute-btn,
        .story-nav {
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

        .story-pause-btn:hover,
        .story-mute-btn:hover,
        .story-nav:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        .story-media-stage {
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

        .story-media-inner {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .story-media-inner img,
        .story-media-inner video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .story-media-inner video {
            object-fit: contain;
            background: #000;
        }

        .story-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 2;
        }

        .story-nav.prev { left: 12px; }
        .story-nav.next { right: 12px; }

        .story-caption { display: none; }

        .story-response-overlay {
            position: absolute;
            left: 50%;
            bottom: 16px;
            transform: translateX(-50%);
            width: calc(100% - 36px);
            padding: 8px 14px;
            background: rgba(0, 0, 0, 0.55);
            border-radius: 999px;
            display: flex;
            align-items: center;
            gap: 12px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.35);
        }

        .story-like-btn {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.4);
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.2s ease, transform 0.1s ease;
        }

        .story-like-btn.active {
            background: #e74c3c;
            border-color: #e74c3c;
        }

        .story-like-btn:active {
            transform: scale(0.95);
        }

        .story-response-overlay .story-reply-input {
            flex: 1;
            border: none;
            background: transparent;
            color: #fff;
            font-size: 14px;
            outline: none;
        }

        .story-viewer-sidebar {
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

        .story-queue-list {
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding-right: 4px;
            flex: 1 1 auto;
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 255, 255, 0.5) transparent;
        }

        .story-queue-list::-webkit-scrollbar {
            width: 8px;
        }

        .story-queue-list::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 999px;
        }

        .story-queue-list::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.45);
            border-radius: 999px;
        }

        .story-queue-item {
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

        .story-queue-item.active {
            border-color: var(--primary);
            background: rgba(255, 255, 255, 0.03);
        }

        .story-queue-thumb img {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid transparent;
            transition: border-color 0.2s ease, filter 0.2s ease;
        }

        .story-queue-meta {
            display: flex;
            flex-direction: column;
            font-size: 13px;
        }

        .story-queue-meta span:last-child {
            color: var(--text-secondary);
            font-size: 12px;
        }

        .story-viewer-sidebar h3 {
            margin: 0;
            font-size: 15px;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .story-queue-item.watched {
            opacity: 0.5;
            border-color: rgba(255, 255, 255, 0.08);
        }

        .story-queue-item.watched .story-queue-thumb img {
            border-color: rgba(255, 255, 255, 0.08);
            filter: grayscale(0.6);
        }

        .story-queue-item.watched.active {
            opacity: 1;
            border-color: var(--primary);
        }

        .story-queue-item.watched.active .story-queue-thumb img {
            filter: none;
            border-color: var(--primary);
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .story-viewer {
                flex-direction: column;
                height: auto;
            }
            .story-viewer-sidebar {
                flex: 0 0 auto;
                width: 100%;
                max-height: 220px;
                height: auto;
            }
            .story-queue-list {
                max-height: 160px;
            }
            .story-media-stage {
                height: clamp(360px, 65vh, 600px);
            }
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
            .loomi-main {
                margin-left: 80px;
                width: calc(100% - 80px);
            }
        }

        @media (max-width: 768px) {
            .search-bar { width: 200px; }
            .user-actions i:nth-child(2), .user-actions i:nth-child(3) { display: none; }
            .story-viewer { max-width: 100%; height: 100%; max-height: 100%; border-radius: 0; }
            .story-viewer-main { padding: 12px; }
            .story-modal-content { padding: 15px; }
            .story-viewer-sidebar { max-height: 250px; }
            .story-media-stage { height: clamp(320px, 60vh, 520px); }
        }

        @media (max-width: 576px) {
            .sidebar { display: none; }
            .loomi-main {
                margin-left: 0;
                width: 100%;
            }
            .main-content { flex: 1; }
            .search-bar { width: 150px; }
            .story-modal-content { padding: 10px; }
            .story-viewer-sidebar { max-height: 200px; padding: 10px; }
            .story-reply-bar { flex-wrap: wrap; }
            .story-media-stage { height: clamp(260px, 55vh, 420px); }
        }
    </style>
@endpush

@php
    $storyMediaPayloads = [
        'fy_hamza' => [
            [
                'type' => 'video',
                'src' => asset('videos/bg.mp4'),
                'caption' => 'Match warm-up sprint.',
                'postedAgo' => 'Just now',
            ],
            [
                'type' => 'image',
                'src' => 'https://images.unsplash.com/photo-1517927033932-b3d18e61fb3a?auto=format&fit=crop&w=900&q=80',
                'caption' => 'Locker room energy is unreal.',
                'duration' => 6,
                'postedAgo' => '10 min ago',
            ],
        ],
    ];
@endphp

@section('content')
    <div class="main-content">
        @include('partials.header', ['searchPlaceholder' => 'Search Loomi'])

        <div class="stories-section">
            <div class="section-title">
                <h2>Stories</h2>
            </div>
            <div class="stories-container">
                <div class="story" data-story-id="your-story" data-last-active="Just now">
                    <div class="story-avatar">
                        <img src="https://i.pravatar.cc/150?img=1" alt="User">
                    </div>
                    <div class="story-username">Your Story</div>
                </div>
                <div
                    class="story"
                    data-story-id="fy_hamza"
                    data-last-active="3 min ago"
                    data-story-media='{!! json_encode($storyMediaPayloads['fy_hamza'], JSON_UNESCAPED_SLASHES) !!}'
                >
                    <div class="story-avatar">
                        <img src="https://i.pravatar.cc/150?img=12" alt="User">
                    </div>
                    <div class="story-username">@fy_hamza</div>
                </div>
                <div class="story" data-story-id="elbotola" data-last-active="10 min ago">
                    <div class="story-avatar">
                        <img src="https://i.pravatar.cc/150?img=14" alt="User">
                    </div>
                    <div class="story-username">@elbotola</div>
                </div>
                <div class="story" data-story-id="emma" data-last-active="22 min ago">
                    <div class="story-avatar">
                        <img src="https://i.pravatar.cc/150?img=18" alt="User">
                    </div>
                    <div class="story-username">Emma</div>
                </div>
                <div class="story" data-story-id="alex" data-last-active="45 min ago">
                    <div class="story-avatar">
                        <img src="https://i.pravatar.cc/150?img=8" alt="User">
                    </div>
                    <div class="story-username">Alex</div>
                </div>
                <div class="story" data-story-id="sarah" data-last-active="1 h ago">
                    <div class="story-avatar">
                        <img src="https://i.pravatar.cc/150?img=5" alt="User">
                    </div>
                    <div class="story-username">Sarah</div>
                </div>
                <div class="story" data-story-id="mike" data-last-active="2 h ago">
                    <div class="story-avatar">
                        <img src="https://i.pravatar.cc/150?img=11" alt="User">
                    </div>
                    <div class="story-username">Mike</div>
                </div>
                <div class="story" data-story-id="lisa" data-last-active="3 h ago">
                    <div class="story-avatar">
                        <img src="https://i.pravatar.cc/150?img=3" alt="User">
                    </div>
                    <div class="story-username">Lisa</div>
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
                            <source src="{{ asset('videos/bg.mp4') }}" type="video/mp4">
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
        <div class="modal-overlay"></div>
        <div class="modal-content story-modal-content">
            <div class="story-viewer">
                <div class="story-viewer-main">
                    <div class="story-progress-bars" id="storyProgressBars"></div>
                    <div class="story-viewer-header">
                        <div class="story-viewer-user">
                            <img src="https://i.pravatar.cc/150?img=1" alt="Story avatar" id="storyAvatar">
                            <div class="story-viewer-meta">
                                <strong id="storyUsername">@fy_hamza</strong>
                                <span id="storyTime">3 min ago</span>
                            </div>
                        </div>
                        <div class="story-viewer-actions">
                            <button class="story-pause-btn" id="storyPauseBtn" aria-label="Pause story">
                                <i class="fas fa-pause"></i>
                            </button>
                            <button class="story-mute-btn" id="storyMuteBtn" aria-label="Mute story">
                                <i class="fas fa-volume-mute"></i>
                            </button>
                            <button class="modal-close-btn story-close-btn" aria-label="Close story viewer">&times;</button>
                        </div>
                    </div>
                    <div class="story-media-stage">
                        <button class="story-nav prev" id="storyPrevBtn" aria-label="Previous story">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <div class="story-media-inner" id="storyMediaInner"></div>
                        <button class="story-nav next" id="storyNextBtn" aria-label="Next story">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                        <div class="story-response-overlay">
                            <button type="button" class="story-like-btn" id="storyLikeBtn" aria-label="Like story">
                                <i class="far fa-heart"></i>
                            </button>
                            <input type="text" class="story-reply-input" id="storyReplyInput" placeholder="Reply...">
                        </div>
                    </div>
                </div>
                <div class="story-viewer-sidebar">
                    <h3>All stories</h3>
                    <div class="story-queue-list" id="storyQueueList"></div>
                </div>
            </div>
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
                if (modal.id === 'storyModal' && window.__loomiStopStoryPlayback) {
                    window.__loomiStopStoryPlayback();
                }
            }
            
            if (overlay) overlay.addEventListener('click', closeModal);
            if (closeBtn) closeBtn.addEventListener('click', closeModal);
        });


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
        // --- Like Buttons ---
        document.querySelectorAll('.post').forEach(post => {
            const likeBtn = post.querySelector('.like-btn');
            const likesLabel = post.querySelector('.post-likes');
            if (!likeBtn) return;

            const baseLikes = (() => {
                if (!likesLabel) return 0;
                const stored = likesLabel.dataset.baseLikes;
                if (stored) return parseInt(stored, 10) || 0;
                const match = likesLabel.textContent.match(/(\d+)/);
                const value = match ? parseInt(match[1], 10) : 0;
                likesLabel.dataset.baseLikes = value;
                return value;
            })();

            let liked = false;

            const updateLikeVisuals = () => {
                likeBtn.classList.toggle('liked', liked);
                const icon = likeBtn.querySelector('i');
                if (icon) {
                    icon.classList.toggle('fas', liked);
                    icon.classList.toggle('far', !liked);
                }
                if (likesLabel) {
                    const count = liked ? baseLikes + 1 : baseLikes;
                    likesLabel.textContent = `${count} likes`;
                }
            };

            likeBtn.addEventListener('click', () => {
                liked = !liked;
                updateLikeVisuals();
            });
        });

        // --- Inline Video Player ---
        document.querySelectorAll('.post video').forEach(video => {
            const mediaContainer = video.closest('.post-media');
            const playButton = mediaContainer?.querySelector('.video-play-pause-btn');
            const progressContainer = mediaContainer?.querySelector('.video-progress-container');
            const progressBar = mediaContainer?.querySelector('.video-progress-bar');
            const muteButton = mediaContainer?.querySelector('.video-mute-btn');

            const updatePlayState = () => {
                if (!mediaContainer) return;
                mediaContainer.classList.toggle('paused', video.paused);
                if (playButton) {
                    const icon = playButton.querySelector('i');
                    if (icon) {
                        icon.classList.toggle('fa-play', video.paused);
                        icon.classList.toggle('fa-pause', !video.paused);
                    }
                }
            };

            const updateMuteIcon = () => {
                if (!muteButton) return;
                const icon = muteButton.querySelector('i');
                if (!icon) return;
                icon.classList.toggle('fa-volume-mute', video.muted);
                icon.classList.toggle('fa-volume-up', !video.muted);
            };

            const togglePlay = () => {
                if (video.paused) {
                    video.play();
                } else {
                    video.pause();
                }
            };

            video.addEventListener('click', togglePlay);
            playButton?.addEventListener('click', event => {
                event.stopPropagation();
                togglePlay();
            });

            video.addEventListener('play', updatePlayState);
            video.addEventListener('pause', updatePlayState);
            video.addEventListener('loadedmetadata', updatePlayState);

            video.addEventListener('timeupdate', () => {
                if (!progressBar || !video.duration) return;
                const progress = (video.currentTime / video.duration) * 100;
                progressBar.style.width = `${progress}%`;
            });

            if (progressContainer) {
                let isDragging = false;
                let wasPlaying = false;

                const clamp = value => Math.min(Math.max(value, 0), 1);

                const seekWithClientX = clientX => {
                    if (!video.duration) return;
                    const rect = progressContainer.getBoundingClientRect();
                    const ratio = clamp((clientX - rect.left) / rect.width);
                    video.currentTime = ratio * video.duration;
                    if (progressBar) {
                        progressBar.style.width = `${ratio * 100}%`;
                    }
                };

                const handleMouseMove = event => {
                    if (!isDragging) return;
                    event.preventDefault();
                    seekWithClientX(event.clientX);
                };

                const handleTouchMove = event => {
                    if (!isDragging) return;
                    if (event.touches?.[0]) {
                        seekWithClientX(event.touches[0].clientX);
                    }
                };

                const stopDragging = event => {
                    if (!isDragging) return;
                    event.preventDefault();
                    if (event.changedTouches?.[0]) {
                        seekWithClientX(event.changedTouches[0].clientX);
                    } else if (typeof event.clientX === 'number') {
                        seekWithClientX(event.clientX);
                    }
                    isDragging = false;
                    document.removeEventListener('mousemove', handleMouseMove);
                    document.removeEventListener('mouseup', stopDragging);
                    document.removeEventListener('touchmove', handleTouchMove);
                    document.removeEventListener('touchend', stopDragging);
                    document.removeEventListener('touchcancel', stopDragging);
                    if (wasPlaying) {
                        video.play();
                    }
                };

                const startDragging = clientX => {
                    if (!video.duration) return;
                    isDragging = true;
                    wasPlaying = !video.paused;
                    video.pause();
                    seekWithClientX(clientX);
                    document.addEventListener('mousemove', handleMouseMove);
                    document.addEventListener('mouseup', stopDragging);
                    document.addEventListener('touchmove', handleTouchMove, { passive: false });
                    document.addEventListener('touchend', stopDragging);
                    document.addEventListener('touchcancel', stopDragging);
                };

                progressContainer.addEventListener('mousedown', event => {
                    event.preventDefault();
                    event.stopPropagation();
                    startDragging(event.clientX);
                });

                progressContainer.addEventListener('touchstart', event => {
                    event.preventDefault();
                    event.stopPropagation();
                    if (event.touches?.[0]) {
                        startDragging(event.touches[0].clientX);
                    }
                }, { passive: false });
            }

            muteButton?.addEventListener('click', event => {
                event.stopPropagation();
                video.muted = !video.muted;
                updateMuteIcon();
            });

            updatePlayState();
            updateMuteIcon();
        });

        // --- Multi-media Carousel ---
        document.querySelectorAll('.post-media.multi').forEach(mediaContainer => {
            const mediaItems = mediaContainer.querySelectorAll('.media-item');
            if (mediaItems.length <= 1) return;

            const navPrev = mediaContainer.querySelector('.nav-btn.prev');
            const navNext = mediaContainer.querySelector('.nav-btn.next');
            const indicators = mediaContainer.querySelectorAll('.indicator');
            const countBadge = mediaContainer.querySelector('.media-count');
            let currentIndex = 0;

            const updateView = () => {
                mediaItems.forEach((item, index) => {
                    item.style.display = index === currentIndex ? 'block' : 'none';
                });

                indicators.forEach((indicator, index) => {
                    indicator.classList.toggle('active', index === currentIndex);
                });

                if (countBadge) {
                    countBadge.textContent = `${currentIndex + 1}/${mediaItems.length}`;
                }
            };

            const goToIndex = newIndex => {
                const total = mediaItems.length;
                currentIndex = (newIndex + total) % total;
                updateView();
            };

            navPrev?.addEventListener('click', event => {
                event.stopPropagation();
                goToIndex(currentIndex - 1);
            });

            navNext?.addEventListener('click', event => {
                event.stopPropagation();
                goToIndex(currentIndex + 1);
            });

            indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', event => {
                    event.stopPropagation();
                    goToIndex(index);
                });
            });

            updateView();
        });
        // --- (End of copied logic) ---


        // --- Story Viewer Logic ---
        (function setupStoryViewer() {
            const storyCards = Array.from(document.querySelectorAll('.story'));
            if (!storyCards.length) return;

            const storyModalElement = storyModal;
            const storyRowContainer = document.querySelector('.stories-container');
            const storyMediaInner = document.getElementById('storyMediaInner');
            const storyProgressBars = document.getElementById('storyProgressBars');
            const storyQueueList = document.getElementById('storyQueueList');
            const storyUsernameEl = document.getElementById('storyUsername');
            const storyAvatarEl = document.getElementById('storyAvatar');
            const storyTimeEl = document.getElementById('storyTime');
            const storyReplyInput = document.getElementById('storyReplyInput');
            const storyLikeBtn = document.getElementById('storyLikeBtn');
            const storyMuteBtn = document.getElementById('storyMuteBtn');
            const storyPrevBtn = document.getElementById('storyPrevBtn');
            const storyNextBtn = document.getElementById('storyNextBtn');
            const storyPauseBtn = document.getElementById('storyPauseBtn');

            if (!storyModalElement || !storyMediaInner || !storyQueueList || !storyProgressBars) return;

            const inferStoryId = card => {
                if (!card) return '';
                if (card.dataset.storyId) return card.dataset.storyId;
                const label = card.querySelector('.story-username')?.textContent.trim().toLowerCase() || '';
                return label.replace(/\s+/g, '-') || '';
            };

            const storyCardMap = new Map();
            storyCards.forEach(card => {
                const id = inferStoryId(card);
                if (id) {
                    storyCardMap.set(id, card);
                }
            });

            const sanitizeStoryItem = (item, fallbackTime) => {
                if (!item) return null;
                const type = item.type === 'video' ? 'video' : 'image';
                const src = item.src || item.url || item.path;
                if (!src) return null;
                return {
                    type,
                    src,
                    duration: item.duration ? Number(item.duration) : undefined,
                    caption: item.caption || '',
                    postedAgo: item.postedAgo || fallbackTime
                };
            };

            const parseStoryMediaData = (card, fallbackTime) => {
                const raw = card.dataset.storyMedia;
                if (!raw) return null;
                try {
                    const parsed = JSON.parse(raw);
                    if (!Array.isArray(parsed)) return null;
                    const items = parsed
                        .map(entry => sanitizeStoryItem(entry, fallbackTime))
                        .filter(Boolean);
                    return items.length ? items : null;
                } catch (error) {
                    console.warn('Invalid story media data found. Ignoring entry.', error);
                    return null;
                }
            };

            const buildEntryFromCard = (card, storyId, storiesOverride) => {
                const displayName = card.querySelector('.story-username')?.textContent.trim() || 'Story';
                const avatar = card.querySelector('.story-avatar img')?.src || '';
                const lastActive = card.dataset.lastActive || 'moments ago';
                const resolvedId = storyId || displayName.toLowerCase().replace(/\s+/g, '-');
                const stories = storiesOverride && storiesOverride.length ? storiesOverride : [
                    {
                        type: 'image',
                        src: avatar,
                        duration: 5,
                        caption: '',
                        postedAgo: lastActive
                    }
                ];
                return {
                    id: resolvedId,
                    displayName,
                    username: displayName,
                    avatar,
                    lastActive,
                    watched: false,
                    stories
                };
            };

            const baseStoryData = [
                {
                    id: 'your-story',
                    displayName: 'Your Story',
                    username: '@you',
                    avatar: 'https://i.pravatar.cc/150?img=1',
                    lastActive: 'Just now',
                    watched: false,
                    stories: [
                        {
                            type: 'image',
                            src: 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=900&q=80',
                            duration: 5,
                            postedAgo: 'Just now'
                        },
                        {
                            type: 'image',
                            src: 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=900&q=80',
                            duration: 5,
                            postedAgo: '5 min ago'
                        }
                    ]
                },
                {
                    id: 'fy_hamza',
                    displayName: 'fy_hamza',
                    username: '@fy_hamza',
                    avatar: 'https://i.pravatar.cc/150?img=12',
                    lastActive: '3 min ago',
                    watched: false,
                    stories: [
                        {
                            type: 'image',
                            src: 'https://images.unsplash.com/photo-1521412644187-c49fa049e84d?auto=format&fit=crop&w=900&q=80',
                            duration: 6,
                            postedAgo: '3 min ago'
                        },
                        {
                            type: 'image',
                            src: 'https://images.unsplash.com/photo-1517927033932-b3d18e61fb3a?auto=format&fit=crop&w=900&q=80',
                            duration: 6,
                            postedAgo: '10 min ago'
                        }
                    ]
                },
                {
                    id: 'elbotola',
                    displayName: 'elbotola',
                    username: '@elbotola',
                    avatar: 'https://i.pravatar.cc/150?img=14',
                    lastActive: '10 min ago',
                    watched: false,
                    stories: [
                        {
                            type: 'image',
                            src: 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?auto=format&fit=crop&w=900&q=80',
                            duration: 5,
                            postedAgo: '10 min ago'
                        },
                        {
                            type: 'image',
                            src: 'https://images.unsplash.com/photo-1517649763962-0c623066013b?auto=format&fit=crop&w=900&q=80',
                            duration: 5,
                            postedAgo: '12 min ago'
                        }
                    ]
                },
                {
                    id: 'emma',
                    displayName: 'Emma',
                    username: '@emma',
                    avatar: 'https://i.pravatar.cc/150?img=18',
                    lastActive: '22 min ago',
                    watched: false,
                    stories: [
                        {
                            type: 'image',
                            src: 'https://images.unsplash.com/photo-1475180098004-ca77a66827be?auto=format&fit=crop&w=900&q=80',
                            duration: 5,
                            postedAgo: '22 min ago'
                        },
                        {
                            type: 'image',
                            src: 'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?auto=format&fit=crop&w=900&q=80',
                            duration: 5,
                            postedAgo: '25 min ago'
                        }
                    ]
                },
                {
                    id: 'alex',
                    displayName: 'Alex',
                    username: '@alex',
                    avatar: 'https://i.pravatar.cc/150?img=8',
                    lastActive: '45 min ago',
                    watched: false,
                    stories: [
                        {
                            type: 'image',
                            src: 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=900&q=80',
                            duration: 5,
                            postedAgo: '45 min ago'
                        }
                    ]
                },
                {
                    id: 'sarah',
                    displayName: 'Sarah',
                    username: '@sarah',
                    avatar: 'https://i.pravatar.cc/150?img=5',
                    lastActive: '1 h ago',
                    watched: false,
                    stories: [
                        {
                            type: 'image',
                            src: 'https://images.unsplash.com/photo-1459257868276-5e65389e2722?auto=format&fit=crop&w=900&q=80',
                            duration: 5,
                            postedAgo: '1 h ago'
                        }
                    ]
                },
                {
                    id: 'mike',
                    displayName: 'Mike',
                    username: '@mike',
                    avatar: 'https://i.pravatar.cc/150?img=11',
                    lastActive: '2 h ago',
                    watched: false,
                    stories: [
                        {
                            type: 'image',
                            src: 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&w=900&q=80',
                            duration: 5,
                            postedAgo: '2 h ago'
                        }
                    ]
                },
                {
                    id: 'lisa',
                    displayName: 'Lisa',
                    username: '@lisa',
                    avatar: 'https://i.pravatar.cc/150?img=3',
                    lastActive: '3 h ago',
                    watched: false,
                    stories: [
                        {
                            type: 'image',
                            src: 'https://images.unsplash.com/photo-1433838552652-f9a46b332c40?auto=format&fit=crop&w=900&q=80',
                            duration: 5,
                            postedAgo: '3 h ago'
                        }
                    ]
                }
            ];

            const storyDataMap = baseStoryData.reduce((acc, entry) => {
                acc[entry.id] = entry;
                return acc;
            }, {});

            const cloneStoryUser = user => ({
                ...user,
                watched: Boolean(user.watched),
                stories: (user.stories || []).map(story => ({ ...story }))
            });

            let storySequence = [];

            storyCards.forEach(card => {
                const storyId = inferStoryId(card);
                const lastActive = card.dataset.lastActive || 'moments ago';
                const customMedia = parseStoryMediaData(card, lastActive);

                if (customMedia && customMedia.length) {
                    storySequence.push(buildEntryFromCard(card, storyId, customMedia));
                    return;
                }

                if (storyId && storyDataMap[storyId]) {
                    storySequence.push(cloneStoryUser(storyDataMap[storyId]));
                    return;
                }

                storySequence.push(buildEntryFromCard(card, storyId));
            });

            baseStoryData.forEach(user => {
                if (!storySequence.some(entry => entry.id === user.id)) {
                    storySequence.push(cloneStoryUser(user));
                }
            });

            if (!storySequence.length) return;

            let activeUserIndex = 0;
            let activeStoryIndex = 0;
            let activeProgressFill = null;
            let storyInterval = null;
            let activeVideoElement = null;
            let isStoryPaused = false;
            let storyLiked = false;
            let storyMuted = true;

            const getActiveUser = () => storySequence[activeUserIndex];
            const getActiveStory = () => getActiveUser()?.stories[activeStoryIndex];

            const cleanupPlayback = () => {
                clearInterval(storyInterval);
                storyInterval = null;
                if (activeVideoElement) {
                    activeVideoElement.pause();
                    activeVideoElement.currentTime = 0;
                }
                activeVideoElement = null;
            };

            const resetPauseButton = () => {
                isStoryPaused = false;
                if (storyPauseBtn) {
                    storyPauseBtn.innerHTML = '<i class="fas fa-pause"></i>';
                }
            };

            window.__loomiStopStoryPlayback = () => {
                cleanupPlayback();
                resetPauseButton();
            };

            const updateStoryLikeButton = () => {
                if (!storyLikeBtn) return;
                storyLikeBtn.classList.toggle('active', storyLiked);
                storyLikeBtn.innerHTML = `<i class="${storyLiked ? 'fas' : 'far'} fa-heart"></i>`;
            };

            const resetStoryResponseState = () => {
                storyLiked = false;
                if (storyReplyInput) {
                    storyReplyInput.value = '';
                }
                updateStoryLikeButton();
            };

            const sendStoryReply = () => {
                if (!storyReplyInput) return;
                const message = storyReplyInput.value.trim();
                if (!message) return;
                const user = getActiveUser();
                const story = getActiveStory();
                console.log(`Reply to ${user?.displayName || 'story'} (${story?.type || 'image'}):`, message);
                storyReplyInput.value = '';
            };

            const syncVideoMuteState = () => {
                if (activeVideoElement) {
                    activeVideoElement.muted = storyMuted;
                    activeVideoElement.volume = storyMuted ? 0 : 1;
                }
            };

            const updateStoryMuteButton = story => {
                if (!storyMuteBtn) return;
                const isVideo = story?.type === 'video';
                storyMuteBtn.style.display = isVideo ? 'flex' : 'none';
                storyMuteBtn.innerHTML = `<i class="fas fa-volume-${storyMuted ? 'mute' : 'up'}"></i>`;
                storyMuteBtn.setAttribute('aria-label', storyMuted ? 'Unmute story' : 'Mute story');
            };

            function renderStoryRail() {
                if (!storyRowContainer || !storyCardMap.size) return;
                const fragment = document.createDocumentFragment();
                storySequence.forEach(user => {
                    const card = storyCardMap.get(user.id);
                    if (!card) return;
                    card.classList.toggle('watched', Boolean(user.watched));
                    fragment.appendChild(card);
                });
                storyRowContainer.appendChild(fragment);
            }

            function renderQueue() {
                storyQueueList.innerHTML = '';
                storySequence.forEach((user, index) => {
                    const isActive = index === activeUserIndex;
                    const item = document.createElement('button');
                    item.type = 'button';
                    item.className = `story-queue-item${isActive ? ' active' : ''}${user.watched ? ' watched' : ''}`;
                    item.innerHTML = `
                        <div class="story-queue-thumb">
                            <img src="${user.avatar}" alt="${user.displayName}">
                        </div>
                        <div class="story-queue-meta">
                            <span>${user.displayName}</span>
                            <span>${user.lastActive}</span>
                        </div>
                    `;
                    item.addEventListener('click', () => {
                        goToUser(index, 0);
                    });
                    storyQueueList.appendChild(item);
                });
                renderStoryRail();
            }

            function markUserWatched(index) {
                const user = storySequence[index];
                if (!user || user.watched || user.id === 'your-story') return;
                const originalLength = storySequence.length;
                user.watched = true;
                const [removed] = storySequence.splice(index, 1);
                storySequence.push(removed);
                if (index === activeUserIndex) {
                    if (originalLength <= 1) {
                        activeUserIndex = 0;
                    } else if (index >= originalLength - 1) {
                        activeUserIndex = 0;
                    } else {
                        activeUserIndex = index;
                    }
                } else if (index < activeUserIndex) {
                    activeUserIndex = Math.max(activeUserIndex - 1, 0);
                }
                renderQueue();
            }

            function renderProgressBars(user) {
                storyProgressBars.innerHTML = '';
                activeProgressFill = null;
                (user.stories || []).forEach((story, index) => {
                    const track = document.createElement('div');
                    track.className = 'story-progress-track';
                    if (index < activeStoryIndex) {
                        track.classList.add('completed');
                    }
                    const fill = document.createElement('div');
                    fill.className = 'story-progress-fill';
                    if (index < activeStoryIndex) {
                        fill.style.width = '100%';
                    }
                    track.appendChild(fill);
                    storyProgressBars.appendChild(track);
                    if (index === activeStoryIndex) {
                        activeProgressFill = fill;
                    }
                });
            }

            function startStoryTimer(durationSeconds) {
                clearInterval(storyInterval);
                const seconds = durationSeconds && durationSeconds > 0 ? durationSeconds : 5;
                let elapsed = 0;
                const total = seconds * 1000;
                if (activeProgressFill) {
                    activeProgressFill.style.width = '0%';
                }
                storyInterval = setInterval(() => {
                    if (isStoryPaused) return;
                    elapsed += 50;
                    const ratio = Math.min(elapsed / total, 1);
                    if (activeProgressFill) {
                        activeProgressFill.style.width = `${ratio * 100}%`;
                    }
                    if (ratio >= 1) {
                        clearInterval(storyInterval);
                        storyInterval = null;
                        nextStory();
                    }
                }, 50);
            }

            function renderStory() {
                const user = getActiveUser();
                const story = getActiveStory();
                if (!user || !story) return;

                cleanupPlayback();
                resetPauseButton();
                resetStoryResponseState();

                if (storyUsernameEl) {
                    storyUsernameEl.textContent = user.displayName;
                }
                if (storyAvatarEl) {
                    storyAvatarEl.src = user.avatar;
                    storyAvatarEl.alt = `${user.displayName} avatar`;
                }
                if (storyTimeEl) {
                    storyTimeEl.textContent = story.postedAgo || user.lastActive;
                }
                if (storyReplyInput) {
                    storyReplyInput.placeholder = `Reply to ${user.displayName}...`;
                }

                renderProgressBars(user);
                updateStoryMuteButton(story);

                storyMediaInner.innerHTML = '';
                if (story.type === 'video') {
                    const video = document.createElement('video');
                    video.src = story.src;
                    video.autoplay = true;
                    video.muted = storyMuted;
                    video.playsInline = true;
                    video.controls = false;
                    video.loop = false;
                    video.preload = 'auto';
                    storyMediaInner.appendChild(video);
                    activeVideoElement = video;

                    const updateVideoProgress = () => {
                        if (!activeProgressFill || !video.duration || Number.isNaN(video.duration)) return;
                        const ratio = Math.min(video.currentTime / video.duration, 1);
                        activeProgressFill.style.width = `${ratio * 100}%`;
                    };

                    video.addEventListener('timeupdate', updateVideoProgress);
                    video.addEventListener('ended', () => nextStory());
                    if (video.readyState >= 1) {
                        updateVideoProgress();
                    } else {
                        video.addEventListener('loadedmetadata', updateVideoProgress, { once: true });
                    }
                    syncVideoMuteState();
                } else {
                    const img = document.createElement('img');
                    img.src = story.src;
                    img.alt = story.caption || user.displayName;
                    storyMediaInner.appendChild(img);
                    startStoryTimer(story.duration);
                }

                renderQueue();
            }

            function goToUser(index, storyIndex = 0) {
                const total = storySequence.length;
                if (!total) return;
                activeUserIndex = ((index % total) + total) % total;
                const user = getActiveUser();
                if (!user) return;
                activeStoryIndex = Math.min(Math.max(storyIndex, 0), (user.stories.length || 1) - 1);
                renderStory();
            }

            function nextStory() {
                const user = getActiveUser();
                if (!user) return;
                if (activeStoryIndex < user.stories.length - 1) {
                    activeStoryIndex += 1;
                    renderStory();
                } else {
                    const completedIndex = activeUserIndex;
                    markUserWatched(completedIndex);
                    if (user.id === 'your-story') {
                        goToUser(completedIndex + 1, 0);
                    } else {
                        goToUser(completedIndex, 0);
                    }
                }
            }

            function prevStory() {
                if (activeStoryIndex > 0) {
                    activeStoryIndex -= 1;
                    renderStory();
                    return;
                }
                const total = storySequence.length;
                const targetIndex = ((activeUserIndex - 1) % total + total) % total;
                const targetUser = storySequence[targetIndex];
                const lastStoryIndex = Math.max((targetUser?.stories.length || 1) - 1, 0);
                goToUser(targetIndex, lastStoryIndex);
            }

            storyPrevBtn?.addEventListener('click', event => {
                event.stopPropagation();
                prevStory();
            });

            storyNextBtn?.addEventListener('click', event => {
                event.stopPropagation();
                nextStory();
            });

            storyPauseBtn?.addEventListener('click', event => {
                event.stopPropagation();
                isStoryPaused = !isStoryPaused;
                if (activeVideoElement) {
                    if (isStoryPaused) {
                        activeVideoElement.pause();
                    } else {
                        activeVideoElement.play();
                    }
                }
                storyPauseBtn.innerHTML = `<i class="fas fa-${isStoryPaused ? 'play' : 'pause'}"></i>`;
            });

            storyMuteBtn?.addEventListener('click', event => {
                event.stopPropagation();
                storyMuted = !storyMuted;
                syncVideoMuteState();
                updateStoryMuteButton(getActiveStory());
            });

            storyLikeBtn?.addEventListener('click', event => {
                event.stopPropagation();
                storyLiked = !storyLiked;
                updateStoryLikeButton();
            });

            storyReplyInput?.addEventListener('keydown', event => {
                if (event.key === 'Enter' && !event.shiftKey) {
                    event.preventDefault();
                    sendStoryReply();
                }
            });

            storyMediaInner.addEventListener('click', event => {
                if (!storySequence.length) return;
                const bounds = storyMediaInner.getBoundingClientRect();
                const clickX = event.clientX - bounds.left;
                if (clickX < bounds.width / 2) {
                    prevStory();
                } else {
                    nextStory();
                }
            });

            storyCards.forEach(card => {
                card.addEventListener('click', () => {
                    const targetId = card.dataset.storyId;
                    const targetIndex = storySequence.findIndex(user => user.id === targetId);
                    goToUser(targetIndex === -1 ? 0 : targetIndex, 0);
                    openModal(storyModalElement);
                });
            });

            renderQueue();
        })();
        
    </script>
@endpush
