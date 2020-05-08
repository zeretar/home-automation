<?php

use App\Computer;
use App\Http\Controllers\ComputerController;
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

Route::prefix('computer')->group(function () {
    Route::get('/', 'ComputerController@index');
    Route::post('/', 'ComputerController@add');
    Route::get('{computer}/wake', 'ComputerController@wake');
});
