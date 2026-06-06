<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-success mb-3" href="{{ route('movie.create') }}">
        Create
    </a>

    <ul class="list-group">
        @foreach ($movies as $movie)
            <li class="list-group-item">
                {{ $loop->iteration }}.
                {{ $movie->title }}
                -- {{ $movie->release_year }}
                -- {{ $movie->director }}
                -- {{ $movie->description }}


                <a class="btn btn-warning btn-sm" href="{{ route('movie.edit', $movie) }}">
                    Edit
                </a>

                <form action="{{ route('movie.destroy', $movie) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin?')">
                        Delete
                    </button>
                </form>
            </li>
        @endforeach
    </ul>

    {{ $movies->links() }}
</x-app>
