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
Route::get('/', function () { return redirect('/home'); });

/*
|--------------------------------------------------------------------------
| 2) User before login
|--------------------------------------------------------------------------
*/
Route::namespace('Front')->group(function() {
    Route::get('/',      'RegisterController@index')->name('register.index');
    Route::post('register/confirm',      'RegisterController@confirm')->name('register.confirm');
    Route::post('register/complete',      'RegisterController@postComplete');
    Route::get('register/complete',      'RegisterController@getComplete')->name('register.complete');
    Route::resource('lineup', LineupController::class);
    Route::get('guide/policy',     'GuideController@policy')->name('policy');
    Route::get('guide/company',     'GuideController@company')->name('company');
    Route::get('guide/notation',     'GuideController@notation')->name('notation');
    Route::get('guide/contract',     'GuideController@contract')->name('contract');
    Route::get('gallery',     'GalleryController@index')->name('gallery');
    Route::get('qa',     'QaController@index')->name('qa');
    Route::get('scene',     'SceneController@index')->name('scene');

    Route::get('concept',     'ConceptController@index')->name('concept');
    Route::get('plan',     'PlanController@index')->name('plan');
});

/*
|--------------------------------------------------------------------------
| 3) User ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth:user'], function() {
    Route::get('mypage',     'MypageController@index');
    Route::get('mypage/edit',     'MypageController@getEdit')->name('front.mypage.edit');
    Route::post('mypage/edit',     'MypageController@postEdit');
    Route::get('mypage/status',     'MypageController@status');

    Route::post('order',     'OrderController@index')->name('order');
    Route::post('order/payment',     'OrderController@postPayment');
    Route::get('order/payment',     'OrderController@getPayment')->name('order.payment');
    Route::get('order/complete',     'OrderController@complete')->name('order.complete');
});

/*
|--------------------------------------------------------------------------
| 4) Admin before login
|--------------------------------------------------------------------------
*/
Route::namespace('Admin')->prefix('admin')->as('admin.')->group(function() {
    Route::get('/',         function () { return redirect('/admin/login'); });
    Route::get('login',     'LoginController@showLoginForm')->name('login');
    Route::post('login',    'LoginController@login');
});
/*
|--------------------------------------------------------------------------
| 5) Admin after login
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

    /* users */
    Route::resource('users', UserController::class);
    Route::post('users/ajaxSearchList',   'UserController@ajaxSearchList');
    Route::post('users/ajaxSearch',   'UserController@ajaxSearch');

    /* admins */
    Route::resource('admins', AdminController::class);

});

