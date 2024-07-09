<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{

    public function toast(Request $request): \Illuminate\Contracts\View\View
    {
        $type = $request->input('type');
        $message = $request->input('message');
        $title = $request->input('title');
        $duration = $request->input('duration');

        return view('admin.components.toast.toast', ['type' => $type, 'message' => $message, 'title' => $title, 'duration' => $duration]);
    }
}
