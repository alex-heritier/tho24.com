<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LegacyController;
use Illuminate\Support\Facades\Route;

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

Route::resource('users', UserController::class);
Route::resource('biz', BizController::class);

// Legacy
Route::get('/', [LegacyController::class, 'home']);
Route::get('/account.html', [LegacyController::class, 'account']);
Route::get('/biz.html', [LegacyController::class, 'biz']);
Route::get('/register.html', [LegacyController::class, 'register']);
Route::get('/dummy', [LegacyController::class, 'dummy']);

// Account
Route::post('/acc/register', [AccountController::class, 'register'])->name('register');
Route::post('/acc/login', [AccountController::class, 'login'])->name('login');