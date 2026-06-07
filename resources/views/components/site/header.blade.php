@props(['navigation'])

<header class="site-header" data-reveal>
    <a class="brand" href="{{ route('home') }}" aria-label="TAGO Tafels & Interieur home">
        <span class="brand-main">TAGO</span>
        <span class="brand-sub">Tafels & Interieur</span>
    </a>

    <nav class="desktop-nav" aria-label="Hoofdnavigatie">
        @foreach ($navigation as $item)
            <a @class(['active' => request()->routeIs($item['route'])]) href="{{ route($item['route']) }}">
                {{ $item['label'] }}
            </a>
        @endforeach
    </nav>

    <a class="header-cta" href="{{ route('contact') }}">Vraag advies</a>

    <details class="mobile-menu">
        <summary>Menu</summary>
        <nav aria-label="Mobiele navigatie">
            @foreach ($navigation as $item)
                <a href="{{ route($item['route']) }}">{{ $item['label'] }}</a>
            @endforeach
        </nav>
    </details>
</header>
