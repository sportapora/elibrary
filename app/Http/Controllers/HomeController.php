<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;

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
        $book->load('category');

        return view('home.show', compact('book'));
    }
}
