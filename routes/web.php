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
//     return view('maintenis');
// });

//PRODUK SHOW AND DETAIL
Route::get('/', 'Users\MainController@index')->name('utama');
Route::get('/index', 'Users\MainController@index')->name('index');
Route::get('/shop', 'Users\MainController@shop')->name('shop');
Route::get('/shop_list', 'Users\MainController@shop_list')->name('shop_list');
Route::get('/shop/product/{id}','Users\MainController@show')->name('detail');

//CART
Route::get('/cart/getcity','Users\CartController@city');
Route::get('/cart/getshippingcost','Users\CartController@shippingCost');
Route::resource('/cart','Users\CartController');

//CHECKOUT
// Route::post('/transaksi/{id}','Users\TransactionController@destroy')->name('transaksi.destroy');
Route::post('/uploadbukti','Users\TransactionController@uploadBukti');
Route::resource('/checkout','Users\TransactionController');

//TRANSACTION
Route::get('/myprofile','Users\TransactionController@index');
Route::delete('/transaction/success/{id}','Users\TransactionController@success');
Route::delete('/review/{id}','Users\TransactionController@review');
Route::get('/transaction','TransactionController@index');
Route::delete('/transaction/{id}','TransactionController@destroy');
Route::delete('/transaction/cancel/{id}','TransactionController@cancel');

//RESPONSE
Route::resource('/response','ResponseController');

//REPORT
Route::get('/report/bulanan','ReportController@bulan');
Route::get('/report/tahunan','ReportController@tahun');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/logout','Auth\LoginController@logoutUser')->name('user.logout');

Route::group(['prefix'=>'admin'], function() {
	Route::get('/login','AuthAdmin\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login','AuthAdmin\LoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.home');
	Route::get('/logout','AuthAdmin\LoginController@logout')->name('admin.logout');
});

Route::resource('/productcategories','ProductcategoriesController');
Route::resource('/courier','CourierController');
Route::resource('/product','ProductController');
Route::resource('/discount','DiscountController');