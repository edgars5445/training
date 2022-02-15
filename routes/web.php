<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;

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
require __DIR__.'/auth.php';

Route::get('/', [
    HomeController::class, 'index'
])->name('dashboard');

Route::post('/report',[
    SectionController::class, 'reportUser'
])->name('post.report');

Route::get('{category}/{section}/search',[
    SectionController::class, 'filter'
])->name('section.search');

Route::get('/admin/tickets', [
    HomeController::class,'admin'
])->name('admin.tickets')->middleware('auth.admin');

Route::get('/admin/users', [
    HomeController::class,'admin'
])->name('admin.users')->middleware('auth.admin');

Route::delete('/admin/ticket/delete',[
    HomeController::class,'reportDismiss'
])->name('admin.ticketDelete')->middleware('auth.admin');

Route::patch('/admin/ticket/update',[
    HomeController::class,'reportResolve'
])->name('admin.ticketResolve')->middleware('auth.admin');

Route::get('/profile', [ProfileController::class, 'openProfile'])->name('profile.index');

Route::post('/new/post',[HomeController::class, 'newPost'])->name('new.post');
Route::post('/new/post2',[HomeController::class, 'newPostAjax'])->name('new.post2');


Route::get('/{category}',[
    HomeController::class, 'openCategory'
])->name('category');

Route::get('/{category}/{section}',[
    SectionController::class, 'index'
])->name('section');



Route::post('category/delete',[HomeController::class, 'deleteCategory'])->name('delete.category');
Route::post('category/edit',[HomeController::class, 'editCategory'])->name('edit.category');




