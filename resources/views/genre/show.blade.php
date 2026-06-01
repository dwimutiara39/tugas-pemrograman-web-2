<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="card">
        <div class="card-body">

            <h5>Nama Genre</h5>
            <p>{{ $genre->name }}</p>

            <h5>Status</h5>
            <p>{{ $genre->status }}</p>

            <h5>Category</h5>
            <p>{{ $genre->category->name }}</p>

            <a href="{{ route('genre.index') }}" class="btn btn-secondary">
                Kembali
            </a>

        </div>
    </div>
</x-app>
