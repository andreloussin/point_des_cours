<?php

use App\Http\Controllers\EcuController;
use App\Http\Controllers\UeController;
use App\Http\Middleware\IsResponsable;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return redirect('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('/ecus',[EcuController::class,'index'])->name('ecus');
    Route::get('/ecus/{ecu_id}/edit',[EcuController::class,'edit'])->name('ecus.edit')->middleware(IsResponsable::class);
    Route::put('/ecus/{ecu_id}/update',[EcuController::class,'update'])->name('ecus.update')->middleware(IsResponsable::class);
    Route::get('/ues',[UeController::class,'index'])->name('ues');
    
});

