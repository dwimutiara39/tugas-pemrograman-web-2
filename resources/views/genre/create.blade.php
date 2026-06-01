<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <form action="{{ route('genre.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Genre</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan
        </button>
    </form>
</x-app>
