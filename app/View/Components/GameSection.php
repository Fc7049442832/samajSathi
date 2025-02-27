<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GameSection extends Component
{
    // Define public properties for the games
    public $games;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Initialize the games array
       
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.game-section');
    }
}