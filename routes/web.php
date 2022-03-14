<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [AnimalController::class, 'index']);
Route::get('/news_list', [NewsController::class, 'index']);
Route::get('/news_add', [NewsController::class, 'create']);
Route::post('/news_add/store', [NewsController::class, 'store']);
Route::get('/news_edit/{id}', [NewsController::class, 'edit']);
Route::post('/news_add/update', [NewsController::class, 'update']);
Route::get('/news_delete/{id}', [NewsController::class, 'destroy']);
Route::get('/product_list', [ProductController::class, 'index']);
Route::get('/product_add', [ProductController::class, 'create']);
Route::post('/product_add/store', [ProductController::class, 'store']);
Route::get('/product_type', [ProductController::class, 'type_list']);
Route::post('/type_add/store', [ProductController::class, 'type_store']);
Route::delete('/type_delete/{id}', [ProductController::class, 'type_destroy']);
