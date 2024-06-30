<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Page;
use App\Cms\Classes\Tools;

// Only active page
$pages = Page::where('active', true)->get();
foreach ($pages as $page) {
    Route::get($page->slug, function () use ($page) {
        return view('web.layout', [
            'title' => $page->seo_title,
            'description' => $page->seo_description,
            'content' => 'Hello World !'
        ]);
    })->name('web.pages.'.Tools::slugify($page->name));
}

Route::fallback(function () {
    return view('web.pages.not_found');
});

require __DIR__.'/admin.php';
