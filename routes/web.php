<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\LandLordController;
use App\Http\Controllers\Admin\RegisterLandLordController;
use App\Http\Controllers\Auth\Admin\AdminLoginController;
use App\Http\Controllers\Auth\Admin\AdminForgotPasswordController;
use App\Http\Controllers\Auth\Admin\AdminResetPasswordController;

use App\Http\Controllers\Auth\LandLord\LandLordLoginController;
use App\Http\Controllers\Auth\LandLord\LandLordForgotPasswordController;
use App\Http\Controllers\Auth\LandLord\LandLordResetPasswordController;
use App\Http\Controllers\Auth\LandLord\LandLordRegisterController;
use App\Http\Controllers\Landlord\LandLordDashboardController;

use App\Http\Controllers\LandingPageController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LandingPageController::class, 'index'])->name('landing-page');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * Admin Route
 */
Route::group(['prefix' => 'admin'] , function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::post('landlord/datasource', [LandLordController::class, 'landLordDataSource'])->name('admin.landlord.datasource');
    Route::get('manage/landlord', [LandLordController::class, 'index'])->name('admin.manage.landlord');
    Route::get('edit/{id}/landlord', [LandLordController::class, 'edit'])->name('admin.edit.landlord');
    Route::patch('update/landlord/{id}', [LandLordController::class, 'update'])->name('admin.update.landlord');
    Route::get('landlord/{id}', [LandLordController::class, 'show'])->name('admin.show.landlord');
    Route::get('change-password/landlord/{id}', [LandLordController::class, 'changePassword'])->name('admin.change-password.landlord');
    Route::patch('change-password/landlord/{id}', [LandLordController::class, 'upadatePassword']);
    Route::delete('delete/landlord/{id}', [LandLordController::class, 'destroy'])->name('admin.destroy.landlord');

    Route::get('register/landlord', [RegisterLandLordController::class, 'showLandlordRegistrationForm'])->name('admin.register.landlord');
    Route::post('register/landlord', [RegisterLandLordController::class, 'register']);
    //Login
    Route::get('login', [AdminLoginController::class, 'login'])->name('admin.auth.login');
    Route::post('login', [AdminLoginController::class, 'loginAdmin'])->name('admin.auth.loginAdmin');
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.auth.logout');

    // //Password Reset Routes
    Route::post('password/email', [AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
    Route::get('password/reset', [AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
    Route::post('password/reset',[AdminResetPasswordController::class, 'reset']);
    Route::get('password/reset/{token}', [AdminResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
});

/**
 * Landlord Route
 */
Route::group(['prefix' => 'landlord'] , function () {
    Route::get('dashboard', [LandLordDashboardController::class, 'index'])->name('landlord.dashboard');
    
    //Register
    Route::get('register', [LandLordRegisterController::class, 'showRegistrationForm'])->name('landlord.auth.register');
    Route::post('register', [LandLordRegisterController::class, 'register']);

    //Login
    Route::get('login', [LandLordLoginController::class, 'login'])->name('landlord.auth.login');
    Route::post('login', [LandLordLoginController::class, 'loginLandlord'])->name('landlord.auth.loginLandlord');
    Route::post('logout', [LandLordLoginController::class, 'logout'])->name('landlord.auth.logout');

    // //Password Reset Routes
    Route::post('password/email', [LandLordForgotPasswordController::class, 'sendResetLinkEmail'])->name('landlord.password.email');
    Route::get('password/reset', [LandLordForgotPasswordController::class, 'showLinkRequestForm'])->name('landlord.password.request');
    Route::post('password/reset',[LandLordResetPasswordController::class, 'reset']);
    Route::get('password/reset/{token}', [LandLordResetPasswordController::class, 'showResetForm'])->name('landlord.password.reset');
});
