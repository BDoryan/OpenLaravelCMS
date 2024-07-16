<?php

namespace App\Livewire;

use App\Cms\CmsEngine;
use Livewire\Component;

class Modules extends Component
{

    public array $modules = [];
    public string $search = '';

    public function getModules()
    {
        return array_map(function ($module) {
            return $module->toArray();
        }, CmsEngine::getModules());
    }

    public function mount()
    {
        $this->modules = $this->getModules();
    }

    public function updatedSearch()
    {
//        dd($this->search);
        // Réactualiser les modules selon le terme de recherche
        $this->modules = $this->getModules();
        $this->modules = array_filter($this->modules, function ($module) {
            return strpos($module['name'], $this->search) !== false;
        });
    }

    public function render()
    {
        return view('admin.livewire.modules');
    }
}
