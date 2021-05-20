<?php

use App\Http\Controllers\RestTestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\PostController;


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
    return view('welcome');
});

// Route for blog/posts
Route::group(['prefix' => 'blog'], function () {
    Route::get('posts', [\App\Http\Controllers\Blog\MainPageController::class, 'index'])
        ->name('blog.posts');
});

// Route for blog/post
Route::group(['prefix' => 'blog'], function () {
    $methods = ['index', 'edit', 'update', 'create', 'store', 'show',];
    Route::resource('post', PostController::class)
        ->only($methods)
        ->names('blog.post');
});

//Route for Authentication
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

//Route for collections
Route::group(['prefix' => 'digging_dipper',],
    function () {
        Route::get('collections', [App\Http\Controllers\DiggingDeeperController::class, 'collections'])
            ->name('digging_deeper.collections');
    });

//Route for Admin Blog.
$groupData = [

    'prefix' => 'admin/blog',
];

Route::group($groupData, function () {

    //Blog category
    $methods = ['index', 'edit', 'update', 'create', 'store',];
    Route::resource('categories', App\Http\Controllers\Blog\Admin\CategoryController::class)
        ->only($methods)
        ->names('blog.admin.categories');

    // BlogPosts for restore post
    Route::get('posts/{post}/restore', [\App\Http\Controllers\Blog\Admin\PostController::class, 'restore'])
        ->name('blog.admin.posts.restore');

    // BlogPosts for Admin all resource methods
    Route::resource('posts', App\Http\Controllers\Blog\Admin\PostController::class)
        ->except(['show'])
        ->names('blog.admin.posts');
});

//Route for test scope

Route::get('/test_scope', [\App\Http\Controllers\TestScopeController::class, 'index'])
    ->name('test.scope');
