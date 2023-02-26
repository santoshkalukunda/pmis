<?php

use App\Http\Controllers\OfficeController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('offices',[OfficeController::class,'index'])->name('offices.index');
Route::post('offices',[OfficeController::class,'store'])->name('offices.store');
Route::get('offices/{office}/edit',[OfficeController::class,'edit'])->name('offices.edit');
Route::put('offices/{office}',[OfficeController::class,'update'])->name('offices.update');
Route::delete('offices/{office}',[OfficeController::class,'destroy'])->name('offices.destroy');
