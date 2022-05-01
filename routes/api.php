<?php

use App\Http\Controllers\ConferenceConfigController;
use App\Http\Controllers\InvitationRequestController;
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

Route::post('/login', [ConferenceConfigController::class, 'login']);
Route::post('/invitations/create', [InvitationRequestController::class, 'store']);
Route::get('/conference-info', [ConferenceConfigController::class, 'index']);


Route::middleware('auth:sanctum')->group(function () {
    Route::put('/conference-info/update', [ConferenceConfigController::class, 'update']);
    Route::get('/invitations', [InvitationRequestController::class, 'index']);

});
