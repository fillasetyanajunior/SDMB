<div class="single_sidebar wow fadeInDown">
    <h2><span>Last Video Kultum</span></h2>
    @foreach ($postkultum as $postkultum)    
    <ul class="vide_area">
        <li>
            @if (!$postkultum->link)
            <img class="img-center" src="{{asset('kultum/' . $postkultum->foto)}}" width="200px">
            @elseif ($postkultum->link === '-')
            <img class="img-center" src="{{asset('kultum/' . $postkultum->foto)}}" width="200px">
            @else
            <iframe width="90px" height="60px" class="img-center" src="{{$postkultum->link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            @endif
        </li>
    </ul>
    @endforeach
</div>
<div class="single_sidebar wow fadeInDown">
    <h2><span>Sponsor</span></h2>
    @foreach ($sponsor as $sponsor )    
    <ul class="business_catgnav  wow fadeInDown">
        <li>
            <figure class="bsbig_fig"> <a href="" class="featured_img"> <img alt="" src="{{asset($sponsor->foto)}}"> <span class="overlay"></span> </a>
                <figcaption> <a href="">{{$sponsor->judul}}</a> </figcaption>
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
        <li><a href="/infopersyarikatan">Info Persyarikatan</a></li>
        <li><a href="/tokoh">Tokoh</a></li>
        <li><a href="/sejarah">Sejarah</a></li>
        <li><a href="/kiprah">Kiprah</a></li>
        <li><a href="/aisyiyah">Aisyiyah</a></li>
        <li><a href="/artikel">Artikel</a></li>
        <li><a href="/kultum">Kultum</a></li>
    </ul>
</div>