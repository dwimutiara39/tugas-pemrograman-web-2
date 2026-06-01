<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <form action="{{ route('category.index') }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-10">
                <input type="text" name="search" class="form-control" placeholder="Cari kategori..."
                    value="{{ request('search') }}">
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-success w-100">
                    Cari
                </button>
            </div>
        </div>
    </form>

    <div class="mb-3">
        <a href="{{ route('category.create') }}" class="btn btn-primary">
            Tambah Kategori
        </a>
    </div>

    <div class="list-group">
        @forelse($categories as $category)
            <div class="list-group-item d-flex justify-content-between align-items-center">

                <div>
                    {{ $loop->iteration }}.
                    {{ $category->name }}
                    --
                    {{ $category->description }}
                    --
                    {{ $category->status }}
                </div>

                <div>
                    <a href="{{ route('category.show', $category->id) }}" class="btn btn-info btn-sm">
                        Detail
                    </a>

                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm">
                            Hapus
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

    <div class="mt-3">
        {{ $categories->links() }}
    </div>

</x-app>
