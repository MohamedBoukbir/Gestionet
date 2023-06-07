<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\CommentController;
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


//////////////// prof /////////////////////////
Route::get('/dashboard', [DashbordController::class,'logincontrole'])->middleware(['auth', 'verified','backNotAllowed'])->name('dashboard');


// prof // / nf// ff//fv/vfv/vff///
Route::middleware('auth','backNotAllowed','role:prof')->group(function () {
    Route::get('/prof/dashboard', [ProfController::class,'index'])->name('prof');

    Route::get('/prof/student/index', [ProfController::class,'indexStudent'])->name('students.index');

    // add cours and Etudiant
    Route::post('/add/etudiant', [ProfController::class,'addetudiant'])->name('etudiant.add');
    Route::post('/add/cours', [ProfController::class,'addcours'])->name('cours.add');
    // update cours and Etudiant
    Route::post('update/etudiant/{etudiant}', [ProfController::class, 'updateetudiant'])->name('etudiant.update');
    Route::post('update/cours/{cours}', [ProfController::class, 'updatecours'])->name('cours.update');
    // delete cours and Etudiant
    Route::delete('delete/cours/{cours}', [ProfController::class,'destroyCours'])->name('cours.destroye');
    Route::delete('delete/etudiant/{etudiant}', [ProfController::class,'destroyEtudiant'])->name('etudiant.destroye');
     //////////////// comment //////////////////////////

});
// end prof // / nf// ff//fv/vfv/vff///
// etudiant /// / / // / // / // / // / // / // / // / //

Route::middleware('auth','backNotAllowed','role:etudiant')->group(function () {
   //////////////// etudiant /////////////////////////
Route::get('/etudiant/dashboard', [EtudiantController::class,'index'])->name('etudiant');
//////////////// etudiant //////////////////////////
});
// end etudiant /// / / // / // / // / // / // / // / // / //
// comment /// / / // / // / // / // / // / // / // / //

Route::middleware('auth','backNotAllowed')->group(function () {
    //////////////// authentification /////////////////////////
     //////////////// comment //////////////////////////
      // Comment ///////////////////////////////
Route::get('/index/comments/{cours_id}', [CommentController::class, 'indexComment'])->name('index.comment');
Route::post('/comments', [CommentController::class, 'comments'])->name('comment');
//end comment ///////////////////////////////
 // Comment ///////////////////////////////
Route::get('/etudiant/comments/{cours_id}', [CommentController::class, 'indexCommentetudiant'])->name('etudiant.comment');
// Route::post('//etudiant/comments', [CommentController::class, 'commentsetudiant'])->name('etudiant.comment');
//end comment ///////////////////////////////

// nmbre des etudiant lire pdf
Route::get('/nombre/etudiant/{cours}', [EtudiantController::class,'incrementlecture'])->name('increment-lecture');
//////////////// prof //////////////////////////
 });
 // end comment /// / / // / // / // / // / // / // / // / //


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
