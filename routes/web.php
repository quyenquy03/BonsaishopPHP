<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/choose-location', [HomeController::class, 'ChooseLocation']);
Route::get('/lien-he', [HomeController::class, 'Contact']);
Route::get('/gioi-thieu', [HomeController::class, 'Introduce']);
Route::get('/gui-lien-he', [HomeController::class, 'SendContact']);



Route::get('/admin', [AdminController::class, 'index']);

Route::get('/admin/list-user', [UserController::class, 'index']);
Route::get('/admin/create-user', [UserController::class, 'CreateUser']);
Route::get('/admin/edit-user/{UserId}', [UserController::class, 'EditUser']);
Route::post('/admin/save-new-user', [UserController::class, 'SaveNewUser']);
Route::post('/admin/update-user', [UserController::class, 'UpdateUser']);
Route::get('/admin/delete-user/{UserID}', [UserController::class, 'DeleteUser']);
Route::get('/admin/block-account/{UserID}', [UserController::class, 'BlockAccount']);
Route::get('/tai-khoan/dang-nhap', [UserController::class, 'DangNhap']);
Route::post('/tai-khoan/sign-in', [UserController::class, 'SignIn']);
Route::get('/tai-khoan/dang-ky', [UserController::class, 'DangKy']);
Route::post('/tai-khoan/sign-up', [UserController::class, 'SignUp']);
Route::get('/tai-khoan/logout', [UserController::class, 'Logout']);


Route::get('/admin/list-post-cate', [CategoryController::class, 'ListPostCate']);
Route::get('/admin/list-product-cate', [CategoryController::class, 'ListProductCate']);
Route::get('/admin/create-category', [CategoryController::class, 'CreateCategory']);
Route::get('/admin/edit-category/{CategoryID}', [CategoryController::class, 'EditCategory']);
Route::get('/admin/load-parent-category', [CategoryController::class, 'LoadCateParent']);
Route::get('/admin/change-category-status', [CategoryController::class, 'ChangeStatus']);
Route::get('/admin/delete-category', [CategoryController::class, 'DeleteCategory']);
Route::post('/admin/save-category', [CategoryController::class, 'SaveCategory']);
Route::post('/admin/update-category', [CategoryController::class, 'UpdateCategory']);

Route::get('/admin/list-blog', [BlogController::class, 'ListBlog']);
Route::get('/admin/list-deleted-blog', [BlogController::class, 'ListDeletedBlog']);
Route::get('/admin/create-blog', [BlogController::class, 'CreateBlog']);
Route::get('/admin/edit-blog/{BlogID}', [BlogController::class, 'EditBlog']);
Route::get('/admin/change-blog-status', [BlogController::class, 'ChangeStatus']);
Route::get('/admin/delete-blog', [BlogController::class, 'DeleteBlog']);
Route::post('/admin/save-blog', [BlogController::class, 'SaveBlog']);
Route::post('/admin/update-blog', [BlogController::class, 'UpdateBlog']);
Route::get('/bai-viet/{BlogID}-{BlogSlug}', [BlogController::class, 'ShowDetailBlog']);
Route::get('/danh-muc-bai-viet/{CategoryID}-{Alias}', [BlogController::class, 'GetBlogByCategory']);
Route::get('/blog/add-comment', [BlogController::class, 'AddComment']);
Route::get('/blog/load-comment', [BlogController::class, 'LoadComment']);

Route::get('/admin/list-product', [ProductController::class, 'ListProduct']);
Route::get('/admin/list-deleted-product', [ProductController::class, 'ListDeletedProduct']);
Route::get('/admin/create-product', [ProductController::class, 'CreateProduct']);
Route::get('/admin/edit-product/{ProductID}', [ProductController::class, 'EditProduct']);
Route::get('/admin/change-product-status', [ProductController::class, 'ChangeStatus']);
Route::get('/admin/delete-product', [ProductController::class, 'DeleteProduct']);
Route::post('/admin/save-product', [ProductController::class, 'SaveProduct']);
Route::post('/admin/update-product', [ProductController::class, 'UpdateProduct']);
Route::get('/san-pham/{ProductID}-{ProductSlug}', [ProductController::class, 'ShowDetailProduct']);
Route::get('/danh-muc-san-pham/{CategoryID}-{Alias}', [ProductController::class, 'GetProductByCategory']);


// Route::get('/cart/add-to-cart/{productid}', [CartController::class, 'AddToCart']);
Route::get('/cart/add-to-cart', [CartController::class, 'AddToCart']);
Route::get('/gio-hang', [CartController::class, 'GetProductFromCart']);
Route::get('/cart/clear-cart', [CartController::class, 'ClearCart']);
Route::get('/cart/delete-cart-item', [CartController::class, 'DeleteCartItem']);
Route::get('/cart/decrease-cart', [CartController::class, 'DecreaseCart']);
Route::get('/cart/increase-cart', [CartController::class, 'IncreaseCart']);
Route::get('/cart/checkout', [CartController::class, 'Checkout']);







