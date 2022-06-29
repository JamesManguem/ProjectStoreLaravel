<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/product', function () {
    return view('product.index');
});

Route::get('/product/contact', function () {
    return view('product.contact');
});

/*
Route::get('/product/create',[ProductController::class,'create']);
*/


Route::resource('product', ProductController::class);


#Auth::routes();

#['register'=>false,'reset'=>false]

#Route::get('/', [ProductController::class, 'index'])->name('home');

/*
Route::group(['middleware' => 'auth'], function (){
    Route::get('/', [ProductController::class, 'index'])->name('home');
});
*/
