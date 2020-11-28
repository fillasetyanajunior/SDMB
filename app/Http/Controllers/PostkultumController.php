<?php

namespace App\Http\Controllers;

use App\Postkultum;
use App\Post;
use Illuminate\Http\Request;
use File;

class PostkultumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Post Kultum';
        $data['postkultums'] = Postkultum::paginate(10);
        return view('admin.post.postkultum.kultum',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Post Kultum';
        return view('admin.post.postkultum.createkultum',$data);
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
            'link' => 'required',
            'foto' => 'required|image|max:7024|mimes:jpeg,bmp,png,jpg',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');

        $foto = time() . '.' . $file->getClientOriginalExtension();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'storage/kultum';
        $file->move($tujuan_upload,$foto);

        Post::create([
            'post' => 'kultum',
            'judul' => $request->judul,
            'caption' => $request->caption,
            'foto' => $foto,
            'link' => $request->link,
        ]);
        Postkultum::create([
            'judul' => $request->judul,
            'caption' => $request->caption,
            'link' => $request->link,
            'foto' => $foto,
        ]);

        return redirect('/postkultum')->with('status','Kultum Berhasil Di Uplode');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Postkultum  $postkultum
     * @return \Illuminate\Http\Response
     */
    public function show(Postkultum $postkultum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Postkultum  $postkultum
     * @return \Illuminate\Http\Response
     */
    public function edit(Postkultum $postkultum)
    {
        $data['title'] = 'Update Post Kultum';
        return view('admin.post.postkultum.updatekultum',$data,compact('postkultum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Postkultum  $postkultum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postkultum $postkultum)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'caption' => 'required',
            'link' => 'required',
            'foto' => 'required|image|max:7024|mimes:jpeg,bmp,png,jpg',
        ]);
        if (File::exists(public_path('storage/kultum/'. $postkultum->foto))) {

            File::delete(public_path('storage/kultum/'. $postkultum->foto));
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('foto');

            $foto = time() . '.' . $file->getClientOriginalExtension();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/kultum';
            $file->move($tujuan_upload,$foto);

            Post::where("judul",$postkultum->judul)
                ->update([
                    'post' => 'kultum',
                    'judul' => $request->judul,
                    'caption' => $request->caption,
                    'foto' => $foto,
                    'link' => $request->link,
                ]);
            Postkultum::where('id',$postkultum->id)
                        ->update([
                        'judul' => $request->judul,
                        'caption' => $request->caption,
                        'link' => $request->link,
                        'foto' => $foto,
                        ]);

            return redirect('/postkultum')->with('status','Kultum Berhasil Di Update');
        }else{
            return redirect('/postkultum')->with('status','File Nothing');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Postkultum  $postkultum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postkultum $postkultum)
    {
        File::delete(public_path('storage/kultum/'. $postkultum->foto));
        Postkultum::destroy($postkultum->id);
        Post::destroy($postkultum->judul);
        return redirect('/postkultum')->with('status','Kultum Berhasil Di Hapus');
    }
}
