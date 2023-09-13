<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Dashboard</title>
</head>

<body>

    <div class="min-h-full">
        @include('user.nav')


        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
            </div>
        </header>
        <main>
            @if (session()->has('response'))
                <div id="email_alert" class="py-2 px-5 fade show bg-green-300 flex justify-between">
                    Success! Email has been sent
                    <button type="button"><img src="https://img.icons8.com/material-outlined/24/null/delete-sign.png"
                            onclick="hideAlert()" alt=""></button>
                </div>
            @endif
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th></th>
                                <th scope="col" class="py-3 px-6">
                                    Name
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Email
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Country
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Arrival Date
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Status
                                </th>
                                <th scope="col" class="py-3">
                                    <a type="button"
                                        class="font-medium px-2 py-1 rounded-xl text-slate-900 bg-slate-300 hover:underline"
                                        href="{{ route('invitee.create') }}">Add New Invitess</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $id = 0; ?>
                            @foreach ($users as $user)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="py-4 px-6">
                                        @if ($user->guest->personal_pic == null)
                                            <img src="https://img.icons8.com/material/48/737373/user-male-circle--v1.png"
                                                width="48" height="48" alt="personal_pic">
                                        @else
                                            <img src="{{ asset('storage/' . $user->guest->personal_pic) }}"
                                                width="48" height="48" alt="personal_pic">
                                        @endif
                                    </th>
                                    <th scope="row"
                                        class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white capitalize">
                                        {{ $user->guest->first_name }} {{ $user->guest->last_name }}
                                    </th>
                                    <td class="py-4 px-6">
                                        {{ $user->email }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $user->guest->place_of_birth }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $user->guest->arrival_date }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $user->status }}
                                    </td>
                                    <td class="py-4">
                                        @if ($user->status == 'new')
                                            <a href="{{ route('sendEmail', ['id' => Crypt::encryptString($user->id)]) }}"
                                                class="font-medium px-2 py-1 rounded-xl text-white bg-blue-600 hover:underline">Invite</a>
                                        @elseif ($user->status == 'invited')
                                            <a href="{{ route('sendEmail', ['id' => Crypt::encryptString($user->id)]) }}"
                                                class="font-medium px-2 py-1 rounded-xl text-white bg-blue-600 hover:underline">Invite
                                                Again</a>
                                        @elseif ($user->status == 'registered')
                                            <a href="{{ route('profile.edit', ['id' => Crypt::encryptString($user->id)]) }}"
                                                class="font-medium px-2 py-1 rounded-xl text-white bg-blue-600 hover:underline">View</a>
                                        @endif
                                        <a href="{{ route('profile.destroy', ['id' => Crypt::encryptString($user->id)]) }}"
                                            class="font-medium px-2 py-1 rounded-xl text-white bg-red-700 hover:underline">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="dialog" class="invisible relative z-10" aria-labelledby="modal-title" role="dialog"
                    aria-modal="true">

                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                    <div class="fixed inset-0 z-10 overflow-y-auto">
                        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

                            <div
                                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="sm:flex sm:items-start">
                                        <div
                                            class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                            <!-- Heroicon name: outline/exclamation-triangle -->
                                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 10.5v3.75m-9.303 3.376C1.83 19.126 2.914 21 4.645 21h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 4.88c-.866-1.501-3.032-1.501-3.898 0L2.697 17.626zM12 17.25h.007v.008H12v-.008z" />
                                            </svg>
                                        </div>
                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                            <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">
                                                Delete Account</h3>
                                            <div class="mt-2">
                                                <p class="text-sm text-gray-500">Are you sure you want to delete
                                                    this account? All of user's data will be permanently removed. This
                                                    action cannot be undone.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                    @if (isset($user->id))
                                        <a type="button"
                                            href="{{ route('profile.destroy', ['id' => $id]) }}"
                                            class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Delete</a>
                                    @endif
                                    <button type="button" onclick="cancel()"
                                        class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        function cancel() {
            document.getElementById('dialog').style.visibility = 'hidden';
        }
        var userID;
        function show(id) {
            userID = id;
            document.getElementById('dialog').style.visibility = 'visible';
        }

        function hideAlert() {
            document.getElementById('email_alert').style.visibility = 'hidden';
        }
    </script>
</body>

</html>
