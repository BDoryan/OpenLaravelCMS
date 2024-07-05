<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LiveEditController;

Route::prefix('live-edit')
    ->name('live-edit.')
    ->group(function () {
        Route::middleware(['auth:admin', 'verified'])
            ->group(function () {
                Route::get('blocks', [LiveEditController::class, 'getBlocks'])
                    ->name('blocks');

                Route::get('/page/{page_id}/composition/add/{block_id}', [LiveEditController::class, 'addComposite'])
                    ->name('composition.add');

                Route::delete('/page/{page_id}/composition/delete/{composite_id}', [LiveEditController::class, 'deleteComposite'])
                    ->name('composition.delete');

                Route::put('/page/{page_id}/composition/update/{composite_id}', [LiveEditController::class, 'updateComposite'])
                    ->name('composition.update');

                Route::put('/page/{page_id}/composition/order', [LiveEditController::class, 'orderComposites'])
                    ->name('composition.order');

                Route::get('/page/{page_id}/composition', [LiveEditController::class, 'getComposition'])
                    ->name('composition');
            }
        );
    }
    );
