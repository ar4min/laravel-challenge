<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'transactions'],function(){
    Route::get('/', ['App\Http\Controllers\API\TransactionController', 'index']);
    Route::post('/{type}', ['App\Http\Controllers\API\TransactionController', 'create']);
    Route::get('/summary', ['App\Http\Controllers\API\TransactionController', 'summary']);

});

