<?php

use App\Http\Controllers\DrgCarsController;
use App\Http\Controllers\DrgPeopleController;
use App\Http\Controllers\TelegramUsersController;
use App\Http\Controllers\UsersController;
use App\Http\Livewire\UserTable;
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


Route::view('/', 'auth.login');
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('users', UsersController::class);
    Route::resource('telegram-users', TelegramUsersController::class);
    Route::resource('drg-people', DrgPeopleController::class);
    Route::resource('drg-cars', DrgCarsController::class);

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
