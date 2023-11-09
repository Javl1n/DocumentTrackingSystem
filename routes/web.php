<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DocumentDateController;
use App\Http\Controllers\DocumentTemplateController;
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






// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// Route::middleware(['role:CHO', 'auth'])->group(function () {
//     Route::get('templates', [DocumentTemplateController::class, 'index'])->name('templates');
//     Route::get('templates/create', [DocumentTemplateController::class, 'create']);
// });




Route::middleware('auth')->group(function () {
    Route::get('/', [DocumentController::class, 'index'])->name('Home');

    Route::get('/template/{template:slug}', [DocumentDateController::class, 'index']);
    
    // Route::get('documents', [DocumentController::class, 'index'])
    //     ->name('Home');

    // Route::middleware('role:BHW')->group(function () {

    // });
    Route::middleware(['role:CHO'])->group(function () {
        Route::get('templates', [DocumentTemplateController::class, 'index'])->name('templates');
        Route::post('templates', [DocumentTemplateController::class, 'store']);
        Route::get('templates/create', [DocumentTemplateController::class, 'create']);
    });

    Route::middleware(['role:BHW'])->group(function () {
        Route::get('documents/create/{template}', [DocumentController::class, 'create']);
        Route::post('documents', [DocumentController::class, 'store']);
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';