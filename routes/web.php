<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{UserController, SmsController, TransactionController, WalletController};

// Главная страница

Route::get('/', function () {
    return view('main.index');
})->name('index');

Route::get('/info/{template}', function ($template) {
    return view('main.'.$template);
})->name('info');

// Пользователь

Route::post('/user/login', [UserController::class, 'login'])->name('login');

Route::post('/user/registration', [UserController::class, 'registration'])->name('registration');

Route::get('/user/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/user/profile', [UserController::class, 'profile'])->name('user-profile')->middleware('auth');

Route::post('/user/profile/identity', [UserController::class, 'identity'])->name('user-profile-identity')->middleware('auth');

Route::post('/user/picture/upload', [UserController::class, 'picture'])->name('user-picture-upload')->middleware('auth');

// Смс

Route::post('/sms/send', [SmsController::class, 'send'])->name('smsSend');

Route::post('/sms/check', [SmsController::class, 'check'])->name('smsCheck');

// Кошелек

Route::get('/wallet/transactions', [TransactionController::class, 'transactions'])->name('wallet-index')->middleware('auth');

Route::post('/wallet/transactions', [TransactionController::class, 'transactions'])->name('wallet-csv')->middleware('auth');

Route::get('/wallet/charge', function () {
    return view('wallet.charge');
})->name('wallet-charge')->middleware('auth');

Route::post('/wallet/charge', [WalletController::class, 'charge'])->name('wallet-charge')->middleware('auth');

Route::get('/wallet/donate', function () {
    return view('wallet.donate');
})->name('wallet-donate')->middleware('auth');

Route::post('/wallet/donate', [WalletController::class, 'donate'])->name('wallet-donate')->middleware('auth');

Route::get('/wallet/moneybank', function () {
    return view('wallet.moneybank');
})->name('wallet-moneybank')->middleware('auth');

Route::post('/wallet/moneybank', [WalletController::class, 'moneybank'])->name('wallet-moneybank')->middleware('auth');

Route::get('/wallet/transfer', function () {
    return view('wallet.transfer');
})->name('wallet-transfer')->middleware('auth');

Route::post('/wallet/transfer', [WalletController::class, 'transfer'])->name('wallet-transfer')->middleware('auth');

Route::get('/wallet/partner', function () {
    return view('wallet.partner');
})->name('wallet-partner')->middleware('auth');