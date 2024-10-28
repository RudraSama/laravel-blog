<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;


Route::get('/', [BlogController::class, 'blogs'])->name('home');
Route::get('/blog/{blog:id}', [BlogController::class, 'blog']);

//ROUTES FOR LOGIN
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

//ROUTES FOR ADMIN
Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware('auth');

//ROUTES FOR BLOGS
Route::get('/admin/blog/create', [BlogController::class, 'createBlog'])->middleware('auth');
Route::post('/admin/blog/create', [BlogController::class, 'storeBlog'])->middleware('auth');

Route::get('/admin/blog/edit/{blog:id}', [BlogController::class, 'editBlog'])->middleware('auth');
Route::put('/admin/blog/edit/{blog:id}/update', [BlogController::class, 'updateBlog'])->middleware('auth');
Route::get('/admin/blog/delete/{blog:id}', [BlogController::class, 'delete'])->middleware('auth');

//ROUTES FOR CATEGORIES
Route::get('/admin/categories', [CategoryController::class, 'categories'])->middleware('auth');

Route::get('/admin/category/create', [CategoryController::class, 'createCategory'])->middleware('auth');
Route::post('/admin/category/create', [CategoryController::class, 'storeCategory'])->middleware('auth');

Route::get('/admin/category/edit/{category:id}', [CategoryController::class, 'editCategory'])->middleware('auth');
Route::put('/admin/category/edit/{category:id}/update', [CategoryController::class, 'updateCategory'])->middleware('auth');

Route::get('/admin/category/delete/{category:id}', [CategoryController::class, 'delete'])->middleware('auth');


//ROUTES FOR TAG
Route::get('/admin/tags', [TagController::class, 'tags'])->middleware('auth');

Route::get('/admin/tag/create', [TagController::class, 'createTag'])->middleware('auth');
Route::post('/admin/tag/create', [TagController::class, 'storeTag'])->middleware('auth');

Route::get('/admin/tag/edit/{tag:id}', [TagController::class, 'editTag'])->middleware('auth');
Route::put('/admin/tag/edit/{tag:id}', [TagController::class, 'updateTag'])->middleware('auth');

Route::get('/admin/tag/delete/{tag:id}', [TagController::class, 'delete'])->middleware('auth');
