<?php

use App\Http\Controllers\GeographiesController;
use App\Http\Controllers\TypesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[ListingsController::class, 'html'])->name('htmlRoute');
Route::get('/geographies',[GeographiesController::class, 'geographies'])->name('geosRoute');
Route::get('/geographies/index',[GeographiesController::class, 'index'])->name('indexRoute');
Route::post('/geographies',[GeographiesController::class, 'store'])->name('storeRoute');
Route::put('/geographies/{location}',[GeographiesController::class, 'update'])->name('updateRoute');
Route::delete('/geographies/{id}',[GeographiesController::class, 'destroy'])->name('deleteRoute');
Route::get('/types',[TypesController::class, 'types'])->name('typesRoute');


//listings' endpoint
Route::get('/listings',[ListingsController::class, 'index'])->name('listingsRoute');
