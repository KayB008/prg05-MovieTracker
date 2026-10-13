@props([
    'active' => false,
    'link' => ''
])

@php
    $active = request()->routeIs($link);
@endphp

<a {{ $attributes->class(['nav-button', 'active' => $active]) }}
   href="{{ $link }}">
    {{ $slot }}
</a>
