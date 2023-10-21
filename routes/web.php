<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConfirmadoController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\SospechosoController;
use App\Http\Controllers\DefuncionController;
use App\Http\Controllers\NegativoController;
use App\Http\Controllers\TotalCasosController;
use App\Http\Controllers\ChartController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/graficas', function () {
    return view('grafica');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('/charts',ChartController::class);

Route::get('/estados/getEstados', [EstadoController::class,'getEstados']);
Route::resource('/estados',EstadoController::class);

Route::get('/confirmados/getConfirmados', [ConfirmadoController::class,'getConfirmados']);
Route::resource('/confirmados',ConfirmadoController::class);

Route::get('/defunciones/getDefunciones', [DefuncionController::class,'getDefunciones']);
Route::resource('/defunciones',DefuncionController::class);

Route::get('/negativos/getNegativos', [NegativoController::class,'getNegativos']);
Route::resource('/negativos',NegativoController::class);

Route::get('/sospechosos/getSospechosos', [SospechosoController::class,'getSospechosos']);
Route::resource('/sospechosos',SospechosoController::class);

Route::get('/show-chart',[ChartController::class,'showMap']);