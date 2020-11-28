<?php

namespace App\Http\Controllers;

use App\Postsejarah;
use Illuminate\Http\Request;
use File;

class PostsejarahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Post Sejarah';
        $data['postsejarahs'] = Postsejarah::paginate(10);
        return view('admin.post.postsejarah.sejarah',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Post Sejarah';
        return view('admin.post.postsejarah.createsejarah',$data);
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
            'foto' => 'required|image|max:7024|mimes:jpeg,bmp,png,jpg',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto');

        $foto = time() . '.' . $file->getClientOriginalExtension();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'storage/sejarah';
        $file->move($tujuan_upload,$foto);

        Post::create([
            'post' => 'sejarah',
            'judul' => $request->judul,
            'caption' => $request->caption,
            'foto' => $foto,
            'link' => '',
        ]);
        Postsejarah::create([
            'judul' => $request->judul,
            'caption' => $request->caption,
            'foto' => $foto,
        ]);

        return redirect('/postsejarah')->with('status','Sejarah Berhasil Di Uplode');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Postsejarah  $postsejarah
     * @return \Illuminate\Http\Response
     */
    public function show(Postsejarah $postsejarah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Postsejarah  $postsejarah
     * @return \Illuminate\Http\Response
     */
    public function edit(Postsejarah $postsejarah)
    {
        $data['title'] = 'Update Post Sejarah';
        return view('admin.post.postsejarah.updatesejarah',$data,compact('postsejarah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Postsejarah  $postsejarah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postsejarah $postsejarah)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'caption' => 'required',
            'foto' => 'required|image|max:7024|mimes:jpeg,bmp,png,jpg',
        ]);

        if (File::exists(public_path('storage/sejarah/'. $postsejarah->foto))) {

            File::delete(public_path('storage/sejarah/'. $postsejarah->foto));

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('foto');

            $foto = time() . '.' . $file->getClientOriginalExtension();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/sejarah';
            $file->move($tujuan_upload,$foto);
    
            Post::where("judul",$postsejarah->judul)
                ->update([
                    'post' => 'sejarah',
                    'judul' => $request->judul,
                    'caption' => $request->caption,
                    'foto' => $foto,
                    'link' => '',
                ]);
            Postsejarah::where('id',$postsejarah->id)
                        ->update([
                        'judul' => $request->judul,
                        'caption' => $request->caption,
                        'foto' => $foto,
                        ]);
    
            return redirect('/postsejarah')->with('status','Sejarah Berhasil Di Update');
        }else{
            return redirect('/postsejarah')->with('status','File Nothing');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Postsejarah  $postsejarah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postsejarah $postsejarah)
    {
        File::delete(public_path('storage/sejarah/'. $postsejarah->foto));
        Postsejarah::destroy($postsejarah->id);
        Post::destroy($postsejarah->judul);
        return redirect('/postsejarah')->with('status','Sejarah Berhasil Di Hapus');
    }
}
