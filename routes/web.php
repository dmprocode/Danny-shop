<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopkeeperController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CapitalModelController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ParchassesController;






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
    Route::post('/Update/products', [ProductsController::class, 'updateProducts'])->name('update-product');
    Route::post('/delete/product',[ProductsController::class,'deleteProduct'])->name('delete-product');
    // ======================Products Price================================
    Route::get('/admin/products-price',[ProductsController::class,'productsPrice'])->name('products-price');
    Route::post('/admin/set-price',[ProductsController::class,'setProductprice'])->name('set-product-price');

    //===============Products Sales ================================
    Route::get('/admin/products-sales',[ProductsController::class,'productSalesIndex'])->name('products-sales');
    Route::get('/admin/customer-index',[ProductsController::class,'customerIndex'])->name('customers-index');
    Route::post('/admin/add-customer',[ProductsController::class,'addCustomer'])->name('add-product');
    Route::post('/admin/find-productPrice',[ProductsController::class,'findProductprice'])->name('find-product-price');
    Route::post('/admin/sellProduct',[ProductsController::class,'sellProducts'])->name('add-product-sold');
    Route::post('/admin/updateProducts',[ProductsController::class,'updateProductsSell'])->name('update-products-sales');
    Route::post('/admin/deleteProducts',[ProductsController::class,'deleteSellProducts'])->name('delete-products');
    

    //======================Route Parchasses===================
    Route::get('/admin/parchassesIndex',[ParchassesController::class,'parchassesIndex'])->name('parchasses-index');
    Route::post('/admin/find-price',[ParchassesController::class,'productParchassesPrice'])->name('products-parchasses-price');
    Route::post('/admin/add-parchasses',[ParchassesController::class,'addParchasses'])->name('add-parchasses');
    Route::post('/admin/update-parchasses',[ParchassesController::class,'updatePachasses'])->name('update-parchasses');
    Route::post('/admin/delete-parchasses',[ParchassesController::class,'deleteParchasses'])->name('delete-parchasses');
    Route::get('/admin/latestParchasses',[ParchassesController::class,'latestParchasses'])->name('latest-parchasses');
    Route::get('/admin/viewMoreParchasses/{product_id}', [ParchassesController::class, 'viewMoreParchasses'])->name('view-more-parchasses');
    Route::post('/admin/delete-latestParchass}', [ParchassesController::class, 'deleteLatestParchasses'])->name('delete-latest-parchass');

});

// ==============Shopkeeper ==================

Route::middleware(['auth', 'role:shopkeeper' ])->group(function () {
Route::get('/shopkpeeper/dashboard',[ShopkeeperController::class, 'dashboardIndex'])->name('shopkeeper-dashboard');
});

Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'index']);
});




