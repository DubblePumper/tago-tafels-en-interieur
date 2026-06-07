<x-layouts.site :meta="$meta" :schema="$schema" :navigation="$navigation">
    <section class="page-hero compact">
        <div data-reveal>
            <h1>Realisaties met materiaalgevoel</h1>
            <p>Bekijk hoe hout, staal, vorm en afwerking samenkomen in interieurs waar de tafel het centrale element wordt.</p>
        </div>
    </section>

    <section class="section">
        <div class="filter-row filter-row-large" data-portfolio-filters>
            <button class="active" type="button" data-filter="all" aria-pressed="true">Alle</button>
            <button type="button" data-filter="eettafels" aria-pressed="false">Eettafels</button>
            <button type="button" data-filter="salontafels" aria-pressed="false">Salontafels</button>
            <button type="button" data-filter="interieur" aria-pressed="false">Interieur</button>
            <button type="button" data-filter="details" aria-pressed="false">Details</button>
            <button type="button" data-filter="atelier" aria-pressed="false">Atelier</button>
        </div>
        <div class="portfolio-grid portfolio-grid-large" data-portfolio-grid>
            @foreach ($realizations as $realization)
                <article class="portfolio-card" data-category="{{ $realization['category'] }}" data-reveal>
                    <x-site.picture :src="$realization['image']" :alt="$realization['title']" width="920" height="680" />
                    <div>
                        <h2>{{ $realization['title'] }}</h2>
                        <p>{{ $realization['meta'] }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
</x-layouts.site>
