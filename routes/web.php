<?php

use App\Http\Controllers\CategoryBlogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\CategoryBlog;
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

Route::get('/', function () {
    return view('welcome');
});
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::resources([
    'user' => UserController::class,
]);
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');

Route::resources([
    'CategoryBlog' => CategoryBlogController::class,
]);
Route::get('/CategoryBlog', [App\Http\Controllers\CategoryBlogController::class, 'index'])->name('CategoryBlog');

Route::resources([
    'ArticleBlog' => ArticleBlogController::class,
]);
Route::get('/ArticleBlog', [App\Http\Controllers\ArticleBlogController::class, 'index'])->name('ArticleBlog');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
