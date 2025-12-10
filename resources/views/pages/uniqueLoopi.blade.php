@extends('layouts.master')

@section('title', 'Loomi - Loopi')

@section('content')
    <div class="single-loopi-page">
        @include('partials.header', ['searchPlaceholder' => 'Search Loomi'])

        <main class="loopi-shell">
            <section class="loopi-media">
                <video id="loopiPlayer" playsinline controls muted
                    <source src="{{ asset('videos/bg.mp4') }}" type="video/mp4">
                </video>
            </section>
            <section class="loopi-meta">
                <header class="loopi-header">
                    <div class="loopi-avatar">JS</div>
                    <div>
                        <div class="loopi-user">@johnsmith</div>
                        <div class="loopi-time">2h ago</div>
                    </div>
                    <button class="loopi-follow" id="loopiFollowBtn">Follow</button>
                </header>

                <div class="loopi-stats">
                    <button class="stat-btn" id="loopiLikeBtn" aria-label="Like">
                        <i class="far fa-heart"></i> <span id="loopiLikes">12,480</span>
                    </button>
                    <button class="stat-btn" aria-label="Comments">
                        <i class="far fa-comment"></i> 864
                    </button>
                    <button class="stat-btn" aria-label="Share">
                        <i class="far fa-share-square"></i> Share
                    </button>
                </div>

                <p class="loopi-caption">Golden hour walk through the old town. 🎥✨</p>

                <div class="loopi-comments" id="loopiComments">
                    <div class="comment">
                        <div class="comment-avatar">AR</div>
                        <div class="comment-body">
                            <div class="comment-user">@alicia.rose</div>
                            <div class="comment-text">This looks amazing!</div>
                        </div>
                    </div>
                </div>

                <div class="comment-input-row">
                    <input type="text" id="loopiCommentInput" placeholder="Add a comment...">
                    <button id="loopiSendComment">Post</button>
                </div>
            </section>
        </main>
    </div>
@endsection

