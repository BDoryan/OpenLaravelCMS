<?php

namespace App\Cms\Generator;

use App\Cms\Classes\Generator;

class CmsModelGenerator extends Generator
{

    private string $model_name;

    public function __construct(string $model_name)
    {
        $this->model_name = $model_name;
    }

    public function generate()
    {
        $model =
            '<?php

namespace App\Models;

use App\Cms\Classes\CmsModel;

class ' . $this->getModelName() . ' extends CmsModel {

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
        file_put_contents(app_path("Models/".$this->getModelName().".php"), $model);
    }

    /**
     * @return string
     */
    public function getModelName(): string
    {
        return $this->model_name;
    }

    /**
     * @param string $model_name
     */
    public function setModelName(string $model_name): void
    {
        $this->model_name = $model_name;
    }
}
