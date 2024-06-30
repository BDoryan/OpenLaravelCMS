<?php

namespace App\Cms\Classes;

use App\View\Components\Table;
use Illuminate\Database\Eloquent\Model;

abstract class CmsModel extends Model
{

    public abstract function rules(): array;

    public function getTableData(): array {
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
                }
            }

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
