<?php

namespace App\Http\Controllers;

use App\Subuser;
use Illuminate\Http\Request;

class SubuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Sub Menu User';
        $data['subuser'] = Subuser::all()->sortBy('title');
        return view('admin.subuser.subuser',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Sub Menu User';
        return view('admin.subuser.createsubuser',$data);
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
        Subuser::create($request->all());
        return redirect('/subuser')->with('status','Sub Menu User Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subuser  $subuser
     * @return \Illuminate\Http\Response
     */
    public function show(Subuser $subuser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subuser  $subuser
     * @return \Illuminate\Http\Response
     */
    public function edit(Subuser $subuser)
    {
        $data['title'] = 'Update Sub Menu User';
        return view('admin.subuser.updatesubuser',$data,compact('subuser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subuser  $subuser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subuser $subuser)
    {
        Subuser::where('id',$subuser->id)
                ->update([
                    'title' => $request->title,
                    'url' => $request->url,
                ]);
        return redirect('/subuser')->with('status','Sub Menu User Berhasil Di Hapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subuser  $subuser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subuser $subuser)
    {
        Subuser::destroy($subuser->id);
        return redirect('/subuser')->with('status','Sub Menu User Berhasil Di Hapus');
    }
}
