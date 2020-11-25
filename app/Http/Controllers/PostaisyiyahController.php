<?php

namespace App\Http\Controllers;

use App\Postaisyiyah;
use App\Post;
use Illuminate\Http\Request;
use File;

class PostaisyiyahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Post Aisyiyah';
        $data['postaisyiyahs'] = Postaisyiyah::paginate(10);
        return view('admin.post.postaisyiyah.aisyiyah',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Post Aisyiyah';
        return view('admin.post.postaisyiyah.createaisyiyah',$data);
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
        $tujuan_upload = 'storage/aisyiyah';
        $file->move($tujuan_upload,$foto);

        Post::create([
            'post' => 'aisyiyah',
            'judul' => $request->judul,
            'caption' => $request->caption,
            'foto' => $foto,
            'link' => '',
        ]);
        Postaisyiyah::create([
            'judul' => $request->judul,
            'caption' => $request->caption,
            'foto' => $foto,
        ]);

        return redirect('/postaisyiyah')->with('status','Aisyiyah Berhasil Di Uplode');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Postaisyiyah  $postaisyiyah
     * @return \Illuminate\Http\Response
     */
    public function show(Postaisyiyah $postaisyiyah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Postaisyiyah  $postaisyiyah
     * @return \Illuminate\Http\Response
     */
    public function edit(Postaisyiyah $postaisyiyah)
    {
        $data['title'] = 'Update Post Aisyiyah';
        return view('admin.post.postaisyiyah.updateaisyiyah',$data,compact('postaisyiyah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Postaisyiyah  $postaisyiyah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postaisyiyah $postaisyiyah)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'caption' => 'required',
            'foto' => 'required|image|max:1024|mimes:jpeg,bmp,png',
        ]);

        if (File::exists(public_path('storage/aisyiyah/'. $postaisyiyah->foto))) {

            File::delete(public_path('storage/aisyiyah/'. $postaisyiyah->foto));

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('foto');

            $foto = time() . '.' . $file->getClientOriginalExtension();

                    // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/aisyiyah';
            $file->move($tujuan_upload,$foto);
    
            Post::where("judul",$postaisyiyah->judul)
                ->update([
                    'post' => 'aisyiyah',
                    'judul' => $request->judul,
                    'caption' => $request->caption,
                    'foto' => $foto,
                    'link' => '',
                ]);
            Postaisyiyah::where('id',$postaisyiyah->id)
                        ->update([
                        'judul' => $request->judul,
                        'caption' => $request->caption,
                        'foto' => $foto,
                        ]);
    
            return redirect('/postaisyiyah')->with('status','Aisyiyah Berhasil Di Update');
        } else {
            return redirect('/postaisyiyah')->with('status','File Nothing');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Postaisyiyah  $postaisyiyah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postaisyiyah $postaisyiyah)
    {
        File::delete(public_path('storage/aisyiyah/'. $postaisyiyah->foto));
        Postaisyiyah::destroy($postaisyiyah->id);
        Post::destroy($postaisyiyah->judul);
        return redirect('/postaisyiyah')->with('status','Aisyiyah Berhasil Di Hapus');
    }
}
