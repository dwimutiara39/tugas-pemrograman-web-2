<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <a href="{{ route('category.index') }}" class="btn btn-secondary mb-3">
        Kembali
    </a>

    <div class="list-group">

        @forelse($categories as $category)
            <div class="list-group-item d-flex justify-content-between align-items-center">

                <div>
                    <strong>{{ $category->name }}</strong><br>

                    Email :
                    {{ $category->email }} <br>

                    Status :
                    {{ $category->status }}
                </div>

                <div>

                    <form action="{{ route('category.restore', $category->id) }}" method="POST" class="d-inline">

                        @csrf
                        @method('PUT')

                        <button class="btn btn-success btn-sm">
                            Restore
                        </button>

                    </form>

                </div>

            </div>

        @empty

            <div class="list-group-item">
                Tidak ada data di trash
            </div>
        @endforelse

    </div>

    <div class="mt-3">
        {{ $categories->links() }}
    </div>

</x-app>
