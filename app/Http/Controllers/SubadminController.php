<?php

namespace App\Http\Controllers;

use App\Subadmin;
use Illuminate\Http\Request;

class SubadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Sub Menu Admin';
        $data['subadmin'] = Subadmin::all()->sortBy('title');
        return view('admin.subadmin.subadmin',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Sub Menu Admin';
        return view('admin.subadmin.createsubadmin',$data);
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
            'url' => 'required',
        ]);
        Subadmin::create($request->all());
        return redirect('/subadmin')->with('status','Sub Menu Admin Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subadmin  $subadmin
     * @return \Illuminate\Http\Response
     */
    public function show(Subadmin $subadmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subadmin  $subadmin
     * @return \Illuminate\Http\Response
     */
    public function edit(Subadmin $subadmin)
    {
        $data['title'] = 'Update Sub Menu Admin';
        return view('admin.subadmin.updatesubadmin',$data,compact('subadmin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subadmin  $subadmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subadmin $subadmin)
    {
        Subadmin::where('id',$subadmin->id)
                ->update($request->all());
        return redirect('/subadmin')->with('status','Sub Menu Admin Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subadmin  $subadmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subadmin $subadmin)
    {
        Subadmin::destroy($subadmin->id);
        return redirect('/subadmin')->with('status','Sub Menu Admin Berhasil Di Hapus');
    }
}
