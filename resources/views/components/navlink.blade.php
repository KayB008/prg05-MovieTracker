@props([
    'active' => false
])

<a {{ $attributes }} style="color: {{ $active ? 'red' : 'blue' }}; text-decoration: {{ $active ? 'underline' : 'none' }}; margin: 5px;">
    {{ $slot }}
</a>
