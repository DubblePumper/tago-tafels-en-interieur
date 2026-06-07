@props([
    'title',
    'copy' => null,
    'align' => 'left',
])

<div @class(['section-heading', 'section-heading-center' => $align === 'center']) data-reveal>
    <h2>{{ $title }}</h2>
    @if ($copy)
        <p>{{ $copy }}</p>
    @endif
</div>
