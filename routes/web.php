<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiumController;
use App\Http\Controllers\OpsController;
use App\Http\Controllers\SumdaController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', function(){
    return view('login.index');
});

Route::get('/sium', [SiumController::class, 'index'])->name('sium.index');
Route::get('/sium/add', [SiumController::class, 'create'])->name('sium.create');
Route::post('/sium/store', [SiumController::class, 'store'])->name('sium.store');
Route::get('/sium/edit/{id}', [SiumController::class, 'edit'])->name('sium.edit');
Route::post('/sium/update/{id}', [SiumController::class, 'update'])->name('sium.update');
Route::post('/sium/delete/{id}', [SiumController::class, 'delete'])->name('sium.delete');
Route::get('/sium/search', [SiumController::class, 'search'])->name('sium.search');
// Route::post('/sium/softdelete/{id}', [SiumController::class, 'softdelete'])->name('sium.softdelete');

Route::get('/ops', [OpsController::class, 'index'])->name('ops.index');
Route::get('/ops/create', [OpsController::class, 'create'])->name('ops.create');
Route::post('/ops/store', [OpsController::class, 'store'])->name('ops.store');
Route::get('/ops/edit/{id}', [OpsController::class, 'edit'])->name('ops.edit');
Route::post('/ops/update/{id}', [OpsController::class, 'update'])->name('ops.update');
Route::post('/ops/delete/{id}', [OpsController::class, 'delete'])->name('ops.delete');
Route::get('/ops/search', [OpsController::class, 'search'])->name('ops.search');

Route::get('/sumda', [SumdaController::class, 'index'])->name('sumda.index');
Route::get('/sumda/create', [SumdaController::class, 'create'])->name('sumda.create');
Route::post('/sumda/store', [SumdaController::class, 'store'])->name('sumda.store');
Route::get('/sumda/edit/{id}', [SumdaController::class, 'edit'])->name('sumda.edit');
Route::post('/sumda/update/{id}', [SumdaController::class, 'update'])->name('sumda.update');
Route::post('/sumda/delete/{id}', [SumdaController::class, 'delete'])->name('sumda.delete');
Route::get('/sumda/search', [SumdaController::class, 'search'])->name('sumda.search');

Route::get('/logindex', [LoginController::class, 'logindex'])->name('login.index');
Route::get('/regisindex', [LoginController::class, 'regisindex'])->name('regis.index');
Route::get('/user/add', [LoginController::class, 'create'])->name('user.create');
Route::post('/user/store', [LoginController::class, 'store'])->name('user.store');
Route::get('/user/edit/{id}', [LoginController::class, 'edit'])->name('user.edit');
Route::post('/user/update/{id}', [LoginController::class, 'update'])->name('user.update');
Route::post('/user/delete/{id}', [LoginController::class, 'delete'])->name('user.delete');

