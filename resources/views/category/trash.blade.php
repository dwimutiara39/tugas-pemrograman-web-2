<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <a href="{{ route('category.index') }}" class="btn btn-secondary mb-3">
        Kembali
    </a>

    <div class="list-group">

        @forelse($categories as $category)
            <div class="list-group-item">

                <strong>{{ $category->name }}</strong><br>

                Email :
                {{ $category->email }} <br>

                Status :
                {{ $category->status }}

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
