<?php

namespace App\Http\Controllers;

use App\Accessadmin;
use Illuminate\Http\Request;

class AccessadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Access Admin';
        $data['accessadmin'] = Accessadmin::all()->sortBy('menu_id');
        return view('admin.accessadmin.accessadmin',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Access Admin';
        return view('admin.accessadmin.createaccessadmin',$data);
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
            'menu_id' => 'required|numeric',
            'sub_id' => 'required|numeric',
        ]);
        Accessadmin::create($request->all());
        return redirect('/accessadmin')->with('status','Access Admin Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Accessadmin  $accessadmin
     * @return \Illuminate\Http\Response
     */
    public function show(Accessadmin $accessadmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Accessadmin  $accessadmin
     * @return \Illuminate\Http\Response
     */
    public function edit(Accessadmin $accessadmin)
    {
        $data['title'] = 'Update Access Admin';
        return view('admin.accessadmin.updateaccessadmin',$data,compact('accessadmin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accessadmin  $accessadmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accessadmin $accessadmin)
    {
        Accessadmin::where('id',$accessadmin->id)
                    ->update($request->all());
        return redirect('/accessadmin')->with('status','Access Admin Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accessadmin  $accessadmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accessadmin $accessadmin)
    {
        Accessadmin::destroy($request->id);
        return redirect('/accessadmin')->with('status','Access Admin Berhasil Di Hapus');
    }   
}
