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

Route::get('/', function () {
    return view('/auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/reg', function () {
    return view('/auth/register');
});

Route::resource('/Supplier','SupplierController');
Route::resource('/Customer','CustomerController');
Route::resource('/Category','CategoryController');
Route::resource('/SubCategory','SubCategoryController');
Route::resource('/Product','ProductController');
Route::resource('/Invoice','InvoiceController');
Route::resource('/Stock','StockController');
Route::get('/SubCategorys/{SubCategory}/{category_ID}','SubCategoryController@ed');
Route::get('/Invoices/{Productsold_Id}/{Customer_Id}/{Product_Id}','InvoiceController@edc');
Route::get('/In/{Productsold_Id}/{Customer_Id}/{Product_Id}','InvoiceController@abcd');
Route::get('/Products/{Product}/{category_id}/{subcategory_id}','ProductController@ed');
Route::get('/Stocks/{Stockid}/{Pid}/{Sid}','StockController@ed');
Route::get('myform/ajax/{id}','ProductController@myformAjax');
Route::get('my/ajaxs/{id}','InvoiceController@myformAjax');
Route::get('fetchdataProduct','ProductController@action');
Route::get('fetchdataInvoice','InvoiceController@action');
Route::get('fetchdataStock','StockController@action');
Route::get('fetchdataSubcat','SubCategoryController@action');
Route::get('fetchdatacat','CategoryController@action');
Route::get('fetchdatacus','CustomerController@action');
Route::get('fetchdatasup','SupplierController@action');


