<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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


Route::get('/profile',[ProfileController::class, 'index'])->name('profile');
Route::post('/update/about_me/{userId}',[ProfileController::class, 'updateAboutMe'])->name('update.about_me');

Route::post('/user-details/{userId}/update-basic-info', [ProfileController::class, 'updateBasicInfo'])->name('update-basic-info');
Route::post('/user-details/{userId}/update-life-style', [ProfileController::class, 'updateLifeStyle'])->name('update-life-style');
Route::post('/user-details/{userId}/update-religious-bg', [ProfileController::class, 'updateReligious'])->name('update-religious-bg');
Route::post('/user-details/{userId}/update-family-info', [ProfileController::class, 'updateFamilyInfo'])->name('update-family-info');
Route::post('/user-details/{userId}/update-education', [ProfileController::class, 'updateEducation'])->name('update-education');
Route::post('/user-details/{userId}/update-address', [ProfileController::class, 'updateAddress'])->name('update-address');

Route::view('demo','demo')->name('demo');
