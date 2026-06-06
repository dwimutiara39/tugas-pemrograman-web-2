<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $categories = Category::when($search, function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
})->paginate(5);

        return view('category.index', [
            'title' => 'Data Category',
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('category.create', [
            'title' => 'Tambah Category'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'status' => 'required',
        ]);

        Category::create($validated);

        return redirect()
            ->route('category.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Category $category)
    {
        return view('category.edit', [
            'title' => 'Edit Category nya',
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'status' => 'required',
        ]);

        $category->update($validated);

        return redirect()
            ->route('category.index')
            ->with('success', 'Data category berhasil diupdate');
    }
    public function destroy(Category $category)
{
    $category->delete();

    return redirect()
        ->route('category.index')
        ->with('success', 'Data berhasil dihapus');
}

public function show(Category $category)
{
    $category->load('movies');

    return view('category.show', [
        'title' => 'Detail Category',
        'category' => $category
    ]);
}
}