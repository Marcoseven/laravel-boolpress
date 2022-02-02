<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\PostResource;
use App\Models\Post;


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
    return view('guest.home');
})->name('home');

Auth::routes();

/* routes_guest */
Route::resource('posts', PostController::class)->only(['index', 'show'])->parameters('posts', 'post:slug');
Route::get('posts/{post}', function (Post $post) {
    return new PostResource(Post::find($post));
});
Route::resource('products', PostController::class)->only(['index', 'show']);
Route::get('categories/{category:slug}/posts', 'CategoryController@posts')->name('categories_posts');
Route::get('contacts', 'MailController@contacts')->name('contacts'); 
Route::post('contacts', 'MailController@send')->name('mail_send');
Route::get('tags/{tag:slug}/posts', 'TagController@posts')->name('guest.tags.posts');

/* /routes_guest */

/* routes_admin */
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::resource('posts', PostController::class);
    Route::resource('products', PostController::class);
    Route::resource('categories', CategoryController::class);
});
/* /routes_admin */


