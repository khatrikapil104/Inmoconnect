<?php

namespace App\View\Components\Views\Auth;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AuthComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $values;
    public function __construct($componentData = null)
    {
        $this->values = $componentData;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.views.auth.auth-component');
    }
}
