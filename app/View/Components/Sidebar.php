<?php

namespace App\View\Components;

use App\Cms\Admin\Interface\SidebarMenu;
use App\Cms\CmsEngine;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{

    private array $content = [];

    public function setLinks(string $menu, array $content): void {
        $this->content[$menu] = $content;
    }

    public function addLink(string $menu, SidebarLink $link): void {
        $this->content[$menu][] = $link;
    }

    public function getContent(): array {
        return $this->content;
    }

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $content = CmsEngine::getSidebar();
        foreach ($content as $menu => $link) {
            $this->setLinks($menu, $link);
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('admin.components.sidebar.sidebar')->with('content', $this->getContent());
    }
}
