<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()
            ->orderBy('namaKategori')
            ->get();

        return view('dashboard.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'namaKategori' => 'required|string|max:55'
        ]);

        Category::create([
            'namaKategori' => $request->get('namaKategori')
        ]);

        return back()->with('message', 'Data kategori berhasil ditambahkan!');
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'namaKategori' => 'required|string|max:55'
        ]);

        $category->update([
            'namaKategori' => $request->get('namaKategori')
        ]);

        return back()->with('message', 'Data kategori berhasil diupdate!');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return back()->with('message', 'Data kategori berhasil dihapus!');
    }
}
