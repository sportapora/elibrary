<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->get();

        return view('dashboard.books.index', compact('books'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'tahunTerbit' => 'required',
            'sampul_buku' => 'required|max:4096|file|mimes:jpeg,jpg,png'
        ]);

        $data['sampul_buku'] = $request->file('sampul_buku')->store('sampul-buku');

        Book::create($data);

        return back()->with('message', 'Data buku berhasil ditambahkan!');
    }
}
