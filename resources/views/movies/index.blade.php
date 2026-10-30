<x-layout title="Movies">

    <h1 class="page-title">{{ $greetings }}</h1>

    <p class="intro">
        Ontdek je volgende favoriete film en laat je inspireren
        door onze collectie vol spannende verhalen,
        indrukwekkende personages en onvergetelijke momenten!
    </p>

    <h2 class="section-title">Movies</h2>

    @if(session('error'))
        <p class="movie-feedback movie-feedback-error">
            {{ session('error') }}
        </p>
    @endif

    @if(session('success'))
        <p class="movie-feedback movie-feedback-success">
            {{ session('success') }}
        </p>
    @endif

    <div class="movie-filters">

        <!-- Zoekbalk -->
        <form action="{{ route('movies.index') }}"
              method="GET"
              class="movie-search-form">

            <input
                type="text"
                name="search"
                class="movie-search-input"
                placeholder="Search movies..."
                value="{{ $search }}"
                aria-label="Search by title or description"
            >

            @if($selectedGenre)
                <input type="hidden"
                       name="genre"
                       value="{{ $selectedGenre }}">
            @endif

            <button type="submit" class="button">
                Search
            </button>
        </form>

        <!-- Genre filters -->
        <div class="genre-filters">

            <a href="{{ route('movies.index', ['search' => $search]) }}"
               class="genre-filter {{ !$selectedGenre ? 'active' : '' }}">
                All
            </a>

            @foreach($genres as $genre)

                <a href="{{ route('movies.index',
                    $selectedGenre == $genre->id
                        ? ['search' => $search]
                        : ['search' => $search, 'genre' => $genre->id]
                ) }}"
                   class="genre-filter {{ $selectedGenre == $genre->id ? 'active' : '' }}">

                    {{ $genre->genre }}

                </a>

            @endforeach

        </div>
    </div>

    <!-- Films -->
    <div class="movie-grid">

        @forelse($movies as $movie)

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

                    @if($movie->is_featured)
                        <span class="featured-badge">
                            ★ Aanbevolen
                        </span>
                    @endif

                    @if($movie->genre)
                        <span class="movie-genre">
                            {{ $movie->genre->genre }}
                        </span>
                    @endif

                    <p>{{ $movie->description }}</p>

                    <a href="{{ route('movies.show', $movie) }}"
                       class="button">
                        Bekijk film
                    </a>

                    @can('toggleFeatured', $movie)
                        <form action="{{ route('movies.toggleFeatured', $movie) }}"
                              method="POST"
                              class="featured-form">

                            @csrf

                            <button type="submit" class="button button-secondary">
                                {{ $movie->is_featured ? 'Aanbeveling uitzetten' : 'Aanbevelen' }}
                            </button>
                        </form>
                    @endcan

                </div>

            </x-card>

        @empty

            <p class="no-results">
                No movies found matching your search.
            </p>

        @endforelse

    </div>

</x-layout>
