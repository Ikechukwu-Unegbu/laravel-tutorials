<?php

use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\dashboard\PostController;
use App\Http\Controllers\InteractionController;
use App\Http\Controllers\PublicPagesController;
use App\Models\dashboard\Category;
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
Route::get('/dashboard/category/create', [CategoryController::class, 'create'])
->name('category.create');

Route::post('/dashboard/category/create', [CategoryController::class, 'store'])
->name('category.store');

Route::get('dashboard/category', [CategoryController::class, 'index'])
->name('category.index');

Route::post('/dashboard/category/update/{categoryid}', [CategoryController::class, 'update'])
->name('category.update');


//POST ROUTES
Route::get('/dashboard/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/dashboard/post/create', [PostController::class, 'store'])->name('post.store');



Route::get('/', [ PublicPagesController::class, 'posts'])->name('posts.public');
Route::get('/post/{slug}', [PostController::class, 'show'])->name('posts.show');
Route::post('/comment', [InteractionController::class, 'storeComment'])->name('comment')->middleware(['auth']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth']);



require __DIR__.'/auth.php';
