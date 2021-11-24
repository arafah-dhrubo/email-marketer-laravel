<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DeliveryController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/send-email/{id}', [DeliveryController::class, 'index'])->name('send-email');

Route::get('/send/{eid}/{cid}', [DeliveryController::class, 'send'])->name('send');

Route::post('/add-email', [CollectionController::class, 'store'])->name('add-email');

Route::post('/make-email', [EmailController::class, 'store'])->name('make-email');

Auth::routes();

