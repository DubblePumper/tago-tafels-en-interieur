<x-layouts.site :meta="$meta" :schema="$schema" :navigation="$navigation">
    <section class="hero hero-home">
        <div class="hero-media" aria-hidden="true" data-parallax="0.16">
            <x-site.picture src="hero-table.png" alt="" loading="eager" width="1800" height="1100" />
        </div>
        <div class="hero-content" data-reveal>
            <h1>Maatwerktafels met karakter</h1>
            <p>Unieke tafels in hout en staal, ontworpen rond jouw ruimte, stijl en manier van leven.</p>
            <div class="button-row">
                <x-site.button href="{{ route('realizations') }}">Bekijk realisaties</x-site.button>
                <x-site.button href="{{ route('contact') }}" variant="ghost-dark">Vraag advies</x-site.button>
            </div>
        </div>
    </section>

    <section class="section intro-grid">
        <div data-reveal>
            <h2>Waarom kiezen voor Tago?</h2>
            <p>In ons atelier combineren we ambacht, duurzame materialen en doordacht design. Elk meubel is maatwerk, met oog voor detail en gemaakt om generaties lang mee te gaan.</p>
            <a class="text-link" href="{{ route('about') }}">Ontdek ons atelier <span aria-hidden="true">-></span></a>
        </div>
        <div class="reason-row">
            @foreach ($reasons as $reason)
                <article class="reason-item" data-reveal>
                    <span class="reason-icon" aria-hidden="true"></span>
                    <h3>{{ $reason['title'] }}</h3>
                    <p>{{ $reason['text'] }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section class="section collection-section">
        <div class="section-split">
            <x-site.section-heading title="Onze collecties" />
            <a class="text-link" href="{{ route('tables') }}">Bekijk alle collecties <span aria-hidden="true">-></span></a>
        </div>
        <div class="collection-strip">
            @foreach ($collections as $collection)
                <a class="collection-card" href="{{ route('tables') }}#{{ $collection['slug'] }}" data-reveal>
                    <x-site.picture :src="$collection['image']" :alt="$collection['alt']" width="520" height="760" />
                    <span>{{ $collection['title'] }}</span>
                    <span aria-hidden="true">-></span>
                </a>
            @endforeach
        </div>
    </section>

    <section class="process-band">
        <div class="process-intro" data-reveal>
            <h2>Onze werkwijze</h2>
            <p>Vijf heldere stappen naar jouw maatwerk.</p>
        </div>
        <div class="process-list">
            @foreach ($processSteps as $step)
                <article class="process-step" data-reveal>
                    <span>{{ $step['number'] }}</span>
                    <h3>{{ $step['title'] }}</h3>
                    <p>{{ $step['text'] }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section class="section">
        <div class="portfolio-head">
            <x-site.section-heading title="Realisaties" copy="Portfolio als bewijs van materiaalgevoel, schaal en afwerking." />
            <div class="filter-row" data-portfolio-filters>
                <button class="active" type="button" data-filter="all" aria-pressed="true">Alle</button>
                <button type="button" data-filter="eettafels" aria-pressed="false">Eettafels</button>
                <button type="button" data-filter="salontafels" aria-pressed="false">Salontafels</button>
                <button type="button" data-filter="interieur" aria-pressed="false">Interieur</button>
                <button type="button" data-filter="details" aria-pressed="false">Details</button>
            </div>
        </div>
        <div class="portfolio-grid" data-portfolio-grid>
            @foreach ($realizations as $realization)
                <article class="portfolio-card" data-category="{{ $realization['category'] }}" data-reveal>
                    <x-site.picture :src="$realization['image']" :alt="$realization['title']" width="840" height="620" />
                    <div>
                        <h3>{{ $realization['title'] }}</h3>
                        <p>{{ $realization['meta'] }}</p>
                    </div>
                </article>
            @endforeach
        </div>
        <div class="center-action">
            <x-site.button href="{{ route('realizations') }}" variant="secondary">Bekijk alle realisaties</x-site.button>
        </div>
    </section>

    <section class="image-cta">
        <div data-reveal>
            <h2>Wil je een tafel die niet zomaar uit een winkel komt?</h2>
            <p>Laat jouw tafel ontwerpen rond jouw ruimte, materiaalvoorkeur en manier van leven.</p>
            <div class="button-row">
                <x-site.button href="{{ route('contact') }}">Vraag advies</x-site.button>
                <x-site.button href="{{ route('custom') }}" variant="ghost-dark">Ontdek maatwerk</x-site.button>
            </div>
        </div>
        <x-site.picture src="detail-houtnerf.png" alt="Close-up van massief eiken tafelblad met zichtbare houtnerf" width="1200" height="800" />
    </section>
</x-layouts.site>
