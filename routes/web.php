<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|-------------------------------------------------------------------------- 

*/



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/employee', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employee');
Route::get('/employee/details/{id}', [App\Http\Controllers\EmployeeController::class, 'details']);
Route::get('/employee/create', [App\Http\Controllers\EmployeeController::class, 'create']);
Route::post('/employee/store', [App\Http\Controllers\EmployeeController::class, 'store']);
Route::get('/employee/edit/{id}', [App\Http\Controllers\EmployeeController::class, 'edit']);
Route::post('/employee/update', [App\Http\Controllers\EmployeeController::class, 'update']);
Route::get('/employee/delete/{id}', [App\Http\Controllers\EmployeeController::class, 'destroy']);
Route::get('/employee/get', [App\Http\Controllers\EmployeeController::class, 'getInfo'])->name('employee.get');



Route::get('/employee/salary_update', [App\Http\Controllers\SalaryController::class, 'salaryUpdate']);
Route::post('/employee/salary_update', [App\Http\Controllers\SalaryController::class, 'salaryUpdateStore']);
Route::get('/employee/salary_assign', [App\Http\Controllers\SalaryController::class, 'salaryAssignGet']);
Route::post('/employee/salary_assign', [App\Http\Controllers\SalaryController::class, 'salaryAssign']);
Route::get('/employee/salary_history', [App\Http\Controllers\SalaryController::class, 'salaryHistory']);



Route::get('/product_category', [App\Http\Controllers\Product\ProductCategoryController::class, 'index'])->name('product_category');
Route::get('/product_category/add', [App\Http\Controllers\Product\ProductCategoryController::class, 'add']);
Route::post('/product_category/store', [App\Http\Controllers\Product\ProductCategoryController::class, 'store']);
Route::get('/product_category/edit/{id}', [App\Http\Controllers\Product\ProductCategoryController::class, 'edit']);
Route::post('/product_category/update', [App\Http\Controllers\Product\ProductCategoryController::class, 'update']);
//Route::get('/product_category/delete/{id}', [App\Http\Controllers\Product\ProductCategoryController::class, 'destroy']);


Route::get('/product_type', [App\Http\Controllers\Product\ProductTypeController::class, 'index'])->name('product_type');
Route::get('/product_type/add', [App\Http\Controllers\Product\ProductTypeController::class, 'add']);
Route::post('/product_type/store', [App\Http\Controllers\Product\ProductTypeController::class, 'store']);
Route::get('/product_type/edit/{id}', [App\Http\Controllers\Product\ProductTypeController::class, 'edit']);
Route::post('/product_type/update', [App\Http\Controllers\Product\ProductTypeController::class, 'update']);
//Route::get('/product_type/delete/{id}', [App\Http\Controllers\Product\ProductTypeController::class, 'destroy']);


Route::get('/product', [App\Http\Controllers\Product\ProductController::class, 'index'])->name('product');
Route::get('/product/add', [App\Http\Controllers\Product\ProductController::class, 'add']);
Route::post('/product/store', [App\Http\Controllers\Product\ProductController::class, 'store']);
Route::get('/product/code/{code}', [App\Http\Controllers\Product\ProductController::class, 'show']);
Route::get('/product/edit/{code}', [App\Http\Controllers\Product\ProductController::class, 'edit']);
Route::post('/product/update', [App\Http\Controllers\Product\ProductController::class, 'update']);
//Route::get('/product/delete/{id}', [App\Http\Controllers\Product\ProductController::class, 'destroy']);


Route::get('/product_stock', [App\Http\Controllers\Product\StockController::class, 'index'])->name('stock');
//Route::get('/product_stock/add', [App\Http\Controllers\Product\StockController::class, 'add']);
//Route::post('/product_stock/store', [App\Http\Controllers\Product\StockController::class, 'store']);
//Route::get('/product_stock/edit/{id}', [App\Http\Controllers\Product\StockController::class, 'edit']);
//Route::post('/product_stock/update', [App\Http\Controllers\Product\StockController::class, 'update']);
//Route::get('/product_stock/delete/{id}', [App\Http\Controllers\Product\StockController::class, 'destroy']);


Route::get('/product_vendor', [App\Http\Controllers\Product\VendorController::class, 'index'])->name('vendor');
Route::get('/product_vendor/add', [App\Http\Controllers\Product\VendorController::class, 'add']);
Route::post('/product_vendor/store', [App\Http\Controllers\Product\VendorController::class, 'store']);
Route::get('/product_vendor/edit/{id}', [App\Http\Controllers\Product\VendorController::class, 'edit']);
Route::post('/product_vendor/update', [App\Http\Controllers\Product\VendorController::class, 'update']);
//Route::get('/product_vendor/delete/{id}', [App\Http\Controllers\Product\VendorController::class, 'destroy']);


Route::get('/product_purchase', [App\Http\Controllers\Product\PurchaseController::class, 'index'])->name('purchase');
Route::get('/product_purchase/new', [App\Http\Controllers\Product\PurchaseController::class, 'add']);
Route::post('/product_purchase/store', [App\Http\Controllers\Product\PurchaseController::class, 'store']);
Route::get('/product_purchase/edit/{id}', [App\Http\Controllers\Product\PurchaseController::class, 'edit']);
Route::post('/product_purchase/update', [App\Http\Controllers\Product\PurchaseController::class, 'update']);
//Route::get('/product_purchase/delete/{id}', [App\Http\Controllers\Product\PurchaseController::class, 'destroy']);


Route::get('/product_sell', [App\Http\Controllers\Product\SellController::class, 'index'])->name('sell');
Route::get('/product_sell/new', [App\Http\Controllers\Product\SellController::class, 'add']);
Route::post('/product_sell/store', [App\Http\Controllers\Product\SellController::class, 'store']);
Route::get('/product_sell/edit/{id}', [App\Http\Controllers\Product\SellController::class, 'edit']);
Route::post('/product_sell/update', [App\Http\Controllers\Product\SellController::class, 'update']);
//Route::get('/product_sell/delete/{id}', [App\Http\Controllers\Product\SellController::class, 'destroy']);





