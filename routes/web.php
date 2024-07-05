<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Page;
use App\Cms\Classes\Tools;
use App\Http\Controllers\WebController;

// Only active page
$pages = Page::where('active', true)->get();
foreach ($pages as $page) {
    Route::get($page->slug, function () use ($page) {
        return WebController::page($page);
    })->name('web.pages.'.Tools::slugify($page->name));
}

Route::fallback(function () {
    return view('web.pages.not_found');
});

require __DIR__ . '/admin/admin.php';
