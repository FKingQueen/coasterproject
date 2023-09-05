<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Home\BouyController;
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

Route::get('/getSampleData/{temp1}/{temp2}/{wh}', [BouyController::class, 'getSampleData']);

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');

