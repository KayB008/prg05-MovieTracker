<x-layout>
    <h1>Create a New Movie</h1>

    <form action="{{ route('movies.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required>
            @error('title')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" required>{{ old('description') }}</textarea>
            @error('description')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="release_year">Release Year</label>
            <input type="number" name="release_year" id="release_year" value="{{ old('release_year') }}" required>
            @error('release_year')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="poster_url">Poster URL</label>
            <input type="url" name="poster_url" id="poster_url" value="{{ old('poster_url') }}" required>
            @error('poster_url')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" name="submit" class="button">Create Movie</button>
    </form>

</x-layout>
