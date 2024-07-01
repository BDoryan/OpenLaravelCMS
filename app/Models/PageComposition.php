<?php

namespace App\Models;

use App\Cms\Classes\CmsModel;
use App\Cms\Traits\HasFormView;

class PageComposition extends CmsModel {

    use HasFormView;

    protected $table = 'page_compositions';

    protected $fillable = [
        'page_id',
        'block_id',
        'order',
        'active',
    ];

    protected $labels = [
        'page_id' => 'Identifiant de la page',
        'block_id' => 'Identifiant du bloc',
        'order' => 'Position de l\'élément',
        'active' => 'Activation de cet élément'
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function page() {
        return $this->belongsTo(Page::class);
    }

    public function block() {
        return $this->belongsTo(Block::class);
    }

    public function rules(): array
    {
        return
        [
            'page_id' => 'required|integer',
            'block_id' => 'required|integer',
            'order' => 'required|integer',
            'active' => 'boolean'
        ];
    }
}
