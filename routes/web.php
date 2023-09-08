<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Home\BouyController;
use App\Http\Controllers\MonitoringSystem\BouyMonitoringSystemController;
use App\Http\Controllers\MonitoringSystem\WaterLevelMonitoringSystemController;
/*
BouyMonitoringSystemController.
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/getDataFromBouy/{id}/{wh}/{th}/{wp}/{wpwr}/{wt}/{at}', [BouyMonitoringSystemController::class, 'getDataFromDevice']);
Route::get('/getDataFromWLMS/{Data}', [WaterLevelMonitoringSystemController::class, 'getDataFromDevice']);

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');

