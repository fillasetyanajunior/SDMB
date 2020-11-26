<?php

namespace App\Http\Controllers;

use App\Menuuser;
use Illuminate\Http\Request;

class MenuuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Menu User';
        $data['menuuser'] = Menuuser::all()->sortBy('title');
        return view('admin.menuuser.menuuser',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Menu User';
        return view('admin.menuuser.createmenuuser',$data);
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
        Menuuser::create($request->all());
        return redirect('/menuuser')->with('status','Menu User Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menuuser  $menuuser
     * @return \Illuminate\Http\Response
     */
    public function show(Menuuser $menuuser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menuuser  $menuuser
     * @return \Illuminate\Http\Response
     */
    public function edit(Menuuser $menuuser)
    {
        $data['title'] = 'Update Menu User';
        return view('admin.menuuser.updatemenuuser',$data,compact('menuuser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menuuser  $menuuser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menuuser $menuuser)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'icon' => 'required',
        ]);
        Menuuser::where('id',$menuuser->id)
        ->update([
            'title' => $request->title,
            'icon' => $request->icon,
        ]);
        return redirect('/menuuser')->with('status','Menu User Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menuuser  $menuuser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menuuser $menuuser)
    {
        Menuuser::destroy($request->id);
        return redirect('/menuuser')->with('status','Menu User Berhasil Di Hapus');
    }
}
