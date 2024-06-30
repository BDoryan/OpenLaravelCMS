<?php

namespace App\Cms;

use App\View\Components\Sidebar;
use App\View\Components\SidebarLink;

class CmsEngine
{

    public static function getSidebar(): array
    {
        // Content Manger
        $links['Gestionnaire de contenu'] = [
            new SidebarLink('fa fa-file-lines', 'Pages', route('admin.pages')),
            new SidebarLink('fa fa-compass', 'Navigations', route('admin.dashboard')),
//            new SidebarLinkComponent('fas fa-folder', 'Categories', route('admin.dashboard')),
        ];

        // Admin Center
        $links['Centre d\'administration'] = [
            new SidebarLink('fas fa-users', 'Utilisateurs', route('admin.dashboard')),
        ];

        // Developer Tools
        $links['Outils de développeur'] = [
//            new SidebarLinkComponent('fas fa-code', 'Code Editor', route('admin.dashboard')),
            new SidebarLink('fas fa-database', 'Base de donnée', route('admin.dashboard')),
        ];

        // Get all models laravel scandir
        $models = [];
        $files = scandir(app_path('Models'));
        foreach ($files as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            }

            $filename = str_replace('.php', '', $file);

//            Check if the model use HasTable trait
            $model = "App\Models\\$filename";
            if (!class_exists($model)) {
                continue;
            }

            if (!is_subclass_of($model, 'App\Cms\Classes\CmsModel')) {
                continue;
            }

            $models[] = [
                'name' => str_replace('.php', '', $file),
                'file' => $file
            ];
        }

        $links['Modèles'] = [];

        foreach ($models as $model) {
            $links['Modèles'][] = new SidebarLink('fa fa-file-lines', $model['name'], route('admin.crud', ['model' => $model['name']]));
        }
        return $links;
    }
}
