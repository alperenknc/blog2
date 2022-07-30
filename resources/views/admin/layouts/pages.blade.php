<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.parts.head')
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
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
		<script src="{{ asset('admin/assets/plugins/custom/uppy/uppy.bundle.js') }}"></script>
		<script src="{{ asset('admin/assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
		<script src="{{ asset('admin/assets/js/pages/crud/forms/editors/tinymce.js') }}"></script>
		


		<script>
			$('#kt_datatables').DataTable({
				language: {
					info: "_TOTAL_ kayıttan _START_ - _END_ kayıt gösteriliyor.",
					infoEmpty: "Gösterilecek hiç kayıt yok.",
					loadingRecords: "Kayıtlar yükleniyor.",
					lengthMenu: "Sayfada _MENU_ kayıt göster",
					zeroRecords: "Tablo boş",
					search: "Arama:",
					infoFiltered: "(toplam _MAX_ kayıttan filtrelenenler)",
					buttons: {
						copyTitle: "Panoya kopyalandı.",
						copySuccess: "Panoya %d satır kopyalandı",
						copy: "Kopyala",
						print: "Yazdır",
					},
		
					paginate: {
						first: "İlk",
						previous: "Önceki",
						next: "Sonraki",
						last: "Son"
					},
				}
			});
		</script>
</body>
</html>