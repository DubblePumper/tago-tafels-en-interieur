<!doctype html>
<html lang="nl-BE">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $meta['title'] }} | TAGO Tafels & Interieur</title>
        <meta name="description" content="{{ $meta['description'] }}">
        <link rel="canonical" href="{{ $meta['canonical'] }}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $meta['title'] }} | TAGO Tafels & Interieur">
        <meta property="og:description" content="{{ $meta['description'] }}">
        <meta property="og:url" content="{{ $meta['canonical'] }}">
        <meta property="og:image" content="{{ asset('images/tago-placeholders/hero-table.png') }}">
        <meta name="theme-color" content="#171412">
        <script type="application/ld+json">
            {!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
        </script>
        @vite(['resources/css/app.css', 'resources/js/app.ts'])
    </head>
    <body>
        <x-site.header :navigation="$navigation" />
        <main id="content">
            {{ $slot }}
        </main>
        <x-site.footer :navigation="$navigation" />
    </body>
</html>
