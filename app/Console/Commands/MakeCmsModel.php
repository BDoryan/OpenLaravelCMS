<?php

namespace App\Console\Commands;

use App\Cms\Generator\CmsModelGenerator;
use Illuminate\Console\Command;

class MakeCmsModel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:cms-model {model?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Allows to create a new CMS model';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $model_name = $this->hasArgument('model') ? $this->argument('model') : '';
        if(empty($model_name))
            $model_name = $this->ask('What is the name of the model?');

        $model_name = ucfirst($model_name);
        (new CmsModelGenerator($model_name))->generate();

        $this->info("Model $model_name created successfully");
    }
}
