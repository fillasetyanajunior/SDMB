<?php

namespace App\Http\Controllers;

use App\Postartikel;
use App\Post;
use Illuminate\Http\Request;
use File;

class PostartikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Post Artikel';
        $data['postartikels'] = Postartikel::paginate(10);
        return view('admin.post.postartikel.artikel',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Post Artikel';
        return view('admin.post.postartikel.createartikel',$data);
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

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');

        $foto = time() . '.' . $file->getClientOriginalExtension();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'storage/artikel';
        $file->move($tujuan_upload,$foto);

        Post::create([
            'post' => 'artikel',
            'judul' => $request->judul,
            'caption' => $request->caption,
            'foto' => $foto,
            'link' => '',
        ]);
        Postartikel::create([
            'judul' => $request->judul,
            'caption' => $request->caption,
            'foto' => $foto,
        ]);

        return redirect('/postartikel')->with('status','Artikel Berhasil Di Uplode');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Postartikel  $postartikel
     * @return \Illuminate\Http\Response
     */
    public function show(Postartikel $postartikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Postartikel  $postartikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Postartikel $postartikel)
    {
        $data['title'] = 'Update Post Artikel';
        return view('admin.post.postartikel.updateartikel',$data,compact('postartikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Postartikel  $postartikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postartikel $postartikel)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'caption' => 'required',
            'foto' => 'required|image|max:7024|mimes:jpeg,bmp,png',
        ]);

        if (File::exists(public_path('storage/artikel/'. $postartikel->foto))) {

            File::delete(public_path('storage/artikel/'. $postartikel->foto));

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('foto');

            $foto = time() . '.' . $file->getClientOriginalExtension();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/artikel';
            $file->move($tujuan_upload,$foto);
    
            Post::where("judul",$postartikel->judul)
                ->update([
                    'post' => 'artikel',
                    'judul' => $request->judul,
                    'caption' => $request->caption,
                    'foto' => $foto,
                    'link' => '',
                ]);
            Postartikel::where('id',$postartikel->id)
                        ->update([
                        'judul' => $request->judul,
                        'caption' => $request->caption,
                        'foto' => $foto,
                        ]);
    
            return redirect('/postartikel')->with('status','Artikel Berhasil Di Update');
        }else{
            return redirect('/postartikel')->with('status','File Nothing');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Postartikel  $postartikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postartikel $postartikel)
    {
        File::delete(public_path('storage/artikel/'. $postartikel->foto));
        Postartikel::destroy($postartikel->id);
        Post::destroy($postartikel->judul);
        return redirect('/postartikel')->with('status','Artikel Berhasil Di Hapus');
    }
}
