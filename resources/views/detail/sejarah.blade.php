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
                        <li >Detail</li>
                    </ol>
                    <h1>{{$postsejarah->judul}}</h1>
                    <div class="post_commentbox"><span><i class="fa fa-calendar"></i>{{$postsejarah->updated_at->diffForHumans()}}</span> <a href="/sejarah"><i class="fa fa-tags"></i>Sejarah</a> </div>
                    <div class="single_page_content"> <img class="img-center" src="{{asset('sejarah/' . $postsejarah->foto)}}" alt="">
                        <p class="text-justify">{{$postsejarah->caption}}</p>
                        <button class="btn default-btn">Milenial Muhammadiyah</button>
                        <button class="btn btn-red">Kultum</button>
                        <button class="btn btn-yellow">Tokoh</button>
                        <button class="btn btn-green">Artikel</button>
                        <button class="btn btn-black">Info Persyarikatan</button>
                        <button class="btn btn-orange">Seni-Budaya</button>
                        <button class="btn btn-blue"> Info Persyarikatan</button>
                        <button class="btn btn-lime">Saudagar Muhammadiyah</button>
                        <button class="btn btn-theme">Kiprah</button>
                        <button class="btn btn-theme">Sejarah</button>
                    </div>
                    <div class="related_post">
                    <h2>Related Post <i class="fa fa-thumbs-o-up"></i></h2>
                    <ul class="spost_nav wow fadeInDown animated">
                        @foreach ($postsejarahs as $postsejarahs)    
                        <li>
                            <div class="media"> <a class="media-left" href="/detail/postsejarah/{{$postsejarahs->id}}"> <img src="{{asset('sejarah/' . $postsejarahs->foto)}}" alt=""> </a>
                                <div class="media-body"> <a class="catg_title" href="/detail/postsejarah/{{$postsejarahs->id}}"> {{$postsejarahs->judul}}</a> </div>
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
                    <h2><span>Last Post Sejarah </span></h2>
                    <ul class="spost_nav">
                        @foreach ($postsejarahss as $postsejarahss)
                        <li>
                            <div class="media"> <a class="media-left" href="/detail/postsejarah/{{$postsejarahss->id}}"> <img src="{{asset('sejarah/' . $postsejarahss->foto)}}" alt=""> </a>
                                <div class="media-body"> <a class="catg_title" href="/detail/postsejarah/{{$postsejarahss->id}}"> {{$postsejarahss->judul}}</a> </div>
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