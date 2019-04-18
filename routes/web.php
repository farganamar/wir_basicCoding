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
Route::get('/', 'ArticleController@index');
Route::get('/news/{slug}', 'ArticleController@show');
Route::get('/category/{slug}', 'CategoryController@show');

/*========= End front-end =========*/

/*======== Back-end ============*/
Route::get('/dashboard', 'HomeController@index')->middleware('auth');

/*========== CRUD ===============*/
//article
Route::get('/article' , 'CrudArticleController@index')->middleware('auth');
Route::post('/tambah-artikel' , 'CrudArticleController@tambah')->middleware('auth');
Route::post('/edit-artikel/{id}', 'CrudArticleController@edit')->middleware('auth');
Route::get('/delete-artikel/{id}', 'CrudArticleController@delete')->middleware('auth');


//category
Route::get('/category' , 'CrudCategoryController@index')->middleware('auth');
Route::post('/tambah-kategori', 'CrudCategoryController@tambah')->middleware('auth');
Route::post('/edit-kategori/{id}', 'CrudCategoryController@edit')->middleware('auth');
Route::get('/delete-kategori/{id}', 'CrudCategoryController@delete')->middleware('auth');

//user
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/user', 'UserController@index');
    Route::get('/ubah-jabatan/{id}', 'UserController@ubahJabatan');
    Route::post('/tambah-user' , 'UserController@tambah');
    Route::post('/edit-user/{id}' , 'UserController@edit');
    Route::get('/delete-user/{id}', 'UserController@delete');
});

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

