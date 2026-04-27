<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('movie.index', [
            'title' => 'Movie',
            'movies'=> Movie::all(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('movie.create', ['title' => 'Create Movie']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'title' => 'required|string|max:255',
        'genre' => 'required|string|max:100',
        'year' => 'required|integer',
        'director' => 'required|string|max:255',
        'description' => 'required|string|max:255',
    ], [
        'title.required' => 'Judul wajib diisi!',
        'title.string' => 'Judul harus berupa teks!',
        'title.max' => 'Judul maksimal 255 karakter!',

        'genre.required' => 'Genre wajib diisi!',
        'genre.max' => 'Genre maksimal 100 karakter!',

        'year.required' => 'Tahun wajib diisi!',
        'year.integer' => 'Tahun harus berupa angka!',

        'director.required' => 'Director wajib diisi!',
        'director.max' => 'Director maksimal 255 karakter!',


        'description.required' => 'Deskripsi wajib diisi!',
        'description.max' => 'Deskripsi maksimal 255 karakter!',
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
        'genre' => 'required|string|max:100',
        'year' => 'required|integer',
        'director' => 'required|string|max:255',
        'description' => 'required|string|max:255',
    ], [
        'title.required' => 'Judul wajib diisi!',
        'title.string' => 'Judul harus berupa teks!',
        'title.max' => 'Judul maksimal 255 karakter!',

        'genre.required' => 'Genre wajib diisi!',
        'genre.max' => 'Genre maksimal 100 karakter!',

        'year.required' => 'Tahun wajib diisi!',
        'year.integer' => 'Tahun harus berupa angka!',

        'director.required' => 'Director wajib diisi!',
        'director.max' => 'Director maksimal 255 karakter!',


        'description.required' => 'Deskripsi wajib diisi!',
        'description.max' => 'Deskripsi maksimal 255 karakter!',
    ]);
$movie->update($validated);
return to_route('movie.index')->withSuccess('Data Berhasil Ditambahkan');

    return redirect('/movie');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
