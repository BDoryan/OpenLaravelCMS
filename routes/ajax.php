<?php

use Illuminate\Support\Facades\Route;
use App\Models\Page;
use App\Cms\Classes\Tools;
use App\Http\Controllers\AjaxController;

Route::prefix('ajax')
    ->name('ajax.')
    ->group(function () {
    Route::get('/toast/', [AjaxController::class, 'toast'])->name('toast');
});
