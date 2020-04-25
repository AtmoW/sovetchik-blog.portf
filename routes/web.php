<?php

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

Route::redirect('/', '/blog/posts');

Auth::routes();
Route::group(
    [
        'prefix' => 'admin/blog',
        'middleware' => ['auth', 'can:admin-panel'],
        'namespace' => 'Admin\Blog'
    ],
    function () {
        Route::resource('posts', 'BlogPostController')->names('admin.blog.posts')->except([
            'show'
        ]);

        Route::group(
            [
                'prefix' => 'posts'
            ],
            function () {
                Route::get('not-published', 'BlogPostController@notPublished')->name('blog.posts.not-published');
            }
        );
    }
);


Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function () {
    Route::resource('posts', 'BlogPostController')->names('blog.posts');
    Route::get('new', 'BlogPostController@new')->name('blog.posts.new');
});
