<?php

namespace App\View\Components;

use Illuminate\View\Component;

use App\Postkultum;
use App\Sponsor;

class Accesoris extends Component
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
        
        $data['postkultum'] = Postkultum::orderBy('updated_at','desc')->paginate(1);
        $data['sponsor'] = Sponsor::orderBy('updated_at','desc')->paginate(1);
        return view('components.accesoris',$data);
    }
}
