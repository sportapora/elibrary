<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookReview;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::query()
            ->latest()
            ->paginate(10);
        $categories = Category::orderBy('namaKategori')->get();

        return view('dashboard.books.index', compact('books', 'categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'tahunTerbit' => 'required',
            'sampul_buku' => 'required|max:4096|file|mimes:jpeg,jpg,png',
            'category_id' => 'required',
            'ringkasan' => 'required|string'
        ], [
            'category_id.required' => 'The category field is required'
        ]);

        $data['sampul_buku'] = $request->file('sampul_buku')->store('sampul-buku');

        Book::create($data);

        return back()->with('message', 'Data buku berhasil ditambahkan!');
    }

    public function show(Book $book)
    {
        $book->load('category')->load('reviews');

        return view('dashboard.books.show', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'tahunTerbit' => 'required',
            'sampul_buku' => 'nullable|max:4096|file|mimes:jpeg,jpg,png',
            'category_id' => 'required',
            'ringkasan' => 'required|string'
        ], [
            'category_id.required' => 'The category field is required'
        ]);

        if ($request->has('sampul_buku')) {
            Storage::delete($book->sampul_buku);
            $data['sampul_buku'] = $request->file('sampul_buku')->store('sampul-buku');
        }

        $book->update($data);

        return back()->with('message', 'Data buku berhasil diupdate!');
    }

    public function destroy(Book $book)
    {
        Storage::delete($book->sampul_buku);
        $book->delete();

        return back()->with('message', 'Data buku berhasil dihapus!');
    }

    public function destroyReview(BookReview $bookreview)
    {
        $bookreview->delete();

        return back()->with('message', 'Ulasan berhasil dihapus!');
    }
}
