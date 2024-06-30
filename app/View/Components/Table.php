<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Livewire\WithPagination;

class Table extends Component
{

    private array $columns = [];
    private array $rows = [];
    private array $actions = [];
    private bool $search = false;
    private bool $pagination = false;
    private int $perPage = 10;

    /**
     * @var int[]
     */
    private array $perPageOptions = [10, 25, 50, 100];

    /**
     * Create a new component instance.
     */
    public function __construct($columns, $rows)
    {
        $this->columns = $columns;
        $this->rows = $rows;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('admin.components.table.table')->with([
            'columns' => $this->columns,
            'rows' => $this->rows,
            'actions' => $this->actions,
            'search' => $this->search,
            'pagination' => $this->pagination,
            'perPage' => $this->perPage,
            'perPageOptions' => $this->perPageOptions,
        ]);
    }
}
