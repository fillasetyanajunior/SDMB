<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Post;

class Totalcount extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        
        $data['post'] = Post::all()->sortByDesc('updated_at');
        return view('components.totalcount',$data);
    }
}
