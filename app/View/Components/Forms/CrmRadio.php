<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CrmRadio extends Component
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
        return view('components.forms.crm-radio');
    }
}
