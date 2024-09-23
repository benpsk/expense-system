<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionReportHandler;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return to_route('transactions.index');
});
Route::resource('transactions', TransactionController::class);
Route::get('transaction/report', TransactionReportHandler::class)->name('transaction.report');