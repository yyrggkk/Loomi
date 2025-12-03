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
