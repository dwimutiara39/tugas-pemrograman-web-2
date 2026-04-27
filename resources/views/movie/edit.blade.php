<x-app>

    <x-slot:title>Movie</x-slot>

    <form method="POST" action="{{ route('movie.update', $movie) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="name"name="title"
                value="{{ old('title', $movie->title) }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Genre</label>
            <input type="text" class="form-control @error('genre') is-invalid @enderror" name="genre"
                value="{{ old('genre', $movie->genre) }}">
            @error('genre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Year</label>
            <input type="number" class="form-control @error('year') is-invalid @enderror"" name="year"
                value="{{ old('year', $movie->year) }}">
            @error('year')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Director</label>
            <input type="text" class="form-control @error('director') is-invalid @enderror" name="director"
                value="{{ old('director', $movie->director) }}">
            @error('director')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                value="{{ old('description', $movie->description) }}">
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <a class="btn btn-warning" href="{{ route('movie.index') }}" role="button">Cancel</a>
        <button type="submit" class="btn btn-primary">Submit</button>
        </>
</x-app>
