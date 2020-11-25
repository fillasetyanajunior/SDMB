<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ManageruserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Manager User';
        $data['users'] = User::all()->sortBy('name');
        return view('admin.users.users',$data);
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data['title'] = 'Daftar User';
        $data['user'] = User::all()->sortBy('name');
        return view('admin.users.showusers',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $users)
    {
        User::where('id',$users->id)
            ->update([
                'is_active' => 1,
            ]);
        return redirect('/users')->with('status','User Sudah Aktif');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update2(Request $request, User $users)
    {
        User::where('id',$users->id)
            ->update([
                'is_active' => 0,
            ]);
        return redirect('/users')->with('status','User Di Non Aktif');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $users)
    {
    User::destroy($users->id);
    return redirect('/users')->with('status','User Berhasil Di Hapus');
    }
}
