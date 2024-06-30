<?php

namespace App\Console\Commands;

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

        $model =
'<?php

namespace App\Models;

use App\Cms\Classes\CmsModel;

class '.$model_name.' extends CmsModel {

    protected $fillable = [
        \'active\' => \'boolean\',
    ];

    protected $casts = [
        \'active\' => \'boolean\',
    ];

    public function rules(): array
    {
        // Write your validation rules here
        return [];
    }
}
';
        file_put_contents(app_path("Models/$model_name.php"), $model);

        $this->info("Model $model_name created successfully");
    }
}
