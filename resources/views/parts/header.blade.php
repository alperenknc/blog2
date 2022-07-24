<header>
    <nav class="navbar navbar-fixed-top nav-down navbar-laread">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('pages.anasayfa') }}"><img height="64" src="{{ asset('assets/img/logo-light.png') }}" alt=""></a>
                
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">HOME</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="large-image-v1-1.html">Large Image v1</a></li>
                            <li><a href="large-image-v2-1.html">Large Image v2</a></li>
                            <li><a href="medium-image-v1-1.html">Medium Image v1</a></li>
                            <li><a href="medium-image-v2-1.html">Medium Image v2</a></li>
                            <li><a href="masonry-1.html">Masonry</a></li>
                            <li><a href="banner-v1.html">BannerMode v1</a></li>
                            <li><a href="banner-v2.html">-v2</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">GALLERY</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="gallery-v1.html">Gallery v1</a></li>
                            <li><a href="gallery-v2.html">Gallery v2</a></li>
                            <li><a href="gallery-v3.html">Gallery v3</a></li>
                            <li><a href="gallery-v4.html">Gallery v4</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">PAGES</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="about-v1.html">About v1</a></li>
                            <li><a href="about-v2.html">-v2</a></li>
                            <li><a href="authors.html">Authors</a></li>
                            <li><a href="author-detail.html">Author Detail</a></li>
                            <li><a href="archive.html">Archive</a></li>
                            <li><a href="contact-v1.html">Contact v1</a></li>
                            <li><a href="contact-v2.html">-v2</a></li>
                            <li><a href="404.html">Not Found</a></li>
                            <li><a href="newsletter.html" target="_blank">Newsletter</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">FEATURES</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="widget.html">Widgets</a></li>
                            <li><a href="typography-1.html">Typography -1</a></li>
                            <li><a href="typography-2.html">-2</a></li>
                            <li><a href="typography-3.html">-3</a></li>
                            <li><a href="typography-4.html">-4</a></li>
                            <li><a href="shortcode-1.html">Shortcode -1</a></li>
                            <li><a href="shortcode-2.html">-2</a></li>
                            <li><a href="shortcode-3.html">-3</a></li>
                            <li><a href="shortcode-4.html">-4</a></li>

                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
</header>

<div class="container">
    <div class="head-text">
        <h1>{{ Auth::check() ? Auth::user()->name : "Read - it" }}</h1>
        <p class="lead-text">Blog. Designed for Read.</p>
    </div>
</div>