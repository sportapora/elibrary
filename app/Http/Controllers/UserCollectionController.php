<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserCollectionController extends Controller
{
    public function index()
    {
        $books = auth()->user()->books;

        return view('collections.index', compact('books'));
    }
}
