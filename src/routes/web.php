<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ClinicHistoryController;
use App\Http\Controllers\CollaboratorController;
use App\Http\Controllers\ClinicHistoryDetailController;

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

Route::get('{any}', function () {
    return view('home');
})->where('any', '.*');

/*  Route::get('/', function () {
    return view('home');
});

Route::get('clinic-history', function () {
    return view('history/clinichistory');
});

Route::get('clinic-history-detail', function () {
    return view('history/clinichistorydetail');
}); */

/*  Route::get('/{vue_capture?}', function () { return view('home'); })->where('vue_capture', '[/\w.-]*');
 */

Route::resource('user', UserController::class, ['except' =>  'index', 'create', 'show', 'edit']);

Route::resource('pet', PetController::class, ['except' => 'index', 'create', 'show',  'edit']);

Route::resource('clinic-history', ClinicHistoryController::class, ['except' => 'create', 'show', 'edit', 'update']);

Route::resource('collaborator', CollaboratorController::class, ['except' =>  'index', 'create', 'show', 'edit']);

Route::resource('clinic-history-detail', ClinicHistoryDetailController::class, ['except' =>  'create', 'show', 'edit']);
