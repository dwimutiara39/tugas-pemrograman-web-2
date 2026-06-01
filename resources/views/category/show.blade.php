<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="card">
        <div class="card-header">
            Detail Category
        </div>

        <div class="card-body">
            <p><strong>Nama:</strong> {{ $category->name }}</p>
            <p><strong>Deskripsi:</strong> {{ $category->description }}</p>
            <p><strong>Status:</strong> {{ $category->status }}</p>
        </div>
    </div>

    <a href="{{ route('category.index') }}" class="btn btn-secondary mt-3">
        Kembali
    </a>
</x-app>
