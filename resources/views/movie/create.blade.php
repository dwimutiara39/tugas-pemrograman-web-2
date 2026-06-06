<x-app>

    <x-slot:title>Movie movie</x-slot>

    <form method="POST" action="{{ route('movie.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="name"name="title"
                value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label class="form-label">Director</label>
            <input type="text" class="form-control @error('director') is-invalid @enderror" name="director"
                value="{{ old('director') }}">
            @error('director')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                value="{{ old('description') }}">

            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Release Year</label>
            <input type="number" class="form-control @error('release_year') is-invalid @enderror" name="release_year"
                value="{{ old('release_year') }}">
            @error('release_year')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <a class="btn btn-warning" href="{{ route('movie.index') }}" role="button">Cancel</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</x-app>
