<?php

namespace App\Http\Controllers;

use App\Postseni;
use App\Post;
use Illuminate\Http\Request;
use File;

class PostseniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Post Seni Budaya';
        $data['postsenis'] = Postseni::paginate(10);
        return view('admin.post.postseni.seni',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Post Seni Budaya';
        return view('admin.post.postseni.createseni',$data);
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
        $tujuan_upload = 'storage/seni';
        $file->move($tujuan_upload,$foto);

        Post::create([
            'post' => 'seni',
            'judul' => $request->judul,
            'caption' => $request->caption,
            'foto' => $foto,
            'link' => '',
        ]);
        Postseni::create([
            'judul' => $request->judul,
            'caption' => $request->caption,
            'foto' => $foto,
        ]);

        return redirect('/postseni')->with('status','Seni Budaya Berhasil Di Uplode');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Postseni  $postseni
     * @return \Illuminate\Http\Response
     */
    public function show(Postseni $postseni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Postseni  $postseni
     * @return \Illuminate\Http\Response
     */
    public function edit(Postseni $postseni)
    {
        $data['title'] = 'Update Post Seni Budaya';
        return view('admin.post.postseni.updateseni',$data,compact('postseni'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Postseni  $postseni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postseni $postseni)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'caption' => 'required',
            'foto' => 'required|image|max:7024|mimes:jpeg,bmp,png,jpg',
        ]);

        if (File::exists(public_path('storage/seni/'. $postseni->foto))) {

            File::delete(public_path('storage/seni/'. $postseni->foto));

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('foto');

            $foto = time() . '.' . $file->getClientOriginalExtension();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/seni';
            $file->move($tujuan_upload,$foto);
    
            Post::where("judul",$postseni->judul)
                ->update([
                    'post' => 'seni',
                    'judul' => $request->judul,
                    'caption' => $request->caption,
                    'foto' => $foto,
                    'link' => '',
                ]);
            Postseni::where('id',$postseni->id)
                        ->update([
                        'judul' => $request->judul,
                        'caption' => $request->caption,
                        'foto' => $foto,
                        ]);
    
            return redirect('/postseni')->with('status','Seni Budaya Berhasil Di Update');
        }else{
            return redirect('/postseni')->with('status','File Nothing');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Postseni  $postseni
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postseni $postseni)
    {
        File::delete(public_path('storage/seni/'. $postseni->foto));
        Postseni::destroy($postseni->id);
        Post::destroy($postseni->judul);
        return redirect('/postseni')->with('status','Seni Budaya Berhasil Di Hapus');
    }
}
