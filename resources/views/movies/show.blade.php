<x-layout title="{{ $movie->title }}">

    <div class="movie-details">
        <img
            class="movie-details-poster"
            src="{{ $movie->poster_url }}"
            alt="Poster van {{ $movie->title }}"
        >

        <div class="movie-details-info">
            <h1 class="movie-details-title">
                {{ $movie->title }}
            </h1>

            <p class="movie-details-year">
                Release Year: {{ $movie->release_year }}
            </p>

            <p class="movie-details-description">
                {{ $movie->description }}
            </p>

            <div class="movie-details-actions">

                <a href="{{ route('movies.index') }}"
                   class="button button-secondary">
                    Back to Movies
                </a>

                <form action="{{ route('movies.destroy', $movie) }}"
                      method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="button button-danger">
                        Delete Movie
                    </button>
                </form>
            </div>
        </div>
    </div>

</x-layout>
