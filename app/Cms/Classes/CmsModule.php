<?php

namespace App\Cms\Classes;

use App\Models\ModuleMigration;

abstract class CmsModule
{

    private string $displayName;
    private string $description;
    private string $version;
    private string $author;

    public function __construct(string $displayName, string $description, string $version, string $author)
    {
        $this->displayName = $displayName;
        $this->description = $description;
        $this->version = $version;
        $this->author = $author;
    }

    public abstract function load(): void;

    public abstract function install(): void;

    public abstract function uninstall(): void;

    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    public function getName(): string
    {
        $directory = $this->getDirectory();
        $directory = explode('/', $directory);

        return end($directory);
    }

    public function getDirectory(): string
    {
        $directory = (new \ReflectionClass($this))->getFileName();
        return dirname($directory);
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function migrate(): void
    {
        $migrations_directory = base_path('modules/OlcBlogger/database/migrations');
        $migrations = scandir($migrations_directory);

        foreach ($migrations as $migration) {
            if ($migration === '.' || $migration === '..')
                continue;

            $migration_exists = ModuleMigration::where('module', $this->getName())->where('migration', $migration)->exists();
            if ($migration_exists)
                throw new \Exception("Migration $migration already exists");

            $migration_path = "$migrations_directory/$migration";

            $migration_instance = require_once $migration_path;
            $migration_instance->up();

            $batch = ModuleMigration::where('module', $this->getName())->max('batch');
            $batch = $batch ? $batch + 1 : 1;

            $migration_module = new ModuleMigration();
            $migration_module->module = $this->getName();
            $migration_module->migration = $migration;
            $migration_module->batch = $batch;

            $migration_module->save();
        }
    }

    public function rollback(): void
    {
        $migrations = ModuleMigration::where('module', $this->getName())->orderBy('batch', 'desc')->get();
        foreach ($migrations as $migration) {
            $migration_path = base_path("modules/{$this->getName()}/database/migrations/{$migration->migration}");
            $migration_instance = require_once $migration_path;

            $migration_instance->down();

            $migration->delete();
        }
    }

    public function seed(): void
    {
        $seeds_directory = base_path('modules/OlcBlogger/database/seeds');
        $seeds = scandir($seeds_directory);

        foreach ($seeds as $seed) {
            if ($seed === '.' || $seed === '..')
                continue;

            $seed_path = "$seeds_directory/$seed";
            require_once $seed_path;

            // Get the class name
            $content = file_get_contents($seed_path);
            preg_match('/class ([a-zA-Z0-9_]+) extends Seeder/', $content, $matches);
            $class_name = $matches[1];

            $seed_instance = new $class_name();
            $seed_instance->run();
        }
    }

    public function basePath(string $path): string
    {
        if (substr($path, 0, 1) !== '/')
            $path = "/$path";

        $module_directory = base_path("modules/{$this->name}");
        return base_path("$module_directory$path");
    }
}
