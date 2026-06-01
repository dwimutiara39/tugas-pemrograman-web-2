<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    {{-- Tombol Create --}}
    <div class="mb-3">
        <a href="{{ route('genre.create') }}" class="btn btn-primary">
            Create Genre
        </a>
    </div>

    {{-- Search dan Filter --}}
    <form action="{{ route('genre.index') }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="search" class="form-control" placeholder="Search genre name ..."
                    value="{{ request('search') }}">
            </div>

            <div class="col-md-3">
                <select name="category" class="form-control">
                    <option value="">-- Semua Category --</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <button type="submit" class="btn btn-success w-100">
                    Search
                </button>
            </div>
        </div>
    </form>

    {{-- Data Genre --}}
    <div class="list-group">
        @forelse($genres as $genre)
            <div class="list-group-item d-flex justify-content-between align-items-center">

                <div>
                    {{ $loop->iteration }}.
                    {{ $genre->name }}
                    --
                    {{ $genre->status }}
                    --
                    {{ $genre->category->name }}
                </div>

                <div>
                    {{-- Tombol Edit --}}
                    <a href="{{ route('genre.edit', $genre->id) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    {{-- Tombol Delete --}}
                    <form action="{{ route('genre.destroy', $genre->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </form>
                </div>

            </div>
        @empty
            <div class="list-group-item">
                Data tidak ditemukan
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $genres->withQueryString()->links() }}
    </div>

</x-app>
