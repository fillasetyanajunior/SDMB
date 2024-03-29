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
                        <li >Kultum</li>
                    </ol>
                    @foreach ($postkultum as $postkultum)    
                    <div class="single_page_content"> 
                        @if (!$postkultum->link)
                        <a href="/detail/postkultum/{{$postkultum->id}}"><img src="{{asset('kultum/' . $postkultum->foto)}}" ></a>
                        @elseif ($postkultum->link === '-')
                        <a href="/detail/postkultum/{{$postkultum->id}}"><img src="{{asset('kultum/' . $postkultum->foto)}}" ></a>
                        @else
                        <a href="/detail/postkultum/{{$postkultum->id}}"><iframe width="700px" height="400px" src="{{$postkultum->link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></a>
                        @endif
                        <h1>{{$postkultum->judul}}</h1>
                        <p>{{Str::limit($postkultum->caption,200,' ')}}<a href="/detail/postkultum/{{$postkultum->id}}">More</a></p>
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
                            @foreach ($postkultums as $postkultums)    
                            <li>
                                @if (!$postkultums->link)
                                <a class="media-left" href="/detail/postkultum/{{$postkultums->id}}"><img src="{{asset('kultum/' . $postkultums->foto)}}" ></a>
                                @elseif ($postkultums->link === '-')
                                <a class="media-left" href="/detail/postkultum/{{$postkultums->id}}"><img src="{{asset('kultum/' . $postkultums->foto)}}" ></a>
                                @else
                                <a class="media-left" href="/detail/postkultum/{{$postkultums->id}}"><iframe width="90px" height="60px" src="{{$postkultums->link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></a>
                                @endif
                                <div class="media-body"> <a class="catg_title" href="/detail/postkultum/{{$postkultums->id}}"> {{$postkultums->judul}}</a> </div>
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
                    <h2><span>Last Post Kultum</span></h2>
                    <ul class="vide_area">
                        @foreach ($postkultumss as $postkultumss)
                            <li>
                                @if (!$postkultumss->link)
                                <a href="/detail/postkultum/{{$postkultumss->id}}"><img width="200px" src="{{asset('kultum/' . $postkultumss->foto)}}" ></a>
                                @elseif ($postkultumss->link === '-')
                                <a href="/detail/postkultum/{{$postkultumss->id}}"><img width="200px" src="{{asset('kultum/' . $postkultumss->foto)}}" ></a>
                                @else
                                <a href="/detail/postkultum/{{$postkultumss->id}}"><iframe src="{{$postkultumss->link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></a>
                                @endif
                                <div class="media-body"> <a class="catg_title" href="/detail/postkultum/{{$postkultumss->id}}"> {{$postkultumss->judul}}</a> </div>
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