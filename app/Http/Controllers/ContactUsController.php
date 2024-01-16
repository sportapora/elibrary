<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('contactus.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:55',
            'email' => 'required|string|max:55|email',
            'message' => 'required|string'
        ]);

        ContactUs::create($data);

        return back()->with('message', 'Pesan berhasil disubmit!');
    }
}
