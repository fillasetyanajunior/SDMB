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
                    @foreach ($postsaudagar as $postsaudagar)    
                    <div class="single_page_content"> <img class="img-center" src="{{asset('saudagar/' . $postsaudagar->foto)}}" alt="">
                        <h1>{{$postsaudagar->judul}}</h1>
                        <p>{{Str::limit($postsaudagar->caption,200,' ')}}<a href="/detail/postsaudagar/{{$postsaudagar->id}}">More</a></p>
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
                        @foreach ($postsaudagars as $postsaudagars)    
                        <li>
                            <div class="media"> <a class="media-left" href="/detail/postsaudagar/{{$postsaudagars->id}}"> <img src="{{asset('saudagar/' . $postsaudagars->foto)}}" alt=""> </a>
                                <div class="media-body"> <a class="catg_title" href="/detail/postsaudagar/{{$postsaudagars->id}}"> {{$postsaudagars->judul}}</a> </div>
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
                    <h2><span>Last Post Saudagar Muhammadiyah</span></h2>
                    <ul class="spost_nav">
                        @foreach ($postsaudagarss as $postsaudagarss)
                        <li>
                            <div class="media"> <a class="media-left" href="/detail/postsaudagar/{{$postsaudagarss}}"> <img src="{{asset('saudagar/' . $postsaudagarss->foto)}}" alt=""> </a>
                                <div class="media-body"> <a class="catg_title" href="/detail/postsaudagar/{{$postsaudagarss}}"> {{$postsaudagarss->judul}}</a> </div>
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