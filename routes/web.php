<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\EtudiantController;

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
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashbordController::class,'logincontrole'])->middleware(['auth', 'verified'])->name('dashboard');
//////////////// prof /////////////////////////
Route::get('/prof/dashboard', [ProfController::class,'index'])->name('prof');
//////////////// prof //////////////////////////
//////////////// etudiant /////////////////////////
Route::get('/etudiant/dashboard', [EtudiantController::class,'index'])->name('etudiant');
//////////////// etudiant //////////////////////////
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
