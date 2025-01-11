<?php

namespace App\View\Components\Views\Layouts\ImagesLayout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ImageGallery extends Component
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
        return view('components.views.layouts.images-layout.image-gallery');
    }
}
