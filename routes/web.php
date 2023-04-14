<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\LessorController;
use App\Http\Controllers\LodgmentController;
use App\Http\Controllers\ParamController;

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

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['auth'])->name('dashboard');

// ---  Start dashboard route

// Configs routes
Route::get('/configs', [ConfigController::class, 'index']);
Route::post('/configs/store', [ConfigController::class, 'store']);

// Lodgment routes
Route::get('/lodgments', [LodgmentController::class, 'index']);
Route::get('/lodgments/create', [LodgmentController::class, 'create']);
Route::get('/lodgments/details/{lodgment:slug}', [LodgmentController::class, 'show']);
Route::get('/lodgments/details/publish/{lodgment:slug}', [LodgmentController::class, 'publish']);
Route::get('/lodgments/details/unpublish/{lodgment:slug}', [LodgmentController::class, 'unpublish']);



Route::post('/lodgments/store', [LodgmentController::class, 'store']);

Route::get('/requests', [LodgmentController::class, 'requests']);

// Reservation routes
Route::get('/reservations', [LodgmentController::class, 'reservations']);

// Params routes
Route::get('/cities', [ParamController::class, 'cities']);
Route::get('/types', [ParamController::class, 'types']);
Route::get('/towns', [ParamController::class, 'towns']);

Route::get('/cities/store', [ParamController::class, 'create_city']);
Route::get('/types/store', [ParamController::class, 'create_type']);
Route::get('/towns/store', [ParamController::class, 'create_town']);

Route::post('/cities/store', [ParamController::class, 'store_city']);
Route::post('/types/store', [ParamController::class, 'store_type']);
Route::post('/towns/store', [ParamController::class, 'store_town']);

// Lessor Routes

Route::prefix('lessor')->group(function () {
    Route::get('/requests', [LessorController::class, 'requests'])->name('requests');
    Route::get('/lodgment', [LessorController::class, 'lodgment'])->name('lodgment');
});


// --- End dashboard routes


// Website routes

Route::get('/contact', [HomeController::class, 'contact']);

Route::get('/about', [HomeController::class, 'about']);
Route::get('/service', [HomeController::class, 'service']);

Route::get('/lodgment', [HomeController::class, 'lodgment']);
Route::get('/lodgment/{slug}/{id}', [HomeController::class, 'details']);

require __DIR__ . '/auth.php';
