<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiumController;
use App\Http\Controllers\OpsController;
use App\Http\Controllers\SumdaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JoinController;

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;

Route::get('/home/index', function (){
    return view('home.index'); 
})->name('home.index');

Route::get('/register/index', function (){
    return view('register.index');
})->name('register.index');

// Route::post('/home/index', function(){ return view('home.index'); });

Route::get('/join/index', [JoinController::class, 'index'])->name('join.index');
Route::get('/join/search', [JoinController::class, 'search'])->name('join.search');


// Route untuk Bagian Sium
Route::get('/sium', [SiumController::class, 'index'])->name('sium.index');
Route::get('/sium/add', [SiumController::class, 'create'])->name('sium.create');
Route::post('/sium/store', [SiumController::class, 'store'])->name('sium.store');
Route::get('/sium/edit/{id}', [SiumController::class, 'edit'])->name('sium.edit');
Route::post('/sium/update/{id}', [SiumController::class, 'update'])->name('sium.update');
Route::post('/sium/delete/{id}', [SiumController::class, 'delete'])->name('sium.delete');
Route::get('/sium/softDelete/{id}', [SiumController::class, 'softDelete'])->name('sium.softDelete');
Route::get('/sium/search', [SiumController::class, 'search'])->name('sium.search');
// Route::post('/sium/softdelete/{id}', [SiumController::class, 'softdelete'])->name('sium.softdelete');

//Route untuk bagian Operasional
Route::get('/ops', [OpsController::class, 'index'])->name('ops.index');
Route::get('/ops/create', [OpsController::class, 'create'])->name('ops.create');
Route::post('/ops/store', [OpsController::class, 'store'])->name('ops.store');
Route::get('/ops/edit/{id}', [OpsController::class, 'edit'])->name('ops.edit');
Route::post('/ops/update/{id}', [OpsController::class, 'update'])->name('ops.update');
Route::post('/ops/delete/{id}', [OpsController::class, 'delete'])->name('ops.delete');
Route::get('/ops/search', [OpsController::class, 'search'])->name('ops.search');
Route::get('/ops/softDelete/{id}', [OpsController::class, 'softDelete'])->name('ops.softDelete');

// Route untuk bagian Sumda
Route::get('/sumda', [SumdaController::class, 'index'])->name('sumda.index');
Route::get('/sumda/create', [SumdaController::class, 'create'])->name('sumda.create');
Route::post('/sumda/store', [SumdaController::class, 'store'])->name('sumda.store');
Route::get('/sumda/edit/{id}', [SumdaController::class, 'edit'])->name('sumda.edit');
Route::post('/sumda/update/{id}', [SumdaController::class, 'update'])->name('sumda.update');
Route::post('/sumda/delete/{id}', [SumdaController::class, 'delete'])->name('sumda.delete');
Route::get('/sumda/search', [SumdaController::class, 'search'])->name('sumda.search');

// Router untuk Register
// Route::get('/logindex', [LoginController::class, 'index'])->name('login.index');
// Route::get('/regisindex', [LoginController::class, 'index'])->name('regis.index');
Route::get('/user/add', [RegisterController::class, 'create'])->name('user.create');
Route::post('/user/store', [RegisterController::class, 'store'])->name('user.store');
Route::get('/user/edit/{id}', [RegisterController::class, 'edit'])->name('user.edit');
Route::post('/user/update/{id}', [RegisterController::class, 'update'])->name('user.update');
Route::post('/user/delete/{id}', [RegisterController::class, 'delete'])->name('user.delete');
Route::get('/', [RegisterController::class, 'index'])->name('register.index');                  //Halaman Utama
Route::get('/login', [LoginController::class, 'index'])->name('login.index')->middleware('guest');
Route::post('/login/auth', [LoginController::class, 'authenticate']);


// Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/logout', function(){ 
//     \Auth::logout();
//     return redirect('/home'); 
// });