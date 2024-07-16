<?php

namespace App\Providers;

use App\Cms\Classes\CmsModule;
use App\Cms\CmsEngine;
use Illuminate\Support\Facades\Route;
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

            /**
             * @var CmsModule $module
             */
            $module = new $moduleClass();

            $module_name_lower = $module->nameLowercase();

            // Load translations
            $this->loadTranslationsFrom(base_path("modules/$module_name/resources/lang"), $module_name_lower);

            // Load views
            $this->loadViewsFrom(base_path("modules/$module_name/resources/views"), $module_name_lower);

            // Load routes
            Route::prefix(env('CMS_ADMIN_ROUTE', 'admin') . '/modules/' . $module_name)
                ->name('admin.modules.' . $module_name_lower)
                ->middleware(['auth:admin', 'verified'])
                ->group(function () use ($module_name) {
                    $this->loadRoutesFrom(base_path("modules/$module_name/routes/admin/module.php"));
                });
            $this->loadRoutesFrom(base_path("modules/$module_name/routes/web.php"));

            // Load module
            $module->load();

            CmsEngine::addModule($module);
        }
    }

    public static function getModules(): array
    {
        return CmsEngine::getModules();
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
