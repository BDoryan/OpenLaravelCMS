<?php

namespace App\Models;

use App\Cms\Classes\CmsModel;
use App\Cms\Traits\HasFormView;
use App\Rules\BlockViewRule;

class Block extends CmsModel {

    use HasFormView;

    protected $fillable = [
        'name',
        'view',
        'active',
    ];

    protected $labels = [
        'active' => 'Activation de cet élément',
        'name' => 'Nom',
        'view' => 'Chemin vers la vue',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function rules(): array
    {
        return [
            'active' => 'boolean',
            'name' => 'required|string|max:255',
            'view' => [
                'required',
                'string',
                'max:255',
                new BlockViewRule()
            ],
        ];
    }

    public function compositions()
    {
        return $this->hasMany(PageComposition::class);
    }

    public function render(): string
    {
        return view($this->view)->render();
    }
}
