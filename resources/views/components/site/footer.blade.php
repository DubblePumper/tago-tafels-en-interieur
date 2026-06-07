@props(['navigation'])

<footer class="site-footer">
    <div class="footer-inner">
        <div>
            <p class="footer-title">Laten we samen iets unieks creeren.</p>
            <p class="footer-copy">Plan een vrijblijvend adviesgesprek of vraag direct een offerte aan.</p>
            <div class="button-row">
                <x-site.button href="{{ route('contact') }}">Vraag advies</x-site.button>
                <x-site.button href="{{ route('custom') }}" variant="ghost-dark">Offerte aanvragen</x-site.button>
            </div>
        </div>
        <div>
            <a class="brand footer-brand" href="{{ route('home') }}" aria-label="TAGO Tafels & Interieur home">
                <span class="brand-main">TAGO</span>
                <span class="brand-sub">Tafels & Interieur</span>
            </a>
            <p class="footer-copy">Maatwerktafels en interieur in hout en staal. Met de hand gemaakt, met oog voor detail.</p>
        </div>
        <nav class="footer-nav" aria-label="Footer navigatie">
            <span>Menu</span>
            @foreach ($navigation as $item)
                <a href="{{ route($item['route']) }}">{{ $item['label'] }}</a>
            @endforeach
        </nav>
        <div class="footer-contact">
            <span>Contact</span>
            <p>Contactgegevens worden bevestigd voor publicatie.</p>
            <a href="{{ route('contact') }}">Stuur je aanvraag</a>
        </div>
    </div>
    <div class="footer-bottom">
        <span>&copy; {{ date('Y') }} TAGO Tafels & Interieur.</span>
        <span>Privacy en voorwaarden worden toegevoegd bij lancering.</span>
    </div>
</footer>

@unless (request()->routeIs('contact'))
    <a class="mobile-sticky-cta" href="{{ route('contact') }}">Vraag advies</a>
@endunless
