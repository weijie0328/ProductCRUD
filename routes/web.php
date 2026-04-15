<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductExportController;

Route::get('/', [ProductController::class, 'index']);
Route::get('/products/create', [ProductController::class, 'create']);
Route::get('/products/{id}/edit', [ProductController::class, 'edit']);

Route::resource('products', ProductController::class);