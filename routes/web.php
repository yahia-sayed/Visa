<?php

use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('registeration', [PhoneController::class, 'check'])->name('phone.check');
Route::get('registeration/{id}', [PhoneController::class, 'phone']);

Route::get('register', [RegisterController::class, 'register']);
Route::post('register', [RegisterController::class, 'store'])->name('register');

Route::get('accommodation', [AccommodationController::class, 'accommodation'])->name('accommodation');
Route::post('accommodation', [AccommodationController::class, 'store'])->name('accommodation.store');

Route::get('review', function () {
    return view('review');
});
Route::get('submit', [RegisterController::class, 'submitNotification'])->name('submit');
Route::get('submit_notification', function () {
    return view('submitNotification');
})->name('submitNotification');
//////////////////////////////////////////////////////
Route::get('/', function () {
    return redirect('dashboard');
});
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);

Route::middleware('auth')->group(function () {

    Route::middleware('isAdmin')->group(function () {

        Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');

        Route::get('invitee/new', [UserController::class, 'create'])->name('invitee.create');
        Route::post('invitee/new', [UserController::class, 'store'])->name('invitee.store');

        Route::get('sendEmail', [UserController::class, 'sendNewUserNotification'])->name('sendEmail');

        Route::get('profile', [UserController::class, 'edit'])->name('profile.edit');
        Route::post('profile', [UserController::class, 'update'])->name('profile.update');
        Route::get('delete_profile', [UserController::class, 'destroy'])->name('profile.destroy');
    });

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
