<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Session\SessionController;
use App\Http\Controllers\Competence\CompetenceController;
use App\Http\Controllers\Apprenant\ApprenantController;

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
Route::get('/', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'create']);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware([\App\Http\Middleware\Authenticate::class])->group(function () {
    Route::get('/session', [SessionController::class, 'index'])->name('session');
    Route::get('/session/create', [SessionController::class, 'create'])->name('session_create');
    Route::post('/session/create', [SessionController::class, 'store']);
    Route::get('/session/show/{id}', [SessionController::class, 'show'])->name('session_show');;
    Route::get('/session/remove/{id}', [SessionController::class, 'remove'])->name('session_remove');;
    Route::get('/session/apprenant/{id}', [SessionController::class, 'apprenant'])->name('apprenant_add');
    Route::get('/session/apprenant/add/{idSession}/{idApprenant}', [SessionController::class, 'add_apprenant'])->name('apprenant_add_submit');;
    Route::get('/session/apprenant/delete/{idSession}/{idApprenant}', [SessionController::class, 'remove_apprenant'])->name('apprenant_remove');
    Route::get('/session/minigroupe/add/{id}', [SessionController::class, 'create_mini_groupe'])->name('create_mini_groupe');

    Route::get('/apprenant', [ApprenantController::class, 'index'])->name('apprenant');
    Route::get('/apprenant/create', [ApprenantController::class, 'create'])->name('apprenant_create');
    Route::post('/apprenant/create', [ApprenantController::class, 'store']);
    Route::get('/apprenant/delete/{id}', [ApprenantController::class, 'delete'])->name('apprenant_delete');
    Route::get('/apprenant/edit/{id}', [ApprenantController::class, 'show'])->name('apprenant_edit');
    Route::post('/apprenant/edit/{id}', [ApprenantController::class, 'edit']);

    Route::get('/competence', [CompetenceController::class, 'index'])->name('competence');
    Route::get('/competence/create', [CompetenceController::class, 'create'])->name('competence_create');
    Route::post('/competence/create', [CompetenceController::class, 'store']);
    Route::get('/competence/delete/{id}', [CompetenceController::class, 'delete'])->name('competence_delete');
    Route::get('/competence/edit/{id}', [CompetenceController::class, 'show'])->name('competence_edit');
    Route::post('/competence/edit/{id}', [CompetenceController::class, 'edit']);
});
