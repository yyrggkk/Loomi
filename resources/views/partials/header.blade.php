@php
    $searchPlaceholder = $searchPlaceholder ?? 'Search Loomi';
    $searchInputId = $searchInputId ?? null;
    $searchAriaLabel = $searchAriaLabel ?? 'Search Loomi';
    $userInitials = $userInitials ?? 'JS';

    $showUploadButton = $showUploadButton ?? true;
    $showActivityButton = $showActivityButton ?? true;
    $showNotificationsButton = $showNotificationsButton ?? true;

    $uploadButtonId = $uploadButtonId ?? 'openUploadBtn';
    $activityButtonId = $activityButtonId ?? 'openActivityBtn';
    $notificationsButtonId = $notificationsButtonId ?? 'openNotificationsBtn';
@endphp

    @push('styles')
        <style>
            /* Shared modal base */
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

            .modal.active { display: flex; }

            .modal-overlay {
                position: absolute;
                inset: 0;
                background-color: rgba(0, 0, 0, 0.7);
                z-index: 1;
                cursor: pointer;
            }

            .modal-content {
                background-color: var(--light-dark, #1e1e1e);
                width: 500px;
                max-width: 90%;
                border-radius: 10px;
                z-index: 2;
                display: flex;
                flex-direction: column;
                max-height: 80vh;
                border: 1px solid var(--border, #333);
            }

            .modal-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 15px 20px;
                border-bottom: 1px solid var(--border, #333);
                flex-shrink: 0;
            }

            .modal-header h2 { font-size: 20px; }

            .modal-close-btn {
                background: none;
                border: none;
                color: var(--text-secondary, #a0a0a0);
                font-size: 28px;
                cursor: pointer;
                transition: color 0.3s;
            }

            .modal-close-btn:hover { color: var(--text, #f5f5f5); }

            /* Notification & Activity */
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
                border-bottom: 1px solid var(--border, #333);
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .activity-item:hover { background-color: rgba(255, 255, 255, 0.05); }

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

            .activity-text strong { color: var(--text, #f5f5f5); }

            .activity-time {
                color: var(--text-secondary, #a0a0a0);
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

            /* Upload */
            .upload-drop-area {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                padding: 40px;
                margin: 20px;
                border: 2px dashed var(--border, #333);
                border-radius: 10px;
                background-color: var(--dark, #121212);
                color: var(--text-secondary, #a0a0a0);
                text-align: center;
            }

            .upload-drop-area i { font-size: 48px; margin-bottom: 15px; }

            .upload-drop-area p { font-size: 16px; margin-bottom: 15px; }

            .upload-select-btn {
                background-color: var(--primary, #095aa2);
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 8px;
                font-weight: 600;
                cursor: pointer;
            }

            #fileInput { display: none; }

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
                border: 1px solid var(--border, #333);
            }

            .upload-form {
                padding: 20px;
                border-top: 1px solid var(--border, #333);
                display: flex;
                flex-direction: column;
                gap: 15px;
            }

            .upload-caption {
                background-color: var(--dark, #121212);
                border: 1px solid var(--border, #333);
                border-radius: 8px;
                padding: 10px 15px;
                color: var(--text, #f5f5f5);
                outline: none;
                resize: none;
                height: 80px;
                font-family: inherit;
            }

            .upload-post-btn {
                background-color: var(--primary, #095aa2);
                color: white;
                border: none;
                padding: 12px;
                border-radius: 8px;
                font-weight: 600;
                font-size: 16px;
                cursor: pointer;
            }
        </style>
    @endpush

<div class="header">
    <div class="search-bar">
        <i class="fas fa-search" aria-hidden="true"></i>
        <input type="text"
               placeholder="{{ $searchPlaceholder }}"
               aria-label="{{ $searchAriaLabel }}"
               {{ $searchInputId ? 'id="'.$searchInputId.'"' : '' }}>
    </div>

    <div class="user-actions">
        @if ($showUploadButton)
            <i class="fas fa-plus-circle" id="{{ $uploadButtonId }}" aria-hidden="true"></i>
        @endif

        @if ($showActivityButton)
            <i class="fas fa-heart" id="{{ $activityButtonId }}" aria-hidden="true"></i>
        @endif

        @if ($showNotificationsButton)
            <i class="fas fa-bell" id="{{ $notificationsButtonId }}" aria-hidden="true"></i>
        @endif

        <div class="user-profile" aria-hidden="true">{{ strtoupper(\Illuminate\Support\Str::of($userInitials)->limit(2, '')) }}</div>
    </div>
</div>

@push('modals')
    <div class="modal" id="notificationsModal">
        <div class="modal-overlay"></div>
        <div class="modal-content">
            <div class="modal-header">
                <h2>Notifications</h2>
                <button class="modal-close-btn" aria-label="Close notifications">&times;</button>
            </div>
            <ul class="activity-list"></ul>
        </div>
    </div>

    <div class="modal" id="activityModal">
        <div class="modal-overlay"></div>
        <div class="modal-content">
            <div class="modal-header">
                <h2>Activity</h2>
                <button class="modal-close-btn" aria-label="Close activity">&times;</button>
            </div>
            <ul class="activity-list"></ul>
        </div>
    </div>

    <div class="modal" id="uploadModal">
        <div class="modal-overlay"></div>
        <div class="modal-content">
            <div class="modal-header">
                <h2>Create new post</h2>
                <button class="modal-close-btn" aria-label="Close upload">&times;</button>
            </div>
            <div class="upload-drop-area" id="dropArea">
                <i class="fas fa-photo-video"></i>
                <p>Drag photos and videos here</p>
                <label for="fileInput" class="upload-select-btn">Select from computer</label>
                <input type="file" id="fileInput" multiple accept="image/*,video/*">
            </div>
            <div class="upload-preview-area" id="previewArea"></div>
            <div class="upload-form">
                <textarea class="upload-caption" placeholder="Write a caption..."></textarea>
                <button class="upload-post-btn">Post</button>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modals = {
                notifications: document.getElementById('notificationsModal'),
                activity: document.getElementById('activityModal'),
                upload: document.getElementById('uploadModal'),
            };

            const buttons = {
                upload: document.getElementById('{{ $uploadButtonId }}'),
                activity: document.getElementById('{{ $activityButtonId }}'),
                notifications: document.getElementById('{{ $notificationsButtonId }}'),
            };

            const openModal = (modal) => { if (modal) modal.classList.add('active'); };
            const closeModal = (modal) => { if (modal) modal.classList.remove('active'); };

            Object.values(modals).forEach(modal => {
                if (!modal) return;
                const overlay = modal.querySelector('.modal-overlay');
                const closeBtn = modal.querySelector('.modal-close-btn');
                const handler = () => closeModal(modal);
                overlay?.addEventListener('click', handler);
                closeBtn?.addEventListener('click', handler);
            });

            buttons.upload?.addEventListener('click', () => openModal(modals.upload));
            buttons.activity?.addEventListener('click', () => openModal(modals.activity));
            buttons.notifications?.addEventListener('click', () => openModal(modals.notifications));

            // Upload interactions
            const dropArea = document.getElementById('dropArea');
            const fileInput = document.getElementById('fileInput');
            const previewArea = document.getElementById('previewArea');

            const resetUpload = () => {
                if (previewArea) previewArea.innerHTML = '';
                const caption = document.querySelector('.upload-caption');
                if (caption) caption.value = '';
                if (fileInput) fileInput.value = '';
            };

            const renderFiles = (files) => {
                if (!previewArea || !files?.length) return;
                previewArea.innerHTML = '';
                Array.from(files).forEach(file => {
                    if (!file.type.startsWith('image/')) return;
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        const img = document.createElement('img');
                        img.src = e.target?.result || '';
                        img.className = 'preview-image';
                        previewArea.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                });
            };

            fileInput?.addEventListener('change', (e) => renderFiles(e.target.files));

            if (dropArea) {
                dropArea.addEventListener('dragover', (e) => {
                    e.preventDefault();
                    dropArea.style.borderColor = 'var(--primary, #095aa2)';
                });
                dropArea.addEventListener('dragleave', () => {
                    dropArea.style.borderColor = 'var(--border, #333)';
                });
                dropArea.addEventListener('drop', (e) => {
                    e.preventDefault();
                    dropArea.style.borderColor = 'var(--border, #333)';
                    renderFiles(e.dataTransfer.files);
                });
            }

            document.querySelector('.upload-post-btn')?.addEventListener('click', () => {
                alert('Post created! (Simulation)');
                closeModal(modals.upload);
                resetUpload();
            });
        });
    </script>
@endpush
