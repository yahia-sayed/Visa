<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if (session()->has('response'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Success!</strong> Email has been sent
        </div>
    @endif

    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-header">Registrants</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registrants as $registrant)
                                        <tr>
                                            <td>{{ $registrant->guest->first_name }} {{ $registrant->guest->last_name }}
                                            </td>
                                            <td><a href="{{ route('profile.edit', ['email' => $registrant->email]) }}"
                                                    type="button">{{ $registrant->email }}</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-header">Invitees</div>
                    <div class="card-body ">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invitees as $invitee)
                                        <tr>
                                            <td class="align-middle">{{ $invitee->guest->first_name }}</td>
                                            <td class="align-middle">{{ $invitee->email }}</td>
                                            <td class="align-middle"><a
                                                    href="{{ route('sendEmail', ['email' => $invitee->email]) }}"
                                                    type="button" class="btn btn-primary">Invite</a></button>
                                            </td>
                                            <td class="align-middle"><a
                                                    href="{{ route('profile.destroy', ['email' => $invitee->email]) }}"
                                                    type="button" class="btn btn-danger">Delete</a></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3 d-flex align-items-center justify-content-center">
                            <a class="btn btn-primary btn-sm" href="{{ route('invitee.create') }}">Add New Invitess</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
