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
use Google\Cloud\Core\ExponentialBackoff;
use Google\Cloud\Firestore\FirestoreClient;

// Route::get('/test-firestore', function () {
//     $firestore = new FirestoreClient([
//         'projectId' => 'cooking-89482',
//     ]);

//     $collection = $firestore->collection('users');
//     $document = $collection->document('0rINQxs7JCaWBDzMfr51addMdsc2');
//     $snapshot = $document->snapshot();

//     return $snapshot->data();
// });

// Route::get('/', 'Common\CommonController@index')->name('house');
// Route::get('/travelling/{title}/{id}', 'Common\CommonController@travelling')->name('travelling');
// Route::post('/travelling', 'Common\CommonController@addComment')->name('addComment');
// Route::get('/favorites', 'Common\CommonController@favorites')->name('favorites');
// Route::get('/favorite/{id}', 'Common\CommonController@favorite')->name('favorite');
// Route::get('/post', 'Common\CommonController@post')->name('post');
// Route::get('/comment', 'Common\CommonController@comment')->name('comment');
// Route::get('/like/{postId}/{local}', 'Common\CommonController@like')->name('like');
// Route::post('/post-create', 'Common\CommonController@postCreate')->name('post-create');
// Route::get('/search', 'Common\CommonController@search')->name('search');
// Route::get('/profile', 'Common\CommonController@profile')->name('profile');
// Route::post('/profilePost', 'Common\CommonController@profilePost')->name('profilePost');
// Route::post('/order', 'Common\CommonController@order')->name('order');
// Route::get('/order-tour', 'Common\CommonController@orderTour')->name('orderTour');
// Route::post('/order-tour', 'Common\CommonController@orderTourPost')->name('orderTourPost');
// Route::get('/my-order', 'Common\CommonController@myOrder')->name('myOrder');

Route::get('/', 'Admin\DashboardController@login')->name('login');
Route::get('/login', 'Admin\DashboardController@login')->name('login');
// Route::get('/signup', 'Admin\DashboardController@signup')->name('signup');
Route::post('/login-post', 'Admin\DashboardController@loginPost')->name('login-post');
// Route::post('/signup-post', 'Admin\DashboardController@signupPost')->name('signup-post');
Route::get('/logout', 'Admin\DashboardController@logout')->name('logout');

Route::get('/order-complete', 'Admin\DashboardController@complete')->name('complete');
Route::post('/payment', 'Admin\DashboardController@payment')->name('payment');

Route::group(['middleware'=>'checkLoginUser'], function(){
    Route::get('/admin', 'Admin\DashboardController@index')->name('home');
    Route::resource('/users', 'Admin\UserController');
    Route::resource('/employees', 'Admin\EmployeeController');
    Route::resource('/foods', 'Admin\BlogController');
    Route::resource('/orders', 'Admin\OrderController');
    Route::resource('/posts', 'Admin\PostController');
    Route::get('orders/approve/{id}', 'Admin\OrderController@approve')->name('approve');
    Route::get('orders/remove/{id}', 'Admin\OrderController@remove')->name('remove');
    Route::post('orders/update', 'Admin\OrderController@updateOrder')->name('update');

    Route::delete('/comment/{blog_id}/{commentid}', 'Admin\BlogController@remove')->name('remove_comment');
});
// Route::get('/firebase', 'FirebaseController@getData');

// Route::get('/', 'Admin\DashboardController@home')->name('home2');

// Route::get('/firebase-add', 'FirebaseController@addData')->name('home3');