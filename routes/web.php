<?php

use App\Http\Controllers\ViewConfigController;
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

// Route::prefix('/')->group(function () {
//     return view('welcome');
//     // Route::get('/', [ViewConfigController::class, 'index'])->name('viewConfig.index');
// });


// Route::prefix('view-config')->group(function(){
//     // Route::get('/', [ViewConfigController::class, 'index'])->name('viewConfig.index');
// });

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // view config
    Route::prefix('view-config')->group(function(){
        Route::get('/', [ViewConfigController::class, 'index'])->name('viewConfig.index');
        Route::post('/store', [ViewConfigController::class, 'store'])->name('viewConfig.store');
        Route::get('/detail/{id}', [ViewConfigController::class, 'show'])->name('viewConfig.detail');
        Route::post('/{id}/add-attribute/', [ViewConfigController::class, 'addViewConfigAttribute'])->name('viewConfig.addViewConfigAttribute');
        Route::post('/{id}/add-department/', [ViewConfigController::class, 'addDepartment'])->name('viewConfig.addDepartment');
        // Route::get('/', [ViewConfigController::class, 'index'])->name('viewConfig.index');
    });

    // Route::prefix('view-config-attr')->group(function(){
    //     Route::get('/', [ViewConfigController::class, 'index'])->name('viewConfig.index');
    //     Route::post('/store', [ViewConfigController::class, 'store'])->name('viewConfig.store');
    //     Route::get('/detail/{id}', [ViewConfigController::class, 'show'])->name('viewConfig.detail');
    //     // Route::get('/', [ViewConfigController::class, 'index'])->name('viewConfig.index');
    // });
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
