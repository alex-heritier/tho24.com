<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LegacyController;
use App\Http\Controllers\MiscController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\App;
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

// Resources
Route::resource('users', UserController::class);
Route::resource('biz', BizController::class);
Route::resource('reviews', ReviewController::class);

// Misc
Route::get('/misc/email_tester', [MiscController::class, 'email_tester_view']);
Route::post('/misc/email_tester', [MiscController::class, 'email_tester_action']);

// Legacy
Route::get('/', [LegacyController::class, 'home']);
Route::get('/account', [LegacyController::class, 'account']);
Route::get('/biz.html', function () {
    $controller = App::make(LegacyController::class);
    return App::call([$controller, 'biz']);
});
Route::get('/register', [LegacyController::class, 'register']);
Route::get('/dummy', [LegacyController::class, 'dummy']);
Route::get('/biz_search/{query?}', function ($query = null) {
    $controller = App::make(LegacyController::class);
    return App::call([$controller, 'biz_search'], ['query' => $query]);
});

// Account
Route::post('acc.register', [AccountController::class, 'register'])->name('register');
Route::post('acc.login', [AccountController::class, 'login'])->name('login');
Route::post('acc.logout', [AccountController::class, 'logout'])->name('logout');
