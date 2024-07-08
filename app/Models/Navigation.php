<?php

namespace App\Models;

use App\Cms\Classes\CmsModel;
use App\Cms\Traits\HasFormView;

class Navigation extends CmsModel {

    use HasFormView;

    protected $fillable = [
        'parent_id',
        'order',
        'page_id',
        'active',
    ];

    protected $labels = [
        'parent_id' => 'Parent',
        'order' => 'Ordre',
        'page_id' => 'Page',
        'active' => 'Activation de cet élément',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function rules(): array
    {
        // Write your validation rules here
        return [];
    }
}
