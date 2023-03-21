<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BizController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LegacyController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MiscController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

use function Termwind\render;

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
Route::resource('messages', MessageController::class);

// Account
Route::post('acc.register', [AccountController::class, 'register'])->name('register');
Route::post('acc.login', [AccountController::class, 'login'])->name('login');
Route::post('acc.logout', [AccountController::class, 'logout'])->name('logout');

// Chat
Route::get('/chat/{token}', [MessageController::class, 'showChat']);
Route::get('/inbox', [MessageController::class, 'userInbox']);
Route::get('/users/{id}/messages', [MessageController::class, 'userInbox']);

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
Route::get('/biz_search/{district}/{query?}', function($district, $query = null) {
    $controller = App::make(LegacyController::class);
    return App::call([$controller, 'biz_search'], ['district' => $district, 'query' => $query]);
});

// Static
Route::get('/privacy', fn() => view('static.privacy'));

// Blog
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog/{slug}', [BlogController::class, 'show']);