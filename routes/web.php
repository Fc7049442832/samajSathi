<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\GoogleController; // Import GoogleController
use App\Http\Controllers\GoogleSettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PartnerQueryController;
use App\Http\Controllers\MatchingController;
use App\Http\Controllers\DataSearchingController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MoreController;

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
Route::view('/demo','game/demo');
Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/browse-partner',[HomeController::class, 'browsePartner'])->name('Browse_Partner');
Route::view('/about', 'about')->name('about');
Route::post('/feedback-submit', [HomeController::class, 'feedbackStore'])->name('feedback.submit');
Route::view('/partner-program','partner')->name('partner-program');

Route::get('/more-setting', [MoreController::class,'home'] )->name('more-setting');


Route::get('/contact',[ContactController::class, 'show'])->name('contact');
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');


Route::get('/notification', function () {
    return view('noticedemo');
})->middleware('auth');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Data searching Routes
Route::post('/search-partner',[DataSearchingController::class, 'searchPartner'])->name('searchPartner');

// user Auth Routes
Route::post('/register',[HomeController::class, 'ContactStore'])->name('Basic_Contact');
Route::post('/Userlogin', [HomeController::class, 'login'])->name('login.submit');
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
Route::any('/password/email', [HomeController::class, 'ResetPassword'])->name('ResetPassword');

// wallet Routes
Route::middleware(['auth'])->group(function () {
    Route::view('/wallet','wallet')->name('wallet');
    Route::post('/wallet/deposit', [WalletController::class, 'deposit'])->name('wallet.deposit');
    Route::post('/wallet/withdraw', [WalletController::class, 'withdraw'])->name('wallet.withdraw');
    Route::get('/wallet/transactions', [WalletController::class, 'transactions']);
});

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/load-more-blogs', [BlogController::class, 'fetchBlogs']);
Route::get('/blogs/filter', [BlogController::class, 'filterBlogs'])->name('blog.filter');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');
Route::post('/blog/{id}/like', [BlogController::class, 'like'])->name('blog.like');
Route::post('/comment', [CommentController::class, 'store'])->name('comment.store')->middleware('auth');
Route::get('/blog/load-more', [BlogController::class, 'loadMore']);


Route::post('/submit-email', [BlogController::class, 'submitEmail'])->name('submit.email');

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
Route::get('/show_profile/{profileId}', [PartnerQueryController::class, 'showProfile'])->name('show-profile');
Route::get('/partner_contact', [PartnerQueryController::class, 'partnerContact'])->name('partner-contact');
Route::post('/partner_query/{userId}/basic_requeriment',[PartnerQueryController::class,'updateBasicRequeriment'])->name('basic-requeriment');
Route::post('/partner_query/{userId}/style_requeriment',[PartnerQueryController::class,'updateLifeStyleRequeriment'])->name('life-style-requeriment');
Route::post('/partner_query/{userId}/social_requeriment',[PartnerQueryController::class,'updateSocialRequeriment'])->name('social-requeriment');

// User Activity
Route::get('/send-data', [PdfController::class, 'generatePdf'])->name('pdf');
Route::post('/profile/like/{post}', [HomeController::class, 'toggleLike'])->name('like.toggle');
Route::get('/profile/{id}/share', [HomeController::class, 'share'])->name('profile.share');
Route::get('/profile/{profileId}/save',[HomeController::class, 'save'])->name('profile.save');
Route::get('/saved/Profile',[HomeController::class, 'savedProfile'])->name('saved.profile');
Route::post('/saved/Profile/{delete}',[HomeController::class, 'savedProfileDelete'])->name('saved.profile.delete');

// Partner Matching Routes
Route::get('/partner_matching',[MatchingController::class, 'index'])->name('matching');
Route::post('/partner_matching',[MatchingController::class,'index']);

// Notification Routes
Route::get('/notifications',[NotificationController::class, 'index'])->name('notifications');
Route::get('/notifications/mark-read', [NotificationController::class, 'markAsRead'])->name('mark.read');

