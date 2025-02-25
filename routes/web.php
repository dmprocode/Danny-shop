<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopkeeperController;
use App\Http\Controllers\LoginController;


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
// =================End of login===================================

Route::get('/admin/dashboard', [UserController::class, 'adminDashboard'])->name('admin-dashboard');
Route::get('/admin/users', [UserController::class, 'userTable'])->name('user-index');
Route::post('/admin/users', [UserController::class, 'addUsers'])->name('add-user');
Route::post('/admin/user-update', [UserController::class, 'updateUser'])->name('update-user');



// ==============Shopkeeper ==================
Route::get('/shopkpeeper/dashboard',[ShopkeeperController::class, 'dashboardIndex'])->name('shopkeeper-dashboard');

//===========Unauthorized==================
Route::get('/unathorized',[LoginController::class,'unauthorized'])->name('unathorized');





