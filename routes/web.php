<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('anasayfa');
})->name('anasayfa');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Password Reset
Route::get('/password.reset', [App\Http\Controllers\Auth\LoginController::class, 'passwordreset'])->name('password.reset');
Route::post('/passwordconfirmed', [App\Http\Controllers\Auth\LoginController::class, 'passwordconfirmed'])->name('passwordconfirmed');

//Musteri
Route::get('/musteri.ekle', [App\Http\Controllers\MusteriController::class, 'ekle'])->middleware('auth')->name('musteri.ekle');
Route::post('/musteri.kaydet', [App\Http\Controllers\MusteriController::class, 'kaydet'])->name('musteri.kaydet');
Route::get('/musteri.iptal', [App\Http\Controllers\MusteriController::class, 'iptal'])->middleware('auth')->name('musteri.iptal');
Route::get('/musteri.update/{id}', [App\Http\Controllers\MusteriController::class, 'update'])->middleware('auth')->name('musteri.update');
Route::post('/musteri.saveUpdate/{id}', [App\Http\Controllers\MusteriController::class, 'saveUpdate'])->name('musteri.saveUpdate');
Route::get('/musteri.delete/{id}', [App\Http\Controllers\MusteriController::class, 'delete'])->middleware('auth')->name('musteri.delete');
Route::get('/musteri.search', [App\Http\Controllers\MusteriController::class, 'search'])->middleware('auth')->name('musteri.search');
Route::get('/musteri.showCustomer/{id}', [App\Http\Controllers\MusteriController::class, 'showCustomer'])->middleware('auth')->name('musteri.showCustomer');
Route::get('/musteri.showArchive', [App\Http\Controllers\MusteriController::class, 'showArchive'])->middleware('auth')->name('musteri.showArchive');

//In progress|| Problem with the version of php and maatwebsite/excell
//Route::get('/musteri.downloadCustomer', [App\Http\Controllers\MusteriController::class, 'downloadCustomer'])->middleware('auth')->name('downloadCustomer');

Route::get('/musteri.downloadCustomer', [App\Http\Controllers\MusteriController::class, 'downloadCustomer'])->middleware('auth')->name('downloadCustomer');


//Kullanici 
Route::get('/kullanici.ekle', [App\Http\Controllers\UserController::class, 'kullaniciEkle'])->middleware('auth')->name('kullanici.ekle');
Route::post('kullanici.kaydet', [App\Http\Controllers\UserController::class, 'kullaniciKaydet'])->name('kullanici.kaydet');
Route::get('/iptal', [App\Http\Controllers\UserController::class, 'iptal'])->name('iptal')->middleware('auth');
Route::get('/kullanici.update/{id}', [App\Http\Controllers\UserController::class, 'update'])->middleware('auth')->name('kullanici.update');
Route::post('/kullanici.saveUpdate/{id}', [App\Http\Controllers\UserController::class, 'saveUpdate'])->name('kullanici.saveUpdate');
Route::get('/kullanici.delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->middleware('auth')->name('kullanici.delete');



//profile
Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->middleware('auth')->name('profile');
Route::post('/profile.updateImage', [App\Http\Controllers\UserController::class, 'updateProfileImage'])->name('updateProfileImage');


//Google Login
Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

//Facebook Login
Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);
