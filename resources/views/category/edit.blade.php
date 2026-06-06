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
            <label>Deskripsi</label>
            <textarea name="description" class="form-control">{{ old('description', $category->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $category->email) }}">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="Aktif" {{ $category->status == 'Aktif' ? 'selected' : '' }}>
                    Aktif
                </option>
                <option value="Tidak Aktif" {{ $category->status == 'Tidak Aktif' ? 'selected' : '' }}>
                    Tidak Aktif
                </option>
            </select>
        </div>

        <button type="submit" class="btn btn-warning">
            Update Category
        </button>
    </form>
</x-app>
