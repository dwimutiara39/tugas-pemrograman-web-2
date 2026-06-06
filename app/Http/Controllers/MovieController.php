<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $movies = Movie::paginate(100);

    return view('movie.index', [
        'title' => 'Movie movie',
        'movies' => $movies
    ]);
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('movie.create', ['title' => 'Create Movie']);
    }

    /**     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'title' => 'required|string|max:255',
        'director' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'release_year' => 'required|int',

    ], [
        'title.required' => 'Judul wajib diisi!',
        'title.string' => 'Judul harus berupa teks!',
        'title.max' => 'Judul maksimal 255 karakter!',

        'genre.required' => 'Genre wajib diisi!',
        'genre.max' => 'Genre maksimal 100 karakter!',

        'director.required' => 'Director wajib diisi!',
        'director.max' => 'Director maksimal 255 karakter!',


        'description.required' => 'Deskripsi wajib diisi!',
        'description.max' => 'Deskripsi maksimal 255 karakter!',

        'release_year.required' => 'Dtahun wajib angka!',
        'release_year.max' => 'tahun wajib angka',

    ]);
Movie::create($validated);
return to_route('movie.index')->withSuccess('Data Berhasil Ditambahkan');

    return redirect('/movie');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        return view('movie.edit', [
            'title' => 'edit Movie',
            'movie'=> $movie,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
        'title' => 'required|string|max:255',
        'director' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'release_year' => 'required|int',
    ], [
        'title.required' => 'Judul wajib diisi!',
        'title.string' => 'Judul harus berupa teks!',
        'title.max' => 'Judul maksimal 255 karakter!',

        'genre.required' => 'Genre wajib diisi!',
        'genre.max' => 'Genre maksimal 100 karakter!',

        'director.required' => 'Director wajib diisi!',
        'director.max' => 'Director maksimal 255 karakter!',


        'description.required' => 'Deskripsi wajib diisi!',
        'description.max' => 'Deskripsi maksimal 255 karakter!',

        'release_year.required' => 'tahun wajib angka',
        'release_year.max' => 'tahun wajib angka',
    ]);
$movie->update($validated);
return to_route('movie.index')->withSuccess('Data Berhasil Diubah');

    return redirect('/movie');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete($movie);
return to_route('movie.index')->withSuccess('Data Berhasil Dihapus');
    }
}
