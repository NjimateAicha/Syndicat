<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TchatController;
use App\Http\Controllers\InfocomController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReglageController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\CalendrieController;
use App\Http\Controllers\ResidenceController;
use App\Http\Controllers\InventaireController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\RegelementController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\FormRegisterController;
use App\Http\Controllers\GroupController;

Route::get('/', function () {
    // return view('welcome');
    return view('auth.connect');

});


Route::get('/', function () {
    // return view('welcome');
    return view('auth.connect');

});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/index', function () {
    return view('index');
})->name('index');


// Route::get('/dashboard', [DashbordController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard', [DashbordController::class, 'index'])->name('dashboard.index');



Route::get('/infocom', [InfocomController::class, 'index'])->name('infocom.index');
Route::post('/infocom-store', [InfocomController::class, 'store'])->name('infocom.store');
Route::get('/{residence}',[InfocomController::class, 'getInfocom'])->name('infocom.residence');


Route::get('/tchat', [TchatController::class, 'index'])->name('tchat.index');


Route::prefix('/inventaire')->group(function () {
    Route::get('/', [InventaireController::class, 'index'])->name('inventaire.index');
    Route::post('/', action: [InventaireController::class, 'store'])->name('inventaire.store');
    Route::get('/{residence}', [InventaireController::class, 'getInventaire'])->name('inventaire.residence');
    Route::put('/update/{id}', [InventaireController::class, 'update'])->name('inventaire.update');

});



// Route::get('/reglages', [ReglageController::class, 'index'])->name('reglages.index');
Route::get('/reglages/{residence}', [ReglageController::class, 'show'])->name('reglages.show');
Route::delete('/deleteUser/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::put('/updateUser/{id}', [UserController::class, 'update'])->name('user.update');




Route::get('/calendrie', [CalendrieController::class, 'index'])->name('calendrie.index');

// Route::get('/regelement', [ResidenceController::class, ''])->name('regelement.');
Route::get('/residence/{id}', [ResidenceController::class, 'fetchResidence'])->name('residence.fetch');
// active residence
Route::put('/residence/{id}/update-status', [ResidenceController::class, 'updateStatus'])->name('residence.update-status');


// Route::get('/regereclamationlement', [ResidenceController::class, ''])->name('regelement.');
Route::get('/residence/{id}', [ResidenceController::class, 'fetchResidence'])->name('residence.fetch');
Route::post('/residence/store', [ResidenceController::class, 'store'])->name('residence.store');

Route::get('/regelement', [ResidenceController::class, 'index'])->name('regelement.index');
Route::get('/regelement/{residence}', [ResidenceController::class, 'show'])->name('regelement.show');
Route::get('/regelement/{residence}/edit', [ResidenceController::class, 'edit'])->name('regelement.edit');
Route::post('/regelement/update/{id}', [ResidenceController::class, 'update'])->name('regelement.update');

// Route::resource('regelements', RegelementController::class);

// Register form
// Route::get('/inscription', [ResidenceController::class, 'show'])->name('formRegister');
Route::get('/inscription', [FormRegisterController::class, 'index'])->name('formRegister');
Route::post('/inscription', [FormRegisterController::class, 'submit'])->name('formRegister');

Route::post('/Admin/users/store', [InvitationController::class, 'store'])->name('Admin.users.store');
Route::get('/inscription-termine', [UserController::class, 'index'])->name('register.user');
Route::post('/inscription-termine', [UserController::class, 'store'])->name('register.user.store');


// ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::


Route::get('/get-contacts', [UserController::class, 'getContacts']);
// Route for searching contacts
Route::get('/contacts/search', [UserController::class, 'searchContacts'])->name('contacts.search');

Route::get('/contacts/get-group', [UserController::class, 'getGroup'])->name('getGroup');
Route::post('/create-group', [GroupController::class, 'createGroup'])->name('chatify.createGroup');
Route::post('/send-group-message', [GroupController::class, 'sendGroupMessage'])->name('chatify.sendGroupMessage');
Route::post('/get-group-users', [GroupController::class, 'getGroups'])->name('chatify.getGroups');

// :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

Route::group(['prefix' => '/calendar'], function () {
    Route::get('/', [CalendrieController::class, 'index'])->name('events.index');
    Route::get('/{residence}', [CalendrieController::class, 'show'])->name('events.index');
    Route::post('/store', [CalendrieController::class, 'store'])->name('events.store');
    // Fetch events by date
    Route::post('/fetch-by-date', [CalendrieController::class, 'fetchEventsByDate'])->name('events.fetchByDate');

    // Route::get('/{event}', [CalendrieController::class, 'show'])->name('events.show');
    Route::put('/edit', [CalendrieController::class, 'update'])->name('events.update');
    Route::delete('/{event}', [CalendrieController::class, 'destroy'])->name('events.destroy');

    // Additional routes for specific functionalities can be added here
    // For example, add a route for comments on events
    // Route::post('/comment', [CommentController::class, 'store'])->name('comments.store');
});


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

    Route::get('type/{type}/{residence}',[DocumentController::class, 'show_type'])->name('document.type');

});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
