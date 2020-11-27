<?php

namespace App\Http\Controllers;

use App\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Post Sponsor';
        $data['sponsors'] = sponsor::paginate(10);
        return view('admin.post.sponsor.sponsor',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Post Sponsor';
        return view('admin.post.sponsor.createsponsor',$data);
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
            'judul' => 'required',
            'caption' => 'required',
            'foto' => 'required|image|max:7024|mimes:jpeg,bmp,png',
        ]);

        $fotos = $request->file('foto');
        $nama= time() . '.' . $fotos->getClientOriginalExtension();
        $foto = $fotos->storeAs('sponsor/',$nama );

        sponsor::create([
            'judul' => $request->judul,
            'caption' => $request->caption,
            'foto' => $foto,
        ]);

        return redirect('/sponsor')->with('status','sponsor Berhasil Di Uplode');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsor $sponsor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsor $sponsor)
    {
        $data['title'] = 'Update Post Sponsor';
        return view('admin.post.sponsor.updatesponsor',$data,compact('sponsor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sponsor $sponsor)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'caption' => 'required',
            'foto' => 'required|image|max:7024|mimes:jpeg,bmp,png',
        ]);

        $fotos = $request->file('foto');
        $nama= time() . '.' . $fotos->getClientOriginalExtension();
        $foto = $fotos->storeAs('sponsor/',$nama );

        Postsponsor::where('id',$postsponsor->id)
                    ->update([
                    'judul' => $request->judul,
                    'caption' => $request->caption,
                    'foto' => $foto,
                    ]);

        return redirect('/postsponsor')->with('status','sponsor Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsor $sponsor)
    {
        Postsponsor::destroy($postsponsor->id);
        return redirect('/postsponsor')->with('status','sponsor Berhasil Di Hapus');
    }
}
