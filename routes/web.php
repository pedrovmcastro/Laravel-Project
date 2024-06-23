<?php

use App\Http\Controllers\Admin\UserController;      # adiciona os controllers
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', function () {
    $products = Product::all(); // Pega todos os produtos do banco de dados
    return view('project.welcome', ['products' => $products]); //['products' => $products] = compact('products')
})->name('welcome');

Route::get('/exit', [AuthenticatedSessionController::class, 'destroy'])->name('exit');

Route::get('/products/create', function () {
    return view('project.admin.products.create');
})->middleware(['auth', 'verified'])->name('product.create');

Route::post('/products', [ProductController::class, 'store'])->middleware(['auth', 'verified'])->name('product.store');

Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->middleware(['auth', 'verified'])->name('product.edit');

Route::put('/products/{id}', [ProductController::class, 'update'])->middleware(['auth', 'verified'])->name('product.update');

Route::delete('/products/{id}', [ProductController::class, 'destroy'])->middleware(['auth', 'verified'])->name('product.destroy');