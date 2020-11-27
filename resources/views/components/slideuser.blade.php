<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            @foreach ($menuuser as $menuuser )
            @php
                $id = $menuuser->id;
                $menu = DB::table('accessusers')
                        ->join('subusers', 'accessusers.sub_id','subusers.id')
                        ->where('accessusers.menu_id',$id)
                        ->orderBy('subusers.title','asc')
                        ->get();
            @endphp     
            <li><a><i class="{{$menuuser->icon}}"></i>{{$menuuser->title}}<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    @foreach ($menu as $item)    
                    <li><a href="{{$item->url}}">{{$item->title}}</a></li>
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<!-- /sidebar menu -->
<!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}" 
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    <!-- /menu footer buttons -->
    </div>
</div>

<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
        <ul class=" navbar-right">
        <li class="nav-item dropdown open" style="padding-left: 15px;">
            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
            <img src="{{asset('profile/' . Auth::user()->avatar)}}" alt="">{{Auth::user()->name}}
            </a>
            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item"  href="/profile"> Profile</a>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            </li>
        </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->