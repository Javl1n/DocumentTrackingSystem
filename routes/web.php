<?php

use App\Http\Controllers\City\BarangayDocumentController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DocumentDateController;
use App\Http\Controllers\DocumentTemplateController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProfileController;
use App\Models\BarangayHealthWorker;
use Illuminate\Support\Facades\Gate;
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
    Route::get('/', function () {
        if (Gate::allows('cho')) {
            return redirect('/cho');
        } else {
            $barangay = BarangayHealthWorker::where('user_id', auth()->user()->id)->first()->barangay;

            return redirect(route('documents.index', $barangay));
        }

    })->name('Home');

    Route::group([
        'prefix' => 'bhw',
        'can' => 'bhw',
    ], function () {
        Route::get('documents/create/{template:slug}', [DocumentController::class, 'create'])->name('documents.create');
        Route::post('documents', [DocumentController::class, 'store']);
    });

    Route::group([
        'prefix' => 'cho',
    ], function () {
        Route::get('/', [BarangayDocumentController::class, 'index'])->name('documents.barangay')->can('cho');
        Route::post('templates', [DocumentTemplateController::class, 'store'])->name('templates.store')->can('cho');
        Route::get('templates/create', [DocumentTemplateController::class, 'create'])->name('templates.create')->can('cho');
    });
    
    Route::get('barangay/{barangay:slug}', [DocumentController::class, 'index'])->name('documents.index');
    Route::get('templates', [DocumentTemplateController::class, 'index'])->name('templates.index');
    Route::get('/document/{template:slug}', [DocumentDateController::class, 'index'])->name('documents.show');
    Route::get('/template/{template:slug}', [DocumentTemplateController::class, 'show'])->name('templates.show');

    Route::get('/download/{file:id}', [FileController::class, 'download'])->name('download');

    // Route::get('/{barangay:slug}', [DocumentController::class, 'index']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
