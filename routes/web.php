<?php

use App\Http\Controllers\AuthenticateUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return redirect('/login');
    return view('layouts.home');
});


Route::get('/login', [AuthenticateUserController::class, 'formLogin'])->name('login');
Route::post('/login', [AuthenticateUserController::class, 'login']);

Route::get('/register', [RegisterUserController::class, 'formRegister'])->name('register');
Route::post('/register', [RegisterUserController::class, 'register']);

Route::get('/logout', [AuthenticateUserController::class, 'logout'])->name('logout');

Route::post('/panel/admin/pizzas/edit', [PizzaController::class, 'edit'])->name('pizza.edit');
Route::post('/panel/admin/pizzas/add', [PizzaController::class, 'add'])->name('pizza.add');
Route::post('/panel/admin/pizzas/remove', [PizzaController::class, 'remove'])->name('pizza.remove');
Route::post('/panel/user/settings/reset-password', [AuthenticateUserController::class, 'resetPassword'])->name('reset-password');

Route::get('/panel/user/addtocart/{id}', [OrderController::class, 'addToCart'])->name('add.to.cart');
Route::get('/panel/user/editcart/{id}', [OrderController::class, 'editCart'])->name('edit.cart');

Route::get('/panel/user/checkout', [OrderController::class, 'checkout'])->name('checkout');

// Routes authentifiées
// User
Route::get('/panel/user/home', [HomeController::class, 'getUserPanel'])->middleware('auth')->name('user.home');
Route::get('/panel/user/order', [HomeController::class, 'getUserOrder'])->middleware('auth')->name('user.order');
Route::get('/panel/user/cart', [HomeController::class, 'getUserCart'])->middleware('auth')->name('user.cart');
Route::get('/panel/user/commands', [HomeController::class, 'getUserCommands'])->middleware('auth')->name('user.commands');
Route::get('/panel/user/commands/{id}', [HomeController::class, 'getCommandDetails'])->middleware('auth')->name('user.command.details');
Route::get('/panel/user/home/settings', [HomeController::class, 'getUserSettings'])->middleware('auth')->name('user.settings');

// Admin
Route::get('/panel/admin/home', [HomeController::class, 'getAdminPanel'])->middleware('auth')->middleware('is_admin')->name('panel.admin');
Route::get('/panel/admin/pizzas', [HomeController::class, 'getPizzaPanel'])->middleware('auth')->middleware('is_admin');
Route::get('/panel/admin/commandes', [HomeController::class, 'getAdminCommands'])->middleware('auth')->middleware('is_admin')->name('admin.commandes');
Route::post('/panel/admin/commandes', [HomeController::class, 'filter'])->middleware('auth')->middleware('is_admin')->name('admin.commandes.filter');
Route::get('/panel/admin/users', [HomeController::class, 'getAdminUsers'])->middleware('auth')->middleware('is_admin')->name('admin.users');

// Cook
Route::get('/panel/cook/home', [HomeController::class, 'getCookPanel'])->middleware('auth')->name('cook.home');
Route::get('/panel/cook/commands', [HomeController::class, 'getCookCommandes'])->middleware('auth')->name('cook.commandes');
Route::post('/panel/cook/commands', [HomeController::class, 'update'])->name('cook.update');
