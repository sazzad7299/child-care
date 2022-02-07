<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
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
    return view('auth.login');
});

Route::match(['get','post'],'home',[HomeController::class,'home'] )
->middleware(['auth'])->name('home');

Route::match(['get','post'],'items',[HomeController::class,'showItem'] )->name('showItem')
->middleware(['auth']);

Route::match(['get','post'],'show/assignment',[HomeController::class,'show_assignment'] )->name('show_assignment')
->middleware(['auth']);

Route::match(['get','post'],'Post/Assignment',[HomeController::class,'PostAssignment'] )->name('PostAssignment')
->middleware(['auth']);


Route::get('assignment/{id}', [HomeController::class, 'assignment'])->name('assignment')
->middleware(['auth']);

Route::post('post/assignment', [HomeController::class, 'PostAssignment'])->name('PostAssignment')
->middleware(['auth']);

Route::post('update/assignment', [HomeController::class, 'UpdateAssignment'])->name('UpdateAssignment')
->middleware(['auth']);

Route::get('item/{id}', [HomeController::class, 'item'])->name('item')
->middleware(['auth']);

Route::post('item/buy', [HomeController::class, 'item_buy'])->name('item_buy')
->middleware(['auth']);

Route::match(['get','post'],'/show/Orders',[HomeController::class,'showOrders'] )->name('showOrders');



require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';