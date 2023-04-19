<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleController;  

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
Route::post('/logout', [AdminController::class, 'logout']);

// Route::group(['prefix' => 'Admin'], function() {
    // User
    Route::get('/getUser', [UserController::class, 'getUser']);
    Route::post('/storeUser', [UserController::class, 'storeUser']);
    Route::post('/deleteUser/{id}', [UserController::class, 'deleteUser']);
    Route::get('/getUserEdit/{id}', [UserController::class, 'getUserEdit']);
    Route::post('/updateUser', [UserController::class, 'updateUser']);
    Route::post('/updatePassword', [UserController::class, 'updatePassword']);


    // Article
    Route::get('/getArticle', [ArticleController::class, 'getArticle']);

    Route::post('/storeArticle', [ArticleController::class, 'storeArticle']);
    Route::post('/upload', [ArticleController::class, 'upload']);
    Route::post('/deleteImage', [ArticleController::class, 'deleteImage']);

    Route::post('/deleteArticle/{id}', [ArticleController::class, 'deleteArticle']);

    Route::get('/getArticleEdit/{id}', [ArticleController::class, 'getArticleEdit']);
    Route::post('/updateArticle', [ArticleController::class, 'updateArticle']);

    Route::get('/getsomething', [AdminController::class, 'getsomething']);
// });

