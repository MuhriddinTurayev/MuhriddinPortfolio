<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;

use App\Http\Controllers\CommentController;
use App\Http\Controllers\RepeatController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\RepeatController::class,'main'])->name('main');
Route::get('about', [\App\Http\Controllers\RepeatController::class,'about'])->name('about');
Route::get('service', [\App\Http\Controllers\RepeatController::class,'service'])->name('service');
Route::get('project', [\App\Http\Controllers\RepeatController::class,'project'])->name('project');
Route::get('blog', [\App\Http\Controllers\RepeatController::class,'blog'])->name('blog');
Route::get('single', [\App\Http\Controllers\RepeatController::class,'single'])->name('single');
Route::get('contact', [\App\Http\Controllers\RepeatController::class,'contact'])->name('contact');

Route::get('login',[AuthController::class, 'login'])->name('login');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register',[AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'register_store'])->name('register.store');

Route::resource('posts', PostController::class);

Route::resources([
    'posts' => PostController::class,
    'comments' => CommentController::class,
    'users' => UserController::class,
]);



// Route::get('posts', [\App\Http\Controllers\RepeatController::class,'index'])->name('posts.index');
// Route::get('posts/{post}', [\App\Http\Controllers\RepeatController::class,'show'])->name('posts.show');
// Route::get('posts/create', [\App\Http\Controllers\RepeatController::class,'create'])->name('posts.create');
// Route::post('posts/create', [\App\Http\Controllers\RepeatController::class,'store'])->name('posts.store');
// Route::get('posts/{post}/edit', [\App\Http\Controllers\RepeatController::class,'edit'])->name('posts.edit');
// Route::put('posts/{post}/edit', [\App\Http\Controllers\RepeatController::class,'update'])->name('posts.update');
// Route::delete('posts/{post}/delete', [\App\Http\Controllers\RepeatController::class,'delete'])->name('posts.delete');