// Chating Routes
// Route::get('/partner/chate/{id}',[ChatController::class, 'index'])->name('chate');
Route::get('/partner-contact/{id}', [ChatController::class, 'partnerContact'])->name('partner.contact');
Route::post('/send-message', [ChatController::class, 'sendMessage'])->name('send.message');

// Admin page Routes 
Route::get('/admin',[AdminController::class, 'index'])->name('admin.dashboard');
// Notice Routes
Route::get('/notices',[NoticeController::class, 'index'])->name('notice');
Route::get('/admin/notices/create', [NoticeController::class, 'index'])->name('notice.create');
Route::post('/notices/store', [NoticeController::class, 'store'])->name('notice.store');

Route::get('/notices/{id}/edit', [NoticeController::class, 'edit'])->name('admin.notices.edit');
Route::put('/notices/{id}', [NoticeController::class, 'update'])->name('admin.notices.update');
Route::delete('/notices/{id}', [NoticeController::class, 'destroy'])->name('admin.notices.destroy');

// Manage Blog Routes
Route::view('/admin/create-blog', 'admin/create_blog')->name('newblog');
Route::get('/admin/blog',[BlogController::class, 'manage_blog'])->name('admin.blog');
Route::post('/admin/blog/store', [BlogController::class, 'blog_store'])->name('admin.blog.store');
Route::get('/admin/blog/{id}/edit', [BlogController::class, 'blog_edit'])->name('admin.blog.edit');
Route::put('/admin/blog/{id}', [BlogController::class, 'blog_update'])->name('admin.blog.update');
Route::delete('/admin/blog/{id}', [BlogController::class, 'blog_destroy'])->name('admin.blog.delete');

// Mail Send Routes
Route::get('/admin-mail', [MailController::class, 'index'])->name('admin.mail');
Route::get('/admin/write-mail',[MailController::class,'writeNewMail'])->name('write.new.mail');
Route::post('/mail/send', [MailController::class, 'send'])->name('mail.send');



// Admin User Routes
Route::get('/admin-user',[AdminController::class, 'user'])->name('admin.user');
Route::get('/search-users', [AdminController::class, 'search'])->name('search.users');
Route::get('/admin-user-profile/{id}',[AdminController::class, 'userProfile'])->name('admin.userProfile');
Route::post('/profile/update-physical/{custom_id}',[AdminController::class, 'updatePhysical'])->name('profile.updatePhysical');
Route::post('/user/toggle-verified/{id}', [AdminController::class, 'toggleVerified'])->name('user.toggleVerified');
Route::post('/profile/update-family/{id}', [AdminController::class, 'updateFamily'])->name('profile.updateFamily');
Route::post('/profile/update-education/{custom_id}', [AdminController::class, 'updateEducation'])->name('profile.updateEducation');
Route::post('/admin/update-location/{custom_id}', [AdminController::class, 'updateLocation'])->name('admin.updateLocation');





// Admin user Contact data management 
Route::get('admin/user-contact-admin', [AdminController::class, 'userContactAdmin'])->name('userContactAdmin');
Route::post('/admin/reply-mail', [AdminController::class, 'sendReply'])->name('admin.replyMail');



// Admin Setting Page Routes
Route::get('/admin/setting', [SettingController::class, 'settingPage'])->name('admin.setting');
Route::post('/carousel/store', [SettingController::class, 'storeImages'])->name('carousel.store');
Route::put('/carousel/update/{id}', [SettingController::class, 'update'])->name('carousel.update');
Route::delete('/carousel/destroy/{id}', [SettingController::class, 'destroy'])->name('carousel.destroy');

Route::get('/admin/google-settings/reset', [GoogleSettingController::class, 'reset'])->name('admin.google.settings.reset');
Route::get('/admin/google-settings', [GoogleSettingController::class, 'index'])->name('admin.google.settings');
Route::post('/admin/google-settings/update', [GoogleSettingController::class, 'update'])->name('admin.google.settings.update');