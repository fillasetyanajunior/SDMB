<section id="newsSection">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="latest_newsarea"> <span>Latest News</span>
            <ul id="ticker01" class="news_sticker">
                @foreach ($post as $item)
                <li><a href="#"><img src="{{asset($item->foto)}}" alt="">{{$item->judul}}</a></li>
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