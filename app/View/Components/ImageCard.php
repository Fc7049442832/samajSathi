<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ImageCard extends Component
{
    public $user;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user = null)
    {
        // Set default user data if none is provided
        $this->user = $user ?? (object) [
            'name' => 'Rashmi Mishra',
            'age' => 'Age : 24',
            'height' => 'Height : 5.7',
            'image_url' => asset('images/default.jpg'), // Replace with the path to your default image
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.image-card');
    }
}
