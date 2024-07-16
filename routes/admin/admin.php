<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Providers\CmsModuleProvider;
use App\Http\Controllers\ModuleController;

Route::prefix(env('CMS_ADMIN_ROUTE', 'admin'))
    ->name('admin.')
    ->group(function () {
        Route::middleware(['auth:admin'])
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

                Route::get('/modules', [AdminController::class, 'modules'])
                    ->name('modules');

                foreach (CmsModuleProvider::getModules() as $module) {
                    Route::prefix(env('CMS_ADMIN_ROUTE', 'admin') . '/modules/' . $module->nameLowercase())
                        ->name('modules.' . $module->nameLowercase())
                        ->group(function () use ($module) {
                            include base_path("/modules/".$module->getName()."/routes/admin/module.php");
                        });
                }
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

include __DIR__ . '/live-edit.php';
