<?php

namespace App\Http\Controllers;

use App\Mail\SubmitNotificatoin;
use App\Models\Accommodation;
use App\Models\Companion;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{

    public function register()
    {
        $countries = Country::all();
        return view('register', compact('countries'));
    }

    public function store(Request $request)
    {
        $second = $request->validate([
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'dob' => 'required|date',
            'gender' => 'required|in:Male,Female',
            'place_of_birth' => 'required|string',
            'country_of_residency' => 'required|string',
            'passport_no' => 'required|alpha_num|min:6',
            'issue_date' => 'required|date',
            'expiry_date' => 'required|date',
            'place_of_issue' => 'required|string',
            'arrival_date' => 'required|date',
            'profession' => '',
            'organization' => '',
            'visa_duration' => 'required|integer|between:1,90',
            'visa_status' => 'required|in:Single,Multiple',
            'companion' => 'required|in:Yes,No'
        ]);
        $request->file('passport_pic')->storeAs('public/Passport_Pics', Session::get('id'));
        $request->file('personal_pic')->storeAs('public/Personal_Pics', Session::get('id'));
        Session::put('passportPic_path', 'Passport_Pics/'.Session::get('id'));
        Session::put('personalPic_path', 'Personal_Pics/'.Session::get('id'));
        Session::put('secondSession', $second);

        if ($request->companion == "Yes") {
            $companion_validate = $request->validate([
                'companion_first_name' => 'required|alpha',
                'companion_last_name' => 'required|alpha',
                'companion_dob' => 'required|date',
                'companion_gender' => 'required|in:Male,Female',
                'companion_place_of_birth' => 'required|string',
                'companion_country_of_residency' => 'required|string',
                'companion_passport_no' => 'required|alpha_num|min:6',
                'companion_issue_date' => 'required|date',
                'companion_expiry_date' => 'required|date',
                'companion_place_of_issue' => 'required|string',
                'companion_arrival_date' => 'required|date',
                'companion_profession' => '',
                'companion_organization' => '',
                'companion_visa_duration' => 'required|integer|between:1,90',
                'companion_visa_status' => 'required|in:Single,Multiple',
            ]);
            $request->file('companion_passport_pic')->storeAs('public/Companion_Passport_Pics', Session::get('id'));
            $request->file('companion_personal_pic')->storeAs('public/Companion_Personal_Pics', Session::get('id'));
            Session::put('companion_passportPic_path', 'Companion_Passport_Pics/'.Session::get('id'));
            Session::put('companion_personalPic_path', 'Companion_Personal_Pics/'.Session::get('id'));
            Session::put('secondSession_companion', $companion_validate);
        }
        return redirect()->route('accommodation');
    }

    public function submitNotification()
    {
        $user = User::find(Session::get('id'));
        $guest = User::find(Session::get('id'))->guest();
        $guest->update([
            'first_name' => Session::get('secondSession')['first_name'],
            'last_name' => Session::get('secondSession')['last_name'],
            'mobile_no' => Session::get('firstSession')['phone'],
            'otp_code' => Session::get('firstSession')['otp_code'],
            'dob' => Session::get('secondSession')['dob'],
            'gender' => Session::get('secondSession')['gender'],
            'place_of_birth' => Session::get('secondSession')['place_of_birth'],
            'country_of_residency' => Session::get('secondSession')['country_of_residency'],
            'passport_no' => Session::get('secondSession')['passport_no'],
            'issue_date' => Session::get('secondSession')['issue_date'],
            'expiry_date' => Session::get('secondSession')['expiry_date'],
            'place_of_issue' => Session::get('secondSession')['place_of_issue'],
            'arrival_date' => Session::get('secondSession')['arrival_date'],
            'profession' => Session::get('secondSession')['profession'],
            'organization' => Session::get('secondSession')['organization'],
            'visa_duration' => Session::get('secondSession')['visa_duration'],
            'visa_status' => Session::get('secondSession')['visa_status'],
            'passport_pic' => Session::get('passportPic_path'),
            'personal_pic' => Session::get('personalPic_path'),
        ]);
        if (Session::get('secondSession')['companion'] == 'Yes') {
            $companion = Companion::create([
                'first_name' => Session::get('secondSession_companion')['companion_first_name'],
                'last_name' => Session::get('secondSession_companion')['companion_last_name'],
                'dob' => Session::get('secondSession_companion')['companion_dob'],
                'gender' => Session::get('secondSession_companion')['companion_gender'],
                'place_of_birth' => Session::get('secondSession_companion')['companion_place_of_birth'],
                'country_of_residency' => Session::get('secondSession_companion')['companion_country_of_residency'],
                'passport_no' => Session::get('secondSession_companion')['companion_passport_no'],
                'issue_date' => Session::get('secondSession_companion')['companion_issue_date'],
                'expiry_date' => Session::get('secondSession_companion')['companion_expiry_date'],
                'place_of_issue' => Session::get('secondSession_companion')['companion_place_of_issue'],
                'arrival_date' => Session::get('secondSession_companion')['companion_arrival_date'],
                'profession' => Session::get('secondSession_companion')['companion_profession'],
                'organization' => Session::get('secondSession_companion')['companion_organization'],
                'visa_duration' => Session::get('secondSession_companion')['companion_visa_duration'],
                'visa_status' => Session::get('secondSession_companion')['companion_visa_status'],
                'passport_pic' => Session::get('companion_passportPic_path'),
                'personal_pic' => Session::get('companion_personalPic_path'),
            ]);
            $guest->update(['companion_id' => $companion->id]);
        }
        $accommodation = Accommodation::create([
            'checkin_date' => Session::get('thirdSession')['checkin_date'],
            'checkout_date' => Session::get('thirdSession')['checkout_date'],
            'room_type' => Session::get('thirdSession')['room_type'],
            'extra_checkin_date' => Session::get('thirdSession')['extra_checkin_date'],
            'extra_checkout_date' => Session::get('thirdSession')['extra_checkout_date'],
            'extra_room_type' => Session::get('thirdSession')['extra_room_type'],
        ]);
        $guest->update(['accommodation_id' => $accommodation->id]);
        $user->update(['status' => 'registered']);

        Mail::to($user->email)->send(new SubmitNotificatoin);
        return redirect()->route('submitNotification');
    }
}
