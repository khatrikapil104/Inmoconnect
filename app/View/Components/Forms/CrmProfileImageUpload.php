<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CrmProfileImageUpload extends Component
{
    public $values;
    /**
     * Create a new component instance.
     */
    public function __construct($attributes)
    {
        $this->values = $attributes;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.crm-profile-image-upload');
    }
}
