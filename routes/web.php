<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormDataController;
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

Route::redirect('/', '/form');
Route::get('/form', [FormDataController::class, 'create'])->name('form.create');
Route::post('/form', [FormDataController::class, 'store'])->name('form.store');
Route::get('/form/index', [FormDataController::class, 'index'])->name('form.index');
Route::get('/form/edit/{id}', [FormDataController::class, 'edit'])->name('form.edit');
Route::post('/form/update/{id}', [FormDataController::class, 'update'])->name('form.update');
