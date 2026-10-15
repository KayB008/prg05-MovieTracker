<x-layout>
    <h1>{{ $movie->title }}</h1>
    <p>{{ $movie->description }}</p>
    <p>Release Year: {{ $movie->release_year }}</p>
    <img src="{{ $movie->poster_url }}" alt="{{ $movie->title }}">
</x-layout>
