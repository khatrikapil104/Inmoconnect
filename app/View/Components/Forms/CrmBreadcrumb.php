<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CrmBreadcrumb extends Component
{
    public $values;
    public $additionalData;
    /**
     * Create a new component instance.
     */
    public function __construct($fieldData,$additionalData = [])
    {
        $this->values = $fieldData;
        $this->additionalData = $additionalData;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.crm-breadcrumb');
    }
}
