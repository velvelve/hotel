<?php

use App\Http\Controllers\Admin\LocationController as AdminLocationController;
use App\Http\Controllers\Admin\CityController as AdminCityController;
use App\Http\Controllers\Admin\CountryController as AdminCountryController;
use App\Http\Controllers\Admin\NotificationPreferenceController as AdminNotificationPreferenceController;
use App\Http\Controllers\Admin\ViewTypeController as AdminViewTypeController;
use App\Http\Controllers\Admin\BedTypeController as AdminBedTypeController;
use App\Http\Controllers\Admin\ImageController as AdminImageController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\RoomController as AdminRoomController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\RoomTypeController as AdminRoomTypeController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\PhoneController as AdminPhoneController;
use App\Http\Controllers\Admin\HotelController as AdminHotelController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SocialProvidersController;
use App\Http\Controllers\StaticPages\AboutUsController;
use App\Http\Controllers\StaticPages\ConferenceRoomsController;
use App\Http\Controllers\StaticPages\CosmeticProceduresController;
use App\Http\Controllers\StaticPages\FacialTherapyController;
use App\Http\Controllers\StaticPages\HotStonesController;
use App\Http\Controllers\StaticPages\LegalInfoController;
use App\Http\Controllers\StaticPages\MassageController;
use App\Http\Controllers\StaticPages\RentController;
use App\Http\Controllers\StaticPages\RestaurantsController;
use App\Http\Controllers\StaticPages\ServicesController;
use App\Http\Controllers\StaticPages\SpaController;
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

//Админка
Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], static function () {
    Route::group(['middleware' => 'admin.employee'], function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('index');
        Route::resource('/notification-preferences', AdminNotificationPreferenceController::class);
        Route::resource('/view-types', AdminViewTypeController::class);
        Route::resource('/bed-types', AdminBedTypeController::class);
        Route::resource('/images', AdminImageController::class);
        Route::resource('/bookings', AdminBookingController::class);
        Route::resource('/services', AdminServiceController::class);
        Route::resource('/reviews', AdminReviewController::class);
        Route::resource('/phones', AdminPhoneController::class);
    });
    Route::group(['middleware' => 'admin'], function () {
        Route::resource('/users', AdminUserController::class);
        Route::resource('/locations', AdminLocationController::class);
        Route::get('/locations/{country_id}/city', [AdminLocationController::class, 'city'])->name('location.city');
        Route::resource('/cities', AdminCityController::class);
        Route::resource('/countries', AdminCountryController::class);
        Route::resource('/rooms',  AdminRoomController::class);
        Route::get('/rooms/{hotel}/room-numbers',  [AdminRoomController::class, 'room_numbers'])->name('room.room-numbers');
        Route::resource('/room-types', AdminRoomTypeController::class)->parameters(['room-types' => 'roomType']);;
        Route::resource('/hotels',  AdminHotelController::class);
    });
});

//регистрация
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')
    ->name('register');
Route::post('/register', [RegisterController::class, 'create'])->middleware('guest');

//логин
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::get('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth', 'verified')->name('profile');
Route::post('/profile/{user}', [ProfileController::class, 'update'])->middleware('auth', 'verified')->name('profile.update');

//подтверждение почты
Route::get('/email-confirmation', [EmailVerificationController::class, 'redirect'])->middleware('auth')
    ->name('verification.notice');
Route::get('/email-confirmation/{id}/{hash}', [EmailVerificationController::class, 'confirmation'])->middleware(['auth', 'signed'])
    ->name('verification.verify');
Route::post('/email-confirmation', [EmailVerificationController::class, 'resend'])->middleware('auth')
    ->name('verification.send');

//авторизация через сторонние сервисы
Route::get('/{driver}/redirect', [SocialProvidersController::class, 'redirect'])->middleware('guest')
    ->name('social-providers.redirect');
Route::get('/{driver}/callback', [SocialProvidersController::class, 'callback'])->middleware('guest')
    ->name('social-providers.callback');

//восстановление пароля
Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->middleware('guest')
    ->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->middleware('guest')
    ->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'index'])->middleware('guest')
    ->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->middleware('guest')
    ->name('password.update');
Route::post('/change-password', [ChangePasswordController::class, 'changePassword'])
    ->name('password.change');

//поиск комнат
//результат поиска
Route::post('/search-rooms', [SearchController::class, 'searchRooms'])
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
Route::get('/bookings/price', [BookingController::class, 'pay_info'])
    ->name('bookings.pay_info');
Route::post('/bookings/pay', [BookingController::class, 'pay'])
    ->name('bookings.pay');
Route::get('/bookings/save', [BookingController::class, 'save'])
    ->name('bookings.save');

//номера
Route::get('/rooms-types', [RoomTypeController::class, 'index'])
    ->name('rooms.types');

//Правовая информация
Route::get('/legal-info', [LegalInfoController::class, 'index'])
    ->name('legal-info');

//О нас
Route::get('/about-us', [AboutUsController::class, 'index'])
    ->name('about-us');

//Рестораны
Route::get('/restaurants', [RestaurantsController::class, 'index'])
    ->name('restaurants');

//Спа
Route::get('/spa', [SpaController::class, 'index'])
    ->name('spa');

//Конференц-залы
Route::get('/conference-rooms', [ConferenceRoomsController::class, 'index'])
    ->name('conference-rooms');

//Аренда
Route::get('/rent', [RentController::class, 'index'])
    ->name('rent');

//Услуги
Route::get('/services', [ServicesController::class, 'index'])
    ->name('services');

//Массаж
Route::get('/massage', [MassageController::class, 'index'])
    ->name('massage');

//Горячие камни
Route::get('/hot-stones', [HotStonesController::class, 'index'])
    ->name('hot-stones');

//Терапия для лица
Route::get('/facial-therapy', [FacialTherapyController::class, 'index'])
    ->name('facial-therapy');

//Косметические процедуры
Route::get('/cosmetic-procedures', [CosmeticProceduresController::class, 'index'])
    ->name('cosmetic-procedures');
