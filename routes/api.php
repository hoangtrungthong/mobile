<?php

use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\OrderController;
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
Route::post('login', [AuthenticatedSessionController::class, 'apiLogin']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('orders/{id}', [OrderController::class, 'getApiDetailsOrder']);
    Route::get('admin/orders', [OrderController::class, 'getApiAllOrder']);
    Route::post('logout', [AuthenticatedSessionController::class, 'apiLogout']);
    // Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin' ], function () {
    //     Route::patch('{id}/block-user', [ManageUserController::class, 'blockUser'])->name('blockUser');
    // });
});
