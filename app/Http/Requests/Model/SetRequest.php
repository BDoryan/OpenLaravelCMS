<?php

namespace App\Http\Requests\Model;

use Illuminate\Foundation\Http\FormRequest;

class SetRequest extends FormRequest
{

    public function all($keys = null): array
    {
        $data = parent::all($keys);
        $data['active'] = isset($data['active']);

        return $data;
    }
}
