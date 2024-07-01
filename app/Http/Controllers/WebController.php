<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class WebController extends Controller
{

    public static function page(Page $page)
    {
        $composition = $page->compositions()->orderBy('order')->get();
        $html_content = '';
        foreach ($composition as $item) {
            $html_content .= $item->block->render($item->data);
        }

        return view('web.layout', [
            'title' => $page->seo_title,
            'description' => $page->seo_description,
            'content' => $html_content
        ]);
    }
}
