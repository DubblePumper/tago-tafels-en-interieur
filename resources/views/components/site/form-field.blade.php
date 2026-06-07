@props([
    'name',
    'label',
    'type' => 'text',
    'options' => [],
    'required' => false,
    'autocomplete' => null,
    'placeholder' => null,
])

@php
    $id = str_replace('_', '-', $name);
@endphp

<div class="form-field">
    <label for="{{ $id }}">
        {{ $label }}
        @if ($required)
            <span aria-hidden="true">*</span>
        @endif
    </label>

    @if ($type === 'textarea')
        <textarea
            id="{{ $id }}"
            name="{{ $name }}"
            rows="6"
            @required($required)
            placeholder="{{ $placeholder }}"
        >{{ old($name) }}</textarea>
    @elseif ($type === 'select')
        <select id="{{ $id }}" name="{{ $name }}" @required($required)>
            <option value="">Kies een optie</option>
            @foreach ($options as $value => $optionLabel)
                <option value="{{ $value }}" @selected(old($name) === $value)>{{ $optionLabel }}</option>
            @endforeach
        </select>
    @elseif ($type === 'file')
        <input
            id="{{ $id }}"
            name="{{ $name }}"
            type="file"
            accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
            @required($required)
        >
        <p class="form-hint">JPG, PNG of WebP tot 5 MB. Bestanden worden privaat opgeslagen.</p>
    @else
        <input
            id="{{ $id }}"
            name="{{ $name }}"
            type="{{ $type }}"
            value="{{ old($name) }}"
            @required($required)
            @if ($autocomplete) autocomplete="{{ $autocomplete }}" @endif
            placeholder="{{ $placeholder }}"
        >
    @endif

    @error($name)
        <p class="form-error">{{ $message }}</p>
    @enderror
</div>
