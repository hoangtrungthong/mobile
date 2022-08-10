<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' => ['role:admin','locale'] ], function () {
    Route::get('language/{language}', [HomeController::class, 'changeLang'])->name('lang');

    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('manage-user', [ManageUserController::class, 'index'])->name('manageUser');
    Route::patch('block-user', [ManageUserController::class, 'blockUser'])->name('blockUser');
    Route::patch('active-user', [ManageUserController::class, 'activeUser'])->name('activeUser');
    Route::delete('delete-user/{id}', [ManageUserController::class, 'deleteUser'])->name('deleteUser');

    Route::resource('categories', CategoryController::class);

    Route::resource('products', ProductController::class);
    Route::get("products/{slug}/updateNew", [ProductController::class, "continueAdd"])->name("continueAdd");
    Route::patch("products/updateNew/{product}", [ProductController::class, "updateNew"])->name("updateNew");

    Route::resource('orders', OrderController::class)->only(['index', 'show', 'destroy']);
    Route::get('order-details/{id}', [OrderController::class, 'show'])->name('orderDetails');
    Route::patch('approve-order/{id}', [OrderController::class, 'state'])->name('stateOrder');
    Route::patch('reject-order/{id}', [OrderController::class, 'rejectOrder'])->name('rejectOrder');

    Route::resource('notifications', NotificationController::class)->only(['index', 'update']);
    Route::get('mark-all-read', [NotificationController::class, 'markAllRead'])->name('markAllRead');
});