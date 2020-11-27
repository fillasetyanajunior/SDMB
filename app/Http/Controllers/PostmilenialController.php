<?php

namespace App\Http\Controllers;

use App\Postmilenial;
use App\Post;
use Illuminate\Http\Request;
use File;

class PostmilenialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Post Milenial';
        $data['postmilenials'] = Postmilenial::paginate(10);
        return view('admin.post.postmilenial.milenial',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Post Milenial';
        return view('admin.post.postmilenial.createmilenial',$data);
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
            'foto' => 'required|image|max:1024|mimes:jpeg,bmp,png',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');

        $foto = time() . '.' . $file->getClientOriginalExtension();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'storage/milenial';
        $file->move($tujuan_upload,$foto);

        Post::create([
            'post' => 'milenial',
            'judul' => $request->judul,
            'caption' => $request->caption,
            'foto' => $foto,
            'link' => '',
        ]);
        Postmilenial::create([
            'judul' => $request->judul,
            'caption' => $request->caption,
            'foto' => $foto,
        ]);

        return redirect('/postmilenial')->with('status','Milenial Berhasil Di Uplode');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Postmilenial  $postmilenial
     * @return \Illuminate\Http\Response
     */
    public function show(Postmilenial $postmilenial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Postmilenial  $postmilenial
     * @return \Illuminate\Http\Response
     */
    public function edit(Postmilenial $postmilenial)
    {
        $data['title'] = 'Update Post Milenial';
        return view('admin.post.postmilenial.updatemilenial',$data,compact('postmilenial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Postmilenial  $postmilenial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postmilenial $postmilenial)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'caption' => 'required',
            'foto' => 'required|image|max:1024|mimes:jpeg,bmp,png',
        ]);

        if (File::exists(public_path('storage/milenial/'. $postmilenial->foto))) {

            File::delete(public_path('storage/milenial/'. $postmilenial->foto));

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('foto');

            $foto = time() . '.' . $file->getClientOriginalExtension();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/milenial';
            $file->move($tujuan_upload,$foto);
    
            Post::where("judul",$postmilenial->judul)
                ->update([
                    'post' => 'milenial',
                    'judul' => $request->judul,
                    'caption' => $request->caption,
                    'foto' => $foto,
                    'link' => '',
                ]);
            Postmilenial::where('id',$postmilenial->id)
                        ->update([
                        'judul' => $request->judul,
                        'caption' => $request->caption,
                        'foto' => $foto,
                        ]);
    
            return redirect('/postmilenial')->with('status','Milenial Berhasil Di Update');
        }else{
            return redirect('/postmilenial')->with('status','File Nothing');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Postmilenial  $postmilenial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postmilenial $postmilenial)
    {
        File::delete(public_path('storage/milenial/'. $postmilenial->foto));
        Postmilenial::destroy($postmilenial->id);
        Post::destroy($postmilenial->judul);
        return redirect('/postmilenial')->with('status','Milenial Berhasil Di Hapus');
    }
}
