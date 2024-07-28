<?php

namespace App\View\Components;

use App\Enum\VenueFilterBy;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class VenueList extends Component
{
    public array $query = [
        'perPage'       => 12,
        'orderByColumn' => 'sortid',
    ];


    /**
     * The properties / methods that should not be exposed to the component template.
     *
     * @var array
     */
    protected $except = ['filter'];

    /**
     * Create a new component instance.
     */
    public function __construct(
        public VenueFilterBy $filterBy,
        public string $id = '',
        public string $title = '')
    {
        if ($filterBy != VenueFilterBy::All){
            $this->query[$filterBy->value . "[]"] = $id;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.venue-list');
    }
}
