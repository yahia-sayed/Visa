<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('build/css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('build/css/intlTelInput.css') }}">
    <script src="{{ asset('build/js/intlTelInput.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Review</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reviewing') }}</div>
                    <div class="card-body">
                        {{-- Email --}}
                        <div class="row mb-3 justify-content-center">
                            <label for="email" class="col-md-4 text-md-end">{{ __('Email Address :') }}</label>

                            <div class="col-md-6">
                                <p id="email" name="email">{{ Session::get('email') }}</p>
                            </div>
                        </div>
                        {{-- phone No --}}
                        <div class="row mb-3 justify-content-center">
                            <label for="phone_no" class="col-md-4 text-md-end">{{ __('Phone Number :') }}</label>

                            <div class="col-md-6">
                                <p id="phone_no" name="phone_no">{{ Session::get('firstSession')['phone'] }}</p>
                            </div>
                        </div>
                        {{-- OTP Code --}}
                        <div class="row mb-3 justify-content-center">
                            <label for="otp_code" class="col-md-4 text-md-end">{{ __('OTP Code :') }}</label>

                            <div class="col-md-6">
                                <p id="otp_code">{{ Session::get('firstSession')['otp_code'] }}</p>
                            </div>
                        </div>
                        {{-- First Name --}}
                        <div class="row mb-3 justify-content-center">
                            <label for="first_name" class="col-md-4 text-md-end">{{ __('First Name :') }}</label>

                            <div class="col-md-6">
                                <p id="first_name">{{ Session::get('secondSession')['first_name'] }}</p>
                            </div>
                        </div>
                        {{-- Last Name --}}
                        <div class="row mb-3 justify-content-center">
                            <label for="last_name" class="col-md-4 text-md-end">{{ __('Last Name :') }}</label>

                            <div class="col-md-6">
                                <p id="last_name">{{ Session::get('secondSession')['last_name'] }}</p>
                            </div>
                        </div>
                        {{-- dob --}}
                        <div class="row mb-3 justify-content-center">
                            <label for="dob" class="col-md-4 text-md-end">{{ __('Date Of Birth :') }}</label>

                            <div class="col-md-6">
                                <p id="dob">{{ Session::get('secondSession')['dob'] }}</p>
                            </div>
                        </div>
                        {{-- Gender --}}
                        <div class="row mb-3 justify-content-center">
                            <label for="gender" class="col-md-4 text-md-end">{{ __('Gender :') }}</label>

                            <div class="col-md-6">
                                <p id="gender">{{ Session::get('secondSession')['gender'] }}</p>
                            </div>
                        </div>
                        {{-- place_of_birth --}}
                        <div class="row mb-3 justify-content-center">
                            <label for="place_of_birth"
                                class="col-md-4 text-md-end">{{ __('Place Of Birth :') }}</label>

                            <div class="col-md-6">
                                <p id="place_of_birth">{{ Session::get('secondSession')['place_of_birth'] }}</p>
                            </div>
                        </div>
                        {{-- country_of_residency --}}
                        <div class="row mb-3 justify-content-center">
                            <label for="country_of_residency"
                                class="col-md-4 text-md-end">{{ __('Country Of Residency :') }}</label>

                            <div class="col-md-6">
                                <p id="country_of_residency">
                                    {{ Session::get('secondSession')['country_of_residency'] }}</p>
                            </div>
                        </div>
                        {{-- passport_no --}}
                        <div class="row mb-3 justify-content-center">
                            <label for="passport_no" class="col-md-4 text-md-end">{{ __('Passport No :') }}</label>

                            <div class="col-md-6">
                                <p id="passport_no">{{ Session::get('secondSession')['passport_no'] }}</p>
                            </div>
                        </div>
                        {{-- issue_date --}}
                        <div class="row mb-3 justify-content-center">
                            <label for="issue_date" class="col-md-4 text-md-end">{{ __('Issue Date :') }}</label>

                            <div class="col-md-6">
                                <p id="issue_date">{{ Session::get('secondSession')['issue_date'] }}</p>
                            </div>
                        </div>
                        {{-- expiry_date --}}
                        <div class="row mb-3 justify-content-center">
                            <label for="expiry_date" class="col-md-4 text-md-end">{{ __('Expiry Date :') }}</label>

                            <div class="col-md-6">
                                <p id="expiry_date">{{ Session::get('secondSession')['expiry_date'] }}</p>
                            </div>
                        </div>
                        {{-- place_of_issue --}}
                        <div class="row mb-3 justify-content-center">
                            <label for="place_of_issue"
                                class="col-md-4 text-md-end">{{ __('Place Of Issue :') }}</label>

                            <div class="col-md-6">
                                <p id="place_of_issue">{{ Session::get('secondSession')['place_of_issue'] }}</p>
                            </div>
                        </div>
                        {{-- arrival_date --}}
                        <div class="row mb-3 justify-content-center">
                            <label for="arrival_date" class="col-md-4 text-md-end">{{ __('Arrival Date :') }}</label>

                            <div class="col-md-6">
                                <p id="arrival_date">{{ Session::get('secondSession')['arrival_date'] }}</p>
                            </div>
                        </div>
                        {{-- visa_duration --}}
                        <div class="row mb-3 justify-content-center">
                            <label for="visa_duration" class="col-md-4 text-md-end">{{ __('Visa Duration :') }}</label>

                            <div class="col-md-6">
                                <p id="visa_duration">{{ Session::get('secondSession')['visa_duration'] }}</p>
                            </div>
                        </div>
                        {{-- visa_status --}}
                        <div class="row mb-3 justify-content-center">
                            <label for="visa_status" class="col-md-4 text-md-end">{{ __('Visa Status :') }}</label>

                            <div class="col-md-6">
                                <p id="visa_status">{{ Session::get('secondSession')['visa_status'] }}</p>
                            </div>
                        </div>
                        {{-- passport_pic --}}
                        <div class="row mb-3 justify-content-center">
                            <label for="passport_pic"
                                class="col-md-4 text-md-end">{{ __('Passport Picture :') }}</label>

                            <div class="col-md-6">
                                <img class="img-thumbnail" id="passport_pic"
                                    src="{{ asset('storage/' . Session::get('passportPic_path')) }}"
                                    alt="passport pic">

                            </div>
                        </div>
                        {{-- personal_pic --}}
                        <div class="row mb-3 justify-content-center">
                            <label for="personal_pic"
                                class="col-md-4 text-md-end">{{ __('Personal Picture :') }}</label>

                            <div class="col-md-6">
                                <img class="img-thumbnail" id="personal_pic"
                                    src="{{ asset('storage/' . Session::get('personalPic_path')) }}"
                                    alt="personal pic">

                            </div>
                        </div>

                        @if (Session::get('secondSession')['companion'] == 'Yes')
                            {{-- companion_first_name --}}
                            <div class="row mb-3 justify-content-center">
                                <label for="companion_first_name"
                                    class="col-md-4 text-md-end">{{ __('Companion First Name :') }}</label>

                                <div class="col-md-6">
                                    <p id="companion_first_name">
                                        {{ Session::get('secondSession_companion')['companion_first_name'] }}</p>
                                </div>
                            </div>
                            {{-- companion_last_name --}}
                            <div class="row mb-3 justify-content-center">
                                <label for="companion_last_name"
                                    class="col-md-4 text-md-end">{{ __('Companion Last Name :') }}</label>

                                <div class="col-md-6">
                                    <p id="companion_last_name">
                                        {{ Session::get('secondSession_companion')['companion_last_name'] }}</p>
                                </div>
                            </div>
                            {{-- companion_dob --}}
                            <div class="row mb-3 justify-content-center">
                                <label for="companion_dob"
                                    class="col-md-4 text-md-end">{{ __('Companion Date Of Birth :') }}</label>

                                <div class="col-md-6">
                                    <p id="companion_dob">
                                        {{ Session::get('secondSession_companion')['companion_dob'] }}</p>
                                </div>
                            </div>
                            {{-- companion_gender --}}
                            <div class="row mb-3 justify-content-center">
                                <label for="companion_gender"
                                    class="col-md-4 text-md-end">{{ __('Companion Gender :') }}</label>

                                <div class="col-md-6">
                                    <p id="companion_gender">
                                        {{ Session::get('secondSession_companion')['companion_gender'] }}</p>
                                </div>
                            </div>
                            {{-- companion_place_of_birth --}}
                            <div class="row mb-3 justify-content-center">
                                <label for="companion_place_of_birth"
                                    class="col-md-4 text-md-end">{{ __('Companion Place Of Birth :') }}</label>

                                <div class="col-md-6">
                                    <p id="companion_place_of_birth">
                                        {{ Session::get('secondSession_companion')['companion_place_of_birth'] }}</p>
                                </div>
                            </div>
                            {{-- companion_country_of_residency --}}
                            <div class="row mb-3 justify-content-center">
                                <label for="companion_country_of_residency"
                                    class="col-md-4 text-md-end">{{ __('Companion Country Of Residency :') }}</label>

                                <div class="col-md-6">
                                    <p id="companion_country_of_residency">
                                        {{ Session::get('secondSession_companion')['companion_country_of_residency'] }}
                                    </p>
                                </div>
                            </div>
                            {{-- companion_passport_no --}}
                            <div class="row mb-3 justify-content-center">
                                <label for="companion_passport_no"
                                    class="col-md-4 text-md-end">{{ __('Companion Passport No :') }}</label>

                                <div class="col-md-6">
                                    <p id="companion_passport_no">
                                        {{ Session::get('secondSession_companion')['companion_passport_no'] }}</p>
                                </div>
                            </div>
                            {{-- companion_issue_date --}}
                            <div class="row mb-3 justify-content-center">
                                <label for="companion_issue_date"
                                    class="col-md-4 text-md-end">{{ __('Companion Issue Date :') }}</label>

                                <div class="col-md-6">
                                    <p id="companion_issue_date">
                                        {{ Session::get('secondSession_companion')['companion_issue_date'] }}</p>
                                </div>
                            </div>
                            {{-- companion_expiry_date --}}
                            <div class="row mb-3 justify-content-center">
                                <label for="companion_expiry_date"
                                    class="col-md-4 text-md-end">{{ __('Companion Expiry Date :') }}</label>

                                <div class="col-md-6">
                                    <p id="companion_expiry_date">
                                        {{ Session::get('secondSession_companion')['companion_expiry_date'] }}</p>
                                </div>
                            </div>
                            {{-- companion_place_of_issue --}}
                            <div class="row mb-3 justify-content-center">
                                <label for="companion_place_of_issue"
                                    class="col-md-4 text-md-end">{{ __('Companion Place Of Issue :') }}</label>

                                <div class="col-md-6">
                                    <p id="companion_place_of_issue">
                                        {{ Session::get('secondSession_companion')['companion_place_of_issue'] }}</p>
                                </div>
                            </div>
                            {{-- companion_arrival_date --}}
                            <div class="row mb-3 justify-content-center">
                                <label for="companion_arrival_date"
                                    class="col-md-4 text-md-end">{{ __('Companion Arrival Date :') }}</label>

                                <div class="col-md-6">
                                    <p id="companion_arrival_date">
                                        {{ Session::get('secondSession_companion')['companion_arrival_date'] }}</p>
                                </div>
                            </div>
                            {{-- companion_visa_duration --}}
                            <div class="row mb-3 justify-content-center">
                                <label for="companion_visa_duration"
                                    class="col-md-4 text-md-end">{{ __('Companion Visa Duration :') }}</label>

                                <div class="col-md-6">
                                    <p id="companion_visa_duration">
                                        {{ Session::get('secondSession_companion')['companion_visa_duration'] }}</p>
                                </div>
                            </div>
                            {{-- companion_visa_status --}}
                            <div class="row mb-3 justify-content-center">
                                <label for="companion_visa_status"
                                    class="col-md-4 text-md-end">{{ __('Companion Visa Status :') }}</label>

                                <div class="col-md-6">
                                    <p id="companion_visa_status">
                                        {{ Session::get('secondSession_companion')['companion_visa_status'] }}</p>
                                </div>
                            </div>
                            {{-- passport_pic --}}
                            <div class="row mb-3 justify-content-center">
                                <label for="companion_passport_pic"
                                    class="col-md-4 text-md-end">{{ __('Companion Passport Picture :') }}</label>

                                <div class="col-md-6">
                                    <img class="img-thumbnail" id="companion_passport_pic"
                                        src="{{ asset('storage/' . Session::get('companion_passportPic_path')) }}"
                                        alt="passport pic">

                                </div>
                            </div>
                            {{-- personal_pic --}}
                            <div class="row mb-3 justify-content-center">
                                <label for="companion_personal_pic"
                                    class="col-md-4 text-md-end">{{ __('Companion Personal Picture :') }}</label>

                                <div class="col-md-6">
                                    <img class="img-thumbnail" id="companion_personal_pic"
                                        src="{{ asset('storage/' . Session::get('companion_personalPic_path')) }}"
                                        alt="personal pic">

                                </div>
                            </div>
                        @endif
                        {{-- checkin_date --}}
                        <div class="row mb-3 justify-content-center">
                            <label for="checkin_date" class="col-md-4 text-md-end">{{ __('Checkin Date :') }}</label>

                            <div class="col-md-6">
                                <p id="checkin_date">{{ Session::get('thirdSession')['checkin_date'] }}</p>
                            </div>
                        </div>
                        {{-- checkout_date --}}
                        <div class="row mb-3 justify-content-center">
                            <label for="checkout_date"
                                class="col-md-4 text-md-end">{{ __('Checkout Date :') }}</label>

                            <div class="col-md-6">
                                <p id="checkout_date">{{ Session::get('thirdSession')['checkout_date'] }}</p>
                            </div>
                        </div>
                        {{-- room_type --}}
                        <div class="row mb-3 justify-content-center">
                            <label for="room_type" class="col-md-4 text-md-end">{{ __('Room Type :') }}</label>

                            <div class="col-md-6">
                                <p id="room_type">{{ Session::get('thirdSession')['room_type'] }}</p>
                            </div>
                        </div>
                        {{-- extra_checkin_date --}}
                        <div class="row mb-3 justify-content-center">
                            <label for="extra_checkin_date"
                                class="col-md-4 text-md-end">{{ __('Extra Checkin Date :') }}</label>

                            <div class="col-md-6">
                                <p id="extra_checkin_date">{{ Session::get('thirdSession')['extra_checkin_date'] }}
                                </p>
                            </div>
                        </div>
                        {{-- extra_checkout_date --}}
                        <div class="row mb-3 justify-content-center">
                            <label for="extra_checkout_date"
                                class="col-md-4 text-md-end">{{ __('Extra Checkout Date :') }}</label>

                            <div class="col-md-6">
                                <p id="extra_checkout_date">{{ Session::get('thirdSession')['extra_checkout_date'] }}
                                </p>
                            </div>
                        </div>
                        {{-- extra_room_type --}}
                        <div class="row mb-3 justify-content-center">
                            <label for="extra_room_type"
                                class="col-md-4 text-md-end">{{ __('Extra Room Type :') }}</label>

                            <div class="col-md-6">
                                <p id="extra_room_type">{{ Session::get('thirdSession')['extra_room_type'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-5 mt-5">
                    <div class="col-md-6 offset-md-4">
                        <a href="{{ route('submit') }}" class="btn btn-primary">Confirm and Submit</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
