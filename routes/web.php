<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DeliveryController;
use App\Models\Collection;

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


Route::get('/', [HomeController::class, 'addresses'])->name('addresses');

Route::get('/emails',[HomeController::class, 'emails'])->name('emails');

Route::get('/send-email/{id}', [DeliveryController::class, 'index'])->name('send-email');

Route::get('/show-email/{id}', [EmailController::class, 'show'])->name('show-email');

Route::get('/edit-email/{id}', [EmailController::class, 'edit'])->name('edit-email');

Route::post('/update-email/{id}', [EmailController::class, 'update'])->name('update-email');

Route::get('/delete-email/{id}', [EmailController::class, 'delete'])->name('delete-email');

Route::post('/send', [DeliveryController::class, 'send'])->name('send');

Route::post('/add-email', [CollectionController::class, 'store'])->name('add-email');

Route::get('/delete-address/{id}', [CollectionController::class, 'delete'])->name('delete-address');

Route::get('/edit-address/{id}', [CollectionController::class, 'edit'])->name('edit-address');

Route::post('/update-address/{id}', [CollectionController::class, 'update'])->name('update-address');

Route::post('/make-email', [EmailController::class, 'store'])->name('make-email');

Auth::routes();

