<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\WelcomeController;
use PhpParser\Node\Name;


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
Route::get('/', function() {
    return view('auth.login');
});


Route::resource('clients', ClientController::class)->middleware('auth');
Auth::routes(['register'=>true, 'reset'=>true]);

Route::get('/home', [ClientController::class, 'index'])->name('home');
Route::get('/welcome', [WelcomeController::class, 'index']);

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', [ClientController::class, 'index'])->name('home');
});
