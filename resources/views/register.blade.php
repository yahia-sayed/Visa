<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">{{ __('Register') }}</div>
                        <div class="card-body">
                            {{-- First Name --}}
                            <div class="row mb-3">
                                <label for="first_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text"
                                        class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                        value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

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
                                        class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                        value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                    @error('last_name')
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
                                        value="{{ old('dob') }}" required autocomplete="dob">

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
                                    <select class="form-select @error('gender') is-invalid @enderror" name="gender"
                                        value="{{ old('gender') }}" autofocus>
                                        <option value="" selected>-</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
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
                                        name="place_of_birth" value="{{ old('place_of_birth') }}" autofocus>
                                        <option value="" selected>-</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->name }}">{{ $country->name }}</option>
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
                                    <select class="form-select @error('country_of_residency') is-invalid @enderror"
                                        name="country_of_residency" value="{{ old('country_of_residency') }}"
                                        autofocus>
                                        <option value="" selected>-</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->name }}">{{ $country->name }}</option>
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
                                        name="passport_no" value="{{ old('passport_no') }}" required
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
                                        name="issue_date" value="{{ old('issue_date') }}" required
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
                                        name="expiry_date" value="{{ old('expiry_date') }}" required
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
                                        name="place_of_issue" value="{{ old('place_of_issue') }}" autofocus>
                                        <option value="" selected>-</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->name }}">{{ $country->name }}</option>
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
                                        name="arrival_date" value="{{ old('arrival_date') }}" required
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
                                        name="profession" value="{{ old('profession') }}" autocomplete="profession"
                                        autofocus>

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
                                        name="organization" value="{{ old('organization') }}"
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
                                        name="visa_duration" value="{{ old('visa_duration') }}" autofocus>
                                        <option value="" selected>-</option>
                                        @for ($i = 1; $i <= 90; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
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
                                        name="visa_status" value="{{ old('visa_status') }}" autofocus>
                                        <option value="" selected>-</option>
                                        <option value="Single">Single</option>
                                        <option value="Multiple">Multiple</option>
                                    </select>
                                </div>
                                @error('visa_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <h5 class="mt-5">Please upload require documents for VISA requirement</h5>
                            {{-- Passport Picture --}}
                            <div class="row mb-3">
                                <label for="passport_pic"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Passport Picture') }}</label>

                                <div class="col-md-6">
                                    <input id="passport_pic" type="file"
                                        class="form-control-file border @error('passport_pic') is-invalid @enderror"
                                        name="passport_pic" value="{{ old('passport_pic') }}" required
                                        autocomplete="passport_pic" autofocus>

                                    @error('passport_pic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Personal Picture --}}
                            <div class="row mb-3">
                                <label for="personal_pic"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Personal Picture') }}</label>

                                <div class="col-md-6">
                                    <input id="personal_pic" type="file"
                                        class="form-control-file border @error('personal_pic') is-invalid @enderror"
                                        name="personal_pic" value="{{ old('personal_pic') }}" required
                                        autocomplete="personal_pic" autofocus>

                                    @error('personal_pic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <p class="mt-5">Note: picture most meet requirement in order to apply for VISA</p>

                            {{-- Companion?? --}}
                            <div class="row mb-3">
                                <label for="companion"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Are you Traveling with companion?') }}</label>

                                <div class="col-md-6">
                                    <select class="form-select @error('companion') is-invalid @enderror"
                                        name="companion" id="companion" value="{{ old('companion') }}" autofocus
                                        onchange="change_companion()">
                                        <option value="" selected>-</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                @error('companion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card" id="companion_section" style="display: none">
                        <div class="card-header">{{ __('Companion') }}</div>
                        <div class="card-body">
                            {{-- First Name --}}
                            <div class="row mb-3">
                                <label for="companion_first_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="companion_first_name" type="text"
                                        class="form-control @error('companion_first_name') is-invalid @enderror"
                                        name="companion_first_name" value="{{ old('companion_first_name') }}"
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
                                        name="companion_last_name" value="{{ old('companion_last_name') }}"
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
                                        name="companion_dob" value="{{ old('companion_dob') }}"
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
                                    <select class="form-select @error('companion_gender') is-invalid @enderror"
                                        name="companion_gender" value="{{ old('companion_gender') }}" autofocus>
                                        <option value="" selected>-</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
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
                                        name="companion_place_of_birth" value="{{ old('companion_place_of_birth') }}"
                                        autofocus>
                                        <option value="" selected>-</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->name }}">{{ $country->name }}
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
                                        name="companion_country_of_residency"
                                        value="{{ old('companion_country_of_residency') }}" autofocus>
                                        <option value="" selected>-</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->name }}">{{ $country->name }}
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
                                        name="companion_passport_no" value="{{ old('companion_passport_no') }}"
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
                                        name="companion_issue_date" value="{{ old('companion_issue_date') }}"
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
                                        name="companion_expiry_date" value="{{ old('companion_expiry_date') }}"
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
                                        value="{{ old('companion_place_of_issue') }}" autofocus>
                                        <option value="" selected>-</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->name }}">{{ $country->name }}
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
                                        name="companion_arrival_date" value="{{ old('companion_arrival_date') }}"
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
                                        name="companion_profession" value="{{ old('companion_profession') }}"
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
                                        name="companion_organization" value="{{ old('companion_organization') }}"
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
                                        name="companion_visa_duration" value="{{ old('companion_visa_duration') }}"
                                        autofocus>
                                        <option value="" selected>-</option>
                                        @for ($i = 1; $i <= 90; $i++)
                                            <option value="{{ $i }}">{{ $i }}
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
                                        name="companion_visa_status" value="{{ old('companion_visa_status') }}"
                                        autofocus>
                                        <option value="" selected>-</option>
                                        <option value="Single">Single</option>
                                        <option value="Multiple">Multiple</option>
                                    </select>
                                </div>
                                @error('companion_visa_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <h5 class="mt-5">Please upload require documents for VISA requirement</h5>
                            {{-- Passport Picture --}}
                            <div class="row mb-3">
                                <label for="companion_passport_pic"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Passport Picture') }}</label>

                                <div class="col-md-6">
                                    <input id="companion_passport_pic" type="file"
                                        class="form-control-file border @error('companion_passport_pic') is-invalid @enderror"
                                        name="companion_passport_pic" value="{{ old('companion_passport_pic') }}"
                                        autocomplete="companion_passport_pic" autofocus>

                                    @error('companion_passport_pic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Personal Picture --}}
                            <div class="row mb-3">
                                <label for="companion_personal_pic"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Personal Picture') }}</label>

                                <div class="col-md-6">
                                    <input id="companion_personal_pic" type="file"
                                        class="form-control-file border @error('companion_personal_pic') is-invalid @enderror"
                                        name="companion_personal_pic" value="{{ old('companion_personal_pic') }}"
                                        autocomplete="companion_personal_pic" autofocus>

                                    @error('companion_personal_pic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <p class="mt-5">Note: picture most meet requirement in order to apply for VISA</p>

                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4 my-5">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script>
        var date = new Date().toISOString().split('T')[0];
        document.getElementById('dob').setAttribute('max', date);
        document.getElementById('issue_date').setAttribute('max', date);
        document.getElementById('expiry_date').setAttribute('min', date);
        document.getElementById('arrival_date').setAttribute('min', date);
        document.getElementById('companion_dob').setAttribute('max', date);
        document.getElementById('companion_issue_date').setAttribute('max', date);
        document.getElementById('companion_expiry_date').setAttribute('min', date);
        document.getElementById('companion_arrival_date').setAttribute('min', date);

        function change_companion() {
            var option = document.getElementById('companion').value;
            if (option == "Yes") {
                document.getElementById('companion_section').style.display = "block";
            } else {
                document.getElementById('companion_section').style.display = "none";
            }
        }
    </script>
</body>

</html>
