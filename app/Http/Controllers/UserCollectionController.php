<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;

class UserCollectionController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->id())->first();
        $books = $user->books()
            ->whereHas('category', fn($query) => $query->where('namaKategori', 'like', '%' . request('category') . '%'))
            ->get();

        return view('collections.index', compact('books'));
    }

    public function store(Book $book)
    {
        $user = User::find(auth()->id())->first();

        $user->books()->attach($book);

        return back()->with('message', 'Berhasil ditambahkan ke favorit!');
    }
}
