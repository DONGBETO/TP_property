<?php

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertiesController;
use App\Models\Picture;
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
// Affichage des biens

$slugRegex = '[0-9a-z\-]+';
$idRegex = '[0-9]+';

Route::get('/', [HomeController::class, 'index']);
Route::get('/biens', [PropertiesController::class, 'index'])->name('property.index');
Route::get('/biens/{slug}-{property}', [PropertiesController::class, 'show'])->name('property.show')->where([
    'property' => $idRegex,
    'slug' => $slugRegex,
]);
Route::post('/biens/{property}/contact', [PropertiesController::class, 'contact'])->name('property.contact')->where([
    'property' => $idRegex,
]);

Route::get('/login',[AuthController::class,'login'])
    ->middleware('guest')
    ->name('login');
Route::post('/login',[AuthController::class,'do_login']);
Route::delete('/logout',[AuthController::class,'logout'])
    ->middleware('auth')
    ->name('logout');

// Routes de properties

// Route::get('/images/path', [Picture::class,'show'])->where('path', '.*');

    Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
        Route::get('property', [PropertyController::class, 'index'])->name('property.index');
        Route::get('property/new', [PropertyController::class, 'create'])->name('property.create');
        Route::post('property/new', [PropertyController::class, 'store'])->name('property.store');
        Route::get('property/{property}/edit', [PropertyController::class,'edit'])->name('property.edit');
        Route::post('property/{property}/edit', [PropertyController::class, 'update'])->name('property.update');
        Route::delete('property/{property}', [PropertyController::class, 'destroy'])->name('property.destroy');
        // Route::delete('/picture/{picture}', [Picture::class, 'destroy'])
        //     ->name('picture.destroy')
        //     ->where([
        //         'picture' => $idRegex,
        //     ])
        //     ->can('delete', 'picture');

    });
    
// Routes de options
Route::get('admin/option', [OptionController::class, 'index'])->name('admin.option.index');
Route::get('admin/option/new', [OptionController::class, 'create'])->name('admin.option.create');
Route::post('admin/option/new', [OptionController::class, 'store'])->name('admin.option.store');
Route::get('admin/option/{option}/edit', [OptionController::class,'edit'])->name('admin.option.edit');
Route::post('admin/option/{option}/edit', [OptionController::class, 'update'])->name('admin.option.update');
Route::delete('admin/option/{option}', [OptionController::class, 'destroy'])->name('admin.option.destroy');



