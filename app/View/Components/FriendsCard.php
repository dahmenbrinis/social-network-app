<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FriendsCard extends Component
{
    public $user;
    public $rightSide;
    public $size;
    public $info;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user, $size = 'h-full', $info = '')
    {
        $this->user = $user;
        $this->size = $size;
        $this->info = $info;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.friends-card');
    }


}
