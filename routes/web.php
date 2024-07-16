<?php

use Illuminate\Support\Facades\Route;
use App\Models\Page;
use App\Cms\Classes\Tools;
use App\Http\Controllers\WebController;
use App\Cms\CmsEngine;

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

$modules = CmsEngine::getModules();
foreach ($modules as $module) {
    include base_path("/modules/".$module->getName()."/routes/web.php");
}

require __DIR__ . '/ajax.php';
require __DIR__ . '/admin/admin.php';
