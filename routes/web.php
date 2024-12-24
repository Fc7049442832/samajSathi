<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;

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

Route::get('/', function () {
    return view('index');
})->name('home');

Route::post('/register',[HomeController::class, 'ContactStore'])->name('Basic_Contact');
Route::post('/Userlogin', [HomeController::class, 'login'])->name('login.submit');
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
// Route::get('/', function () {
//     return view('welcome');
// });
