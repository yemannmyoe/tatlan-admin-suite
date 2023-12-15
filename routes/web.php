<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Content\Category;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;


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

// Route::get('/', function () {
// return view('welcome');
// return to_route('home');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::resource('/categories', Category::class);


Route::resource('/categories', CategoryController::class);
Route::resource('/articles', ArticleController::class);
Route::resource('/subcategories', SubCategoryController::class);



