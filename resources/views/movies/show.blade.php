<x-layout>
    <h1>{{ $movie->title }}</h1>
    <p>{{ $movie->description }}</p>
    <p>Release Year: {{ $movie->release_year }}</p>
    <img src="{{ $movie->poster_url }}" alt="{{ $movie->title }}">

    <div>
        <form action="{{route('movies.destroy', $movie)}}" method="POST">
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
</x-layout>
