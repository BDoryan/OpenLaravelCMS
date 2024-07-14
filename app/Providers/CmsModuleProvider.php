<?php

namespace App\Providers;

use App\Cms\CmsEngine;
use Illuminate\Support\ServiceProvider;

class CmsModuleProvider extends ServiceProvider
{

    public function loadModules(): void
    {
        // Get all modules in directory 'modules'
        $modules = scandir(base_path('modules'));

        foreach ($modules as $module_name) {
            if ($module_name === '.' || $module_name === '..')
                continue;

            $module_path = base_path("modules/$module_name/$module_name.php");
            if (!file_exists($module_path))
                continue;

            $moduleClass = "Modules\\$module_name\\$module_name";

            $module = new $moduleClass();

            $this->loadTranslationsFrom(base_path("modules/$module_name/resources/lang"), $module_name);
            $module->load();

            CmsEngine::addModule($module);
        }
    }

    /**
     * Register services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadModules();
    }
}
