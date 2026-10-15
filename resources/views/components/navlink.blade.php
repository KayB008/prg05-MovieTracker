@props([
    'active' => false,
    'link' => ''
])

@php
    $active = request()->routeIs($link);
@endphp

<a {{ $attributes->class(['nav-button', 'active' => $active]) }}
   href="{{ route($link) }}">
    {{ $slot }}
</a>
