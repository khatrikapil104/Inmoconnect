<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class CrmFormField extends Component
{
    public $dynamicAttributes;

    public function __construct($attributes)
    {
        $this->dynamicAttributes = $attributes;
    }

    public function render()
    {
        return view('components.forms.crm-form-field');
    }
}
