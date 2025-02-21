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
        $this->games = [
            [
                'title' => 'Spin to Win!',
                'description' => 'Try your luck with our Lucky Spin Wheel and win exciting rewards every day!',
                'icon' => 'spin-icon.jpeg', // Path to icon
                'link' => '/spin-wheel', // Route for the game
                'cta' => 'Spin the Wheel Now!',
            ],
            [
                'title' => 'Showcase Your Best Shot!',
                'description' => 'Participate in our Photo Contest and let your pictures do the talking!',
                'icon' => 'camera-icon.png',
                'link' => '/photo-contest',
                'cta' => 'Upload Your Photo & Win!',
            ],
            [
                'title' => 'Speed Dating, Reimagined!',
                'description' => 'Join our Virtual Dating Game and meet potential matches in real-time!',
                'icon' => 'video-icon.png',
                'link' => '/virtual-dating',
                'cta' => 'Start Speed Dating Now!',
            ],
            [
                'title' => 'Test Your Knowledge!',
                'description' => 'Play our Daily Match Trivia and answer fun questions about relationships, love, and more.',
                'icon' => 'quiz-icon.png',
                'link' => '/daily-trivia',
                'cta' => 'Play Trivia & Win Hearts!',
            ],
            [
                'title' => 'How Compatible Are You?',
                'description' => 'Take our Compatibility Quiz Game and discover your perfect match!',
                'icon' => 'heart-icon.png',
                'link' => '/compatibility-quiz',
                'cta' => 'Take the Quiz & Find Your Match!',
            ],
        ];
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