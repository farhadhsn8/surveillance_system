<?php

use App\Http\Controllers\EventActionController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('back.index');
})->middleware('auth')->name('login');



Auth::routes();


Route::prefix('actions')->middleware('auth')->group(function(){
    Route::get('/',[EventActionController::class , 'index'])->name('actions');
    Route::get('/create',[EventActionController::class , 'create'])->name('actions.create');
    Route::post('/store',[EventActionController::class , 'store'])->name('actions.store');
    Route::get('/edit/{action}',[EventActionController::class , 'edit'])->name('actions.edit');
    Route::put('/update/{action}',[EventActionController::class , 'update'])->name('actions.update');
    Route::delete('/destroy/{action}',[EventActionController::class , 'destroy'])->name('actions.destroy');

});


Route::prefix('events')->middleware('auth')->group(function(){
    Route::get('/',[EventController::class , 'index'])->name('events');
    Route::get('/no_action',[EventController::class , 'no_action'])->name('events.no_action');
    Route::get('/show-image/{image}',[EventController::class , 'show_image'])->name('events.show_image');
    Route::delete('/destroy/{event}',[EventController::class , 'destroy'])->name('events.destroy');
    Route::get('/date_page',[EventController::class , 'date_page'])->name('date_page');

});


