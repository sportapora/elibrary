<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $books = Book::query()
            ->limit(3)
            ->get();
        return view('home.index', compact('books'));
    }
}
