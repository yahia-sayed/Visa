<?php

namespace App\Http\Controllers;

use App\Mail\NewUserNotification;
use App\Models\Accommodation;
use App\Models\Companion;
use App\Models\Country;
use App\Models\Guest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('guest')->where('status', '<>', 'admin')->get();
        return view('user.dashboard', compact('users'));
    }
    public function admin()
    {
        //only Admin Access

        $invitees = User::with('guest')->whereHas('Guest', function ($query) {
            $query->where('accommodation_id', null);
        })->get();

        $registrants = User::with('guest')->whereHas('Guest', function ($query) {
            $query->where('accommodation_id', '<>', '');
        })->get();

        return view('dashboard', compact('invitees', 'registrants'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make('12345678'),
            'status' => 'new'
        ]);

        Guest::create([
            'user_id' => $user->id,
            'first_name' => $request->name,
        ]);

        return redirect(RouteServiceProvider::HOME);
    }

    public function sendNewUserNotification(Request $request)
    {
        $id = Crypt::decryptString($request->id);
        $user = User::find($id);
        $userID = Crypt::encryptString($user->id);
        Mail::to($user->email)->send(new NewUserNotification($userID, env('APP_URL')));
        $user->update(['status' => 'invited']);
        return back()->with('response', 'Email Sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = Crypt::decryptString($request->id);
        $user = User::with('guest')->find($id);
        $guest = $user->guest;
        $accommodation = Accommodation::find($guest->accommodation_id);
        $countries = Country::all();

        if ($guest->companion_id == null)
            return view('user.edit', compact('user', 'accommodation', 'countries'));

        else {
            $companion = Companion::find($guest->companion_id);
            return view('user.edit', compact('user', 'accommodation', 'companion', 'countries'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'phone' => 'required',
            'otp_code' => 'required|alpha_num|max:4',
            'dob' => 'required|date',
            'gender' => 'required|in:Male,Female',
            'place_of_birth' => 'required|string',
            'country_of_residency' => 'required|string',
            'passport_no' => 'required|alpha_num|min:6',
            'issue_date' => 'required|date',
            'expiry_date' => 'required|date',
            'place_of_issue' => 'required|string',
            'arrival_date' => 'required|date',
            'visa_duration' => 'required|integer|between:1,90',
            'visa_status' => 'required|in:Single,Multiple',
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date',
            'room_type' => 'required|in:King Bed,Twin Bed',
            'extra_checkin_date' => 'required|date',
            'extra_checkout_date' => 'required|date',
            'extra_room_type' => 'required|in:King Bed,Twin Bed',
        ]);
        if ($request->companion_first_name != '') {
            $request->validate([
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
                'companion_visa_duration' => 'required|integer|between:1,90',
                'companion_visa_status' => 'required|in:Single,Multiple',
            ]);
        }
        
        $user = User::with('guest')->where('email', $request->email)->get()->first();
        $guest = $user->guest;

        $guest->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mobile_no' => $request->phone,
            'otp_code' => $request->otp_code,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'place_of_birth' => $request->place_of_birth,
            'country_of_residency' => $request->country_of_residency,
            'passport_no' => $request->passport_no,
            'issue_date' => $request->issue_date,
            'expiry_date' => $request->expiry_date,
            'place_of_issue' => $request->place_of_issue,
            'arrival_date' => $request->arrival_date,
            'profession' => $request->profession,
            'organization' => $request->organization,
            'visa_duration' => $request->visa_duration,
            'visa_status' => $request->visa_status,
        ]);
        if ($request->companion == 'Yes') {
            
            $companion_profession = null;
            $companion_organization = null;
            if ($request->has('companion_profession'))
                $companion_profession = $request->companion_profession;
            if ($request->has('companion_organization'))
                $companion_organization = $request->companion_organization;

            $guest->companion()->update([
                'companion_first_name' => $request->companion_first_name,
                'companion_last_name' => $request->companion_last_name,
                'companion_dob' => $request->companion_dob,
                'companion_gender' => $request->companion_gender,
                'companion_place_of_birth' => $request->companion_place_of_birth,
                'companion_country_of_residency' => $request->companion_country_of_residency,
                'companion_passport_no' => $request->companion_passport_no,
                'companion_issue_date' => $request->companion_issue_date,
                'companion_expiry_date' => $request->companion_expiry_date,
                'companion_place_of_issue' => $request->companion_place_of_issue,
                'companion_arrival_date' => $request->companion_arrival_date,
                'companion_profession' => $companion_profession,
                'companion_organization' => $companion_organization,
                'companion_visa_duration' => $request->companion_visa_duration,
                'companion_visa_status' => $request->companion_visa_status,
            ]);
        }
        $accommodation = Accommodation::find($guest->accommodation_id);
        $accommodation->update([
            'checkin_date' => $request->checkin_date,
            'checkout_date' => $request->checkout_date,
            'room_type' => $request->room_type,
            'extra_checkin_date' => $request->extra_checkin_date,
            'extra_checkout_date' => $request->extra_checkout_date,
            'extra_room_type' => $request->extra_room_type,
        ]);
        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = Crypt::decryptString($request->id);
        User::find($id)->delete();

        return redirect(RouteServiceProvider::HOME);
    }
}
