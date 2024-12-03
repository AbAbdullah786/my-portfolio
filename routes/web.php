<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

Route::get('/', function () {
    return view('index');
});

Route::post('send-email', [EmailController::class, 'sendEmail'])->name('send-mail');
