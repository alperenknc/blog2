<header>
    <nav class="navbar navbar-fixed-top nav-down navbar-laread">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('pages.anasayfa') }}"><img height="64" src="{{ asset('assets/images/logo-header.png') }}" alt="" style="background-color: var(--maincolor2)"></a>
                
            </div>
            <div class="get-post-titles">
                <button type="button" class="navbar-toggle push-navbar" data-navbar-type="default">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            @if(Auth::check())
            <a href="{{ route('admin.cikis.post') }}"  class="modal-form">
                <i class="fa fa-sign-out"></i>
            </a>
            @else
            <a href="#" data-toggle="modal" data-target="#login-form" class="modal-form">
                <i class="fa fa-user"></i>
            </a>
            @endif
            <button type="button" class="navbar-toggle collapsed menu-collapse" data-toggle="collapse" data-target="#main-nav">
                <span class="sr-only">Toggle navigation</span>
                <i class="fa fa-plus"></i>
            </button>
            <div class="collapse navbar-collapse" id="main-nav">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ route('pages.anasayfa') }}">HOME</a>
                    </li>
                    <li>
                        <a href="{{ route('pages.kategoriler') }}">CATEGORY</a>
                    </li>
                    <li>
                        <a href="">ABOUTS</a>
                    </li>
                    {{-- <li>
                        <a href="">CONTACT</a>
                    </li> --}}
                    {{-- <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">FEATURES</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="widget.html">Widgets</a></li>

                        </ul>
                    </li> --}}
                    @if(Auth::check() && Auth::user()->role==1)
                    <li>
                        <a href="{{ route('admin.panel') }}" class="dropdown-toggle" >ADMIN</a>
                    </li>  
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</header>

<div class="container">
    <div class="head-text">
        <h1>{{ Auth::check() ? Auth::user()->name : "Read - it" }}</h1>
        <div  style=" display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center; justify-content: center;">
           <p class="lead-text"><strong><h3 style="margin: 0px;"> {{ $ziyaretciler->count() }}&nbsp;</h3></strong> this many people read them all one by one</p> 
        </div>
        
    </div>
</div>