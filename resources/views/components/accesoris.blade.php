<div class="single_sidebar wow fadeInDown">
    <h2><span>Last Video Kultum</span></h2>
    @foreach ($postkultum as $postkultum)    
    <ul class="vide_area">
        <li>
            <img alt="" src="{{asset('kultum/' . $postkultum->foto)}}">
        </li>
    </ul>
    @endforeach
</div>
<div class="single_sidebar wow fadeInDown">
    <h2><span>Sponsor</span></h2>
    @foreach ($sponsor as $sponsor )    
    <ul class="business_catgnav  wow fadeInDown">
        <li>
            <figure class="bsbig_fig"> <a href="pages/single_page.html" class="featured_img"> <img alt="" src="{{asset($sponsor->foto)}}"> <span class="overlay"></span> </a>
                <figcaption> <a href="pages/single_page.html">{{$sponsor->judul}}</a> </figcaption>
                <p>{{$sponsor->caption}}</p>
            </figure>
        </li>
    </ul>
    @endforeach
</div>
<div class="single_sidebar wow fadeInDown">
    <h2><span>Links</span></h2>
    <ul>
        <li><a href="/seni">Seni-Budaya</a></li>
        <li><a href="/saudagar">Saudagar</a></li>
        <li><a href="/milenial">Milenial</a></li>
        <li><a href="infopersyarikatan">Info Persyarikatan</a></li>
        <li><a href="/tokoh">Tokoh</a></li>
        <li><a href="/sejarah">Sejarah</a></li>
        <li><a href="/kiprah">Kiprah</a></li>
        <li><a href="/aisyiyah">Aisyiyah</a></li>
        <li><a href="/artikel">Artikel</a></li>
        <li><a href="/kultum">Kultum</a></li>
    </ul>
</div>