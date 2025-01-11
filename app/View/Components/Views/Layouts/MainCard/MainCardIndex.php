<?php

namespace App\View\Components\Views\Layouts\MainCard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MainCardIndex extends Component
{
    public $values;
    /**
     * Create a new component instance.
     */
    public function __construct($fieldData)
    {
        $this->values = $fieldData;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.views.layouts.main-card.main-card-index');
    }
}