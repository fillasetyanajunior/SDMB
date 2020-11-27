<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use File;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = request()->user();
        $data['title'] = 'Profile';
        return view('home.profile',$data,compact('user'));
    }

    public function update(Request $request,User $user)
    {
        $validatedData = $request->validate([
            'avatar' => 'required|image|max:7024|mimes:jpeg,bmp,png,jpg',
        ]);

        if (File::exists(public_path('storage/profile/'. $user->avatar))) {

            File::delete(public_path('storage/profile/'. $user->avatar));

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('avatar');

            $foto = time() . '.' . $file->getClientOriginalExtension();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/profile';
            $file->move($tujuan_upload,$foto);
    
            User::where('id',$user->id)
                        ->update([
                        'avatar' => $foto,
                        ]);
    
            return redirect()->back()->with('status','Profile Berhasil Di Update');
        }else{
            return redirect()->back()->with('status','File Nothing');
        }
    }
}
