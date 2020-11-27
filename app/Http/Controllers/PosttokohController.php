<?php

namespace App\Http\Controllers;

use App\Posttokoh;
use App\Post;
use Illuminate\Http\Request;
use File;

class PosttokohController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Post Tokoh';
        $data['posttokohs'] = Posttokoh::paginate(10);
        return view('admin.post.posttokoh.tokoh',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Post Tokoh';
        return view('admin.post.posttokoh.createtokoh',$data);
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
            'nama' => 'required',
            'caption' => 'required',
            'foto' => 'required|image|max:1024|mimes:jpeg,bmp,png',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');

        $foto = time() . '.' . $file->getClientOriginalExtension();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'storage/tokoh';
        $file->move($tujuan_upload,$foto);

        Post::create([
            'post' => 'tokoh',
            'judul' => $request->nama,
            'caption' => $request->caption,
            'foto' => $foto,
            'link' => '',
        ]);
        Posttokoh::create([
            'nama' => $request->nama,
            'caption' => $request->caption,
            'foto' => $foto,
        ]);

        return redirect('/posttokoh')->with('status','Tokoh Berhasil Di Uplode');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Posttokoh  $posttokoh
     * @return \Illuminate\Http\Response
     */
    public function show(Posttokoh $posttokoh)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Posttokoh  $posttokoh
     * @return \Illuminate\Http\Response
     */
    public function edit(Posttokoh $posttokoh)
    {
        $data['title'] = 'Update Post Tokoh';
        return view('admin.post.posttokoh.updatetokoh',$data,compact('posttokoh'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Posttokoh  $posttokoh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posttokoh $posttokoh)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'caption' => 'required',
            'foto' => 'required|image|max:1024|mimes:jpeg,bmp,png',
        ]);

        if (File::exists(public_path('storage/tokoh/'. $posttokoh->foto))) {

            File::delete(public_path('storage/tokoh/'. $posttokoh->foto));

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('foto');

            $foto = time() . '.' . $file->getClientOriginalExtension();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/tokoh';
            $file->move($tujuan_upload,$foto);

            Post::where("judul",$posttokoh->nama)
                ->update([
                    'post' => 'tokoh',
                    'judul' => $request->nama,
                    'caption' => $request->caption,
                    'foto' => $foto,
                    'link' => '',
                ]);
            Posttokoh::where('id',$posttokoh->id)
                        ->update([
                        'nama' => $request->nama,
                        'caption' => $request->caption,
                        'foto' => $foto,
                        ]);
    
            return redirect('/posttokoh')->with('status','Tokoh Berhasil Di Update');
        }else{
            return redirect('/posttokoh')->with('status','File Nothing');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Posttokoh  $posttokoh
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posttokoh $posttokoh)
    {
        File::delete(public_path('storage/tokoh/'. $posttokoh->foto));
        Posttokoh::destroy($posttokoh->id);
        Post::destroy($posttokoh->judul);
        return redirect('/posttokoh')->with('status','Tokoh Berhasil Di Hapus');
    }
}
