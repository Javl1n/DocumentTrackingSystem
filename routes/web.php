<?php

use App\Http\Controllers\City\BarangayDocumentController;
use App\Http\Controllers\DocumentAccessController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DocumentDateController;
use App\Http\Controllers\DocumentRequestController;
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
    ], function () {
        Route::get('documents/create/{template:slug}', [DocumentDateController::class, 'create'])->name('documents.dates.create')->can('bhw');
        Route::post('documents', [DocumentDateController::class, 'store'])->can('bhw');
        Route::put('/update/{barangay:slug}/{date:id}', [DocumentDateController::class, 'update'])->name('documents.dates.update')->can('bhw');
        Route::get('/{barangay:slug}/{template:slug}/{date}/edit', [DocumentDateController::class, 'edit'])->name('documents.dates.edit')->can('bhw');
    });

    Route::group([
        'prefix' => 'cho',
    ], function () {
        Route::get('/', [BarangayDocumentController::class, 'index'])->name('documents.barangay')->can('cho');
        Route::post('templates', [DocumentTemplateController::class, 'store'])->name('templates.store')->can('cho');
        Route::get('templates/create', [DocumentTemplateController::class, 'create'])->name('templates.create')->can('cho');
        Route::delete('/{barangay:slug}/{template:slug}/{date:date}', [DocumentDateController::class, 'destroy'])->name('dates.destroy');
    });

    Route::group([
        'prefix'=> 'barangay', 
        'middleware' => 'barangayWithCho',
    ], function () {
        Route::get('/{barangay:slug}/{template:slug}/{date:date}/request', [DocumentRequestController::class, 'store'])->name('dates.request.store');
        Route::get('/{barangay:slug}/{template:slug}/{date:date}/access', [DocumentAccessController::class, 'edit'])->name('dates.access.edit');
        Route::put('/{barangay:slug}/{template:slug}/{date:date}/access', [DocumentAccessController::class, 'update'])->name('dates.access.update');
        Route::get('/{barangay:slug}/{template:slug}', [DocumentDateController::class, 'index'])->name('documents.dates.index');
        Route::get('/{barangay:slug}', [DocumentController::class, 'index'])->name('documents.index');
    });

    Route::get('barangay/{barangay:slug}/{template:slug}/{date}', [DocumentDateController::class, 'show'])
            ->name('documents.dates.show')
            ->middleware('brangayAndAllowedAccess');

    Route::get('templates', [DocumentTemplateController::class, 'index'])->name('templates.index');
    Route::get('template/{template:slug}', [DocumentTemplateController::class, 'show'])->name('templates.show');

    Route::get('download/{file}', [FileController::class, 'download'])->name('download');

    // Route::get('/{barangay:slug}', [DocumentController::class, 'index']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';