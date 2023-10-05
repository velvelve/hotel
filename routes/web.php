<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

//поиск комнат
//результат поиска
Route::post('/search-rooms', [SearchController::class, 'index'])
    ->name('search.rooms');

//Контакты
Route::get('/contacts', [ContactsController::class, 'index'])
    ->name('contacts.index');
Route::post('/contacts/send-message', [ContactsController::class, 'sendMessage'])
    ->name('contacts.sendMessage');

//Бронирование
Route::get('/bookings/create/{room_id}', [BookingController::class, 'create'])
    ->name('bookings.create');
Route::post('/bookings', [BookingController::class, 'store'])
    ->name('bookings.store');