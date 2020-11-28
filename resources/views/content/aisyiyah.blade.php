@extends('layouts.utama')

@section('title',$title)

@section('content')
<x-totalcount></x-totalcount>
<section id="contentSection">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="left_content">
                <div class="single_page">
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li class="active">Aisyiyah</li>
                    </ol>
                    @foreach ($postaisyiyah as $postaisyiyah)    
                    <div class="single_page_content"> <img class="img-center" src="{{asset('aisyiyah/' . $postaisyiyah->foto)}}" alt="">
                        <h1>{{$postaisyiyah->judul}}</h1>
                        <p>{{Str::limit($postaisyiyah->caption,200,' ')}}<a href="/detail/postaisyiyah/{{$postaisyiyah->id}}">More</a></p>
                    </div>
                    @endforeach
                    <div class="single_page_content">
                        <button class="btn default-btn">Milenial Muhammadiyah</button>
                        <button class="btn btn-red">Kultum</button>
                        <button class="btn btn-yellow">Tokoh</button>
                        <button class="btn btn-green">Artikel</button>
                        <button class="btn btn-black">Info Persyarikatan</button>
                        <button class="btn btn-orange">Seni-Budaya</button>
                        <button class="btn btn-blue"> Aisyiyah</button>
                        <button class="btn btn-lime">Saudagar Muhammadiyah</button>
                        <button class="btn btn-theme">Kiprah</button>
                    </div>
                    <div class="related_post">
                    <h2>Related Post <i class="fa fa-thumbs-o-up"></i></h2>
                    <ul class="spost_nav wow fadeInDown animated">
                        @foreach ($postaisyiyahs as $postaisyiyahs)    
                        <li>
                            <div class="media"> <a class="media-left" href="/detail/postaisyiyah/{{$postaisyiyahs->id}}"> <img src="{{asset('aisyiyah/' . $postaisyiyahs->foto)}}" alt=""> </a>
                                <div class="media-body"> <a class="catg_title" href="/detail/postaisyiyah/{{$postaisyiyahs->id}}"> {{$postaisyiyahs->judul}}</a> </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <aside class="right_content">
                <div class="single_sidebar">
                    <h2><span>Last Post Aisyiyah</span></h2>
                    <ul class="spost_nav">
                        @foreach ($postaisyiyahss as $postaisyiyahss)
                        <li>
                            <div class="media"> <a class="media-left" href="/detail/postaisyiyah/{{$postaisyiyahss->id}}"> <img src="{{asset('aisyiyah/' . $postaisyiyahss->foto)}}" alt=""> </a>
                                <div class="media-body"> <a class="catg_title" href="/detail/postaisyiyah/{{$postaisyiyahss->id}}"> {{$postaisyiyahss->judul}}</a> </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <x-accesoris></x-accesoris>
            </aside>
        </div>
    </div>
</section>
@endsection