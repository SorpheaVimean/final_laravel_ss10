<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\paymentsController;
use App\Http\Controllers\productsController;
use App\Http\Controllers\ProfileController;
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

Route::get('/sale', function () {
    return view('pages/sale');
})->middleware(['auth', 'verified'])->name('sale');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/products', function () {
//     return view('pages/products');
// })->middleware(['auth', 'verified'])->name('products');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('/products', [productsController::class]);
    Route::resource('/products', productsController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/payments', paymentsController::class);

    // Route::post('/products', [productsController::class, 'create'])->name('products.create');
    // Route::put('/products/{id}', [productsController::class, 'edit'])->name('products.edit');
    // Route::delete('/products/{id}', [productsController::class, 'delete'])->name('products.delete');
});

require __DIR__.'/auth.php';
