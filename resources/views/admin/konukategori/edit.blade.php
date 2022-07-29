@extends('admin.layouts.pages')
@section('title')
Konu Kategori Düzenle
@endsection
@section('content')
<div class="container">
<!--begin::Card-->
<div class="card card-custom gutter-b example example-compact">
    <div class="card-header">
        <h3 class="card-title">Konu Kategori Düzenle</h3>
    </div>
    <!--begin::Form-->
    <form class="form" action="{{ route('konu-kategori.update',$kategorigetir->id) }}" enctype="multipart/form-data"  method="post">
        @method('put')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Başlık</label>
                <input type="text" class="form-control form-control-lg" name="baslik" value="{{ $kategorigetir->baslik }}" />
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success mr-2">Submit</button>
            <button type="button" onclick="location.href=('{{ Route('konu-kategori.index') }}')"  class="btn btn-secondary">Cancel</button>
        </div>
    </form>
    <!--end::Form-->
</div>
<!--end::Card-->
</div>
@endsection