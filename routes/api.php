<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('produk', [AdminController::class, 'produk']);
Route::post('produk/store', [AdminController::class, 'add_produk']);
Route::get('produk/show/{id}', [AdminController::class, 'show_produk']);
Route::post('produk/update/{id}', [AdminController::class, 'update_produk']);
Route::get('produk/delete/{id}', [AdminController::class, 'delete_produk']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
