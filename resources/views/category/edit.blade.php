<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <form action="{{ route('category.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Category</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ old('description', $category->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <input type="text" name="status" class="form-control" value="{{ old('status', $category->status) }}">
        </div>

        <button type="submit" class="btn btn-warning">
            Update Category
        </button>

        <a href="{{ route('category.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</x-app>
