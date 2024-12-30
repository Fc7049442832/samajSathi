<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditImageInput extends Component
{
    public $placeholder;
    public $inputName;

    /**
     * Create a new component instance.
     */
    public function __construct($placeholder = 'placeholder.png', $inputName = 'image')
    {
        //
        $this->placeholder = $placeholder;
        $this->inputName = $inputName;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.edit-image-input');
    }
}
