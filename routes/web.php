<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/lang/{locale}', 'HomeController@lang');


//Customer
Route::get('/customer', 'CustomerController@index')->name('customer.index');
Route::get('/customer/create', 'CustomerController@create')->name('customer.create');
Route::post('/customer/create', 'CustomerController@store')->name('customer.store');
Route::get('/customer/show/{id}', 'CustomerController@show')->where('id', '[0-9]+')->name('customer.show');
Route::get('/customer/edit/{id}', 'CustomerController@edit')->where('id', '[0-9]+')->name('customer.edit');
Route::post('/customer/edit', 'CustomerController@update')->name('customer.update');
Route::get('/customer/delete/{id}', 'CustomerController@destroy')->where('id', '[0-9]+')->name('customer.delete');

//Product
Route::get('/product', 'ProductController@index')->name('product.index');
Route::get('/product/create', 'ProductController@create')->name('product.create');
Route::post('/product/create', 'ProductController@store')->name('product.store');
Route::get('/product/show/{id}', 'ProductController@show')->where('id', '[0-9]+')->name('product.show');
Route::post('/product/edit', 'ProductController@update')->name('product.update');
Route::get('/product/edit/{id}', 'ProductController@edit')->where('id', '[0-9]+')->name('product.edit');
Route::get('/product/delete/{id}', 'ProductController@destroy')->where('id', '[0-9]+')->name('product.delete');

//Group
Route::get('/group', 'GroupController@index')->name('group.index');
Route::get('/group/create', 'GroupController@create')->name('group.create');
Route::post('/group/create', 'GroupController@store')->name('group.store');
Route::get('/group/edit/{id}', 'GroupController@edit')->where('id', '[0-9]+')->name('group.edit');
Route::post('/group/edit', 'GroupController@update')->name('group.update');
Route::get('/group/delete/{id}', 'GroupController@destroy')->where('id', '[0-9]+')->name('group.delete');

//Order
Route::get('/order', 'OrderController@index')->name('order.index');
Route::get('/order/create', 'OrderController@create')->name('order.create');
Route::post('/order/create', 'OrderController@store')->name('order.store');
Route::get('/order/delete/{id}', 'OrderController@destroy')->where('id', '[0-9]+')->name('order.delete');
Route::get('/order/invoice/{id}', 'OrderController@invoice')->where('id', '[0-9]+');

//Pricing
Route::get('/pricing', 'PricingController@index')->name('pricing.index');
Route::get('/pricing/create', 'PricingController@create')->name('pricing.create');
Route::post('/pricing/create', 'PricingController@store')->name('pricing.store');
Route::get('/pricing/delete/{id}', 'PricingController@destroy')->where('id', '[0-9]+')->name('pricing.delete');

//Report Generation
Route::get('/reports', 'ReportController@index')->name('report.index');
Route::post('/reports', 'ReportController@filter')->name('report.filter');
Route::get('/reports/pdf/{id?}', 'ReportController@pdf')->where('id', '[0-9]+');
Route::post('/reports/pdf', 'ReportController@homePdf')->name('report.pdf');

//Appointments
Route::get('/appointment/create', 'AppointmentController@create')->name('appointment.create');
Route::post('/appointment/create', 'AppointmentController@store')->name('appointment.store');
Route::get('/appointment/all', 'AppointmentController@all')->name('appointment.all');
Route::get('/appointment/checkslots/{id}','AppointmentController@checkslots')->where('id', '[0-9]+');
Route::get('/appointment/delete/{id}','AppointmentController@destroy')->where('id', '[0-9]+');
Route::post('/appointment/edit', 'AppointmentController@store_edit')->name('appointment.store_edit');

//Settings
/* Doctorino Settings */
Route::get('/settings/doctorino_settings', 'SettingController@doctorino_settings')->name('doctorino_settings.edit');
Route::post('/settings/doctorino_settings', 'SettingController@doctorino_settings_store')->name('doctorino_settings.store');
/* Prescription Settings */
Route::get('/settings/prescription_settings', 'SettingController@prescription_settings')->name('prescription_settings.edit');
Route::post('/settings/prescription_settings', 'SettingController@prescription_settings_store')->name('prescription_settings.store');