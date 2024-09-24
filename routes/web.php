<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Product\Index as ProductIndex;
use App\Http\Livewire\Shop\Index as ShopIndex;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/product', ProductIndex::class)
    ->name('admin.product')
    ->middleware('auth');

Route::get('/shop', ShopIndex::class)
    ->name('shop.index');

require __DIR__.'/auth.php';
