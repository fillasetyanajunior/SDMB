<?php

namespace App\Http\Controllers;

use App\Postsaudagar;
use App\Post;
use Illuminate\Http\Request;

class PostsaudagarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Post Saudagar';
        $data['postsaudagars'] = Postsaudagar::paginate(10);
        return view('admin.post.postsaudagar.saudagar',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Post Saudagar';
        return view('admin.post.postsaudagar.createsaudagar',$data);
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
        $tujuan_upload = 'storage/saudagar';
        $file->move($tujuan_upload,$foto);

        Post::create([
            'post' => 'saudagar',
            'judul' => $request->judul,
            'caption' => $request->caption,
            'foto' => $foto,
            'link' => '',
        ]);
        Postsaudagar::create([
            'judul' => $request->judul,
            'caption' => $request->caption,
            'foto' => $foto,
        ]);

        return redirect('/postsaudagar')->with('status','Saudagar Berhasil Di Uplode');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Postsaudagar  $postsaudagar
     * @return \Illuminate\Http\Response
     */
    public function show(Postsaudagar $postsaudagar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Postsaudagar  $postsaudagar
     * @return \Illuminate\Http\Response
     */
    public function edit(Postsaudagar $postsaudagar)
    {
        $data['title'] = 'Update Post Saudagar';
        return view('admin.post.postsaudagar.updatesaudagar',$data,compact('postsaudagar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Postsaudagar  $postsaudagar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postsaudagar $postsaudagar)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'caption' => 'required',
            'foto' => 'required|image|max:1024|mimes:jpeg,bmp,png',
        ]);

        if (File::exists(public_path('storage/saudagar/'. $postsaudagar->foto))) {

            File::delete(public_path('storage/saudagar/'. $postsaudagar->foto));

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('foto');

            $foto = time() . '.' . $file->getClientOriginalExtension();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/saudagar';
            $file->move($tujuan_upload,$foto);
    
            Post::where("judul",$postsaudagar->judul)
                ->update([
                    'post' => 'saudagar',
                    'judul' => $request->judul,
                    'caption' => $request->caption,
                    'foto' => $foto,
                    'link' => '',
                ]);
            Postsaudagar::where('id',$postsaudagar->id)
                        ->update([
                        'judul' => $request->judul,
                        'caption' => $request->caption,
                        'foto' => $foto,
                        ]);
    
            return redirect('/postsaudagar')->with('status','Saudagar Berhasil Di Update');
        }else{
            return redirect('/postsaudagar')->with('status','File Nothing');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Postsaudagar  $postsaudagar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postsaudagar $postsaudagar)
    {
        File::delete(public_path('storage/saudagar/'. $postsaudagar->foto));
        Postsaudagar::destroy($postsaudagar->id);
        Post::destroy($postsaudagar->judul);
        return redirect('/postsaudagar')->with('status','Saudagar Berhasil Di Hapus');
    }
}
