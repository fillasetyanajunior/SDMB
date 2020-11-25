<?php

namespace App\Http\Controllers;

use App\Menuadmin;
use Illuminate\Http\Request;

class MenuadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Menu Admin';
        $data['menuadmin'] = Menuadmin::all()->sortBy('name');
        return view('admin.menuadmin.menuadmin',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Menu Admin';
        return view('admin.menuadmin.createmenuadmin',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'icon' => 'required',
        ]);
        Menuadmin::create($request->all());
        return redirect('/menuadmin')->with('status','Menu Admin Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menuadmin  $menuadmin
     * @return \Illuminate\Http\Response
     */
    public function show(Menuadmin $menuadmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menuadmin  $menuadmin
     * @return \Illuminate\Http\Response
     */
    public function edit(Menuadmin $menuadmin)
    {
        $data['title'] = 'Update Menu Admin';
        return view('admin.menuadmin.updatemenuadmin',$data,compact('menuadmin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menuadmin  $menuadmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menuadmin $menuadmin)
    {
        Menuadmin::where('id',$menuadmin->id)
                ->update($request->all());
        return redirect('/menuadmin')->with('status','Menu Admin Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menuadmin  $menuadmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menuadmin $menuadmin)
    {
        Menuadmin::destroy($menuadmin->id);
        return redirect('/menuadmin')->with('status','Menu Admin Berhasil Di Hapus');
    }
}
