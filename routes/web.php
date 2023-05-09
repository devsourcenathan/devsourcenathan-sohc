<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LessorController;
use App\Http\Controllers\LodgmentController;
use App\Http\Controllers\ParamController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\UserController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

// ---  Start dashboard route

// Configs routes
Route::get('/configs', [ConfigController::class, 'index'])->middleware('auth');
Route::post('/configs/store', [ConfigController::class, 'store'])->middleware('auth');

// Lodgment routes
Route::get('/lodgments', [LodgmentController::class, 'index'])->middleware('auth');
Route::get('/lodgments/create', [LodgmentController::class, 'create'])->middleware('auth');
Route::get('/lodgments/details/{lodgment:slug}', [LodgmentController::class, 'show'])->middleware('auth');
Route::get('/lodgments/details/publish/{id}', [LodgmentController::class, 'publish'])->middleware('auth');

Route::get('/lodgments/details/unpublish/{lodgment:slug}', [LodgmentController::class, 'unpublish'])->middleware('auth');
Route::get('/lodgments/details/reject/{lodgment:slug}', [LodgmentController::class, 'reject'])->middleware('auth');


Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/customers', [UserController::class, 'customers']);
    Route::get('/customers/details/{id}', [UserController::class, 'customer_details']);


    Route::get('/lessors', [UserController::class, 'lessors']);
    Route::get('/lessors/details/{id}', [UserController::class, 'lessor_details']);


    Route::get('/users', [UserController::class, 'users']);
    Route::get('/users/details/{id}', [UserController::class, 'user_details']);



    Route::get('/reservations', [CustomerController::class, 'reservations']);
    Route::get('/my_lodgments', [CustomerController::class, 'my_lodgments']);
    Route::get('/lodgments/buy/{id}', [LodgmentController::class, 'buy'])->middleware('auth');
    Route::post('/lodgments/buy', [LodgmentController::class, 'confirm_buy'])->middleware('auth');
    Route::post('/lodgments/confirm', [LodgmentController::class, 'confirm'])->middleware('auth');


    Route::get('/activities', [CustomerController::class, 'activities']);



    Route::get('/profile', [UserController::class, 'profile']);


    Route::get('/city/hide_city/{id}', [ParamController::class, 'hide_city']);
    Route::get('/city/show_city/{id}', [ParamController::class, 'show_city']);

    Route::get('/town/hide_town/{id}', [ParamController::class, 'hide_town']);
    Route::get('/town/show_town/{id}', [ParamController::class, 'show_town']);

    Route::get('/type/hide_type/{id}', [ParamController::class, 'hide_type']);
    Route::get('/type/show_type/{id}', [ParamController::class, 'show_type']);
});


Route::post('/lodgments/store', [LodgmentController::class, 'store']);

Route::get('/requests', [LodgmentController::class, 'requests']);

// Reservation routes
Route::get('/reservations', [LodgmentController::class, 'reservations']);
Route::get('/reservations/confirm/{id}', [PaymentController::class, 'confirmed']);
Route::get('/reservations/reject/{id}', [PaymentController::class, 'reject']);

Route::get('/payments/validate/{id}', [LodgmentController::class, 'validate_payment']);
Route::get('/payments/reject/{id}', [LodgmentController::class, 'reject_payment']);
Route::get('/payments', [LodgmentController::class, 'payments']);
// Params routes
Route::get('/cities', [ParamController::class, 'cities'])->middleware('auth');
Route::get('/types', [ParamController::class, 'types'])->middleware('auth');
Route::get('/towns', [ParamController::class, 'towns'])->middleware('auth');

Route::get('/cities/store', [ParamController::class, 'create_city'])->middleware('auth');
Route::get('/types/store', [ParamController::class, 'create_type'])->middleware('auth');
Route::get('/towns/store', [ParamController::class, 'create_town'])->middleware('auth');

Route::post('/cities/store', [ParamController::class, 'store_city'])->middleware('auth');
Route::post('/types/store', [ParamController::class, 'store_type'])->middleware('auth');
Route::post('/towns/store', [ParamController::class, 'store_town'])->middleware('auth');

// Lessor Routes

Route::prefix('lessor')->middleware('auth')->group(function () {
    Route::get('/requests', [LessorController::class, 'requests'])->name('requests');
    Route::get('/lodgment', [LessorController::class, 'lodgment'])->name('lodgment');
    Route::get('/propose', [LessorController::class, 'propose'])->name('propose');
    Route::get('/activities', [LessorController::class, 'activities'])->name('activities');
    Route::post('/propose/store', [LessorController::class, 'store']);
    Route::get('/propose/details/{slug}/{id}', [LessorController::class, 'details']);
    Route::get('/propose/publish/{slug}/{id}', [LessorController::class, 'publish']);
    Route::get('/propose/unpublish/{slug}/{id}', [LessorController::class, 'unpublish']);
    Route::get('/propose/cancel/{slug}/{id}', [LessorController::class, 'cancel']);
});


// --- End dashboard routes


// Website routes

Route::get('/contact', [HomeController::class, 'contact']);

Route::get('/about', [HomeController::class, 'about']);
Route::get('/service', [HomeController::class, 'service']);

Route::get('/lodgment', [HomeController::class, 'lodgment']);
Route::get('/search', [HomeController::class, 'search']);

Route::get('/booking/{id}', [LodgmentController::class, 'booking'])->middleware('auth');


Route::get('/lodgment/{slug}/{id}', [HomeController::class, 'details']);

Route::post('/payment/initialize', [PaymentController::class, 'initialize']);
Route::post('/payment/validate', [PaymentController::class, 'confirm']);

Route::get('send-email', [SendEmailController::class, 'index']);

Route::get('conditions', [HomeController::class, 'conditions']);
Route::get('policy', [HomeController::class, 'policy']);




require __DIR__ . '/auth.php';
