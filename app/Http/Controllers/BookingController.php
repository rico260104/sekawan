<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('booking', compact('bookings'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'mobil' => 'required',
            'nopol' => 'required',
            'tgl_sewa' => 'required',
        ]);

        Booking::create([
            'name' => $request->mobil,
            'nopol' => $request->nopol,
            'tgl_sewa' => $request->tgl_sewa,
 
        ]);
        return redirect()->to('/');
    }
}
