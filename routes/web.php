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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();
/*========== Front-end ===========*/
Route::get('/', 'ProductController@index');
Route::get('/product/{slug}', 'ProductController@detail');
Route::get('/category/{slug}', 'CategoryController@show');

/*========= End front-end =========*/

/*======== Back-end ============*/
Route::get('/dashboard', 'HomeController@index')->middleware('auth');

/*========== CRUD ===============*/
//merchant
Route::post('/create-new-merchant' , 'UserController@newMerchant');

Route::middleware(['auth', 'merchant'])->group(function () {
    //product
    Route::get('/product', 'ProductController@show');
    Route::post('/tambah-product', 'ProductController@tambah');
    Route::post('/edit-product/{id}', 'ProductController@edit');
    Route::get('/delete-product/{id}', 'ProductController@delete');
    Route::get('history/{id}' , 'ProductController@historyTransaction');

});

//customer
Route::middleware(['auth'])->group(function (){
    Route::post('beli-barang/{id}', 'CartController@tambah');
    Route::get('list-transaction', 'UserController@listTransaction');
});
Route::get('list-product/{id}' , 'ProductController@lihatProductMerchant');



//user
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', 'UserController@profile');
    Route::post('update-profile/{id}', 'UserController@updateProfile');
    Route::get('cek-password/{id}/{password}', 'UserController@cekPassword');
    Route::post('update-password/{id}', 'UserController@updatePassword');

});

/*============ end crud ============*/
Route::get('/auth/{provider}', 'AuthSocial@redirectToProvider');
Route::get('/auth/{provider}/callback', 'AuthSocial@handleProviderCallback');

/*============ End Back-end ========*/

