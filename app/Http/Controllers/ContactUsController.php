<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function __invoke()
    {
        return view('contactus.index');
    }
}
