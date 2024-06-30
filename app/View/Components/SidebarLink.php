<?php

namespace App\View\Components;

use App\Cms\Admin\Interface\SidebarMenu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarLink extends Component
{

    private string $icon;
    private string $label;
    private string $route;

    /**
     * Create a new component instance.
     */
    public function __construct(string $icon, string $label, string $route)
    {
        $this->icon = $icon;
        $this->label = $label;
        $this->route = $route;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): void
    {
        $this->icon = $icon;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    public function getRoute(): string
    {
        return $this->route;
    }

    public function setRoute(string $route): void
    {
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('admin.components.sidebar.link')
            ->with('icon', $this->getIcon())
            ->with('label', $this->getLabel())
            ->with('route', $this->getRoute());
    }
}
