<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\DailycostsController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\RelativeController;
use App\Http\Controllers\StatusesController;
use App\Http\Controllers\TrashController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/categories', CategoriesController::class);
    Route::get('/categorystatus', [CategoriesController::class, 'categorystatus']);

    Route::resource('/contacts', ContactsController::class);
    Route::get('/contacttrash', [ContactsController::class, 'trashindex'])->name('contacts.transindex');
    Route::get('/contacttrashrestore/{id}', [DailycostsController::class, 'restore'])->name('trashes.restore');

    Route::post('compose/mailbox/{id}', [ContactsController::class, 'mailbox'])->name('contacts.mailbox');


    Route::resource('/dailycosts', DailycostsController::class);
    Route::get('/dailytrash', [DailycostsController::class, 'trashindex'])->name('dailycosts.transindex');
    Route::get('/dailytrashrestore/{id}', [DailycostsController::class, 'restore'])->name('trashes.restore');


    Route::resource('/relatives', RelativeController::class);



    Route::resource('/statuses', StatusesController::class);
    Route::resource('/trashes', TrashController::class);
    Route::get('/trashesrestore/{id}', [TrashController::class, 'restore'])->name('trashes.restore');
    Route::get('/trashesdestoryall', [TrashController::class, 'destoryall'])->name('trashes.destoryall');



});

require __DIR__ . '/auth.php';
