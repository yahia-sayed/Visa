<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccommodationController extends Controller
{
    public function accommodation()
    {
        return view('accommodation');
    }

    public function store(Request $request)
    {
        $third = $request->validate([
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date',
            'room_type' => 'required|in:King Bed,Twin Bed',
            'extra_checkin_date' => 'required|date',
            'extra_checkout_date' => 'required|date',
            'extra_room_type' => 'required|in:King Bed,Twin Bed',
        ]);
        Session::put('thirdSession', $third);
        $user = User::find(Session::get('id'));
        return redirect('review')->with('email', $user->email);
    }
}
