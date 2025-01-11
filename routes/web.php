<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PartnerQueryController;
use App\Http\Controllers\MatchingController;
use App\Http\Controllers\DataSearchingController;
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

// Base Data Routes 
Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/browse-partner',[HomeController::class, 'browsePartner'])->name('Browse_Partner');

// Data searching Routes
Route::post('/search-partner',[DataSearchingController::class, 'searchPartner'])->name('searchPartner');


// user Auth Routes
Route::post('/register',[HomeController::class, 'ContactStore'])->name('Basic_Contact');
Route::post('/Userlogin', [HomeController::class, 'login'])->name('login.submit');
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');

// Profile page routes
Route::get('/profile',[ProfileController::class, 'index'])->name('profile');
Route::post('/profile',[ProfileController::class, 'userImageStore'])->name('profile.update');
Route::post('/update/about_me/{userId}',[ProfileController::class, 'updateAboutMe'])->name('update.about_me');
Route::post('/user-details/{userId}/update-basic-info', [ProfileController::class, 'updateBasicInfo'])->name('update-basic-info');
Route::post('/user-details/{userId}/update-life-style', [ProfileController::class, 'updateLifeStyle'])->name('update-life-style');
Route::post('/user-details/{userId}/update-religious-bg', [ProfileController::class, 'updateReligious'])->name('update-religious-bg');
Route::post('/user-details/{userId}/update-family-info', [ProfileController::class, 'updateFamilyInfo'])->name('update-family-info');
Route::post('/user-details/{userId}/update-education', [ProfileController::class, 'updateEducation'])->name('update-education');
Route::post('/user-details/{userId}/update-address', [ProfileController::class, 'updateAddress'])->name('update-address');

Route::post('/image-delete/delete',[ProfileController::class, 'userImageDelete'])->name('delete-image');

// Partner_Query routes
Route::get('/partner_query',[PartnerQueryController::class, 'index'])->name('partner_query');
Route::post('/partner_query/{userId}/basic_requeriment',[PartnerQueryController::class,'updateBasicRequeriment'])->name('basic-requeriment');
Route::post('/partner_query/{userId}/style_requeriment',[PartnerQueryController::class,'updateLifeStyleRequeriment'])->name('life-style-requeriment');
Route::post('/partner_query/{userId}/social_requeriment',[PartnerQueryController::class,'updateSocialRequeriment'])->name('social-requeriment');

// Partner Matching Routes
Route::get('/partner_matching',[MatchingController::class, 'index'])->name('matching');

// Route::view('demo2','Demo')->name('demo');