<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

Route::get('/', [HomeController::class, 'index']);


Route::get('/admin', [AdminController::class, 'index']);

Route::get('/admin/list-user', [UserController::class, 'index']);
Route::get('/admin/create-user', [UserController::class, 'CreateUser']);
Route::get('/admin/edit-user/{UserId}', [UserController::class, 'EditUser']);
Route::post('/admin/save-new-user', [UserController::class, 'SaveNewUser']);
Route::post('/admin/update-user', [UserController::class, 'UpdateUser']);
Route::get('/admin/delete-user/{UserID}', [UserController::class, 'DeleteUser']);
Route::get('/admin/block-account/{UserID}', [UserController::class, 'BlockAccount']);

Route::get('/admin/list-post-cate', [CategoryController::class, 'ListPostCate']);
Route::get('/admin/list-product-cate', [CategoryController::class, 'ListProductCate']);
Route::get('/admin/create-category', [CategoryController::class, 'CreateCategory']);
Route::get('/admin/edit-category', [CategoryController::class, 'EditCategory']);
Route::get('/admin/load-parent-category', [CategoryController::class, 'LoadCateParent']);
Route::post('/admin/save-category', [CategoryController::class, 'SaveCategory']);
Route::post('/admin/update-category', [CategoryController::class, 'UpdateCategory']);





