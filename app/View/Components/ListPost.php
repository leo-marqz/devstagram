<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ListPost extends Component
{
    public $posts;
    public $isHome;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($posts, $isHome)
    {
        $this->posts = $posts;
        $this->isHome = $isHome;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.list-post');
    }
}
