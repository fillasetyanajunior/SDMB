<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postaisyiyah;
use App\Postartikel;
use App\Postinfopersyarikatan;
use App\Postkiprah;
use App\Postkultum;
use App\Postmilenial;
use App\Postsaudagar;
use App\Postseni;
use App\Posttokoh;
use App\Postsejarah;
use App\Post;
use App\Comment;

class DetailController extends Controller
{
    public function aisyiyah(Postaisyiyah $postaisyiyah)
    {
        $data['title'] = 'Suara Dakwah Muhammadiyah Buleleng';
        $data['comment'] = Comment::where('post','aisyiyah')->get();
        $data['total'] = Comment::where('post','aisyiyah')->where('post_id',$postaisyiyah->id)->count();
        $data['postaisyiyahs'] = Postaisyiyah::paginate(3);
        $data['postaisyiyahss'] = Postaisyiyah::paginate(5);
        return view('detail.aisyiyah',$data,compact('postaisyiyah'));
    }

    public function artikel(Postartikel $postartikel)
    {
        $data['title'] = 'Suara Dakwah Muhammadiyah Buleleng';
        $data['comment'] = Comment::where('post','artikel')->get();
        $data['total'] = Comment::where('post','artikel')->where('post_id',$postartikel->id)->count();
        $data['postartikels'] = Postartikel::paginate(3);
        $data['postartikelss'] = Postartikel::paginate(3);
        return view('detail.artikel',$data,compact('postartikel'));
    }

    public function tokoh(Posttokoh $posttokoh)
    {
        $data['title'] = 'Suara Dakwah Muhammadiyah Buleleng';
        $data['comment'] = Comment::where('post','tokoh')->get();
        $data['total'] = Comment::where('post','tokoh')->where('post_id',$posttokoh->id)->count();
        $data['posttokohs'] = Posttokoh::paginate(3);
        $data['posttokohss'] = Posttokoh::paginate(3);
        return view('detail.tokoh',$data,compact('posttokoh'));
    }

    public function infopersyarikatan(Postinfopersyarikatan $postinfopersyarikatan)
    {
        $data['title'] = 'Suara Dakwah Muhammadiyah Buleleng';
        $data['comment'] = Comment::where('post','infopersyarikatan')->get();
        $data['total'] = Comment::where('post','infopersyarikatan')->where('post_id',$postinfopersyarikatan->id)->count();
        $data['postinfopersyarikatans'] = Postinfopersyarikatan::paginate(3);
        $data['postinfopersyarikatanss'] = Postinfopersyarikatan::paginate(3);
        return view('detail.infopersyarikatan',$data,compact('postinfopersyarikatan'));
    }

    public function kiprah(Postkiprah $postkiprah)
    {
        $data['title'] = 'Suara Dakwah Muhammadiyah Buleleng';
        $data['comment'] = Comment::where('post','kiprah')->get();
        $data['total'] = Comment::where('post','kiprah')->where('post_id',$postkiprah->id)->count();
        $data['postkiprahs'] = Postkiprah::paginate(3);
        $data['postkiprahss'] = Postkiprah::paginate(3);
        return view('detail.kiprah',$data,compact('postkiprah'));
    }

    public function kultum(Postkultum $postkultum)
    {
        $data['title'] = 'Suara Dakwah Muhammadiyah Buleleng';
        $data['comment'] = Comment::where('post','kultum')->get();
        $data['total'] = Comment::where('post','kultum')->where('post_id',$postkultum->id)->count();
        $data['postkultums'] = Postkultum::paginate(3);
        $data['postkultumss'] = Postkultum::paginate(3);
        return view('detail.kultum',$data,compact('postkultum'));
    }

    public function milenial(Postmilenial $postmilenial)
    {
        $data['title'] = 'Suara Dakwah Muhammadiyah Buleleng';
        $data['comment'] = Comment::where('post','milenial')->get();
        $data['total'] = Comment::where('post','milenial')->where('post_id',$postmilenial->id)->count();
        $data['postmilenials'] = Postmilenial::paginate(3);
        $data['postmilenialss'] = Postmilenial::paginate(3);
        return view('detail.milenial',$data,compact('postmilenial'));
    }

    public function saudagar(Postsaudagar $postsaudagar)
    {
        $data['title'] = 'Suara Dakwah Muhammadiyah Buleleng';
        $data['comment'] = Comment::where('post','saudagar')->get();
        $data['total'] = Comment::where('post','saudagar')->where('post_id',$postsaudagar->id)->count();
        $data['postsaudagars'] = Postsaudagar::paginate(3);
        $data['postsaudagarss'] = Postsaudagar::paginate(3);
        return view('detail.saudagar',$data,compact('postsaudagar'));
    }

    public function seni(Postseni $postseni)
    {
        $data['title'] = 'Suara Dakwah Muhammadiyah Buleleng';
        $data['comment'] = Comment::where('post','seni')->get();
        $data['total'] = Comment::where('post','seni')->where('post_id',$postseni->id)->count();
        $data['postsenis'] = Postseni::paginate(3);
        $data['postseniss'] = Postseni::paginate(3);
        return view('detail.seni',$data,compact('postseni'));
    }

    public function sejarah(Postsejarah $postsejarah)
    {
        $data['title'] = 'Suara Dakwah Muhammadiyah Buleleng';
        $data['postsejarahs'] = Postsejarah::paginate(3);
        $data['postsejarahss'] = Postsejarah::paginate(3);
        return view('detail.sejarah',$data,compact('postsejarah'));
    }

    public function post(Post $post)
    {
        $data['title'] = 'Suara Dakwah Muhammadiyah Buleleng';
        $data['posts'] = Post::paginate(3);
        $data['postss'] = Post::paginate(3);
        return view('detail.post',$data,compact('post'));
    }

    public function store(Request $request)
    {
        Comment::create([
            'post_id' => $request->hidden2,
            'post' => $request->hidden,
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
        ]);
        return redirect()->back();
    }
}
