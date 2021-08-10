<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PhotoDescriptionController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\OrderController;


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


Route::middleware(['role:admin'])->prefix('admin_panel')->group(function(){
    Route::get('/', [OrderController::class, 'index'])->name('homeAdmin');
});
Route::delete('/{order}',[OrderController::class, 'destroy'])->name('order.destroy');


Route::resource('category', CategoryController::class);
Route::get('/about/edit', [AboutController::class, 'edit'])->name('about.edit');
Route::put('/about/update', [AboutController::class, 'update'])->name('about.update');
Route::get('/photodescription/edit', [PhotoDescriptionController::class, 'edit'])->name('photodescription.edit');
Route::put('/photodescription/update', [PhotoDescriptionController::class, 'update'])->name('photodescription.update');
Route::get('/contact/edit', [ContactController::class, 'edit'])->name('contact.edit');
Route::put('/contact/update', [ContactController::class, 'update'])->name('contact.update');




