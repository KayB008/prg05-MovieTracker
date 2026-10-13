<x-layout title="About us">

    <h1>About Us</h1>

    @foreach($aboutInfo as $info)
        <x-card>
            {{ $info }}
        </x-card>
    @endforeach

</x-layout>
