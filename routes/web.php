<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopkeeperController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CapitalModelController;
use App\Http\Controllers\ProductsController;




/*
|--------------------------------------------------------------------------
| Web Routes
|-------------------------------------------------------------------------- 
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// =============================Login ================================
Route::get('/',[UserController::class, 'loginIndex'])->name('login');
Route::post('/login',[UserController::class,'loginForm'])->name('login-data');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');
// =================End of login===================================






//===========Unauthorized==================
Route::get('/unathorized',[LoginController::class,'unauthorized'])->name('unathorized');
Route::get('/admin/users', [UserController::class, 'userTable'])->name('user-index');
Route::post('/admin/users', [UserController::class, 'addUsers'])->name('add-user');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [UserController::class, 'adminDashboard'])->name('admin-dashboard');
    Route::get('/admin/users', [UserController::class, 'userTable'])->name('user-index');
    Route::post('/admin/users', [UserController::class, 'addUsers'])->name('add-user');
    Route::post('/admin/user-update', [UserController::class, 'updateUser'])->name('update-user');

    // =======================Capital Route====================
    Route::get('/admin/capital', [CapitalModelController::class, 'capitalIndex'])->name('capital-index');
    Route::post('/admin/capital', [CapitalModelController::class, 'addCapital'])->name('add-capital-initial');
    Route::post('/admin/update', [CapitalModelController::class, 'updateCapital'])->name('update-capital');
    Route::get('/admin/update-capital', [CapitalModelController::class, 'changeCapital'])->name('change-capital');
    Route::post('/admin/change-capital', [CapitalModelController::class, 'increaseCapital'])->name('add-capital');
    Route::get('/admin/check-capital',[CapitalModelController::class,'checkCapital'])->name('check-capital-status');
    Route::post('/admin/update-capital',[CapitalModelController::class,'updateCapitalDetails'])->name('update-capital-details');

    // =======================Products Routs====================
    Route::get('/admin/products', [ProductsController::class, 'productIndex'])->name('product-index');
    Route::post('/admin/products', [ProductsController::class, 'addProducts'])->name('add-products');
    Route::post('/update/products', [ProductsController::class, 'updateProducts'])->name('update-product');



});

// ==============Shopkeeper ==================

Route::middleware(['auth', 'role:shopkeeper' ])->group(function () {
Route::get('/shopkpeeper/dashboard',[ShopkeeperController::class, 'dashboardIndex'])->name('shopkeeper-dashboard');
});

Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'index']);
});




