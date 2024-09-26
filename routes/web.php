<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthCountroller;
use App\Http\Controllers\ItemGroupController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ExpenditureController;

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


Route::group([
    "middleware" => ["guest"]
], function () {
    //register
    Route::match(["get", "post"], "register", [AuthCountroller::class, "register"])->name("register");
    //login
    Route::match(["get", "post"], "login", [AuthCountroller::class, "login"])->name("login");
    Route::get('/', function () {
        return redirect()->route('login');
    });
});

Route::group([
    "middleware" => ["auth"]
], function () {
    // Dashboard
    Route::get("dashboard", [AuthCountroller::class, "dashboard"])->name("dashboard");

    // Profile
    Route::match(["get", "post"], "profile", [AuthCountroller::class, "profile"])->name("profile");

    // Logout
    Route::get("logout", [AuthCountroller::class, "logout"])->name("logout");

    // Admin-only routes
    Route::middleware(['admin'])->group(function () {
        // ItemGroups routes
        Route::get('/item-groups', [ItemGroupController::class, 'index'])->name('item-groups.index');
        Route::get('/item-groups/create', [ItemGroupController::class, 'create'])->name('item-groups.create');
        Route::post('/item-groups/store', [ItemGroupController::class, 'store'])->name('item-groups.store');
        Route::get('/item-groups/show/{id}', [ItemGroupController::class, 'show'])->name('item-groups.show');
        Route::get('/item-groups/{id}/edit', [ItemGroupController::class, 'edit'])->name('item-groups.edit');
        Route::put('/item-groups/update/{id}', [ItemGroupController::class, 'update'])->name('item-groups.update');
        Route::delete('/item-groups/{id}', [ItemGroupController::class, 'destroy'])->name('item-groups.destroy');

        // Items routes
        Route::get('/items', [ItemController::class, 'index'])->name('items.index');
        Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
        Route::post('/items/store', [ItemController::class, 'store'])->name('items.store');
        Route::get('/items/show/{id}', [ItemController::class, 'show'])->name('items.show');
        Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('items.edit');
        Route::put('/items/update/{id}', [ItemController::class, 'update'])->name('items.update');
        Route::delete('/items/{id}', [ItemController::class, 'destroy'])->name('items.destroy');
    });

    // Guest routes - accessible to all authenticated users
    // Expenditures routes
    Route::get('/expenditures', [ExpenditureController::class, 'index'])->name('expenditures.index');
    Route::get('/expenditures/create', [ExpenditureController::class, 'create'])->name('expenditures.create');
    Route::post('/expenditures/store', [ExpenditureController::class, 'store'])->name('expenditures.store');
    Route::get('/expenditures/show/{id}', [ExpenditureController::class, 'show'])->name('expenditures.show');
    Route::get('/expenditures/{id}/edit', [ExpenditureController::class, 'edit'])->name('expenditures.edit');
    Route::put('/expenditures/update/{id}', [ExpenditureController::class, 'update'])->name('expenditures.update');
    Route::delete('/expenditures/{id}', [ExpenditureController::class, 'destroy'])->name('expenditures.destroy');
});
