<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/contact', [HomeController::class, 'contact']);

Route::get('/about', [HomeController::class, 'about']);
Route::get('/service', [HomeController::class, 'service']);

Route::get('/lodgment', [HomeController::class, 'lodgment']);

require __DIR__ . '/auth.php';
