<x-layout title="Create Movie">

    <div class="movie-create">

        <h1 class="page-title">Create a New Movie</h1>

        <p class="movie-create-intro">
            Add a new movie to your collection.
        </p>

        <form action="{{ route('movies.store') }}"
              method="POST"
              class="movie-form">

            @csrf
            <div class="form-field">
                <label for="title">Title</label>
                <input type="text"
                       name="title"
                       id="title"
                       value="{{ old('title') }}"
                       required>

                @error('title')
                <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-field">
                <label for="description">Description</label>
                <textarea name="description"
                          id="description"
                          required>{{ old('description') }}</textarea>

                @error('description')
                <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-field">
                <label for="genre">Genre</label>
                <input type="text"
                       name="genre"
                       id="genre"
                       value="{{ old('genre') }}"
                       required>

                @error('genre')
                <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-field">
                <label for="release_year">Release Year</label>
                <input type="number"
                       name="release_year"
                       id="release_year"
                       value="{{ old('release_year') }}"
                       required>

                @error('release_year')
                <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-field">
                <label for="poster_url">Poster URL</label>
                <input type="url"
                       name="poster_url"
                       id="poster_url"
                       value="{{ old('poster_url') }}"
                       required>

                @error('poster_url')
                <span class="form-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('movies.index') }}"
                   class="form-cancel">
                    Cancel
                </a>

                <button type="submit" class="button">
                    Create Movie
                </button>
            </div>
        </form>
    </div>

</x-layout>
