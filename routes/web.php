<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\Web\UserController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::post('/post-request', [UserController::class, 'postRequest'])->name('postRequest');
Route::get('/tambah-product', [UserController::class, 'handleRequest'])->name('form_product');
Route::get('/products', [UserController::class, 'getProduct'])->name('get_product');
Route::get('/product/{product}', [UserController::class, 'editProduct'])->name('edit_product');
Route::put('/product/{product}/update', [UserController::class, 'updateProduct'])->name('update_product');
Route::post('/product/{product}/delete', [UserController::class, 'deleteProduct'])->name('delete_product');
Route::get('/admin', [UserController::class, 'admin'])->name('admin');
Route::put('/admin/update-product/{product}', [UserController::class, 'updateProduct'])->name('update_product');
Route::get('/admin/list-products', [UserController::class, 'getAdmin'])->name('admin_page');

Route::get('/cafe-amandemy', [UserController::class, 'cafe']);

// Route::post('/posts/{post}/delete', [PostController::class, 'delete']);
