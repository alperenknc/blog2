<!DOCTYPE html>
<html lang="en">
<head>
    @include('parts.head')
</head>
<body>
    <div class="page-loader">
		<div class="loader-in">Loading...</div>
		<div class="loader-out">Loading...</div>
	</div>
    @include('parts.navbar')
	@include('parts.sweetalert')
    <div class="canvas">
		<div class="canvas-overlay"></div>
            @include('parts.header')
            <div class="container">
                <div class="row">
                    @yield('content')
                    {{-- @include('parts.sidebar') --}}
                </div>
            </div>
        @include('parts.footer')
    </div>
    @include('parts.user.user_modal')
    <!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/jasny-bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/prettify.js') }}"></script>
	<script src="{{ asset('assets/js/lang-css.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.blueimp-gallery.min.js') }}"></script>
	<script src="{{ asset('assets/js/imagesloaded.js') }}"></script>
	<script src="{{ asset('assets/js/masonry.js') }}"></script>
	<script src="{{ asset('assets/js/viewportchecker.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.dotdotdot.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.colorbox-min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.nicescroll.min.js') }}"></script>
	<script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.ellipsis.min.js') }}"></script>
	<script src="{{ asset('assets/js/calendar.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.touchSwipe.min.js') }}"></script>
	<script src="{{ asset('assets/js/script.js') }}"></script>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</body>
</html>