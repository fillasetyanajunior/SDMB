<?php

namespace App\Http\Controllers;

use App\Postinfopersyarikatan;
use App\Post;
use Illuminate\Http\Request;

class PostinfopersyarikatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Post Info Persyarikatan';
        $data['postinfopersyarikatans'] = Postinfopersyarikatan::paginate(10);
        return view('admin.post.postinfopersyarikatan.infopersyarikatan',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Post Info Persyarikatan';
        return view('admin.post.postinfopersyarikatan.createinfopersyarikatan',$data);
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
        $tujuan_upload = 'storage/infopersyarikatan';
        $file->move($tujuan_upload,$foto);

        Post::create([
            'post' => 'infopersyarikatan',
            'judul' => $request->judul,
            'caption' => $request->caption,
            'foto' => $foto,
            'link' => '',
        ]);
        Postinfopersyarikatan::create([
            'judul' => $request->judul,
            'caption' => $request->caption,
            'foto' => $foto,
        ]);

        return redirect('/postinfopersyarikatan')->with('status','Info Persyarikatan Berhasil Di Uplode');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Postinfopersyarikatan  $postinfopersyarikatan
     * @return \Illuminate\Http\Response
     */
    public function show(Postinfopersyarikatan $postinfopersyarikatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Postinfopersyarikatan  $postinfopersyarikatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Postinfopersyarikatan $postinfopersyarikatan)
    {
        $data['title'] = 'Update Post Info Persyarikatan';
        return view('admin.post.postinfopersyarikatan.updateinfopersyarikatan',$data,compact('postinfopersyarikatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Postinfopersyarikatan  $postinfopersyarikatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postinfopersyarikatan $postinfopersyarikatan)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'caption' => 'required',
            'foto' => 'required|image|max:1024|mimes:jpeg,bmp,png',
        ]);

        if (File::exists(public_path('storage/infopersyarikatan/'. $postinfopersyarikatan->foto))) {

            File::delete(public_path('storage/infopersyarikatan/'. $postinfopersyarikatan->foto));

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('foto');

            $foto = time() . '.' . $file->getClientOriginalExtension();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/infopersyarikatan';
            $file->move($tujuan_upload,$foto);
    
            Post::where("judul",$postinfopersyarikatan->judul)
                ->update([
                    'post' => 'infopersyarikatan',
                    'judul' => $request->judul,
                    'caption' => $request->caption,
                    'foto' => $foto,
                    'link' => '',
                ]);
            Postinfopersyarikatan::where('id',$postinfopersyarikatan->id)
                        ->update([
                        'judul' => $request->judul,
                        'caption' => $request->caption,
                        'foto' => $foto,
                        ]);
    
            return redirect('/postinfopersyarikatan')->with('status','Info Persyarikatan Berhasil Di Update');
        }else{
            return redirect('/postinfopersyarikatan')->with('status','File Nothing');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Postinfopersyarikatan  $postinfopersyarikatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postinfopersyarikatan $postinfopersyarikatan)
    {
        File::delete(public_path('storage/infopersyarikatan/'. $postinfopersyarikatan->foto));
        Postinfopersyarikatan::destroy($postinfopersyarikatan->id);
        Post::destroy($postinfopersyarikatan->judul);
        return redirect('/postinfopersyarikatan')->with('status','Info Persyarikatan Berhasil Di Hapus');
    }
}
