<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WalletController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\LoggedInMiddleware;
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

Route::middleware(GuestMiddleware::class)->group(function (){
    Route::get('/home' , [HomeController::class , 'home'])->name('user.home');
    Route::get('category' , [CategoryController::class, 'addCategoryPage'])->name('add.category');
    Route::post('category', [CategoryController::class, 'createCategory'])->name('category.create');
    Route::get('myWallet', [WalletController::class, 'myWallet'])->name('my.wallet');
    Route::post('myWallet', [WalletController::class, 'addToMyWallet'])->name('add.to.my.wallet');
    Route::middleware(AdminMiddleware::class)->get('admin', [AdminController::class , 'index'])->name('admin');
    Route::get('/logout' , [UsersController::class, 'logout'])->name('user.logout');
});

Route::middleware(LoggedInMiddleware::class)->group(function (){
    Route::get('/',[HomeController::class , 'guestHome'])->name('home');
    Route::get('/regisration', [UsersController::class, 'regisrationPage'])->name('user-registeration-page');
    Route::post('/regisration', [UsersController::class, 'register'])->name('user.register');
    Route::post('/login', [UsersController::class, 'login'])->name('user.login');
});
