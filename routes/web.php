<?php

use Crazybee47\Laravel\Bitrix24\Http\Controllers\ApplicationController;
use Crazybee47\Laravel\Bitrix24\Http\Controllers\Oauth\AuthController;
use Illuminate\Support\Facades\Route;

Route::addRoute(['POST', 'GET'], '/install', [ApplicationController::class, 'onAppInstall'])->name('install');
Route::addRoute(['POST', 'GET'], '/handle', [ApplicationController::class, 'handle'])->name('handle');

Route::group([
    'prefix' => 'oauth',
    'as' => 'oauth.',
], function () {
    Route::addRoute(['POST', 'GET'], '/callback', [AuthController::class, 'callback'])->name('callback');
    Route::addRoute(['POST', 'GET'], '/redirect', [AuthController::class, 'redirect'])->name('redirect');
});
