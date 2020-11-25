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

class ContentController extends Controller
{
    public function aisyiyah()
    {
        $data['title'] = 'Suara Dakwah Muhammadiyah Buleleng';
        $data['postaisyiyah'] = Postaisyiyah::paginate(6);
        $data['postaisyiyahs'] = Postaisyiyah::paginate(3);
        $data['postaisyiyahss'] = Postaisyiyah::paginate(5);
        return view('content.aisyiyah',$data);
    }
    public function artikel()
    {
        $data['title'] = 'Suara Dakwah Muhammadiyah Buleleng';
        $data['postartikel'] = Postartikel::paginate(6);
        $data['postartikels'] = Postartikel::paginate(3);
        $data['postartikelss'] = Postartikel::paginate(3);
        return view('content.artikel',$data);
    }
    public function tokoh()
    {
        $data['title'] = 'Suara Dakwah Muhammadiyah Buleleng';
        $data['posttokoh'] = Posttokoh::paginate(6);
        $data['posttokohs'] = Posttokoh::paginate(3);
        $data['posttokohss'] = Posttokoh::paginate(3);
        return view('content.tokoh',$data);
    }
    public function infopersyarikatan()
    {
        $data['title'] = 'Suara Dakwah Muhammadiyah Buleleng';
        $data['postinfopersyarikatan'] = Postinfopersyarikatan::paginate(6);
        $data['postinfopersyarikatans'] = Postinfopersyarikatan::paginate(3);
        $data['postinfopersyarikatanss'] = Postinfopersyarikatan::paginate(3);
        return view('content.infopersyarikatan',$data);
    }
    public function kiprah()
    {
        $data['title'] = 'Suara Dakwah Muhammadiyah Buleleng';
        $data['postkiprah'] = Postkiprah::paginate(6);
        $data['postkiprahs'] = Postkiprah::paginate(3);
        $data['postkiprahss'] = Postkiprah::paginate(3);
        return view('content.kiprah',$data);
    }
    public function kultum()
    {
        $data['title'] = 'Suara Dakwah Muhammadiyah Buleleng';
        $data['postkultum'] = Postkultum::paginate(6);
        $data['postkultums'] = Postkultum::paginate(3);
        $data['postkultumss'] = Postkultum::paginate(3);
        return view('content.kultum',$data);
    }
    public function milenial()
    {
        $data['title'] = 'Suara Dakwah Muhammadiyah Buleleng';
        $data['postmilenial'] = Postmilenial::paginate(6);
        $data['postmilenials'] = Postmilenial::paginate(3);
        $data['postmilenialss'] = Postmilenial::paginate(3);
        return view('content.milenial',$data);
    }
    public function saudagar()
    {
        $data['title'] = 'Suara Dakwah Muhammadiyah Buleleng';
        $data['postsaudagar'] = Postsaudagar::paginate(6);
        $data['postsaudagars'] = Postsaudagar::paginate(3);
        $data['postsaudagarss'] = Postsaudagar::paginate(3);
        return view('content.saudagar',$data);
    }
    public function seni()
    {
        $data['title'] = 'Suara Dakwah Muhammadiyah Buleleng';
        $data['postseni'] = Postseni::paginate(6);
        $data['postsenis'] = Postseni::paginate(3);
        $data['postseniss'] = Postseni::paginate(3);
        return view('content.seni',$data);
    }
    public function sejarah()
    {
        $data['title'] = 'Suara Dakwah Muhammadiyah Buleleng';
        $data['postsejarah'] = Postsejarah::paginate(6);
        $data['postsejarahs'] = Postsejarah::paginate(3);
        $data['postsejarahss'] = Postsejarah::paginate(3);
        return view('content.sejarah',$data);
    }
}
