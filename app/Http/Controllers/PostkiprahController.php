<?php

namespace App\Http\Controllers;

use App\Postkiprah;
use App\Post;
use Illuminate\Http\Request;

class PostkiprahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Post Kiprah Umat';
        $data['postkiprahs'] = Postkiprah::paginate(10);
        return view('admin.post.postkiprah.kiprah',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah Post Kiprah Umat';
        return view('admin.post.postkiprah.createkiprah',$data);
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
        $tujuan_upload = 'storage/kiprah';
        $file->move($tujuan_upload,$foto);

        Post::create([
            'post' => 'kiprah',
            'judul' => $request->judul,
            'caption' => $request->caption,
            'foto' => $foto,
            'link' => '',
        ]);
        Postkiprah::create([
            'judul' => $request->judul,
            'caption' => $request->caption,
            'foto' => $foto,
        ]);

        return redirect('/postkiprah')->with('status','Kiprah Umat Berhasil Di Uplode');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Postkiprah  $postkiprah
     * @return \Illuminate\Http\Response
     */
    public function show(Postkiprah $postkiprah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Postkiprah  $postkiprah
     * @return \Illuminate\Http\Response
     */
    public function edit(Postkiprah $postkiprah)
    {
        $data['title'] = 'Update Post Kiprah Umat';
        return view('admin.post.postkiprah.updatekiprah',$data,compact('postkiprah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Postkiprah  $postkiprah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postkiprah $postkiprah)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'caption' => 'required',
            'foto' => 'required|image|max:1024|mimes:jpeg,bmp,png',
        ]);

        if (File::exists(public_path('storage/kiprah/'. $postkiprah->foto))) {

            File::delete(public_path('storage/kiprah/'. $postkiprah->foto));

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('foto');

            $foto = time() . '.' . $file->getClientOriginalExtension();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/kiprah';
            $file->move($tujuan_upload,$foto);
    
            Post::where("judul",$postkiprah->judul)
                ->update([
                    'post' => 'kiprah',
                    'judul' => $request->judul,
                    'caption' => $request->caption,
                    'foto' => $foto,
                    'link' => '',
                ]);
            Postkiprah::where('id',$postkiprah->id)
                        ->update([
                        'judul' => $request->judul,
                        'caption' => $request->caption,
                        'foto' => $foto,
                        ]);
    
            return redirect('/postkiprah')->with('status','Kiprah Umat Berhasil Di Update');
        }else{
            return redirect('/postkiprah')->with('status','File Nothing');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Postkiprah  $postkiprah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postkiprah $postkiprah)
    {
        File::delete(public_path('storage/kiprah/'. $postkiprah->foto));
        Postkiprah::destroy($postkiprah->id);
        Post::destroy($postkiprah->judul);
        return redirect('/postkiprah')->with('status','Kiprah Umat Berhasil Di Hapus');
    }
}
