@props([
    'href' => null,
    'variant' => 'primary',
    'type' => 'button',
])

@php
    $class = match ($variant) {
        'secondary' => 'button button-secondary',
        'ghost' => 'button button-ghost',
        'ghost-dark' => 'button button-ghost-dark',
        default => 'button button-primary',
    };
@endphp

@if ($href)
    <a {{ $attributes->merge(['class' => $class]) }} href="{{ $href }}">
        <span>{{ $slot }}</span>
        <span aria-hidden="true">-></span>
    </a>
@else
    <button {{ $attributes->merge(['class' => $class]) }} type="{{ $type }}">
        <span>{{ $slot }}</span>
        <span aria-hidden="true">-></span>
    </button>
@endif
