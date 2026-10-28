<x-layout title="Movies">

    <h1 class="page-title">{{ $greetings }}</h1>

    <p class="intro">
        Ontdek je volgende favoriete film en laat je inspireren door onze collectie vol spannende verhalen,
        indrukwekkende personages en onvergetelijke momenten!
    </p>

    <h2 class="section-title">Movies</h2>

    <div class="movie-grid">
        @foreach($movies as $movie)
            <x-card class="movie-card">
                <img
                    class="movie-poster"
                    src="{{ $movie->poster_url }}"
                    alt="Poster van {{ $movie->title }}"
                >

                <div class="movie-content">
                    <div class="movie-meta">
                        <span>Film</span>
                        <span>{{ $movie->release_year }}</span>
                    </div>

                    <h3>{{ $movie->title }}</h3>

                    @if($movie->genre)
                        <span class="movie-genre">
                            {{ $movie->genre->genre }}
                        </span>
                    @endif

                    <p>{{ $movie->description }}</p>

                    <a href="{{ route('movies.show', $movie) }}" class="button">
                        Bekijk film
                    </a>
                </div>
            </x-card>
        @endforeach
    </div>

</x-layout>
