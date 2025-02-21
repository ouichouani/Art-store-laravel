<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\commandsController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\productsController;



Route::get('/', function(){
    return view('parties.home') ;
})->name('home') ;

Route::get('user/LoginFrom' , [usersController::class , 'LoginFrom'])->name('LoginFrom') ;
Route::post('user/login' , [usersController::class , 'login'])->name('user.login') ;
Route::post('user/logout' , [usersController::class , 'logout'])->name('user.logout') ;
Route::get('user/{user}/info' , [usersController::class , 'info'])->name('user.info') ;

Route::resource('user', usersController::class);

// -----------------------------------------------------------------------------------------------------

Route::resource('product', productsController::class);
Route::get('purcheses', [productsController::class , 'purcheses'])->name('product.purcheses') ;















// Route::get('/profaile',[usersController::class , 'profaile'])->name('profaile');
// Route::get('/account',[usersController::class , 'index'])->name('account');
// Route::get('/log_in',[usersController::class , 'log_in'])->name('log_in');
// Route::get('/sing_up',[usersController::class , 'sing_up'])->name('sing_up');

// Route::put('/update/{id}',[usersController::class , 'update'])->name('update_user');
// Route::post('/create',[usersController::class , 'create'])->name('create');


// Route::get('/commands_page',[commandsController::class , 'index'])->name('commands_page');

// Route::get('/products',[productsController::class , 'index'])->name('products');

// Route::get('/purcheses',[commandsController::class , 'purcheses'])->name('purcheses');



