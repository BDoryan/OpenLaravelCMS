<?php

namespace App\Cms;

use App\Cms\Classes\CmsModule;
use App\View\Components\Sidebar;
use App\View\Components\SidebarLink;

class CmsEngine
{

    const VERSION = '1.0.0';
    public static array $modules = [];

    public static function getModules(): array {
        return self::$modules;
    }

    public static function getVersion(): string
    {
        return self::VERSION;
    }

    public static function addModule($module): void
    {
        self::$modules[] = $module;
    }

    public static function getSidebar(): array
    {
        // Content Manger
        $links[__('admin.sidebar.content_management')] = [
            new SidebarLink('fa fa-file-lines', 'Pages', route('admin.pages')),
            new SidebarLink('fa fa-compass', 'Navigations', route('admin.dashboard')),
//            new SidebarLinkComponent('fas fa-folder', 'Categories', route('admin.dashboard')),
        ];

        // Admin Center
        $links[__('admin.sidebar.admin_center')] = [
            new SidebarLink('fas fa-users', 'Utilisateurs', route('admin.dashboard')),
        ];

        $modules = [
            new SidebarLink('fas fa-cube', __('admin.sidebar.module_manage'), route('admin.modules')),
        ];

        /**
         * @var CmsModule $module
         */
        foreach (self::$modules as $module) {
            $module_route = $module->route();
            $modules[] = new SidebarLink('fas fa-cube', $module->getName(), $module_route);
        }

        // Modules center
        $links[__('admin.sidebar.modules')] = $modules;

        // Developer Tools
        $links[__('admin.sidebar.developer_center')] = [
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
