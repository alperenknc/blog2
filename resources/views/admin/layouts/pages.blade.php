<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.parts.head')
</head>
<body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed aside-enabled aside-static page-loading">
    @include('admin.parts.mobilheader')
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            @include('admin.parts.navbar')
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            
            	@include('admin.parts.header')
                @yield('content')
                @include('admin.parts.footer')
            </div>
    
			</div>
			<!--end::Page-->
		</div>
		<!--end::Main-->
        @include('admin.parts.modal')
		<script src="{{ asset('admin/assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('admin/assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
		<script src="{{ asset('admin/assets/js/scripts.bundle.js') }}"></script>
		<script src="{{ asset('admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
		<script src="{{ asset('admin/assets/js/pages/widgets.js') }}"></script>
		<script src="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
		<script src="{{ asset('admin/assets/js/pages/crud/datatables/basic/scrollable.js') }}"></script>
</body>
</html>