<?php

namespace App\Cms\Traits;

use App\Models\Page;
use App\Rules\CheckboxRule;
use Illuminate\View\View;

trait HasFormView
{

    const TYPES = [
        'string' => 'text',
        'integer' => 'number',
        'boolean' => 'checkbox',
    ];

    public static function typeToString($field) {
        if(is_array($field))
            return implode($field);

        return $field;
    }

    public static function getType($field): string|null {
        foreach(self::TYPES as $type => $htmlType)
            if(str_contains(self::typeToString($field), $type))
                return $htmlType;
        return null;
    }

    public function getFormView(): View {
        $rules = $this->rules();
        $fields = [];

        foreach($this->fillable as $field) {
            $fields[$field] = [
                'type' => self::getType($rules[$field]) ?? 'text',
                'name' => $field,
                'label' => $this->labels[$field],
                'value' => $this->$field,
                'required' => str_contains('required', self::typeToString($rules[$field])),
            ];
        }

        $model_class_name = class_basename($this);

        return view('admin.components.form.form', ['model_name' => $model_class_name, 'fields' => $fields, 'entity' => $this]);
    }
}
