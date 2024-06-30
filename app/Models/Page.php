<?php

namespace App\Models;

use App\Cms\Classes\CmsModel;
use App\Cms\Traits\HasFormView;
use App\Rules\CheckboxRule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Page extends CmsModel
{
    use HasFormView;

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => [
                'required',
                'string',
                'max:255',
                $this->id ? Rule::unique('pages')->ignore($this->id) : Rule::unique('pages')
            ],
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:255',
            'active' => 'boolean'
        ];
    }

    protected $labels = [
        'name' => 'Nom',
        'slug' => 'Slug',
        'seo_title' => 'Titre SEO',
        'seo_description' => 'Description SEO',
        'active' => 'Activation de la page'
    ];

    protected $fillable = [
        'name',
        'slug',
        'seo_title',
        'seo_description',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];
}
