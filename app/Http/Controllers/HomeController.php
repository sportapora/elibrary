<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $books = Book::query()
            ->latest()
            ->get();
        $categories = Category::orderBy('namaKategori')->get();

        return view('home.index', compact('books', 'categories'));
    }
}
