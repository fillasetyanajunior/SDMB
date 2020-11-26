<?php

namespace App\Http\Controllers;

use App\Accessuser;
use Illuminate\Http\Request;

class AccessuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Access User';
        $data['accessuser'] = Accessuser::all()->sortBy('menu_id');
        return view('admin.accessuser.accessuser',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Access User';
        return view('admin.accessuser.createaccessuser',$data);
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
        Accessuser::create($request->all());
        return redirect('/accessuser')->with('status','Access User Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Accessuser  $accessuser
     * @return \Illuminate\Http\Response
     */
    public function show(Accessuser $accessuser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Accessuser  $accessuser
     * @return \Illuminate\Http\Response
     */
    public function edit(Accessuser $accessuser)
    {
        $data['title'] = 'Update Access User';
        return view('admin.accessuser.updateaccessuser',$data,compact('accessuser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accessuser  $accessuser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accessuser $accessuser)
    {
        Accessuser::where('id',$accessuser->id)
        ->update([
            'menu_id' => $request->menu_id,
            'sub_id' => $request->sub_id,
        ]);
        return redirect('/accessuser')->with('status','Access User Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accessuser  $accessuser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accessuser $accessuser)
    {
        Accessuser::destroy($request->id);
        return redirect('/accessuser')->with('status','Access User Berhasil Di Hapus');
    }
}
