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

Route::get('/','FrontController@show');
Route::get('/categorywise/{id}','FrontController@categoryWise');
Route::get('/manufacturewise/{id}','FrontController@manufactureWise');
Route::get('/product_details/{id}','FrontController@productDetails');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//Admin Category
Route::get('/category', 'Admin\Category\categoriesController@category')->name('category');
Route::get('/add/category', 'Admin\Category\categoriesController@addCategory');
Route::get('/inactive_category/{id}', 'Admin\Category\categoriesController@inactiveCategory');
Route::get('/active_category/{id}', 'Admin\Category\categoriesController@activeCategory');
Route::get('/delete/category/{id}', 'Admin\Category\categoriesController@deleteCategory');
Route::get('edit/category/{id}', 'Admin\Category\categoriesController@editCategory');
Route::post('/insert/category', 'Admin\Category\categoriesController@insertCategory');
Route::post('update/category/{id}', 'Admin\Category\categoriesController@updateCategory');
//admin manufacture
Route::get('/manufacture', 'Admin\Manufacture\ManufactureController@manufacture')->name('manufacture');
Route::get('add/manufacture', 'Admin\Manufacture\ManufactureController@addManufacture');
Route::post('insert/manufacture', 'Admin\Manufacture\ManufactureController@insertManufacture');
Route::get('/inactive_manufacture/{id}', 'Admin\Manufacture\ManufactureController@inactiveManufacture');
Route::get('/active_manufacture/{id}', 'Admin\Manufacture\ManufactureController@activeManufacture');
Route::get('/delete/manufacture/{id}', 'Admin\Manufacture\ManufactureController@deleteManufacture');
Route::get('edit/manufacture/{id}', 'Admin\Manufacture\ManufactureController@editManufacture');
Route::post('update/manufacture/{id}', 'Admin\Manufacture\ManufactureController@updateManufacture');
//admin product
Route::get('/product', 'Admin\Product\ProductController@product')->name('product');
Route::get('add/product', 'Admin\Product\ProductController@addProduct');
Route::post('insert/product', 'Admin\Product\ProductController@insertProduct');
Route::get('/inactive_product/{id}', 'Admin\Product\ProductController@inactiveProduct');
Route::get('/active_product/{id}', 'Admin\Product\ProductController@activeProduct');
Route::get('/delete/product/{id}', 'Admin\Product\ProductController@deleteProduct');
Route::get('edit/product/{id}', 'Admin\Product\ProductController@editProduct');
//Cart controller
Route::post('/add_to_cart','CartController@addCart');
Route::get('/show_cart','CartController@showCart');
Route::get('/deletecartitem/{rowId}','CartController@deleteCartItem');
Route::post('/updatecartitem','CartController@updateCartItem');
//checkoutController
Route::get('/log_sign','CheckoutController@logSign');
Route::get('/checkout/','CheckoutController@checkout');
Route::get('/payment','CheckoutController@payment');
Route::get('/customer_logout','CheckoutController@customerLogout');
Route::post('/user_registration','CheckoutController@userRegistration');
Route::post('/shipping_details','CheckoutController@shippingDetails');
Route::post('/customer_login','CheckoutController@customerLogin');
Route::post('/order_place','CheckoutController@orderPlace');
//blog controller
Route::get('/blog','CheckoutController@blog');
Route::get('/add_blog','CheckoutController@addBlog');
Route::post('/insert_blog','CheckoutController@insertBlog');








