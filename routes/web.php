<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController;


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





Route::resource('programs', ProgramController::class);
Route::get('getPrograms', [ProgramController::class, 'getPrograms'])->name('programs.getPrograms');
// Route::get('/', [ProgramController::class, 'index'])->name('programs.index');
Route::get('/program', [ProgramController::class, 'index'])->name('programs.index');
Route::get('dashboard', [ProgramController::class, 'Dashboard']);
Route::get('/', [ProgramController::class, 'Dashboard']);
