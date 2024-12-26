<?php


use Illuminate\Support\Facades\Route; // For defining routes
use App\Http\Controllers\UserController; // For user-related actions
use App\Http\Controllers\WalletController; // For wallet-related actions
use App\Http\Controllers\TransactionController; // For handling transfers

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


Route::get('/users', [UserController::class, 'index']);
Route::get('/wallets', [WalletController::class, 'index']);
Route::get('/wallets/{id}', [WalletController::class, 'show']);
Route::post('/wallets/transfer', [TransactionController::class, 'transfer']);
