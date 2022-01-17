<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SectionController;

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

Route::get('/{category}',[
    HomeController::class, 'openCategory'
])->name('category');

Route::get('/{category}/{section}',[
    SectionController::class, 'index'
])->name('section');