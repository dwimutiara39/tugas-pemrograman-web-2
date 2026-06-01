<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <form action="{{ route('genre.update', $genre->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Genre</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $genre->name) }}">
        </div>

        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $genre->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="Active" {{ $genre->status == 'Active' ? 'selected' : '' }}>
                    Active
                </option>

                <option value="Inactive" {{ $genre->status == 'Inactive' ? 'selected' : '' }}>
                    Inactive
                </option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            Update
        </button>
    </form>
</x-app>
