<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);
Route::get('/product', [HomeController::class, 'product']);
Route::get('/detail/{id}', [HomeController::class, 'detail']);
Route::get('/add/{id}', [TransactionController::class, 'add']);
Route::get('/transaction', [TransactionController::class, 'index']);
Route::get('/minus/{id}', [TransactionController::class, 'minus']);
Route::get('/plus/{id}', [TransactionController::class, 'plus']);
Route::get('/delete/{id}', [TransactionController::class, 'delete']);
