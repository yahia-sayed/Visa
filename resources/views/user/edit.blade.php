<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('build/css/intlTelInput.css') }}">
    <script src="{{ asset('build/js/intlTelInput.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="min-h-full">
        @include('user.nav')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">User Data</h1>
            </div>
        </header>

        <!-- Page Content -->
        <main>

            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('dashboard') }}" class="btn btn-primary"
                                type="button">{{ __('Back') }}</a>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <div class="flex justify-content-center">
                                    {{ $user->email }}
                                </div>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('profile.update', ['email' => $user->email]) }}"
                                    method="POST">
                                    @csrf

                                    {{-- First Name --}}
                                    <div class="row mb-3">
                                        <label for="first_name"
                                            class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="first_name" type="text"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                name="first_name"
                                                value="{{ old('first_name', $user->guest->first_name) }}" required
                                                autocomplete="first_name" autofocus>

                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Last Name --}}
                                    <div class="row mb-3">
                                        <label for="last_name"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Last Name (Surname)') }}</label>

                                        <div class="col-md-6">
                                            <input id="last_name" type="text"
                                                class="form-control @error('last_name') is-invalid @enderror"
                                                name="last_name"
                                                value="{{ old('last_name', $user->guest->last_name) }}" required
                                                autocomplete="last_name" autofocus>

                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Phone --}}
                                    <div class="row mb-3">
                                        <label for="phone"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Mobile Number') }}</label>

                                        <div class="col-md-6">
                                            <input id="phone" type="tel"
                                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                value="{{ old('phone', $user->guest->mobile_no) }}" required
                                                autocomplete="name" autofocus>

                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- OTP Code --}}
                                    <div class="row mb-3">
                                        <label for="OTP_code"
                                            class="col-md-4 col-form-label text-md-end">{{ __('OTP Code') }}</label>

                                        <div class="col-md-6">
                                            <input id="otp_code" type="text" maxlength="4"
                                                class="form-control @error('otp_code') is-invalid @enderror"
                                                name="otp_code" value="{{ old('otp_code', $user->guest->otp_code) }}"
                                                required autocomplete="name" autofocus>

                                            @error('otp_code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Date of Birthday --}}
                                    <div class="row mb-3">
                                        <label for="dob"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Date of Birthday') }}</label>

                                        <div class="col-md-6">
                                            <input id="dob" type="date"
                                                class="form-control @error('dob') is-invalid @enderror" name="dob"
                                                value="{{ old('dob', $user->guest->dob) }}" required
                                                autocomplete="dob">

                                            @error('dob')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Gender --}}
                                    <div class="row mb-3">
                                        <label for="gender"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                                        <div class="col-md-6">
                                            <select class="form-select @error('gender') is-invalid @enderror"
                                                name="gender" autofocus>
                                                <option value="Male"@if (old('gender') == 'Male' || 'Male' == $user->guest->gender) selected @endif>
                                                    Male</option>
                                                <option
                                                    value="Female"@if (old('gender') == 'Female' || 'Female' == $user->guest->gender) selected @endif>
                                                    Female</option>
                                            </select>
                                        </div>
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- Place Of Birth --}}
                                    <div class="row mb-3">
                                        <label for="place_of_birth"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Place Of Birth') }}</label>

                                        <div class="col-md-6">
                                            <select class="form-select @error('place_of_birth') is-invalid @enderror"
                                                name="place_of_birth" autofocus>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->name}}"
                                                        @if (old('place_of_birth') == $country->name || $country->name == $user->guest->place_of_birth) selected @endif>
                                                        {{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('place_of_birth')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- Country of Residency --}}
                                    <div class="row mb-3">
                                        <label for="country_of_residency"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Country of Residency') }}</label>

                                        <div class="col-md-6">
                                            <select
                                                class="form-select @error('country_of_residency') is-invalid @enderror"
                                                name="country_of_residency" autofocus>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->name}}"
                                                        @if (old('country_of_residency') == $country->name || $country->name == $user->guest->country_of_residency) selected @endif>
                                                        {{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('country_of_residency')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- Passport No --}}
                                    <div class="row mb-3">
                                        <label for="passport_no"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Passport No') }}</label>

                                        <div class="col-md-6">
                                            <input id="passport_no" type="text" maxlength="6"
                                                class="form-control @error('passport_no') is-invalid @enderror"
                                                name="passport_no"
                                                value="{{ old('passport_no', $user->guest->passport_no) }}" required
                                                autocomplete="passport_no" autofocus>

                                            @error('passport_no')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Issue Date --}}
                                    <div class="row mb-3">
                                        <label for="issue_date"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Issue Date') }}</label>

                                        <div class="col-md-6">
                                            <input id="issue_date" type="date"
                                                class="form-control @error('issue_date') is-invalid @enderror"
                                                name="issue_date"
                                                value="{{ old('issue_date', $user->guest->issue_date) }}" required
                                                autocomplete="issue_date">

                                            @error('issue_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Expiry Date --}}
                                    <div class="row mb-3">
                                        <label for="expiry_date"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Expiry Date') }}</label>

                                        <div class="col-md-6">
                                            <input id="expiry_date" type="date"
                                                class="form-control @error('expiry_date') is-invalid @enderror"
                                                name="expiry_date"
                                                value="{{ old('expiry_date', $user->guest->expiry_date) }}" required
                                                autocomplete="expiry_date">

                                            @error('expiry_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Place Of Issue --}}
                                    <div class="row mb-3">
                                        <label for="place_of_issue"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Place Of Issue') }}</label>

                                        <div class="col-md-6">
                                            <select class="form-select @error('place_of_issue') is-invalid @enderror"
                                                name="place_of_issue" autofocus>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->name}}"
                                                        @if (old('place_of_issue') == $country->name || $country->name == $user->guest->place_of_issue) selected @endif>
                                                        {{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('place_of_issue')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- Arrival Date --}}
                                    <div class="row mb-3">
                                        <label for="arrival_date"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Arrival Date') }}</label>

                                        <div class="col-md-6">
                                            <input id="arrival_date" type="date"
                                                class="form-control @error('arrival_date') is-invalid @enderror"
                                                name="arrival_date"
                                                value="{{ old('arrival_date', $user->guest->arrival_date) }}" required
                                                autocomplete="arrival_date">

                                            @error('arrival_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Profession --}}
                                    <div class="row mb-3">
                                        <label for="profession"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Profession') }}</label>

                                        <div class="col-md-6">
                                            <input id="profession" type="text"
                                                class="form-control @error('profession') is-invalid @enderror"
                                                name="profession"
                                                value="{{ old('profession', $user->guest->profession) }}"
                                                autocomplete="profession" autofocus>

                                            @error('profession')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- organization --}}
                                    <div class="row mb-3">
                                        <label for="organization"
                                            class="col-md-4 col-form-label text-md-end">{{ __('organization') }}</label>

                                        <div class="col-md-6">
                                            <input id="organization" type="text"
                                                class="form-control @error('organization') is-invalid @enderror"
                                                name="organization"
                                                value="{{ old('organization', $user->guest->organization) }}"
                                                autocomplete="organization" autofocus>

                                            @error('organization')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Visa Duration --}}
                                    <div class="row mb-3">
                                        <label for="visa_duration"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Visa Duration') }}</label>

                                        <div class="col-md-6">
                                            <select class="form-select @error('visa_duration') is-invalid @enderror"
                                                name="visa_duration"
                                                value="{{ old('visa_duration', $user->guest->visa_duration) }}"
                                                autofocus>
                                                @for ($i = 1; $i <= 90; $i++)
                                                    <option value="{{ $i }}"
                                                        @if (old('visa_duration') == $i || $i == $user->guest->visa_duration) selected @endif>
                                                        {{ $i }}
                                                    </option>
                                                @endfor

                                            </select>
                                        </div>
                                        @error('visa_duration')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- Visa Status --}}
                                    <div class="row mb-3">
                                        <label for="visa_status"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Visa Status') }}</label>

                                        <div class="col-md-6">
                                            <select class="form-select @error('visa_status') is-invalid @enderror"
                                                name="visa_status" autofocus>
                                                <option
                                                    value="Single"@if (old('visa_status') == 'Single' || 'Single' == $user->guest->visa_status) selected @endif>
                                                    Single</option>
                                                <option
                                                    value="Multiple"@if (old('visa_status') == 'Multiple' || 'Multiple' == $user->guest->visa_status) selected @endif>
                                                    Multiple</option>
                                            </select>
                                        </div>
                                        @error('visa_status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
                                    @isset($companion)
                                        {{-- First Name --}}
                                        <div class="row mb-3">
                                            <label for="companion_first_name"
                                                class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="companion_first_name" type="text"
                                                    class="form-control @error('companion_first_name') is-invalid @enderror"
                                                    name="companion_first_name"
                                                    value="{{ old('companion_first_name', $companion ? $companion->first_name : '') }}"
                                                    autocomplete="companion_first_name" autofocus>

                                                @error('companion_first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Last Name --}}
                                        <div class="row mb-3">
                                            <label for="companion_last_name"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Last Name (Surname)') }}</label>

                                            <div class="col-md-6">
                                                <input id="companion_last_name" type="text"
                                                    class="form-control @error('companion_last_name') is-invalid @enderror"
                                                    name="companion_last_name"
                                                    value="{{ old('companion_last_name', $companion ? $companion->last_name : '') }}"
                                                    autocomplete="companion_last_name" autofocus>

                                                @error('companion_last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Date of Birthday --}}
                                        <div class="row mb-3">
                                            <label for="companion_dob"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Date of Birthday') }}</label>

                                            <div class="col-md-6">
                                                <input id="companion_dob" type="date"
                                                    class="form-control @error('companion_dob') is-invalid @enderror"
                                                    name="companion_dob"
                                                    value="{{ old('companion_dob', $companion ? $companion->dob : '') }}"
                                                    autocomplete="companion_dob">

                                                @error('companion_dob')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Gender --}}
                                        <div class="row mb-3">
                                            <label for="companion_gender"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                                            <div class="col-md-6">
                                                <select
                                                    class="form-select @error('companion_gender') is-invalid @enderror"
                                                    name="companion_gender" autofocus>
                                                    <option
                                                        value="Male"@if (old('companion_gender') == 'Male' || 'Male' == $companion->gender) selected @endif>
                                                        Male</option>
                                                    <option
                                                        value="Female"@if (old('companion_gender') == 'Female' || 'Female' == $companion->gender) selected @endif>
                                                        Female</option>
                                                </select>
                                            </div>
                                            @error('companion_gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{-- Place Of Birth --}}
                                        <div class="row mb-3">
                                            <label for="companion_place_of_birth"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Place Of Birth') }}</label>

                                            <div class="col-md-6">
                                                <select
                                                    class="form-select @error('companion_place_of_birth') is-invalid @enderror"
                                                    name="companion_place_of_birth" {{-- value="{{ old('companion_place_of_birth', $companion ? $companion->place_of_birth : '') }}" --}} autofocus>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->name}}"
                                                            @if (old('companion_place_of_birth') == $country->name || $country->name == $companion->place_of_birth) selected @endif>
                                                            {{ $country->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('companion_place_of_birth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        {{-- Country of Residency --}}
                                        <div class="row mb-3">
                                            <label for="companion_country_of_residency"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Country of Residency') }}</label>

                                            <div class="col-md-6">
                                                <select
                                                    class="form-select @error('companion_country_of_residency') is-invalid @enderror"
                                                    name="companion_country_of_residency" {{-- value="{{ old('companion_country_of_residency', $companion ? $companion->country_of_residency : '') }}" --}} autofocus>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->name}}"
                                                            @if (old('companion_country_of_residency') == $country->name ||
                                                                $country->name == $companion->country_of_residency) selected @endif>
                                                            {{ $country->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('companion_country_of_residency')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        {{-- Passport No --}}
                                        <div class="row mb-3">
                                            <label for="companion_passport_no"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Passport No') }}</label>

                                            <div class="col-md-6">
                                                <input id="companion_passport_no" type="text" maxlength="6"
                                                    class="form-control @error('companion_passport_no') is-invalid @enderror"
                                                    name="companion_passport_no"
                                                    value="{{ old('companion_passport_no', $companion ? $companion->passport_no : '') }}"
                                                    autocomplete="companion_passport_no" autofocus>

                                                @error('companion_passport_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Issue Date --}}
                                        <div class="row mb-3">
                                            <label for="companion_issue_date"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Issue Date') }}</label>

                                            <div class="col-md-6">
                                                <input id="companion_issue_date" type="date"
                                                    class="form-control @error('companion_issue_date') is-invalid @enderror"
                                                    name="companion_issue_date"
                                                    value="{{ old('companion_issue_date', $companion ? $companion->issue_date : '') }}"
                                                    autocomplete="companion_issue_date">

                                                @error('companion_issue_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Expiry Date --}}
                                        <div class="row mb-3">
                                            <label for="companion_expiry_date"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Expiry Date') }}</label>

                                            <div class="col-md-6">
                                                <input id="companion_expiry_date" type="date"
                                                    class="form-control @error('companion_expiry_date') is-invalid @enderror"
                                                    name="companion_expiry_date"
                                                    value="{{ old('companion_expiry_date', $companion ? $companion->expiry_date : '') }}"
                                                    autocomplete="companion_expiry_date">

                                                @error('companion_expiry_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Place Of Issue --}}
                                        <div class="row mb-3">
                                            <label for="companion_place_of_issue"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Place Of Issue') }}</label>

                                            <div class="col-md-6">
                                                <select
                                                    class="form-select @error('companion_place_of_issue') is-invalid @enderror"
                                                    id="companion_place_of_issue" name="companion_place_of_issue"
                                                    {{-- value="{{ old('companion_place_of_issue', $companion ? $companion->place_of_issue : '') }}" --}} autofocus>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->name}}"
                                                            @if (old('companion_place_of_issue') == $country->name || $country->name == $companion->place_of_issue) selected @endif>
                                                            {{ $country->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('companion_place_of_issue')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        {{-- Arrival Date --}}
                                        <div class="row mb-3">
                                            <label for="companion_arrival_date"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Arrival Date') }}</label>

                                            <div class="col-md-6">
                                                <input id="companion_arrival_date" type="date"
                                                    class="form-control @error('companion_arrival_date') is-invalid @enderror"
                                                    name="companion_arrival_date"
                                                    value="{{ old('companion_arrival_date', $companion ? $companion->arrival_date : '') }}"
                                                    autocomplete="companion_arrival_date">

                                                @error('companion_arrival_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Profession --}}
                                        <div class="row mb-3">
                                            <label for="companion_profession"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Profession') }}</label>

                                            <div class="col-md-6">
                                                <input id="companion_profession" type="text"
                                                    class="form-control @error('companion_profession') is-invalid @enderror"
                                                    name="companion_profession"
                                                    value="{{ old('companion_profession', $companion ? $companion->profession : '') }}"
                                                    autocomplete="companion_profession" autofocus>

                                                @error('companion_profession')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- organization --}}
                                        <div class="row mb-3">
                                            <label for="companion_organization"
                                                class="col-md-4 col-form-label text-md-end">{{ __('organization') }}</label>

                                            <div class="col-md-6">
                                                <input id="companion_organization" type="text"
                                                    class="form-control @error('companion_organization') is-invalid @enderror"
                                                    name="companion_organization"
                                                    value="{{ old('companion_organization', $companion ? $companion->organization : '') }}"
                                                    autocomplete="companion_organization" autofocus>

                                                @error('companion_organization')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- Visa Duration --}}
                                        <div class="row mb-3">
                                            <label for="companion_visa_duration"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Visa Duration') }}</label>

                                            <div class="col-md-6">
                                                <select id="companion_visa_duration"
                                                    class="form-select @error('companion_visa_duration') is-invalid @enderror"
                                                    name="companion_visa_duration" {{-- value="{{ old('companion_visa_duration', $companion ? $companion->visa_duration : '') }}" --}} autofocus>
                                                    @for ($i = 1; $i <= 90; $i++)
                                                        <option value="{{ $i }}"
                                                            @if (old('companion_visa_duration') == $i || $i == $companion->visa_duration) selected @endif>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                            @error('companion_visa_duration')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        {{-- Visa Status --}}
                                        <div class="row mb-3">
                                            <label for="companion_visa_status"
                                                class="col-md-4 col-form-label text-md-end">{{ __('Visa Status') }}</label>

                                            <div class="col-md-6">
                                                <select id="companion_visa_status"
                                                    class="form-select @error('companion_visa_status') is-invalid @enderror"
                                                    name="companion_visa_status" {{-- value="{{ old('companion_visa_status', $companion ? $companion->visa_status : '') }}" --}} autofocus>
                                                    <option
                                                        value="Single"@if (old('companion_visa_status') == 'Single' || 'Single' == $companion->visa_status) selected @endif>
                                                        Single</option>
                                                    <option
                                                        value="Multiple"@if (old('companion_visa_status') == 'Multiple' || 'Multiple' == $companion->visa_status) selected @endif>
                                                        Multiple</option>
                                                </select>
                                            </div>
                                            @error('companion_visa_status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        {{-- Passport Picture --}}
                                        <div class="row mb-3 justify-content-center">
                                            <label for="companion_passport_pic"
                                                class="col-md-4 text-md-end">{{ __('Passport Picture :') }}</label>

                                            <div class="col-md-6">
                                                <img class="img-thumbnail" id="companion_passport_pic"
                                                    src="{{ asset('storage/' . Session::get('companion_passportPic_path')) }}"
                                                    alt="passport pic">

                                            </div>
                                        </div>
                                        {{-- Personal Picture --}}
                                        <div class="row mb-3 justify-content-center">
                                            <label for="companion_personal_pic"
                                                class="col-md-4 text-md-end">{{ __('Personal Picture :') }}</label>

                                            <div class="col-md-6">
                                                <img class="img-thumbnail" id="companion_personal_pic"
                                                    src="{{ asset('storage/' . Session::get('companion_personalPic_path')) }}"
                                                    alt="personal pic">

                                            </div>
                                        </div>
                                    @endisset

                                    <div class="row mb-3">
                                        <label for="checkin_date"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Check-in date') }}</label>

                                        <div class="col-md-6">
                                            <input id="checkin_date" type="date"
                                                class="form-control @error('checkin_date') is-invalid @enderror"
                                                name="checkin_date"
                                                value="{{ old('issue_date', $accommodation->checkin_date) }}"
                                                required autocomplete="name" autofocus>

                                            @error('checkin_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="checkout_date"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Check-out date') }}</label>

                                        <div class="col-md-6">
                                            <input id="checkout_date" type="date"
                                                class="form-control @error('checkout_date') is-invalid @enderror"
                                                name="checkout_date"
                                                value="{{ old('issue_date', $accommodation->checkout_date) }}"
                                                required autocomplete="name" autofocus>

                                            @error('checkout_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="room_type"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Room Type') }}</label>

                                        <div class="col-md-6">
                                            <select class="form-select @error('room_type') is-invalid @enderror"
                                                name="room_type" id="room_type" {{-- value="{{ old('room_type', $accommodation->room_type) }}"  --}} autofocus>
                                                <option
                                                    value="King Bed"@if (old('room_type') == 'King Bed' || 'King Bed' == $accommodation->room_type) selected @endif>
                                                    King Bed</option>
                                                <option
                                                    value="Twin Bed"@if (old('room_type') == 'Twin Bed' || 'Twin Bed' == $accommodation->room_type) selected @endif>
                                                    Twin Bed</option>
                                            </select>
                                        </div>
                                        @error('room_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <label for="extra_checkin_date"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Check-in date') }}</label>

                                        <div class="col-md-6">
                                            <input id="extra_checkin_date" type="date"
                                                class="form-control @error('extra_checkin_date') is-invalid @enderror"
                                                name="extra_checkin_date"
                                                value="{{ old('issue_date', $accommodation->extra_checkin_date) }}"
                                                required autocomplete="name" autofocus>

                                            @error('extra_checkin_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="extra_checkout_date"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Check-out date') }}</label>

                                        <div class="col-md-6">
                                            <input id="extra_checkout_date" type="date"
                                                class="form-control @error('extra_checkout_date') is-invalid @enderror"
                                                name="extra_checkout_date"
                                                value="{{ old('issue_date', $accommodation->extra_checkout_date) }}"
                                                required autocomplete="name" autofocus>

                                            @error('extra_checkout_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="extra_room_type"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Room Type') }}</label>

                                        <div class="col-md-6">
                                            <select class="form-select @error('extra_room_type') is-invalid @enderror"
                                                name="extra_room_type" id="extra_room_type" {{-- value="{{ old('extra_room_type', $accommodation->extra_room_type) }}" --}}
                                                autofocus>
                                                <option
                                                    value="King Bed"@if (old('extra_room_type') == 'King Bed' || 'King Bed' == $accommodation->extra_room_type) selected @endif>
                                                    King Bed</option>
                                                <option
                                                    value="Twin Bed"@if (old('extra_room_type') == 'Twin Bed' || 'Twin Bed' == $accommodation->extra_room_type) selected @endif>
                                                    Twin Bed</option>
                                            </select>
                                        </div>
                                        @error('extra_room_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row mt-5 mb-5 justify-items-center">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Save') }}
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
    <script>
        var input = document.querySelector('#phone');
        window.intlTelInput(input, {});
    </script>
</body>

</html>
