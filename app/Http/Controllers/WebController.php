<?php

namespace App\Http\Controllers;

use App\Cms\Classes\Tools;
use App\Models\Page;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{

    public static function page(Page $page)
    {
        $composition = $page->compositions()->orderBy('order')->get();
        $html_content = '';

        foreach ($composition as $composite) {
            $composite_html = $composite->block->render($composite->data);
            $composite_data = json_decode($composite->data);

            $dom = new \DOMDocument();
            $dom->loadHTML($composite_html, LIBXML_NOERROR | LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

            $xpath = new \DOMXPath($dom);
            $nodes = $xpath->query('//*[@data-editable]');

            foreach ($nodes as $node) {
                $data_editable = $node->getAttribute('data-editable');

                if (Auth::guard('admin')->check()) {
                    $node->setAttribute('contenteditable', 'true');
                } else {
                    $node->removeAttribute('data-editable');
                }

                if (isset($composite_data->{$data_editable})) {
                    // If the node is a img
                    if ($node->nodeName === 'img') {
                        $node->setAttribute('src', $composite_data->{$data_editable});
                    } else {
                        $data = $composite_data->{$data_editable};

                        $fragment = Tools::toNode($node, $data);
                        $node->nodeValue = '';
                        $node->appendChild($fragment);
                    }
                }
            }

            // Process the DOM as needed
            $composite_html = $dom->saveHTML();

            if (Auth::guard('admin')->check()) {
                $html_content .= view('admin.live-editor.composite-wrapper', [
                    'composite' => $composite,
                    'content' => $composite_html
                ])->render();
            } else {
                $html_content .= $composite_html;
            }
        }

//        if (!empty($html_content)) {
//            $dom = new \DOMDocument();
//            $dom->loadHTML($html_content, LIBXML_NOERROR | LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
//
//            $xpath = new \DOMXPath($dom);
//            $nodes = $xpath->query('//*[@data-editable]');
//
//            if (Auth::guard('admin')->check()) {
//                foreach ($nodes as $node) {
//                    $node->setAttribute('contenteditable', 'true');
//                }
//            }
//
//            // Process the DOM as needed
//            $html_content = $dom->saveHTML();
//        }

        return view('web.layout', [
            'page' => $page,
            'content' => $html_content
        ]);
    }
}
