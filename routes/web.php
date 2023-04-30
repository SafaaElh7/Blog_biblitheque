<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LivreController;
use App\Http\Controllers\Admin\RapportsController;
use App\Http\Controllers\Admin\ReserveController;
use App\Http\Controllers\Admin\showusersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservcliContror;
use App\Http\Controllers\ShowController;
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
Route::resource('/client', ReservcliContror::class);
Route::get('/livre/{id}', [LivreController::class, 'show'])->name('livre_show');
Route::post('/livre/{id}', [LivreController::class, 'createlivre'])->name('createlivre');


Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/livres/category/{category}', [HomeController::class, 'getProductbyCategory'])->name('category.livres');
Route::resource('/show', ShowController::class);
Route::resource('/show', ShowController::class);
Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/livres', LivreController::class);
    Route::resource('/reserves', ReserveController::class);
    Route::resource('/showusers', showusersController::class);
    Route::resource('/rapports', RapportsController::class);
    Route::post('/search', 'App\http\controllers\showusersController@search');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
