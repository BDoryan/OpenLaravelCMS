<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\BackOfficeMiddleware;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;

Route::prefix(env('CMS_ADMIN_ROUTE', 'admin'))
    ->name('admin.')
    ->group(function () {
        Route::middleware(['auth:admin', 'verified'])
            ->group(function () {
                Route::get('/', [AdminController::class, 'index'])
                    ->name('dashboard');

                Route::get('/pages', [AdminController::class, 'pages'])
                    ->name('pages');

                Route::get('/settings', [AdminController::class, 'index'])
                    ->name('settings');

                Route::get('/crud/{model}', [AdminController::class, 'crud'])
                    ->name('crud');

                Route::post('/crud/{model}/create', [AdminController::class, 'postSet'])
                    ->name('crud.create.post');

                Route::get('/crud/{model}/create', [AdminController::class, 'set'])
                    ->name('crud.create');

                Route::post('/crud/{model}/update/{id}', [AdminController::class, 'postSet'])
                    ->name('crud.create.post');

                Route::get('/crud/{model}/update/{id}', [AdminController::class, 'set'])
                    ->name('crud.update');

                Route::delete('/crud/{model}/delete/{id}', [AdminController::class, 'delete'])
                    ->name('crud.delete');
            });


        Route::middleware('guest:admin')
            ->group(function () {
                Route::get('login', [AdminController::class, 'login'])
                    ->name('login');
            });


        Route::middleware('auth:admin')->group(function () {
            Route::post('logout', [AdminController::class, 'logout'])
                ->name('logout');
        });
    }
    );
