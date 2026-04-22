<x-app>
    <x-slot:title>{{ $title }}</x-slot>
    <ul class="list-group">
        @foreach ($movies as $movie)
            <li class="list-group-item">
                {{ $loop->iteration }}.{{ $movie->title }}--{{ $movie->genre }}--{{ $movie->year }}--{{ $movie->director }}--{{ $movie->description }}
            </li>
        @endforeach
</x-app>
