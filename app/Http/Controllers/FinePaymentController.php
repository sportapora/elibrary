<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinePaymentController extends Controller
{
    public function index()
    {
        return view('fine-payment.index');
    }
}
