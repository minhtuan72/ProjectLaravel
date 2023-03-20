<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Friend\FriendController;
  
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
    return view('auth.login');
});
Route::get('/test', function () {
    return view('test');
});
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']) -> name('doash'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

       //trang profile                    //phuong thuc index   //trang profile
Route::get('profile', [ProfileController::class, 'index'])->name('profile'); 
Route::get('profile_edit', [ProfileController::class, 'edit'])->name('profile_edit'); 
Route::post('profile-update', [ProfileController::class, 'update'])->name('profile.update');

//friend  //chu y: post phai co  @csrf
Route::get('friend', [FriendController::class, 'index'])->name('friend'); 
Route::post('friend-apply', [FriendController::class, 'apply'])->name('friend.apply');
Route::post('friend-dele', [FriendController::class, 'dele'])->name('friend.dele');
Route::post('friend-add', [FriendController::class, 'add'])->name('friend.add');
Route::get('friend-list', [FriendController::class, 'list'])->name('friend.list');