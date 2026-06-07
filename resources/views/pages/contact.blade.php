<x-layouts.site :meta="$meta" :schema="$schema" :navigation="$navigation">
    <section class="page-hero compact">
        <div data-reveal>
            <h1>Vraag advies of een offerte op maat</h1>
            <p>Vertel kort wat je zoekt. Een paar gerichte vragen helpen om jouw project meteen juist te begrijpen.</p>
        </div>
    </section>

    <section class="contact-section">
        <form class="contact-form" action="{{ route('contact.store') }}" method="post" enctype="multipart/form-data" data-reveal>
            @csrf

            @if (session('status'))
                <div class="form-status" role="status">{{ session('status') }}</div>
            @endif

            @if ($errors->any())
                <div class="form-summary" role="alert">
                    <p>Controleer de gemarkeerde velden.</p>
                </div>
            @endif

            <div class="form-grid">
                <x-site.form-field name="name" label="Naam" required autocomplete="name" />
                <x-site.form-field name="email" label="E-mail" type="email" required autocomplete="email" />
                <x-site.form-field name="phone" label="Telefoon" type="tel" autocomplete="tel" />
                <x-site.form-field name="table_type" label="Type tafel" type="select" :options="$formOptions['tableTypes']" required />
                <x-site.form-field name="dimensions" label="Gewenste afmetingen" placeholder="Bijvoorbeeld 240 x 100 cm" />
                <x-site.form-field name="style" label="Stijl" type="select" :options="$formOptions['styles']" />
                <x-site.form-field name="wood_color" label="Houtkleur" type="select" :options="$formOptions['woodColors']" />
                <x-site.form-field name="attachment" label="Foto of plan uploaden" type="file" />
            </div>

            <x-site.form-field name="message" label="Bericht" type="textarea" required placeholder="Vertel iets over je ruimte, materiaalvoorkeur, timing of inspiratie." />

            <button class="button button-primary" type="submit">
                <span>Verstuur aanvraag</span>
                <span aria-hidden="true">-></span>
            </button>
        </form>

        <aside class="contact-aside" data-reveal>
            <h2>Wat helpt om snel te antwoorden?</h2>
            <ul class="check-list">
                <li>Een ruwe afmeting of aantal personen.</li>
                <li>Een foto van de ruimte of inspiratiebeeld.</li>
                <li>Een voorkeur voor houtkleur of onderstel.</li>
                <li>Een idee van timing of plaatsing.</li>
            </ul>
            <p>Contactgegevens en showroominformatie worden pas gepubliceerd nadat ze officieel bevestigd zijn.</p>
        </aside>
    </section>

    <section class="section faq-section">
        <x-site.section-heading title="Veelgestelde vragen" />
        <div class="faq-list">
            @foreach ($faqs as $faq)
                <details data-reveal>
                    <summary>{{ $faq['question'] }}</summary>
                    <p>{{ $faq['answer'] }}</p>
                </details>
            @endforeach
        </div>
    </section>
</x-layouts.site>
