<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $category = $request->category;

        $genres = Genre::with('category')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->when($category, function ($query) use ($category) {
                $query->where('category_id', $category);
            })
            ->paginate(5);

        return view('genre.index', [
            'title' => 'Data Genre',
            'genres' => $genres,
            'categories' => Category::all(),
        ]);
    }
public function create()
{
    return view('genre.create', [
        'title' => 'Tambah Genre',
        'categories' => Category::all(),
    ]);
}

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required',
        'status' => 'required',
        'category_id' => 'required',
    ]);

    Genre::create($validated);

    return redirect()
        ->route('genre.index')
        ->with('success', 'Data berhasil ditambahkan');
}
public function edit(Genre $genre)
{
    return view('genre.edit', [
        'title' => 'Edit Genre',
        'genre' => $genre,
        'categories' => Category::all(),
    ]);
}
public function update(Request $request, Genre $genre)
{
    $validated = $request->validate([
        'name' => 'required',
        'status' => 'required',
        'category_id' => 'required',
    ]);

    $genre->update($validated);

    return redirect()
        ->route('genre.index')
        ->with('success', 'Data berhasil diubah');
}
}