@push('styles')
<style>
    :root {
        --primary: #095aa2;
        --secondary: #00f2fe;
        --dark: #050505;
        --panel: #0f0f0f;
        --border: #1f1f1f;
        --text: #f5f5f5;
        --text-secondary: #b2b2b2;
    }

    body.loomi-body {
        background: var(--dark);
        color: var(--text);
    }

    .loomi-layout { display: block; min-height: 100vh; background: var(--dark); }
    .sidebar { display: none; }
    .loomi-main { margin: 0; padding: 0; }
    .header { display: none; }

    .single-loopi-page {
        position: relative;
        min-height: 100vh;
        padding: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--dark);
        overflow: hidden;
    }

    .single-loopi-page::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 25% 20%, rgba(255, 255, 255, 0.05), transparent 35%),
                    radial-gradient(circle at 80% 0%, rgba(9, 90, 162, 0.12), transparent 40%),
                    linear-gradient(135deg, rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.9));
        filter: blur(12px);
        z-index: 0;
    }

    .loopi-shell {
        position: relative;
        z-index: 1;
        width: 100%;
        max-width: 1280px;
        height: 82vh;
        min-height: 680px;
        display: grid;
        grid-template-columns: minmax(640px, 2fr) 420px;
        background: rgba(8, 8, 8, 0.9);
        border: 1px solid var(--border);
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.55);
    }

    .loopi-media {
        background: #000;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .loopi-media video {
        width: 100%;
        height: 100%;
        object-fit: contain;
        background: #000;
    }

    .loopi-meta {
        background: var(--panel);
        border-left: 1px solid var(--border);
        padding: 16px;
        display: flex;
        flex-direction: column;
        gap: 14px;
        overflow: hidden;
    }

    .loopi-header {
        display: flex;
        align-items: center;
        gap: 12px;
        padding-bottom: 12px;
        border-bottom: 1px solid var(--border);
    }

    .loopi-avatar {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: linear-gradient(45deg, #095aa2, #00f2fe);
        display: grid;
        place-items: center;
        font-weight: 700;
    }

    .loopi-user { font-weight: 700; }
    .loopi-time { color: var(--text-secondary); font-size: 13px; }

    .loopi-follow {
        margin-left: auto;
        padding: 8px 14px;
        border-radius: 10px;
        border: 1px solid var(--border);
        background: transparent;
        color: var(--text);
        cursor: pointer;
    }

    .loopi-stats {
        display: flex;
        gap: 12px;
        padding: 10px 0;
        border-top: 1px solid var(--border);
        border-bottom: 1px solid var(--border);
    }

    .stat-btn {
        background: rgba(255, 255, 255, 0.04);
        border: 1px solid var(--border);
        color: var(--text);
        padding: 8px 12px;
        border-radius: 10px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 6px;
        font-weight: 600;
    }

    .loopi-caption { color: #e0e0e0; font-size: 14px; }

    .loopi-comments {
        display: flex;
        flex-direction: column;
        gap: 14px;
        flex: 1;
        overflow-y: auto;
        padding-right: 6px;
    }

    .comment {
        display: flex;
        gap: 10px;
    }

    .comment-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #1d1d1d;
        display: grid;
        place-items: center;
        font-size: 12px;
        font-weight: 700;
    }

    .comment-body { display: flex; flex-direction: column; gap: 4px; }
    .comment-user { font-weight: 700; }
    .comment-text { color: #d0d0d0; line-height: 1.4; }

    .comment-input-row {
        display: flex;
        gap: 8px;
        padding-top: 12px;
        border-top: 1px solid var(--border);
    }

    .comment-input-row input {
        flex: 1;
        background: #0a0a0a;
        border: 1px solid var(--border);
        border-radius: 10px;
        padding: 10px 12px;
        color: var(--text);
    }

    .comment-input-row button {
        padding: 10px 14px;
        border-radius: 10px;
        border: 1px solid var(--border);
        background: #095aa2;
        color: #fff;
        cursor: pointer;
        font-weight: 700;
    }

    @media (max-width: 1200px) {
        .loopi-shell {
            grid-template-columns: 1fr 380px;
        }
    }

    @media (max-width: 1024px) {
        .single-loopi-page { padding: 16px; }
        .loopi-shell {
            height: auto;
            min-height: 0;
            grid-template-columns: 1fr;
        }
        .loopi-meta { height: auto; }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const likeBtn = document.getElementById('loopiLikeBtn');
        const likeLabel = document.getElementById('loopiLikes');
        const followBtn = document.getElementById('loopiFollowBtn');
        const commentInput = document.getElementById('loopiCommentInput');
        const sendComment = document.getElementById('loopiSendComment');
        const comments = document.getElementById('loopiComments');
        const player = document.getElementById('loopiPlayer');

        let liked = false;
        likeBtn?.addEventListener('click', () => {
            liked = !liked;
            likeBtn.classList.toggle('liked', liked);
            const icon = likeBtn.querySelector('i');
            if (icon) {
                icon.classList.toggle('fas', liked);
                icon.classList.toggle('far', !liked);
            }
            const base = 12480;
            likeLabel.textContent = liked ? (base + 1).toLocaleString() : base.toLocaleString();
        });

        followBtn?.addEventListener('click', () => {
            const following = followBtn.textContent.trim() === 'Following';
            followBtn.textContent = following ? 'Follow' : 'Following';
            followBtn.style.background = following ? 'transparent' : '#333';
        });

        const addComment = () => {
            const text = commentInput.value.trim();
            if (!text) return;
            const wrapper = document.createElement('div');
            wrapper.className = 'comment';
            wrapper.innerHTML = `
                <div class="comment-avatar">YOU</div>
                <div class="comment-body">
                    <div class="comment-user">@you</div>
                    <div class="comment-text"></div>
                </div>
            `;
            wrapper.querySelector('.comment-text').textContent = text;
            comments.appendChild(wrapper);
            commentInput.value = '';
        };

        sendComment?.addEventListener('click', addComment);
        commentInput?.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                addComment();
            }
        });

        // Reset to start on mouse leave to mimic hover previews
        if (player) {
            player.addEventListener('mouseleave', () => {
                if (!player.paused) return;
                player.currentTime = 0;
            });
        }
    });
</script>
@endpush
