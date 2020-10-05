<?php

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
Route::get('/orders', App\Http\Livewire\Orders\Index::class)->name('orders');
Route::get('/orders/{order}/edit', App\Http\Livewire\Orders\Edit::class)->name('orders.edit');

Route::get('/products', App\Http\Livewire\Products\Index::class)->name('products');
Route::get('/products/create', App\Http\Livewire\Products\Create::class)->name('products.create');
Route::get('/products/{product}/edit', App\Http\Livewire\Products\Edit::class)->name('products.edit');

Route::get('/categories', App\Http\Livewire\Categories\Index::class)->name('categories');
Route::get('/categories/create', App\Http\Livewire\Categories\Create::class)->name('categories.create');
Route::get('/categories/{category}/edit', App\Http\Livewire\Categories\Edit::class)->name('categories.edit');

Route::get('/nomors', App\Http\Livewire\Nomors\Index::class)->name('nomors');
Route::get('/nomors/create', App\Http\Livewire\Nomors\Create::class)->name('nomors.create');
Route::get('/nomors/{nomor}/edit', App\Http\Livewire\Nomors\Edit::class)->name('nomors.edit');

Route::get('/payments', App\Http\Livewire\Payments\Index::class)->name('payments');
Route::get('/payments/create', App\Http\Livewire\Payments\Create::class)->name('payments.create');
Route::get('/payments/{payment}/edit', App\Http\Livewire\Payments\Edit::class)->name('payments.edit');

Route::get('/transactions', App\Http\Livewire\Transactions\Index::class)->name('transactions');