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
                <a class="btn btn-warning btn-sm" href="{{ route('movie.edit', $movie) }}" role="button">edit</a>
                <form action="{{ route('movie.destroy', $movie) }}" method="POST"class='d-inline'>
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btm-sm"
                        onclick="return confirm('Anda Yakin?')">Delete</button>





                </form>
            </li>
        @endforeach
</x-app>
