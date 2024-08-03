<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/',[UserController::class,'showUsers'])->name('userHome'); 
// Route::get('/user/{id}',[UserController::class,'singleUser'])->name('view.user'); 
// Route::post('/add',[UserController::class,'addUser'])->name('add.user'); 
// Route::post('/update/{id}',[UserController::class,'updateUser'])->name('update.User'); 
// Route::get('/updatePage/{id}',[UserController::class,'updatePage'])->name('update.page'); 
// Route::get('/delete/{id}',[UserController::class,'deleteUser'])->name('delete.user');

//short form
Route::controller(UserController::class)->group(function(){
    Route::get('/','showUsers')->name('userHome'); 
    Route::get('/user/{id}','singleUser')->name('view.user'); 
    Route::post('/add','addUser')->name('add.user'); 
    Route::put('/update/{id}','updateUser')->name('update.User'); 
    Route::get('/updatePage/{id}','updatePage')->name('update.page'); 
    Route::get('/delete/{id}','deleteUser')->name('delete.user');

});


Route::view('newuser','/adduser');