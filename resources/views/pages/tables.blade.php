<x-layouts.site :meta="$meta" :schema="$schema" :navigation="$navigation">
    <section class="page-hero">
        <div data-reveal>
            <h1>Tafels die vertrekken vanuit jouw ruimte</h1>
            <p>Van robuuste eettafel tot verfijnde salontafel: vorm, hout, staal en afwerking worden afgestemd op het interieur waarin het meubel moet leven.</p>
        </div>
        <x-site.picture src="realisatie-ronde-tafel.png" alt="Ronde eiken tafel op maat in een rustig interieur" loading="eager" width="1200" height="800" />
    </section>

    <section class="section collection-page-grid">
        @foreach ($collections as $collection)
            <article id="{{ $collection['slug'] }}" class="collection-feature" data-reveal>
                <x-site.picture :src="$collection['image']" :alt="$collection['alt']" width="760" height="940" />
                <div>
                    <h2>{{ $collection['title'] }}</h2>
                    <p>Een rustige basis, sterke materialen en details die kloppen. Elk stuk wordt op maat bekeken, zodat verhouding, kleur en onderstel passen bij de ruimte.</p>
                    <a class="text-link" href="{{ route('contact') }}">Bespreek je project <span aria-hidden="true">-></span></a>
                </div>
            </article>
        @endforeach
    </section>
</x-layouts.site>
