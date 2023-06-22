<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleController;  
use App\Http\Controllers\Admin\InventoryController;  
use App\Http\Controllers\Admin\UserAccountController;  
use App\Http\Controllers\Home\HarticleController;  
use App\Http\Controllers\Home\ProjectController;  
use App\Http\Controllers\Home\TyphoonController;  
use App\Http\Controllers\Home\BouyController;  

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

// Login
Route::post('/login', [AdminController::class, 'login']);
Route::get('/getsomething', [AdminController::class, 'getsomething']);
// Logout
Route::post('/logout', [AdminController::class, 'logout'])->middleware('auth:sanctum');

Route::group(['prefix' => 'admin','middleware' => 'auth:sanctum'], function() {
    // Admin Inventory
    Route::get('/getInventory', [InventoryController::class, 'getInventory']);
    Route::post('/storeInventory', [InventoryController::class, 'storeInventory']);
    Route::post('/uploadInventory', [InventoryController::class, 'uploadInventory']);
    Route::post('/deleteImageInventory', [InventoryController::class, 'deleteImageInventory']);
    Route::post('/deleteInventory/{id}', [InventoryController::class, 'deleteInventory']);
    Route::get('/getInventoryEdit/{id}', [InventoryController::class, 'getInventoryEdit']);
    Route::post('/updateInventory', [InventoryController::class, 'updateInventory']);

    // Admin User
    Route::get('/getRole', [UserController::class, 'getRole']);
    Route::get('/getUser', [UserController::class, 'getUser']);
    Route::post('/storeUser', [UserController::class, 'storeUser']);
    Route::post('/deleteUser/{id}', [UserController::class, 'deleteUser']);
    Route::get('/getUserEdit/{id}', [UserController::class, 'getUserEdit']);
    Route::post('/updateUser', [UserController::class, 'updateUser']);
    Route::post('/updatePassword', [UserController::class, 'updatePassword']);


    // Admin Article
    Route::get('/getArticle', [ArticleController::class, 'getArticle']);
    Route::post('/storeArticle', [ArticleController::class, 'storeArticle']);
    Route::post('/upload', [ArticleController::class, 'upload']);
    Route::post('/deleteImage', [ArticleController::class, 'deleteImage']);

    Route::post('/deleteArticle/{id}', [ArticleController::class, 'deleteArticle']);

    Route::get('/getArticleEdit/{id}', [ArticleController::class, 'getArticleEdit']);
    Route::post('/updateArticle', [ArticleController::class, 'updateArticle']);

    // User Account
    Route::get('/getUserAccount', [UserAccountController::class, 'getUserAccount']);
    Route::post('/updateUserAccount', [UserAccountController::class, 'updateUserAccount']);
    Route::post('/updateUserAccountPassword', [UserAccountController::class, 'updateUserAccountPassword']);
});

// Home Article
Route::get('/getArticles', [HarticleController::class, 'getArticles']);
Route::get('/getArticle/{id}', [HarticleController::class, 'getArticle']);
Route::get('/getmoreArticle/{id}', [HarticleController::class, 'getmoreArticle']);
Route::post('/searchArticle', [HarticleController::class, 'searchArticle']);
// Home Projects
Route::get('/getProject/{id}', [ProjectController::class, 'getProject']);
// Water Level
Route::get('/getTyphoon/{id}', [TyphoonController::class, 'getTyphoon']);
Route::get('/getInventory', [InventoryController::class, 'getInventory']);
Route::get('/getSms', [BouyController::class, 'getSms']);



