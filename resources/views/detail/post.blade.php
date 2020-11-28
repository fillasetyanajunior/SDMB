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
                    <div class="single_page_content">
                        @if ($post->post == "kultum")
                        <iframe width="100" height="50" src="{{$post->link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></a>
                        @elseif ($post->post == "aisyiyah")
                        <img class="img-center" src="{{asset('aisyiyah/' . $post->foto)}}" ></a>
                        @elseif ($post->post == "tokoh")
                        <img class="img-center" src="{{asset('tokoh/' . $post->foto)}}" ></a>
                        @elseif ($post->post == "milenial")
                        <img class="img-center" src="{{asset('milenial/' . $post->foto)}}" ></a>
                        @elseif ($post->post == "kiprah")
                        <img class="img-center" src="{{asset('kiprah/' . $post->foto)}}" ></a>
                        @elseif ($post->post == "seni")
                        <img class="img-center" src="{{asset('seni/' . $post->foto)}}" ></a>
                        @elseif ($post->post == "saudagar")
                        <img class="img-center" src="{{asset('saudagar/' . $post->foto)}}" ></a>
                        @elseif ($post->post == "infopersyarikatan")
                        <img class="img-center" src="{{asset('infopersyarikatan/' . $post->foto)}}" ></a>
                        @elseif ($post->post == "artikel")
                        <img class="img-center" src="{{asset('artikel/' . $post->foto)}}" ></a>
                        @else
                        <img class="img-center" src="{{asset('sejarah/' . $post->foto)}}" ></a>
                        @endif
                        
                        <p class="text-justify"><span>{{$post->caption }}</span></p>

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
                            <div class="media"> 
                                @if ($posts->post == "kultum")
                                <a href="/detail/post/{{$postss->id}}" class="media-left"> <img src="{{asset('kultum/' . $postss->foto)}}" ></a>
                                @elseif ($posts->post == "aisyiyah")
                                <a href="/detail/post/{{$posts->id}}" class="media-left"> <img src="{{asset('aisyiyah/' . $posts->foto)}}" ></a>
                                @elseif ($posts->post == "tokoh")
                                <a href="/detail/post/{{$posts->id}}"class="media-left"> <img src="{{asset('tokoh/' . $posts->foto)}}" ></a>
                                @elseif ($posts->post == "milenial")
                                <a href="/detail/post/{{$posts->id}}"class="media-left"> <img src="{{asset('milenial/' . $posts->foto)}}" ></a>
                                @elseif ($posts->post == "kiprah")
                                <a href="/detail/post/{{$posts->id}}"class="media-left"> <img src="{{asset('kiprah/' . $posts->foto)}}" ></a>
                                @elseif ($posts->post == "seni")
                                <a href="/detail/post/{{$posts->id}}"class="media-left"> <img src="{{asset('seni/' . $posts->foto)}}" ></a>
                                @elseif ($posts->post == "saudagar")
                                <a href="/detail/post/{{$posts->id}}"class="media-left"> <img src="{{asset('saudagar/' . $posts->foto)}}" ></a>
                                @elseif ($posts->post == "infopersyarikatan")
                                <a href="/detail/post/{{$posts->id}}"class="media-left"> <img src="{{asset('infopersyarikatan/' . $posts->foto)}}" ></a>
                                @elseif ($posts->post == "artikel")
                                <a href="/detail/post/{{$posts->id}}"class="media-left"> <img src="{{asset('artikel/' . $posts->foto)}}" ></a>
                                @else
                                <a href="/detail/post/{{$posts->id}}"class="media-left"> <img src="{{asset('sejarah/' . $posts->foto)}}" ></a>
                                @endif
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
                            <div class="media"> 
                                @if ($postss->post == "kultum")
                                <a href="/detail/post/{{$postss->id}}" class="media-left"> <img src="{{asset('kultum/' . $postss->foto)}}" ></a>
                                @elseif ($postss->post == "aisyiyah")
                                <a href="/detail/post/{{$postss->id}}" class="media-left"> <img src="{{asset('aisyiyah/' . $postss->foto)}}" ></a>
                                @elseif ($postss->post == "tokoh")
                                <a href="/detail/post/{{$postss->id}}"class="media-left"> <img src="{{asset('tokoh/' . $postss->foto)}}" ></a>
                                @elseif ($postss->post == "milenial")
                                <a href="/detail/post/{{$postss->id}}"class="media-left"> <img src="{{asset('milenial/' . $postss->foto)}}" ></a>
                                @elseif ($postss->post == "kiprah")
                                <a href="/detail/post/{{$postss->id}}"class="media-left"> <img src="{{asset('kiprah/' . $postss->foto)}}" ></a>
                                @elseif ($postss->post == "seni")
                                <a href="/detail/post/{{$postss->id}}"class="media-left"> <img src="{{asset('seni/' . $postss->foto)}}" ></a>
                                @elseif ($postss->post == "saudagar")
                                <a href="/detail/post/{{$postss->id}}"class="media-left"> <img src="{{asset('saudagar/' . $postss->foto)}}" ></a>
                                @elseif ($postss->post == "infopersyarikatan")
                                <a href="/detail/post/{{$postss->id}}"class="media-left"> <img src="{{asset('infopersyarikatan/' . $postss->foto)}}" ></a>
                                @elseif ($postss->post == "artikel")
                                <a href="/detail/post/{{$postss->id}}"class="media-left"> <img src="{{asset('artikel/' . $postss->foto)}}" ></a>
                                @else
                                <a href="/detail/post/{{$postss->id}}"class="media-left"> <img src="{{asset('sejarah/' . $postss->foto)}}" ></a>
                                @endif
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