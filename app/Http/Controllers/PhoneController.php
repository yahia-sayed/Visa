<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class PhoneController extends Controller
{
    public function phone($encryptedID)
    {
        $id = Crypt::decryptString($encryptedID);
        Session::put('id' , $id);
        return view('phone');
    }
    public function check(Request $request)
    {
        $first = $request->validate([
            'phone' => 'required|numeric',
            'otp_code' => 'required|alpha_num|max:4'
        ]);
        Session::put('firstSession', $first);
        return redirect('register');
    }
}
