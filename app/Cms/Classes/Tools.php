<?php

namespace App\Cms\Classes;

class Tools
{

    public static function slugify($string): string
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string), '-'));
    }

    /**
     * Return the model class name from the given name
     *
     * @param $name
     * @return string|null
     */
    public static function getModelByName($name): array|null
    {
        // Get all models from directory app/Models (and subdirectories)
        $models = [];
        $directory = app_path('Models');
        $it = new \RecursiveDirectoryIterator($directory);
        foreach (new \RecursiveIteratorIterator($it) as $file) {
            if ($file->isFile() && $file->getExtension() == 'php') {
                $models[] = $file->getBasename('.php');
            }
        }

        // Search for the model with the given name
        foreach ($models as $model) {
            if (strtolower($model) == strtolower($name)) {
                return [$model, 'App\\Models\\' . $model];
            }
        }

        return null;
    }

    /**
     * Return a node from the given html
     *
     * @param $name
     * @return string|null
     */
    public static function toNode($node, $html): \DOMDocumentFragment
    {
        $html = str_replace('<br type="_moz">', '', $html);
        $fragment = $node->ownerDocument->createDocumentFragment();

        $line = str_replace('<br>', '<br/>', $html);
        $line = preg_replace('/<img(.*?)>/', '<img$1/>', $line);

        $fragment->appendXML($line);
        return $fragment;
    }
}
