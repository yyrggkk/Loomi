@php
    use Illuminate\Support\Facades\Route;

    $currentRoute = Route::currentRouteName();
    $navItems = [
        ['label' => 'Home', 'icon' => 'fas fa-home', 'route' => 'home'],
        ['label' => 'Loopi', 'icon' => 'fas fa-infinity', 'route' => 'loopi'],
        ['label' => 'Explore', 'icon' => 'fas fa-compass', 'route' => 'explore'],
        ['label' => 'Inbox', 'icon' => 'fas fa-envelope', 'route' => 'inbox'],
        ['label' => 'Profile', 'icon' => 'fas fa-user', 'route' => 'profile'],
        ['label' => 'Settings', 'icon' => 'fas fa-cog', 'route' => 'settings'],
    ];
@endphp

<div class="sidebar">
    <div class="logo">
        <img src="https://i.postimg.cc/VN4bTkr3/logo-removebg-preview.png" alt="Loomi Logo" class="logo-img">
        <h1>Loomi</h1>
    </div>

    <ul class="nav-links">
        @foreach ($navItems as $item)
            <li>
                <a href="{{ route($item['route']) }}" class="{{ $currentRoute === $item['route'] ? 'active' : '' }}">
                    <i class="{{ $item['icon'] }}"></i>
                    <span>{{ $item['label'] }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</div>
