<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AdminController;

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

Route::controller(AdminController::class)->group(function (){
    Route::get('/admin/tickets', 'adminTickets')->name('admin.tickets')->middleware('auth.admin');
    Route::get('/admin/users', 'adminUsers')->name('admin.users')->middleware('auth.admin');
    Route::delete('/admin/ticket/delete', 'reportDismiss')->name('admin.ticketDelete')->middleware('auth.admin');
    Route::patch('/admin/ticket/update', 'reportResolve')->name('admin.ticketResolve')->middleware('auth.admin');
});

Route::controller(ProfilenController::class)->group(function (){
    Route::get('/profile', 'openProfile')->name('profile.index');
});

Route::controller(HomeController::class)->group(function (){
    Route::get('/','index')->name('dashboard');
    Route::post('/new/post','newPost')->name('new.post');
    Route::post('/new/post2','newPostAjax')->name('new.post2');
    Route::get('/{category}', 'openCategory')->name('category');
    Route::post('/category/delete','deleteCategory')->name('delete.category');
    Route::post('/category/edit','editCategory')->name('edit.category');
}); 

Route::controller(SectionController::class)->group(function (){
    Route::post('/report', 'reportUser')->name('post.report');
    Route::get('/{category}/{section}/search', 'filter')->name('section.search');
    Route::get('/{category}/{section}', 'index')->name('section');
});