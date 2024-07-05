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
                'regex:/^[a-zA-Z0-9\-\/]+$/',
                $this->id ? Rule::unique('pages')->ignore($this->id) : Rule::unique('pages'),
            ],
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:255',
            'active' => 'boolean'
        ];
    }

    public function filters() {
        return [
            'slug' => function ($value) {
                return strtolower($value);
            }
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

    public function compositions() {
        return $this->hasMany(PageComposition::class);
    }

    public function addComposition(Block $block, int $order = 0, $active = true) {
        $composite = new PageComposition();
        $composite->page_id = $this->id;
        $composite->block_id = $block->id;
        $composite->order = $order;
        $composite->active = $active;

        $composite->save();
    }

    public function updateComposite(PageComposition $composite, string $data) {
        $composite->data = $data;
        $composite->save();
    }

    public function deleteComposite(PageComposition $composite) {
        $composite->delete();
    }
}
