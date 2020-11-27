<section id="newsSection">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="latest_newsarea"> <span>Latest News</span>
            <ul id="ticker01" class="news_sticker">
                @foreach ($post as $item)
                    @if ($item->post == "aisyiyah")
                    <li><a href="" ></a><img src="{{asset('aisyiyah/' . $item->foto)}}" >{{$item->judul}}</a></li>
                    @elseif ($item->post == "tokoh")
                    <li><a href=""><img src="{{asset('tokoh/' . $item->foto)}}" >{{$item->judul}}</a></li>
                    @elseif ($item->post == "milenial")
                    <li><a href=""><img src="{{asset('milenial/' . $item->foto)}}" >{{$item->judul}}</a></li>
                    @elseif ($item->post == "kiprah")
                    <li><a href=""><img src="{{asset('kiprah/' . $item->foto)}}" >{{$item->judul}}</a></li>
                    @elseif ($item->post == "seni")
                    <li><a href=""><img src="{{asset('seni/' . $item->foto)}}" >{{$item->judul}}</a></li>
                    @elseif ($item->post == "saudagar")
                    <li><a href=""><img src="{{asset('saudagar/' . $item->foto)}}" >{{$item->judul}}</a></li>
                    @elseif ($item->post == "infopersyarikatan")
                    <li><a href=""><img src="{{asset('infopersyarikatan/' . $item->foto)}}" >{{$item->judul}}</a></li>
                    @elseif ($item->post == "artikel")
                    <li><a href=""><img src="{{asset('artikel/' . $item->foto)}}" >{{$item->judul}}</a></li>
                    @else

                    @endif
                @endforeach
            </ul>
            <div class="social_area">
                <ul class="social_nav">
                <li class="facebook"><a href="https://www.facebook.com/muhammadiyah.buleleng.1"></a></li>
                <li class="youtube"><a href="#"></a></li>
                <li class="mail"><a href="#"></a></li>
                </ul>
            </div>
            </div>
        </div>
    </div>
</section>