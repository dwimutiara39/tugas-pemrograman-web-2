<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'email' => 'required|email'
        ]);

        try {

        DB::beginTransaction();

        Category::create($validated);

        DB::commit();

        return redirect()
            ->route('category.index')
            ->with('success', 'Data berhasil ditambahkan');

    } catch (\Exception $e) {

        DB::rollBack(); 

        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Data gagal ditambahkan');
    }

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
        'email' => 'required|email'
    ]);

    try {

        DB::beginTransaction();

        $category->update($validated);

        DB::commit();

        return redirect()
            ->route('category.index')
            ->with('success', 'Data category berhasil diupdate');

    } catch (\Exception $e) {

        DB::rollBack();

        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Data gagal diupdate');
    }
}
public function trash()
{
    $categories = Category::onlyTrashed()->paginate(5);

    return view('category.trash', [
        'title' => 'Trash Category',
        'categories' => $categories
    ]);
}
public function restore($id)
{
    Category::onlyTrashed()
        ->findOrFail($id)
        ->restore();

    return redirect()
        ->route('category.trash')
        ->with('success', 'Data berhasil direstore');
}

    public function destroy(Category $category)
{
    $category->delete();

    return redirect()
        ->route('category.index')
        ->with('success', 'Data berhasil dipindahkan ke trash');
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