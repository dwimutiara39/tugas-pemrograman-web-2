<x-app>
    <x-slot:title>{{ $title }}</x-slot>
    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession
    <a class="btn btn-success mb-3" href="{{ route('movie.create') }}" role="button">Create</a>
    <ul class="list-group">
        @foreach ($movies as $movie)
            <li class="list-group-item">
                {{ $loop->iteration }}.{{ $movie->title }}
                --{{ $movie->genre }}--{{ $movie->year }}--{{ $movie->director }}--{{ $movie->description }}
            </li>
        @endforeach
</x-app>
