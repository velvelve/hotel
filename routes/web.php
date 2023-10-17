<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomTypeController;
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

//регистрация
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')
    ->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

//логин
Route::get('/login', [LoginController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest');
Route::get('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('/profile', fn () => 'Профиль')->middleware('auth', 'verified')->name('profile');

//подтверждение почты
Route::get('/email-confirmation', [EmailVerificationController::class, 'redirect'])->middleware('auth')
    ->name('verification.notice');
Route::get('/email-confirmation/{id}/{hash}', [EmailVerificationController::class, 'confirmation'])->middleware(['auth', 'signed'])
    ->name('verification.verify');
Route::post('/email-confirmation', [EmailVerificationController::class, 'resend'])->middleware('auth')
    ->name('verification.send');

//восстановление пароля
Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->middleware('guest')
    ->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->middleware('guest')
    ->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'index'])->middleware('guest')
    ->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->middleware('guest')
    ->name('password.update');

//поиск комнат
//результат поиска
Route::get('/search-rooms', [SearchController::class, 'index'])
  ->name('search.rooms');
Route::post('/search-rooms', [SearchController::class, 'index'])
  ->name('search.rooms');

//Контакты
Route::get('/contacts', [ContactsController::class, 'index'])
    ->name('contacts.index');
Route::post('/contacts/send-message', [ContactsController::class, 'sendMessage'])
    ->name('contacts.sendMessage');

//Бронирование
Route::get('/bookings/create/{room_id}', [BookingController::class, 'create'])
    ->where('room_id', '\w+')
    ->name('bookings.create');
Route::post('/bookings', [BookingController::class, 'store'])
    ->name('bookings.store');
Route::get('/bookings/show', [BookingController::class, 'show'])
    ->name('bookings.show');
Route::post('/bookings/price', [BookingController::class, 'price'])
  ->name('bookings.price');
Route::post('/bookings/pay', [BookingController::class, 'pay'])
  ->name('bookings.pay');
Route::get('/bookings/save', [BookingController::class, 'save'])
    ->name('bookings.save');

//номера
Route::get('/rooms-types', [RoomTypeController::class, 'index'])
    ->name('rooms.types');
Route::get('/rooms-types/{room_type}', [RoomTypeController::class, 'show'])
    ->name('rooms.show');