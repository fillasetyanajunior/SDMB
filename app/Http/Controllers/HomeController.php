<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Role::all();
        foreach($role as $roles)
        {
            if(request()->user()->hasRole($roles->name) == $roles->name)
            {
                return redirect('/'. $roles->name);
            }
        }
    }
}
