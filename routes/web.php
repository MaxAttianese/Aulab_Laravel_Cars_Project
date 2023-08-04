<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomepageController;

use App\Http\Controllers\CarController;

use App\Http\Controllers\ExtraController;

use App\Http\Controllers\BuyerController;

use App\Http\Controllers\BrandController;


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

Route::get('/', [HomepageController::class, "homepage"])->name("homepage");

Route::resource('cars', CarController::class);

Route::put('buyer/{car}', [BuyerController::class, "update"])->name("buyer.update");

Route::delete('buyer/{car}', [BuyerController::class, "destroy"])->name("buyer.destroy");

Route::prefix("editor")->middleware("auth")->group(function() {

    Route::resources(['extras' => ExtraController::class, 'brands' => BrandController::class]);

    Route::delete('buyer/{car}', [BuyerController::class, "destroy"])->name("buyer.destroy");

});