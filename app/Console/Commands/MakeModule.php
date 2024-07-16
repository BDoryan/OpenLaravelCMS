<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new module';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get name
        $name = $this->argument('name');

        // Check if module already exists
        if (file_exists(base_path("modules/$name"))) {
            $this->error("Module $name already exists");
            return;
        }

        // Create module directory
        $module_path = base_path("modules/$name");
        if (!file_exists($module_path)) {
            mkdir($module_path);
        }

        // Create directory for views
        $directories = [
            "$module_path/resources/views",
            "$module_path/resources/lang",
            "$module_path/controllers",
            "$module_path/app/Classes",
            "$module_path/app/Controllers",
            "$module_path/app/Models",
            "$module_path/database/migrations",
            "$module_path/database/seeds",
            "$module_path/assets/css",
            "$module_path/assets/js",
            "$module_path/assets/images",
            "$module_path/assets/fonts",
            "$module_path/assets/vendor",
            "$module_path/config",
            "$module_path/routes",
            "$module_path/routes/admin",
            "$module_path/tests",
        ];

        $files = [
            "$module_path/controllers/ModuleController.php" =>
                "<?php\n" .
                "\n" .
                "namespace Modules\\$name\controllers;\n" .
                "\n" .
                "use App\Http\Controllers\Controller;\n" .
                "\n" .
                "class ModuleController extends Controller\n" .
                "{\n" .
                "    public function index()\n" .
                "    {\n" .
                "        return view('".strtolower($name)."::index');\n" .
                "    }\n" .
                "}\n",
            "$module_path/resources/views/index.blade.php" => "Made the module $name",
            "$module_path/routes/admin/module.php" =>
                "<?php\n" .
                "\n" .
                "use Illuminate\Support\Facades\Route;\n" .
                "use Modules\\$name\controllers\ModuleController;\n" .
                "\n" .
                "Route::get('module', [ModuleController::class, 'index']);\n" .
                "\n",
            "$module_path/routes/web.php" => "<?php\n",
        ];

        foreach ($directories as $directory) {
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
        }

        foreach ($files as $file => $content) {
            file_put_contents($file, $content);
        }

        // Create module file
        $module_file = fopen("$module_path/$name.php", "w");
        fwrite($module_file, "<?php\n\n");
        fwrite($module_file, "namespace Modules\\$name;\n\n");
        fwrite($module_file, "use App\Cms\Classes\CmsModule;\n\n");
        fwrite($module_file, "class $name extends CmsModule\n");
        fwrite($module_file, "{\n\n");
        fwrite($module_file, "    public function __construct()\n");
        fwrite($module_file, "    {\n");
        fwrite($module_file, "        parent::__construct(\n");
        fwrite($module_file, "            '$name',\n");
        fwrite($module_file, "            'Module $name',\n");
        fwrite($module_file, "            '1.0.0',\n");
        fwrite($module_file, "            'Olc'\n");
        fwrite($module_file, "        );\n");
        fwrite($module_file, "    }\n\n");
        fwrite($module_file, "    public function load(): void\n");
        fwrite($module_file, "    {\n");
        fwrite($module_file, "    }\n\n");
        fwrite($module_file, "    public function install(): void\n");
        fwrite($module_file, "    {\n\n");
        fwrite($module_file, "    }\n\n");
        fwrite($module_file, "    public function uninstall(): void\n");
        fwrite($module_file, "    {\n\n");
        fwrite($module_file, "    }\n");
        fwrite($module_file, "}\n");
        fclose($module_file);
    }
}
