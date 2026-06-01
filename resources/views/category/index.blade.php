<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <form action="{{ route('category.index') }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-10">
                <input type="text" name="search" class="form-control" placeholder="Search category name..."
                    value="{{ request('search') }}">
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-success w-100">
                    Search
                </button>
            </div>
        </div>
    </form>

    <div class="list-group">
        @forelse($categories as $category)
            <div class="list-group-item">
                {{ $loop->iteration }}.
                {{ $category->name }}
                --
                {{ $category->description }}
                --
                {{ $category->status }}
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
