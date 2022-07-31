@extends('admin.layouts.pages')
@section('title')
Konu Kategori Oluşturma
@endsection
@section('content')
<div class="container">
	<!--begin::Card-->
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">Konu Kategori Ekle</h3>
            {{-- <div class="card-toolbar">
                <div class="example-tools justify-content-center">
                </div>
            </div> --}}
        </div>
        <!--begin::Form-->
        <form class="form" action="{{ route('konu-kategori.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group col-md-6">
                    <label>Başlık</label>
                    <input type="text" class="form-control form-control-lg" placeholder="Başlık Gir" name="baslik" />
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label">Resim</label>
                    <input type="file"  class="form-control form-control-lg" name="resim"/>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success mr-2">Kaydet</button>
                <button type="reset" onclick="location.href=('{{ Route('konu-kategori.index') }}')"  class="btn btn-secondary">Geri</button>
            </div>
        </form>
        <!--end::Form-->
    </div>
    <!--end::Card-->
</div>
{{-- @if($errors->Any())
    @foreach($errors->all() as $error)
        <script>
            Swal.fire(
                'HATA!',
                ' {{ $errors }}</br>',
                'error'
            )
        </script>
    @endforeach
@endif --}}
@endsection