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
                        <li>Detail</li>
                    </ol>
                    <h1>{{$postartikel->judul}}</h1>
                    <div class="post_commentbox"><span><i class="fa fa-calendar"></i>{{$postartikel->updated_at->diffForHumans()}}</span> <a href="/artikel"><i class="fa fa-tags"></i>Artikel</a> </div>
                    <div class="single_page_content"> <img class="img-center" src="{{asset('artikel/' . $postartikel->foto)}}" alt="">
                        <p class="text-justify">{!!nl2br(str_replace("{}", " \n", $postartikel->caption))!!}</p>
                        <button class="btn default-btn">Milenial Muhammadiyah</button>
                        <button class="btn btn-red">Kultum</button>
                        <button class="btn btn-yellow">Tokoh</button>
                        <button class="btn btn-green">Artikel</button>
                        <button class="btn btn-black">Info Persyarikatan</button>
                        <button class="btn btn-orange">Seni-Budaya</button>
                        <button class="btn btn-blue"> Aisyiyah</button>
                        <button class="btn btn-lime">Saudagar Muhammadiyah</button>
                        <button class="btn btn-theme">Kiprah</button>
                        <h2 class="mt-5">{{$total}} Comment</h2>
                    </div>
                    <div class="single_page_content">
                        <ul class="spost_nav">
                            @foreach ($comment as $comment)     
                                @if ($comment->post_id === $postartikel->id)
                                <li>
                                    <p>{{$comment->comment}}</p>
                                    <h5><a href="#">{{$comment->name}}</a></h5>
                                        <p class="date">{{$comment->created_at->diffForHumans()}}</p>
                                    </li>
                                
                                @else
                                
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="related_post">
                        <h4>Leave a Reply</h4>
                        <form action="/coment" method="POST">
                            @csrf
                            <input type="hidden" name="hidden" value="artikel">
                            <input type="hidden" name="hidden2" value="{{$postartikel->id}}">
                            <div class="form-group col-sm-12">
                                <textarea class="form-control" rows="5" name="comment"></textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>
                            <div class="form-group col-sm-2">
                                <button type="submit" class="form-group btn btn-primary ">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="related_post">
                    <h2>Related Post <i class="fa fa-thumbs-o-up"></i></h2>
                    <ul class="spost_nav wow fadeInDown animated">
                        @foreach ($postartikels as $postartikels)    
                        <li>
                            <div class="media"> <a class="media-left" href="/detail/postartikel/{{$postartikels->id}}"> <img src="{{asset('artikel/' . $postartikels->foto)}}" alt=""> </a>
                                <div class="media-body"> <a class="catg_title" href="/detail/postartikel/{{$postartikels->id}}"> {{$postartikels->judul}}</a> </div>
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
                    <h2><span>Last Post Artikel</span></h2>
                    <ul class="spost_nav">
                        @foreach ($postartikelss as $postartikelss)
                        <li>
                            <div class="media"> <a class="media-left" href="/detail/postartikel/{{$postartikelss->id}}"> <img src="{{asset('artikel/' . $postartikelss->foto)}}" alt=""> </a>
                                <div class="media-body"> <a class="catg_title" href="/detail/postartikel/{{$postartikelss->id}}"> {{$postartikelss->judul}}</a> </div>
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