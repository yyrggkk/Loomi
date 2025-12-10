@extends('layouts.master')

@section('title', 'Loomi - Post')

@section('content')
    <div class="single-post-page">
        @include('partials.header', ['searchPlaceholder' => 'Search Loomi'])

        <main class="post-shell">
            <section class="post-media">
                <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=1600&q=80" alt="Post image" id="postImage">
            </section>
            <section class="post-meta">
                <header class="post-header">
                    <div class="post-avatar">JS</div>
                    <div>
                        <div class="post-user">@johnsmith</div>
                        <div class="post-time">Yesterday</div>
                    </div>
                    <button class="post-follow" id="postFollowBtn">Follow</button>
                </header>

                <p class="post-caption">Beach break to reset the mind. 🌊</p>

                <div class="post-actions">
                    <button class="post-action" id="postLikeBtn" aria-label="Like">
                        <i class="far fa-heart"></i> <span id="postLikes">1,582</span>
                    </button>
                    <button class="post-action" aria-label="Comment">
                        <i class="far fa-comment"></i> 210
                    </button>
                    <button class="post-action" aria-label="Share">
                        <i class="far fa-share-square"></i> Share
                    </button>
                </div>

                <div class="post-comments" id="postComments">
                    <div class="comment">
                        <div class="comment-avatar">AR</div>
                        <div class="comment-body">
                            <div class="comment-user">@alicia.rose</div>
                            <div class="comment-text">Need this view right now.</div>
                        </div>
                    </div>
                </div>

                <div class="comment-input-row">
                    <input type="text" id="postCommentInput" placeholder="Add a comment...">
                    <button id="postSendComment">Post</button>
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

    .single-post-page {
        position: relative;
        min-height: 100vh;
        padding: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--dark);
        overflow: hidden;
    }

    .single-post-page::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.05), transparent 35%),
                    radial-gradient(circle at 80% 0%, rgba(9, 90, 162, 0.12), transparent 40%),
                    linear-gradient(135deg, rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.9));
        filter: blur(12px);
        z-index: 0;
    }

    .post-shell {
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

    .post-media {
        background: #000;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .post-media img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        background: #000;
    }

    .post-meta {
        background: var(--panel);
        border-left: 1px solid var(--border);
        padding: 16px;
        display: flex;
        flex-direction: column;
        gap: 14px;
        overflow: hidden;
    }

    .post-header {
        display: flex;
        align-items: center;
        gap: 12px;
        padding-bottom: 12px;
        border-bottom: 1px solid var(--border);
    }

    .post-avatar {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: linear-gradient(45deg, #095aa2, #00f2fe);
        display: grid;
        place-items: center;
        font-weight: 700;
    }

    .post-user { font-weight: 700; }
    .post-time { color: var(--text-secondary); font-size: 13px; }

    .post-follow {
        margin-left: auto;
        padding: 8px 14px;
        border-radius: 10px;
        border: 1px solid var(--border);
        background: transparent;
        color: var(--text);
        cursor: pointer;
    }

    .post-caption { color: #e0e0e0; font-size: 14px; }

    .post-actions {
        display: flex;
        gap: 12px;
        padding: 10px 0;
        border-top: 1px solid var(--border);
        border-bottom: 1px solid var(--border);
    }

    .post-action {
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

    .post-comments {
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
        .post-shell {
            grid-template-columns: 1fr 380px;
        }
    }

    @media (max-width: 1024px) {
        .single-post-page { padding: 16px; }
        .post-shell {
            height: auto;
            min-height: 0;
            grid-template-columns: 1fr;
        }
        .post-meta { height: auto; }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const likeBtn = document.getElementById('postLikeBtn');
        const likeLabel = document.getElementById('postLikes');
        const followBtn = document.getElementById('postFollowBtn');
        const commentInput = document.getElementById('postCommentInput');
        const sendComment = document.getElementById('postSendComment');
        const comments = document.getElementById('postComments');

        let liked = false;
        likeBtn?.addEventListener('click', () => {
            liked = !liked;
            likeBtn.classList.toggle('liked', liked);
            const icon = likeBtn.querySelector('i');
            if (icon) {
                icon.classList.toggle('fas', liked);
                icon.classList.toggle('far', !liked);
            }
            const base = 1582;
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
    });
</script>
@endpush
