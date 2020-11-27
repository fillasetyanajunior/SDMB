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
                        <li class="active">Detail</li>
                    </ol>
                    <h1>{{$post->judul}}</h1>
                    <div class="post_commentbox"><span><i class="fa fa-calendar"></i>{{$post->updated_at->diffForHumans()}}</span> <a href="/"><i class="fa fa-tags"></i>Post</a> </div>
                    <div class="single_page_content"> <img class="img-center" src="{{asset('/' . $post->foto)}}" alt="">
                        <p class="text-justify">{{$post->caption}}</p>
                        <button class="btn default-btn">Milenial Muhammadiyah</button>
                        <button class="btn btn-red">Kultum</button>
                        <button class="btn btn-yellow">Tokoh</button>
                        <button class="btn btn-green">Artikel</button>
                        <button class="btn btn-black">Info Persyarikatan</button>
                        <button class="btn btn-orange">Seni-Budaya</button>
                        <button class="btn btn-blue"> Info Persyarikatan</button>
                        <button class="btn btn-lime">Saudagar Muhammadiyah</button>
                        <button class="btn btn-theme">Kiprah</button>
                    </div>
                    <div class="related_post">
                    <h2>Related Post <i class="fa fa-thumbs-o-up"></i></h2>
                    <ul class="spost_nav wow fadeInDown animated">
                        @foreach ($posts as $posts)    
                        <li>
                            <div class="media"> <a class="media-left" href="/detail/post/{{$posts->id}}"> <img src="{{asset('/' . $posts->foto)}}" alt=""> </a>
                                <div class="media-body"> <a class="catg_title" href="/detail/post/{{$posts->id}}"> {{$posts->judul}}</a> </div>
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
                    <h2><span>Last Post</span></h2>
                    <ul class="spost_nav">
                        @foreach ($postss as $postss)
                        <li>
                            <div class="media"> <a class="media-left" href="/detail/post/{{$postss->id}}"> <img src="{{asset('/' . $postss->foto)}}" alt=""> </a>
                                <div class="media-body"> <a class="catg_title" href="/detail/post/{{$postss->id}}"> {{$postss->judul}}</a> </div>
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