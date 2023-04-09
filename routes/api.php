<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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


Route::post('/storeUser', [AdminController::class, 'storeUser']);
Route::post('/storeArticle', [AdminController::class, 'storeArticle']);

Route::any('{slug}', function(){
    return view('welcome');
});
