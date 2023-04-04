<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\LodgmentController;

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
Route::get('/requests', [LodgmentController::class, 'requests']);

// Reservation routes
Route::get('/reservations', [LodgmentController::class, 'reservations']);

// Params routes
Route::get('/cities', [LodgmentController::class, 'cities']);
Route::get('/types', [LodgmentController::class, 'types']);


// --- End dashboard routes


// Website routes

Route::get('/contact', [HomeController::class, 'contact']);

Route::get('/about', [HomeController::class, 'about']);
Route::get('/service', [HomeController::class, 'service']);

Route::get('/lodgment', [HomeController::class, 'lodgment']);
Route::get('/lodgment/{slug}', [HomeController::class, 'details']);

require __DIR__ . '/auth.php';
