<section id="newsSection">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="latest_newsarea"> <span>Latest News</span>
            <ul id="ticker01" class="news_sticker">
                @foreach ($post as $item)
                    @if ($postss->post == "aisyiyah")
                    <li><a href="" ></a><img src="{{asset('aisyiyah/' . $postss->foto)}}" ></a></li>
                    @elseif ($postss->post == "tokoh")
                    <li><a href=""><img src="{{asset('tokoh/' . $postss->foto)}}" ></a></li>
                    @elseif ($postss->post == "milenial")
                    <li><a href=""><img src="{{asset('milenial/' . $postss->foto)}}" ></a></li>
                    @elseif ($postss->post == "kiprah")
                    <li><a href=""><img src="{{asset('kiprah/' . $postss->foto)}}" ></a></li>
                    @elseif ($postss->post == "seni")
                    <li><a href=""><img src="{{asset('seni/' . $postss->foto)}}" ></a></li>
                    @elseif ($postss->post == "saudagar")
                    <li><a href=""><img src="{{asset('saudagar/' . $postss->foto)}}" ></a></li>
                    @elseif ($postss->post == "infopersyarikatan")
                    <li><a href=""><img src="{{asset('infopersyarikatan/' . $postss->foto)}}" ></a></li>
                    @elseif ($postss->post == "artikel")
                    <li><a href=""><img src="{{asset('artikel/' . $postss->foto)}}" ></a></li>
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