<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Friend\FriendController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Post\CommentController;
  
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
Route::get('friend-page/{id}', [FriendController::class, 'show'])->name('friend.page');

//Post & comment
Route::get('post', [PostController::class, 'index'])->name('post'); 
Route::post('post-store', [PostController::class, 'store'])->name('posts.store'); 
Route::get('post-create', [PostController::class, 'create'])->name('posts.create');
Route::get('post-show', [PostController::class, 'show'])->name('posts.show');
Route::get('post-edit/{id}', [PostController::class, 'edit'])->name('posts.post_edit');
Route::post('post-update', [PostController::class, 'update'])->name('posts.update'); 
Route::post('post-dele', [PostController::class, 'dele'])->name('posts.dele'); 
Route::get('post-show-friend', [PostController::class, 'show_friend'])->name('posts.show_friend');

Route::get('test', [PostController::class, 'test'])->name('test'); 

Route::post('comment', [CommentController::class, 'store'])->name('comments.store'); 