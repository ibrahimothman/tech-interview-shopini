<?php

use App\Http\Controllers\SubscriberController;
use App\Models\Subscriber;
use GuzzleHttp\Middleware;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/subscribe', [SubscriberController::class, 'create'])->name('subscribe.get');
    Route::post('/subscribe', [SubscriberController::class, 'store'])->name('subscribe.post');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::prefix('subscribers')->group(function () {
        Route::post('/send_email', [SubscriberController::class, 'sendEmail'])
            ->name('subscribers.send_email');

    });
});

Auth::routes();

