<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ContactController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function()
// {
//     $img = Image::make('https://images.pexels.com/photos/4273439/pexels-photo-4273439.jpeg')->resize(300, 200); // 這邊可以隨便用網路上的image取代
//     return $img->response('jpg');
// });

//首頁
Route::get('/', [AnimalController::class, 'index']);
Route::post('/update', [AnimalController::class, 'update']);
//最新消息
Route::get('/news_list', [NewsController::class, 'index']);
Route::get('/news_add', [NewsController::class, 'create']);
Route::post('/news_add/store', [NewsController::class, 'store']);
Route::get('/news_edit/{id}', [NewsController::class, 'edit']);
Route::patch('/news_update/{id}', [NewsController::class, 'update']);
Route::delete('/news_delete/{id}', [NewsController::class, 'destroy']);
Route::post('/news_search/{keyword}', [NewsController::class, 'search']);
//產品
Route::get('/product_list/{type_id?}', [ProductController::class, 'index']);
Route::get('/product_info/{id}', [ProductController::class, 'show']);
Route::get('/product_add', [ProductController::class, 'create']);
Route::post('/product_add/store', [ProductController::class, 'store']);
Route::get('/product_edit/{id}', [ProductController::class, 'edit']);
Route::post('/product_update/{id}', [ProductController::class, 'update']);
Route::delete('/product_delete/{id}', [ProductController::class, 'destroy']);
Route::post('/product_search/{keyword}', [ProductController::class, 'search']);
//分類
Route::get('/type_list', [TypeController::class, 'index']);
Route::post('/type_add/store', [TypeController::class, 'store']);
Route::post('/type_update', [TypeController::class, 'update']);
Route::delete('/type_delete/{id}', [TypeController::class, 'destroy']);
//聯絡我們
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact/send', [ContactController::class, 'send']);
Route::post('/contact_add', [ContactController::class, 'store']);

Route::get('/captcha', [ContactController::class, 'captcha']);