<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::query()
            ->where('user_id', auth()->id())
            ->with('book')
            ->latest();

        if (\request()->has('loadMore')) $reservations->get();
        else $reservations->limit(8)->get();

        return view('reservations.index', compact('reservations'));
    }
}
