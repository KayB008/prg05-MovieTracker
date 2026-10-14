<x-layout title="Home">

    <h1>Movies</h1>

    <x-card>
        {{ $movie->title }}
        {{ $movie->description }}
        {{ $movie->release_year }}
        {{ $movie->poster_url }}
    </x-card>
</x-layout>
