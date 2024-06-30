<?php

namespace App\Cms\Classes;

class Tools
{

    public static function slugify($string): string
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string), '-'));
    }
}
