<?php

use Illuminate\Support\Facades\Route;

require __DIR__ . '/frontend.php';

require __DIR__ . '/seller.php';

require __DIR__ .'/backend.php';

Route::post('currency_load',[\App\Http\Controllers\CurrencyController::class,'currencyLoad'])->name('currency.load');

Auth::routes(['register'=>false]);







