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
    <title>Accommodation</title>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p>Please choose your accommodation preference as you are eligible for (5-night)</p>
                <form action="{{ route('accommodation.store') }}" method="POST">
                    @csrf
                    <div class="card mt-10">
                        <div class="card-header">{{ __('Eligible stay (5-night)') }}</div>
                        <div class="card-body">

                            <div class="row mb-3">
                                <label for="checkin_date"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Check-in date') }}</label>

                                <div class="col-md-6">
                                    <input id="checkin_date" type="date"
                                        class="form-control @error('checkin_date') is-invalid @enderror"
                                        name="checkin_date" value="{{ old('checkin_date') }}" required
                                        autocomplete="name" autofocus>

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
                                        name="checkout_date" value="{{ old('checkout_date') }}" required
                                        autocomplete="name" autofocus>

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
                                        name="room_type" id="room_type" value="{{ old('room_type') }}" autofocus>
                                        <option value="" selected>-</option>
                                        <option value="King Bed">King Bed</option>
                                        <option value="Twin Bed">Twin Bed</option>
                                    </select>
                                </div>
                                @error('room_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">{{ __('Extra Night') }}</div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="extra_checkin_date"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Check-in date') }}</label>

                                <div class="col-md-6">
                                    <input id="extra_checkin_date" type="date"
                                        class="form-control @error('extra_checkin_date') is-invalid @enderror"
                                        name="extra_checkin_date" value="{{ old('extra_checkin_date') }}" required
                                        autocomplete="name" autofocus>

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
                                        name="extra_checkout_date" value="{{ old('extra_checkout_date') }}" required
                                        autocomplete="name" autofocus>

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
                                        name="extra_room_type" id="extra_room_type"
                                        value="{{ old('extra_room_type') }}" autofocus>
                                        <option value="" selected>-</option>
                                        <option value="King Bed">King Bed</option>
                                        <option value="Twin Bed">Twin Bed</option>
                                    </select>
                                </div>
                                @error('extra_room_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-0 mt-5">
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

    <script>
        var date = new Date().toISOString().split('T')[0];
        document.getElementById('checkin_date').setAttribute('min', date);
        document.getElementById('extra_checkin_date').setAttribute('min', date);
        document.getElementById('extra_checkout_date').setAttribute('min', date);
        document.getElementById('checkout_date').setAttribute('min', date);

        document.getElementById("checkin_date").addEventListener("change", function() {
            var today = new Date(document.getElementById('checkin_date').value);
            
            today.setDate(today.getDate() + 5);
            document.getElementById('checkout_date').setAttribute('max', today.toISOString().split('T')[0]);
        });
    </script>
</body>

</html>
