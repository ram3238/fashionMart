<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cadmin;
use App\Http\Controllers\Cproducts;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [Cadmin::class, 'home'])->name('home');
Route::get('/home', [Cadmin::class, 'home'])->name('home');
Route::get('/shop/{id}', [Cproducts::class, 'showProductsBySubcategory']);
Route::get('/product-details', [Cproducts::class, 'productDetails'])->name('product-details');
