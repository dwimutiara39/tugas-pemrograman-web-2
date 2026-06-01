<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    {{-- Tombol Create untuk Commit 8 --}}
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
            <div class="list-group-item">
                {{ $loop->iteration }}.
                {{ $genre->name }}
                --
                {{ $genre->status }}
                --
                {{ $genre->category->name }}
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
