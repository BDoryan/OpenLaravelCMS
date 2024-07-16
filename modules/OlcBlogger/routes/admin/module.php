<?php

use Modules\OlcBlogger\controllers\BlogController;
use Illuminate\Support\Facades\Route;

// Register route
Route::get('/', [BlogController::class, 'index']);
