<?php

namespace App\View\Components\Views\Layouts\Requests;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RequestIndex extends Component
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
        return view('components.views.layouts.requests.request-index');
    }
}
