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
use App\Post;
use App\Sponsor;

class UtamaController extends Controller
{
    public function index()
    {
        $data['title'] = 'Suara Dakwah Muhammadiyah Buleleng';
        $data['postaisyiyah'] = Postaisyiyah::orderBy('updated_at','desc')->paginate(3);
        $data['postartikel'] = Postartikel::orderBy('updated_at','desc')->paginate(3);
        $data['posts'] = Post::orderBy('updated_at','desc')->paginate(3);
        $data['postss'] = Post::orderBy('updated_at','desc')->paginate(6);
        $data['postinfopersyarikatan'] = Postinfopersyarikatan::orderBy('updated_at','desc')->paginate(3);
        $data['postkiprah'] = Postkiprah::orderBy('updated_at','desc')->paginate(1);
        $data['postkultum'] = Postkultum::orderBy('updated_at','desc')->paginate(4);
        $data['postkultums'] = Postkultum::orderBy('updated_at','desc')->paginate(3);
        $data['postmilenial'] = Postmilenial::orderBy('updated_at','desc')->paginate(3);
        $data['postsaudagar'] = Postsaudagar::orderBy('updated_at','desc')->paginate(3);
        $data['postseni'] = Postseni::orderBy('updated_at','desc')->paginate(3);
        $data['posttokoh'] = Posttokoh::orderBy('updated_at','desc')->paginate(1);
        $data['posttokohs'] = Posttokoh::orderBy('updated_at','desc')->paginate(4);
        $data['sponsor'] = Sponsor::orderBy('updated_at','desc')->paginate(1);
        return view('home.index',$data);
    }
}
