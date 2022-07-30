@extends('admin.layouts.pages')
@section('title')
Konu Kategori Düzenle
@endsection
@section('content')
<div class="container">
<!--begin::Card-->
<div class="card card-custom gutter-b example example-compact">
    <div class="card-header">
        <h3 class="card-title">Konu Düzenle</h3>
    </div>
    <!--begin::Form-->
    <form class="form" action="{{ route('konular.update',$konugetir->id) }}" enctype="multipart/form-data"  method="post">
        @method('put')
        @csrf
        <div class="card-body" style=" display: flex; flex-wrap: wrap;"> 
            <div class="form-group col-md-6">
                <label>Başlık</label>
                <input type="text" class="form-control form-control-lg" name="baslik" value="{{ $konugetir->baslik }}" />
            </div>
            <div class="form-group col-md-6">
                <label>Resim</label>
                <input type="file" class="form-control form-control-lg" placeholder="resim ekle" name="resim" />
                <img src="{{ asset($konugetir->resim) }}" width="100px" alt="">
            </div>
            {{-- <div class="form-group col-md-6">
                <label class="col-3 col-form-label">Durum</label>
                <div class="col-3">
                    <span class="switch switch-lg switch-icon">
                        <label>
                            <input type="checkbox" id="toogles"
                            @if($konugetir->durum == 1)
                             checked value="1"
                            @endif
                            name="durum" onclick="toggleWeather()" value="0">
                            <span></span>
                        </label>
                    </span>
                </div>
            </div> --}}
            <div class="form-group col-md-6">
                <label for="exampleSelectl">Kategori</label>
                <select class="form-control form-control-lg" id="exampleSelectl" name="kategori">
                    @foreach($kategoriler as $item)
                    <option value=" @if($konugetir->kategori == $item->id)  {{ $konugetir->kategoriler->id }}  @else  {{$item->id}}  @endif  " @if($konugetir->kategori == $item->id) selected @endif >
                        @if($konugetir->kategori == $item->id) 
                        {{ $konugetir->kategoriler->baslik }} 
                        @else 
                        {{$item->baslik}} 
                        @endif 
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="card card-custom col-12">
                <div class="card-header">
                    <h3 for="exampleSelectl">Yazı</h3>
                </div>
                <div class="card-body">
                    <div class="tinymce">
                        <textarea id="kt-tinymce-4" name="yazi" class="tox-target">
                            {!! $konugetir->yazi !!}
                        </textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success mr-2">Kaydet</button>
            <button type="button"  onclick="location.href=('{{ Route('konular.index') }}')"  class="btn btn-secondary">Geri</button>
        </div>
    </form>
    <!--end::Form-->
</div>
<!--end::Card-->
</div>

@endsection