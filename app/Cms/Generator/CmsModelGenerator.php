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

    use HasFormView;

    protected $fillable = [
        \'active\',
    ];

    protected $labels = [
        \'active\' => \'Activation de cet élément\',
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

        $this->generateMigration($this->getModelName());

        file_put_contents(app_path("Models/" . $this->getModelName() . ".php"), $model);
    }

    private function generateMigration(string $model_name): void
    {
        $migration =
            '<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Create' . $model_name . 'Table extends Migration
{

    public function up()
    {
        Schema::create(\'' . strtolower($model_name) . 's\', function (Blueprint $table) {
            $table->id();
            // Your attributes here
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(\'' . strtolower($model_name) . 's\');
    }
}';

        file_put_contents(database_path("migrations/" . date('Y_m_d_His') . "_create_" . strtolower($model_name) . "_table.php"), $migration);
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
