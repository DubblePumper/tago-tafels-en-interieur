@props([
    'src',
    'alt',
    'class' => '',
    'loading' => 'lazy',
    'width' => 1200,
    'height' => 900,
])

<img
    class="{{ $class }}"
    src="{{ asset('images/tago-placeholders/'.$src) }}"
    alt="{{ $alt }}"
    width="{{ $width }}"
    height="{{ $height }}"
    loading="{{ $loading }}"
    decoding="async"
>
