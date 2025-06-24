<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Chatbot extends Component
{
    public $welcomeMessage;

    public function __construct()
    {
        // Shared welcome message for everyone
        $this->welcomeMessage = "👋 Hi! Ask me anything about this website’s features.";
    }

    public function render()
    {
        return view('components.chatbot');
    }
}
