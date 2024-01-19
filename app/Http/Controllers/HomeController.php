<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookReview;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::search(request(['search', 'category']))
            ->latest()
            ->get();
        $categories = Category::orderBy('namaKategori')->get();

        return view('home.index', compact('books', 'categories'));
    }

    public function show(Book $book)
    {
        $book->load('category')->load('reviews');

        return view('home.show', compact('book'));
    }

    public function store(Request $request, Book $book)
    {
        $this->validate($request, [
            'ulasan' => 'required|string',
            'rating' => 'required|integer'
        ]);

        BookReview::create([
            'book_id' => $book->id,
            'user_id' => auth()->id(),
            'ulasan' => $request->string('ulasan'),
            'rating' => $request->integer('rating')
        ]);

        return back()->with('message', 'Ulasan berhasil disubmit. Terima kasih!');
    }
}
