<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\FamilyController;

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
    return view('home');
});
Route::get('/family',[FamilyController::class,'index']);
Route::POST('family/store',[FamilyController::class,'store'])->name('family.store');

Route::get('family/show',[FamilyController::class,'show'])->name('family.show');
Route::get('family/addCity',[FamilyController::class,'addCity'])->name('family.addCity');

Route::POST('family/addPlant',[FamilyController::class,'addPlant'])->name('family.addPlant');

//Route::PUT('family/show',[FamilyController::class,'show'])->name('family.show');
