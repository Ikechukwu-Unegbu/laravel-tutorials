<?php

use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\dashboard\PostController;
use App\Http\Controllers\InteractionController;
use App\Http\Controllers\PublicPagesController;
use App\Http\Controllers\SearchController;
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
->name('category.create')->middleware(['auth']);

Route::post('/dashboard/category/create', [CategoryController::class, 'store'])
->name('category.store')->middleware(['auth']);

Route::get('dashboard/category', [CategoryController::class, 'index'])
->name('category.index')->middleware(['auth']);

Route::post('/dashboard/category/update/{categoryid}', [CategoryController::class, 'update'])
->name('category.update')->middleware(['auth']);


//POST ROUTES
Route::get('/dashboard/post/create', [PostController::class, 'create'])->name('post.create')->middleware(['auth']);
Route::post('/dashboard/post/create', [PostController::class, 'store'])->name('post.store')->middleware(['auth']);
Route::post('/comment', [InteractionController::class, 'storeComment'])->name('comment')->middleware(['auth']);
Route::get('/dashboard/blog', [DashboardController::class, 'blogs'])->name('dashboard.blog')->middleware(['auth']);
Route::post('/dashboard/search', [SearchController::class, 'adminSearchPosts'])->name('search.post.byAdmin')->middleware(['auth']);
Route::get('/dashboard/blog/{slug}', [DashboardController::class, 'showblog'])->name('blog.show')->middleware(['auth']);
Route::get('/dashboard/posts/comments', [DashboardController::class, 'commentsIndex'])->name('comment.index')->middleware(['auth']);
Route::get('comment/toggle/{comid}/{state}', [DashboardController::class, 'togglecomment'])->name('comment.toggle')->middleware(['auth']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth']);

//public pages
Route::get('/', [ PublicPagesController::class, 'posts'])->name('posts.public');
Route::get('/post/{slug}', [PostController::class, 'show'])->name('posts.show');



require __DIR__.'/auth.php';
