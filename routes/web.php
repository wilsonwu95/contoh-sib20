<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionsController;

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



Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'viewRegister']);
Route::post('/register', [AuthController::class, 'submitRegister']);

Route::get("/login", [AuthController::class, 'viewLogin'])->name('login');
Route::post("/login", [AuthController::class, 'submitLogin']);

Route::get('/logout', [AuthController::class, 'logout']);



Route::middleware(['auth'])->group(function() {
    Route::prefix('product')->group(function() {
        Route::get('/',[ProductController::class,'viewData']);
        Route::get('/add', [ProductController::class, 'viewAdd']);
        Route::post('/add', [ProductController::class, 'submitAdd']);

        Route::get('/edit/{id}', [ProductController::class, 'viewEdit']);
        Route::post('/edit',[ProductController::class, 'submitEdit']);

        Route::get('/delete/{id}', [ProductController::class, 'delete']);


        Route::get('/get-row', [ProductController::class,'getRow']);
    });

    Route::get('/dashboard', [DashboardController::class, 'view'])->middleware('reqnama');

    
    Route::get('/transactions/add', [TransactionsController::class, 'viewAdd']);
    Route::post('/transactions/add', [TransactionsController::class, 'submitTrans']);

    Route::get('/transactions/edit/{id}', [TransactionsController::class, 'viewEdit']);
    Route::post('/transactions/edit/', [TransactionsController::class, 'submitEdit']);

    Route::get('/transactions/delete/{id}', [TransactionsController::class,'delete']);
});



