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
            "$module_path/views",
            "$module_path/app/Classes",
            "$module_path/app/Controllers",
            "$module_path/app/Models",
            "$module_path/database/migrations",
            "$module_path/database/seeds",
            "$module_path/resources/lang",
            "$module_path/routes",
            "$module_path/tests",
        ];

        $files = [
            "$module_path/routes/web.php",
            "$module_path/routes/api.php",
            "$module_path/routes/admin.php",
        ];

        foreach ($directories as $directory) {
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
        }

        foreach ($files as $file) {
            if (!file_exists($file)) {
                fopen($file, "w");
            }
        }

        // Create module file
        $module_file = fopen("$module_path/$name.php", "w");
        fwrite($module_file, "<?php\n\n");
        fwrite($module_file, "namespace Modules\\$name;\n\n");
        fwrite($module_file, "use App\Cms\Module\CmsModule;\n\n");
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
