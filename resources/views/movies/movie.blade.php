<x-layout title="Home">

    <h1>{{$greetings}}</h1>
    <p class="intro">
        Ontdek je volgende favoriete film en laat je inspireren door onze collectie vol spannende verhalen,
        indrukwekkende personages en onvergetelijke momenten!
    </p>

    <h2>Movies</h2>


    <ul>
        @foreach($movies as $movie)
            <x-card>
                <li>
                    <x-card>{{ $movie->title }}</x-card>
                </li>
                <li>
                    <x-card>{{ $movie->description }}</x-card>
                </li>
                <li>
                    <x-card>{{ $movie->release_year }}</x-card>
                </li>
                <li>
                    <x-card><img src="{{ $movie->poster_url }}" alt="{{ $movie->title }}"></x-card>
                </li>
            </x-card>
        @endforeach

    </ul>

</x-layout>
