<?php

namespace Modules\OlcBlogger\controllers;

use App\Http\Controllers\Controller;

class BlogController extends Controller
{

    public function index()
    {
        return view('olcblogger::index');
    }
}
