<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('ok'))
    <script>
    	Swal.fire(
      'Başarılı!',
      ' {{ session('ok') }}',
      'success'
    )
    </script>
    
    @elseif(session('no'))
    <script>
    	Swal.fire(
      'HATA!',
      ' {{ session('no') }}',
      'error'
    )
    </script>
@endif
