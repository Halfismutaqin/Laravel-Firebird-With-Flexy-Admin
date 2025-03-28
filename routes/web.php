<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoreUser_Controller; 
use App\Http\Controllers\Login_Controller; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route default
Route::get('/', function () {
    return view('welcome');
});

// Route login
Route::get('/login', [Login_Controller::class, 'index'])->name('login');
Route::post('/login', [Login_Controller::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [Login_Controller::class, 'logout'])->name('logout');
Route::get('/logout', [Login_Controller::class, 'logout'])->name('logout');

// Route dengan middleware auth
Route::middleware(['auth', 'user.active'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/users', [CoreUser_Controller::class, 'index'])->name('users.index');
    
    // Tambahkan route yang membutuhkan autentikasi di sini
});

// Route untuk guest
// Route::middleware('guest')->group(function () {
//     Route::get('/login', [Login_Controller::class, 'index'])->name('login');
//     Route::post('/login', [Login_Controller::class, 'authenticate'])->name('login.attempt');
// });
