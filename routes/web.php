<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/cafe-amandemy', [ProductController::class, 'index']);

// Route::get('/form-request', [UserController::class, 'getForm'])->name('get_form');
// Route::post('/send-request', [UserController::class, 'sendRequest'])->name('send_request');
Route::get('/admin/2/table-request', [UserController::class, 'utable'])->name('user_table2');
Route::get('/admin/2/form-request', [UserController::class, 'getForm'])->name('get_form2');
Route::get('/admin/form-request', [TugasController::class, 'getForm'])->name('get_form');
Route::post('/post-request', [TugasController::class, 'postForm'])->name('post_form');
Route::post('admin/2/post-request', [UserController::class, 'postForm2'])->name('post_form2');
Route::get('/product-request', [TugasController::class, 'product'])->name('product_form');
Route::get('/admin/table-request', [TugasController::class, 'table'])->name('product_table');
Route::get('/admin/form-request/{id}/edit', [TugasController::class, 'edit'])->name('posts.edit');
Route::post('/admin/form-request/{id}/update', [TugasController::class, 'update'])->name('posts.update');
Route::delete('/admin/form-request/{id}/destroy', [TugasController::class, 'delete'])->name('posts.destroy');
Route::get('/admin/2/form-request/{id}/edit', [UserController::class, 'edit'])->name('posts.edit2');
Route::post('/admin/2/form-request/{id}/update', [UserController::class, 'update'])->name('posts.update2');
Route::delete('/admin/2/form-request/{id}/destroy', [UserController::class, 'delete'])->name('posts.destroy2');