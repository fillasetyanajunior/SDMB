<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Menuadmin;
use App\Menuuser;

class Slideadmin extends Component
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
        $data['menuadmin'] = Menuadmin::all()->sortBy('title');
        $data['menuuser'] = Menuuser::all()->sortBy('title');
        return view('components.slideadmin',$data);
    }
}
