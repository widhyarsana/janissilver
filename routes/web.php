<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::middleware(['auth','role:super-admin'])->namespace('SuperAdmin')->group(function(){
    Route::prefix('superadmin/admin')->name('superadmin.')->group(function(){
        Route::get('/', 'AdminController@index')->name('admin.index');
        Route::get('/create', 'AdminController@create')->name('admin.create');
        Route::post('/create', 'AdminController@store')->name('admin.store');
        Route::get('/edit/{admin:username}', 'AdminController@edit')->name('admin.edit');
        Route::post('/edit/{admin}', 'AdminController@update')->name('admin.update');
        Route::get('/delete/{admin}', 'AdminController@destroy')->name('admin.delete');
        Route::post('/delete', 'AdminController@delete')->name('admin.delete2');
    });
});

Route::middleware(['auth', 'role:admin'])->namespace('Admin')->group(function () {
    Route::prefix('admin/product')->name('admin.')->group(function () {
        Route::get('/', 'ProductController@index')->name('product.index');
        Route::get('/create', 'ProductController@create')->name('product.create');
        Route::post('/create', 'ProductController@store')->name('product.store');
        Route::get('/edit/{product}', 'ProductController@edit')->name('product.edit');
        Route::post('/edit/{product}', 'ProductController@update')->name('product.update');
        Route::get('/delete/{product}', 'ProductController@destroy')->name('product.delete');
        Route::post('/delete', 'ProductController@delete')->name('product.delete2');
    });
    
    Route::prefix('admin/customer')->name('admin.')->group(function () {
        Route::get('/', 'CustomerController@index')->name('customer.index');
        Route::get('/create', 'CustomerController@create')->name('customer.create');
        Route::post('/create', 'CustomerController@store')->name('customer.store');
        Route::get('/edit/{customer}', 'CustomerController@edit')->name('customer.edit');
        Route::post('/edit/{customer}', 'CustomerController@update')->name('customer.update');
        Route::get('/delete/{customer}', 'CustomerController@destroy')->name('customer.delete');
        Route::post('/delete', 'CustomerController@delete')->name('customer.delete2');
    });

    Route::prefix('admin/order')->name('admin.')->group(function () {
        Route::get('/', 'OrderController@index')->name('order.index');
        Route::get('/show/{order}', 'OrderController@show')->name('order.show');
    });

    Route::prefix('admin/production')->name('admin.')->group(function () {
        Route::get('/', 'ProductionController@index')->name('production.index');
        Route::get('/create/{order}', 'ProductionController@store')->name('production.create');
    });

    Route::prefix('admin/shipment')->name('admin.')->group(function () {
        Route::get('/', 'ShipmentController@index')->name('shipment.index');
        Route::get('/create/{order}', 'ShipmentController@store')->name('shipment.create');
    });
    
});

Route::middleware(['auth', 'role:customer'])->namespace('Customer')->group(function () {
    Route::prefix('customer/product')->name('customer.')->group(function () {
        Route::get('/', 'ProductController@index')->name('product.index');
        Route::get('/cart', 'CartController@index')->name('cart.index');
        Route::get('/add-to-cart/{id}/{qty}', 'CartController@addToCart')->name('product.add-to-cart');
        Route::get('/cart-delete/{id}', 'CartController@deleteFromCart')->name('cart.delete-from-cart');
        Route::get('/cart/checkout', 'CartController@checkout')->name('cart.checkout');
        Route::post('/cart/update', 'CartController@update')->name('cart.update');
    });

    Route::prefix('customer/order')->name('customer.')->group(function () {
        Route::get('/', 'OrderController@index')->name('order.index');
        Route::get('/detail/{order}', 'OrderController@show')->name('order.show');
        
    });

});

Route::middleware(['auth', 'role:admin|super-admin'])->namespace('Report')->group(function(){
    Route::prefix('/report')->group(function () {
        Route::prefix('/order')->name('report.')->group(function () {
            Route::get('/', 'OrderReportController@index')->name('order.index');
            Route::post('/store', 'OrderReportController@store')->name('order.store');
            Route::post('/print', 'OrderReportController@print')->name('order.print');
        });

        Route::prefix('/production')->name('report.')->group(function () {
            Route::get('/', 'ProductionReportController@index')->name('production.index');
            Route::post('/store', 'ProductionReportController@store')->name('production.store');
        });

        Route::prefix('/shipment')->name('report.')->group(function () {
            Route::get('/', 'ShipmentReportController@index')->name('shipment.index');
            Route::post('/store', 'ShipmentReportController@store')->name('shipment.store');
            Route::post('/print', 'ShipmentReportController@print')->name('shipment.print');
        });
    });
});



Route::view('/alert', 'alert');