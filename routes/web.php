<?php

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

Auth::routes();

/*
|--------------------------------------------------------------------------
| 1) User 認証不要
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function () { return redirect('/home'); });

/*
|--------------------------------------------------------------------------
| 2) User before login
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth:user'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
});

/*
|--------------------------------------------------------------------------
| 3) Admin before login
|--------------------------------------------------------------------------
*/
Route::namespace('Admin')->prefix('admin')->as('admin.')->group(function() {
    Route::get('/',         function () { return redirect('/admin/login'); });
    Route::get('login',     'LoginController@showLoginForm')->name('login');
    Route::post('login',    'LoginController@login');
});
/*
|--------------------------------------------------------------------------
| 4) Admin after login
|--------------------------------------------------------------------------
*/
Route::namespace('Admin')->prefix('admin')->as('admin.')->middleware('auth:admin')->group(function () {
    Route::get('logout',   'LoginController@logout');
    Route::post('logout',   'LoginController@logout')->name('logout');
    Route::get('home',      'HomeController@index')->name('home');

    /* products */
    Route::resource('products', ProductController::class);
    Route::post('products/ajaxSearchList',   'ProductController@ajaxSearchList');
    Route::post('products/ajaxSearch',   'ProductController@ajaxSearch');

    /* brands */
    Route::resource('setting/brands', BrandController::class);

    /* plans */
    Route::resource('setting/plans', PlanController::class);
    Route::resource('setting/plan_details', PlanDetailController::class);

    /* orders */
    Route::resource('orders', OrderController::class);
    Route::post('orders/ajaxValidation', 'OrderController@ajaxValidation');
    Route::post('orders/saveDesign', 'OrderController@saveDesign');
    Route::post('orders/saveDesignDB', 'OrderController@saveDesignDB');

    /* users */
    Route::resource('users', UserController::class);
    Route::post('users/ajaxSearchList',   'UserController@ajaxSearchList');
    Route::post('users/ajaxSearch',   'UserController@ajaxSearch');

    /* admins */
    Route::resource('admins', AdminController::class);

});

