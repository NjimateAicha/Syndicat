<?php

use App\Http\Controllers\FormRegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ResidenceController;
use App\Http\Controllers\RegelementController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\InfocomController;
use App\Http\Controllers\TchatController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/index', function () {
    return view('index');
})->name('index');





Route::get('/infocom', [InfocomController::class, 'index'])->name('infocom');

Route::get('/tchat', [TchatController::class, 'index'])->name('tchat');

Route::get('/inventaire', [Inve::class, 'index'])->name('inventaire');

Route::get('/reglages', [InfocomController::class, 'index'])->name('reglages');

Route::get('/calendrie', [InfocomController::class, 'index'])->name('calendrie');

// Route::get('/regelement', [ResidenceController::class, ''])->name('regelement.');
Route::get('/residence/{id}', [ResidenceController::class, 'fetchResidence'])->name('residence.fetch');

// Route::get('/regereclamationlement', [ResidenceController::class, ''])->name('regelement.');
Route::get('/residence/{id}', [ResidenceController::class, 'fetchResidence'])->name('residence.fetch');

Route::get('/regelement/{id}', [ResidenceController::class, 'show'])->name('regelement.index');
Route::get('/regelement/{residence}/edit', [ResidenceController::class, 'edit'])->name('regelement.edit');
Route::put('/regelement/update/{id}', [ResidenceController::class, 'update'])->name('regelement.update');

// Route::resource('regelements', RegelementController::class);

// Register form
// Route::get('/inscription', [ResidenceController::class, 'show'])->name('formRegister');
Route::get('/inscription', [FormRegisterController::class, 'index'])->name('formRegister');
Route::post('/inscription', [FormRegisterController::class, 'submit'])->name('formRegister');


// Route::resource('regelements', RegelementController::class);


Route::group(['prefix'=> '/reclamation'], function () {
    Route::get('',[ReclamationController::class, 'index'])->name('reclamations');
    Route::post('',[ReclamationController::class, 'store'])->name('reclamations.store');
    Route::get('/{residence}',[ReclamationController::class, 'getReclamations'])->name('reclamations.residence');
    //add comment
    Route::post('/commentaire',[CommentaireController::class, 'store'])->name('commentaires.store');

});

Route::group(['prefix'=> '/document'], function () {
    Route::get('',[DocumentController::class, 'index'])->name('document.index');
    Route::post('',[DocumentController::class, 'store'])->name('document.store');
    Route::get('/{residence}',[DocumentController::class, 'getDocument'])->name('document.residence');

    Route::post('',[DocumentController::class, 'store'])->name('document.store');


});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
