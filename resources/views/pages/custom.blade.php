<x-layouts.site :meta="$meta" :schema="$schema" :navigation="$navigation">
    <section class="page-hero viewer-hero">
        <div data-reveal>
            <h1>Maatwerk zonder standaard<wbr>oplossing</h1>
            <p>Kies de vorm, afmetingen, houtkleur, poten en afwerking. Zo ontstaat een meubelstuk dat mooi is en logisch aanvoelt in jouw ruimte.</p>
            <x-site.button href="{{ route('contact') }}">Vraag jouw tafel aan</x-site.button>
        </div>
        <div id="table-viewer" class="table-viewer" data-table-viewer aria-label="Interactieve 3D impressie van een houten maatwerktafel met stalen poten">
            <div class="table-fallback" aria-hidden="true">
                <span></span>
                <i></i>
                <i></i>
            </div>
        </div>
    </section>

    <section class="section material-grid">
        @foreach ($materials as $material)
            <article class="material-card" data-reveal>
                <h2>{{ $material['title'] }}</h2>
                <p>{{ $material['text'] }}</p>
            </article>
        @endforeach
    </section>

    <section class="split-feature">
        <x-site.picture src="atelier-werkbank.png" alt="Atelierbeeld met eiken tafelblad op een werkbank" width="1300" height="900" />
        <div data-reveal>
            <h2>Van idee naar meubelstuk</h2>
            <p>Bij Tago draait maatwerk niet om eindeloze keuzes, maar om de juiste keuzes. Vorm, verhouding, hout en staal worden samengebracht tot een tafel die past bij jouw interieur.</p>
            <ul class="check-list">
                <li>Rond, ovaal, rechthoekig of organisch.</li>
                <li>Afmetingen afgestemd op ruimte en aantal personen.</li>
                <li>Hout, rand, pootvorm en afwerking in een helder voorstel.</li>
            </ul>
        </div>
    </section>
</x-layouts.site>
