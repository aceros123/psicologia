<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\FormsController;
use App\Http\Controllers\Admin\PreguntasController;
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

Route::get('/', LoginController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', DashboardController::class)->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->resource('formulario', FormsController::class)->names('Admin.Forms');

Route::middleware(['auth:sanctum', 'verified'])->resource('formulario/preguntas', PreguntasController::class)->names('Admin.Preguntas');    