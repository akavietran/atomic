@props(['type' => 'button', 'class' => 'btn-primary'])

<button type="{{ $type }}" class="btn {{ $class }}">
    {{ $slot }}
</button>