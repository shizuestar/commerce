<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;


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

Route::get('/', [HomeController::class, "index"]);

Route::get("/detail/{product}", [HomeController::class, "show"]);


Route::post("/detail/cart", [CartController::class, "storeCart"]);

// Auth
Route::get("/login", [LoginController::class, "index"])->middleware("guest");
Route::post("/login", [LoginController::class, "autenticate"]);
Route::get("/regist", [RegisterController::class, "index"])->middleware("guest");
Route::post("/regist", [RegisterController::class, "store"])->middleware("guest");

Route::get("/logout", [LoginController::class, "logout"])->middleware("auth");

Route::get("/dashboard/user/carts", [CartController::class, "showAllCarts"])->middleware("auth");
Route::post("/dashboard/user/carts/checkout/{transactions}", [CartController::class, "checkOut"])->middleware("auth");


Route::get("/dashboard/user/profile", [DashboardController::class, "profile"])->middleware("auth");
Route::put("/dashboard/user/profile/{user}", [DashboardController::class, "updateUser"])->middleware("auth");

Route::resource("/dashboard/products", ProductController::class)->middleware("auth");
Route::get("/dashboard/orders", [CartController::class, "showAllOrders"])->middleware("auth");
Route::post("/dashboard/orders/confirmAdmin/{transactions}", [CartController::class, "confirmAdmin"])->middleware("auth");