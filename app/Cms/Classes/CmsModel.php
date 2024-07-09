<?php

namespace App\Cms\Classes;

use App\View\Components\Table;
use Illuminate\Database\Eloquent\Model;

abstract class CmsModel extends Model
{

    /**
     * You can use this array to define the labels of your fields
     *
     * @return array
     */
    public abstract function rules(): array;

    /**
     * You can use this method to filter the data before saving it
     *
     * @return array
     */
    public function filters()
    {
        return [];
    }

    public function save(array $options = [])
    {
        $filters = $this->filters();
        foreach ($this->fillable as $variable) {
            $value = $this->$variable;

            if (isset($filters[$variable]))
                $this->$variable = $filters[$variable]($this->$variable);
        }

        return parent::save($options);
    }

//    TODO: Make a actions system
//    public function actions(): array {
//        return [
//            'create' => true,
//            'update' => true,
//            'delete' => true,
//        ];
//    }

    public
    function getTableData(): array
    {
        $fields = $this->fillable;
        foreach ($fields as $key => $field) {
            $fields[$key] = $this->labels[$field] ?? $field;
        }
        $fields[] = 'Actions';

        $entries = $this->all();
        $entries = $entries->toArray();

        $model_name = class_basename($this);

        foreach ($entries as $key => $entry) {
            foreach ($entry as $field => $value) {
                if (!in_array($field, $this->fillable)) {
                    unset($entries[$key][$field]);
                } else {
                    // html entities
                    $entries[$key][$field] = htmlentities($value);
                }
            }

            if(isset($entry['active']))
                $entries[$key]['active'] = $entry['active'] ? 'Oui' : 'Non';

            $entries[$key]['Actions'] = view('admin.pages.crud.actions', ['model' => $model_name, 'id' => $entry['id']])->render();
        }

        return [$fields, $entries];
    }

    public function getTableComponent(): Table
    {
        [$fields, $entries] = $this->getTableData();
        return new Table($fields, $entries);
    }
}
