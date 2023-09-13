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
    <title>Mobile Number Verification</title>
</head>

<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Mobile Number Verification') }}</div>
                    <div class="card-body">

                    <form action="{{route('phone.check')}}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Please Enter Your Mobile Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="tel"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ old('phone') }}" required autocomplete="name" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="OTP_code" class="col-md-4 col-form-label text-md-end">{{ __('OTP Code') }}</label>

                            <div class="col-md-6">
                                <input id="otp_code" type="text" maxlength="4"
                                    class="form-control @error('otp_code') is-invalid @enderror" name="otp_code"
                                    value="{{ old('otp_code') }}" required autocomplete="name" autofocus>

                                @error('otp_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Next') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        </div>

    </div>

    <script>
        var input = document.querySelector('#phone');
        window.intlTelInput(input, {});
    </script>
</body>

</html>
