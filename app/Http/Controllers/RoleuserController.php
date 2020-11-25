<?php

namespace App\Http\Controllers;

use App\Roleuser;
use Illuminate\Http\Request;

class RoleuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Role User';
        return view('admin.roleuser.roleuser',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Roleuser  $roleuser
     * @return \Illuminate\Http\Response
     */
    public function show(Roleuser $roleuser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Roleuser  $roleuser
     * @return \Illuminate\Http\Response
     */
    public function edit(Roleuser $roleuser)
    {
        $data['title'] = 'Update Role User';
        return view('admin.roleuser.updateroleuser',$data,compact('roleuser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Roleuser  $roleuser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Roleuser $roleuser)
    {
        Roleuser::where('id',$roleuser->id)
                ->update($request->all());
        return redirect('/roleuser')->with('status','Role User Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Roleuser  $roleuser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roleuser $roleuser)
    {
        //
    }
}
