<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoreUser_Controller; 
use App\Http\Controllers\Login_Controller; 
use App\Http\Controllers\ManageAccess_Controller;

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

    Route::prefix('ManageAccess')->controller(ManageAccess_Controller::class)->group(function () {
        Route::get('/', 'index')->name('manageAccess');

        Route::get('UserList', 'userRole_listPage')->name('manageAccess.userRole.list');
        Route::get('UserDetail/{id}', 'userRole_detailPage')->name('manageAccess.userRole.detail');
        Route::get('UserAdd', 'userRole_addPage')->name('manageAccess.userRole.add');
        Route::post('UserSave', 'userRole_saveData')->name('manageAccess.userRole.save');

        Route::get('RoleList', 'configRole_listPage')->name('manageAccess.configRole.list');
        Route::get('RoleDetail/{id}', action: 'configRole_detailPage')->name('manageAccess.configRole.detail');
        Route::get('RoleAdd', 'configRole_addPage')->name('manageAccess.configRole.add');
        Route::post('RoleSave', 'configRole_saveData')->name('manageAccess.configRole.save');
        
        Route::get('MenuList', 'configMenu_listPage')->name('manageAccess.configMenu.list');
        Route::get('MenuList/{id}', 'configSubMenu_listPage')->name('manageAccess.configMenuSub.list');
        Route::get('MenuDetail/{id}', action: 'configMenu_detailPage')->name('manageAccess.configMenu.detail');
        Route::get('MenuAdd', 'configMenu_addPage')->name('manageAccess.configMenu.add');
        Route::post('MenuSave', 'configMenu_saveData')->name('manageAccess.configMenu.save');
        
    });

});

// Route untuk guest
// Route::middleware('guest')->group(function () {
//     Route::get('/login', [Login_Controller::class, 'index'])->name('login');
//     Route::post('/login', [Login_Controller::class, 'authenticate'])->name('login.attempt');
// });
