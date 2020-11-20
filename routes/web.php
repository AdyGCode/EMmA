<?php

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
    return view('welcome');
});

//Route::resources([
//    'equipment-types' => \App\Http\Controllers\EquipmentTypeController::class,
//    'campuses' => \App\Http\Controllers\CampusController::class,
//    'equipment' => \App\Http\Controllers\EquipmentController::class,
//    'assets' => \App\Http\Controllers\AssetController::class,
//]);
Route::middleware(['auth:sanctum', 'verified'])->get('campuses',\App\Http\Livewire\Campuses::class);
Route::middleware(['auth:sanctum', 'verified'])->get('equipment-types',\App\Http\Livewire\EquipmentTypes::class);
Route::middleware(['auth:sanctum', 'verified'])->get('equipment',\App\Http\Livewire\Equipment::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
