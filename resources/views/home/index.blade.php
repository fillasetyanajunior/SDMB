@extends('layouts.utama')

@section('title',$title)

@section('content')
<x-totalcount></x-totalcount>
<section id="sliderSection">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="slick_slider">
                @foreach ($posts as $posts)    
                <div class="single_iteam"> 
                    @if ($posts->post == "kultum")
                    <a href=""><iframe width="650" height="500" src="{{$posts->link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></a>
                    @else
                    <a href=""> <img src="{{asset($posts->foto)}}" alt=""></a>
                    @endif
                    <div class="slider_article">
                    <h2><a class="slider_tittle" href="/detail/post/{{$posts->id}}">{{$posts->judul}}</a></h2>
                    <p>{{Str::limit($posts->caption, 200, ' Baca Selengkapnya')}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="latest_post">
                <h2><span>Latest Post</span></h2>
                <div class="latest_post_container">
                    <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
                    @foreach ($postss as $postss)    
                    <ul class="latest_postnav">
                        <li>
                            <div class="media">
                                @if ($postss->post == "kultum")
                                <a href="/detail/post/{{$postss->id}}" class="media-left"><iframe width="100" height="50" src="{{$postss->link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></a>
                                @else
                                <a href="/detail/post/{{$postss->id}}" class="media-left"> <img src="{{asset($postss->foto)}}" alt=""></a>
                                @endif
                            <div class="media-body"> <a href="/detail/post/{{$postss->id}}" class="catg_title">{{Str::limit($postss->caption, 50, ' Baca Selengkapnya')}}</a> </div>
                            </div>
                        </li>
                    </ul>
                    @endforeach
                    <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="contentSection">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="left_content">
                <div class="single_post_content">
                    <h2><span>Tokoh</span></h2>
                    <div class="single_post_content_left">
                        @foreach ($posttokoh as $posttokoh )    
                        <ul class="business_catgnav  wow fadeInDown">
                            <li>
                                <figure class="bsbig_fig"> <a href="/detail/posttokoh/{{$posttokoh->id}}" class="featured_img"> <img alt="" src="{{asset($posttokoh->foto)}}"> <span class="overlay"></span> </a>
                                    <figcaption> <a href="/detail/posttokoh/{{$posttokoh->id}}">{{$posttokoh->name}}</a> </figcaption>
                                    <p>{{$posttokoh->caption}}</p>
                                </figure>
                            </li>
                        </ul>
                        @endforeach
                    </div>
                    <div class="single_post_content_right">
                        @foreach ($posttokohs as $posttokohs)    
                        <ul class="spost_nav">
                            <li>
                                <div class="media wow fadeInDown"> <a href="/detail/posttokoh/{{$posttokoh->id}}" class="media-left"> <img alt="" src="{{asset($posttokohs->foto)}}"> </a>
                                    <div class="media-body"> <a href="/detail/posttokoh/{{$posttokoh->id}}" class="catg_title"> {{$posttokohs->name}}</a> </div>
                                </div>
                            </li>
                        </ul>
                        @endforeach
                    </div>
                </div>
                <div class="fashion_technology_area">
                    <div class="fashion">
                        <div class="single_post_content">
                            <h2><span>Milenial Muhammadiyah</span></h2>
                            @foreach ($postmilenial as $postmilenial)    
                            <ul class="spost_nav">
                                <li>
                                    <div class="media wow fadeInDown"> <a href="/detail/postmilenial/{{$postmilenial->id}}" class="media-left"> <img alt="" src="{{asset($postmilenial->foto)}}"> </a>
                                        <div class="media-body"> <a href="/detail/postmilenial/{{$postmilenial->id}}" class="catg_title"> {{$postmilenial->judul}}</a> </div>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                        </div>
                    </div>
                    <div class="technology">
                        <div class="single_post_content">
                            <h2><span>Kiprah Umat</span></h2>
                            @foreach ($postkiprah as $postkiprah)    
                            <ul class="spost_nav">
                                <li>
                                    <div class="media wow fadeInDown"> <a href="/detail/postkiprah/{{$postkiprah->id}}" class="media-left"> <img alt="" src="{{asset($postkiprah->foto)}}"> </a>
                                        <div class="media-body"> <a href="/detail/postkiprah/{{$postkiprah->id}}" class="catg_title"> {{$postkiprah->judul}}</a> </div>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="fashion_technology_area">
                    <div class="fashion">
                        <div class="single_post_content">
                            <h2><span>Seni-Budaya</span></h2>
                            @foreach ($postseni as $postseni)    
                            <ul class="spost_nav">
                                <li>
                                    <div class="media wow fadeInDown"> <a href="/detail/postseni/{{$postseni->id}}" class="media-left"> <img alt="" src="{{asset($postseni->foto)}}"> </a>
                                        <div class="media-body"> <a href="/detail/postseni/{{$postseni->id}}" class="catg_title"> {{$postseni->judul}}</a> </div>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                        </div>
                    </div>
                    <div class="technology">
                        <div class="single_post_content">
                            <h2><span>Aisyiyah</span></h2>
                            @foreach ($postaisyiyah as $postaisyiyah)    
                            <ul class="spost_nav">
                                <li>
                                    <div class="media wow fadeInDown"> <a href="/detail/postaisyiyah/{{$postaisyiyah->id}}" class="media-left"> <img alt="" src="{{asset($postaisyiyah->foto)}}"> </a>
                                        <div class="media-body"> <a href="/detail/postaisyiyah/{{$postaisyiyah->id}}" class="catg_title"> {{$postaisyiyah->judul}}</a> </div>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="fashion_technology_area">
                    <div class="fashion">
                        <div class="single_post_content">
                            <h2><span>Saudagar Muhammadiyah</span></h2>
                            @foreach ($postsaudagar as $postsaudagar)    
                            <ul class="spost_nav">
                                <li>
                                    <div class="media wow fadeInDown"> <a href="/detail/postsaudagar/{{$postsaudagar->id}}" class="media-left"> <img alt="" src="{{asset($postsaudagar->foto)}}"> </a>
                                        <div class="media-body"> <a href="/detail/postsaudagar/{{$postsaudagar->id}}" class="catg_title"> {{$postsaudagar->judul}}</a> </div>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                        </div>
                    </div>
                    <div class="technology">
                        <div class="single_post_content">
                            <h2><span>Info Persyarikatan</span></h2>
                            @foreach ($postinfopersyarikatan as $postinfopersyarikatan)    
                            <ul class="spost_nav">
                                <li>
                                    <div class="media wow fadeInDown"> <a href="/detail/postinfopersyarikatan/{{$postinfopersyarikatan->id}}" class="media-left"> <img alt="{{asset($postinfopersyarikatan->foto)}}" src=""> </a>
                                        <div class="media-body"> <a href="/detail/postinfopersyarikatan/{{$postinfopersyarikatan->id}}" class="catg_title"> {{$postinfopersyarikatan->judul}} </a> </div>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="single_post_content">
                    <h2><span>Kultum</span></h2>
                    <div class="single_post_content_left">
                        @foreach ($postkultum as $postkultum )    
                        <ul class="business_catgnav  wow fadeInDown">
                            <li>
                                <figure class="bsbig_fig"> <a href="/detail/postkultum/{{$postkultum->id}}" class="featured_img"> <iframe width="350" height="170" src="{{$postkultum->link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></span> </a>
                                    <figcaption> <a href="/detail/postkultum/{{$postkultum->id}}">{{$postkultum->judul}}</a> </figcaption>
                                    <p>{{Str::limit($postkultum->caption,200,' Baca Selengkapnya')}}</p>
                                </figure>
                            </li>
                        </ul>
                        @endforeach
                    </div>
                    <div class="single_post_content_right">
                        @foreach ($postkultums as $postkultums)    
                        <ul class="spost_nav">
                            <li>
                                <div class="media wow fadeInDown"> <a href="/detail/postkultum/{{$postkultums->id}}" class="media-left"><iframe width="100" height="50" src="{{$postkultums->link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></a>
                                    <div class="media-body"> <a href="/detail/postkultum/{{$postkultums->id}}" class="catg_title"> {{$postkultums->judul}}</a> </div>
                                </div>
                            </li>
                        </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
            <div class="single_sidebar">
                <h2><span>Artikel</span></h2>
                <ul class="spost_nav">
                    @foreach ($postartikel as $postartikel)     
                    <li>
                        <div class="media wow fadeInDown"> <a href="/detail/postartikel/{{$postartikel->id}}" class="media-left"> <img alt="" src="{{asset($postartikel->foto)}}"> </a>
                            <div class="media-body"> <a href="/detail/postartikel/{{$postartikel->id}}" class="catg_title"> {{$postartikel->judul}}</a> </div>
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