@extends('admin.layouts.pages')
@section('title')
Konu Oluşturma
@endsection

@section('content')
<div class="container">
    <!--begin::Card-->
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">Konu Ekle</h3>
            {{-- <div class="card-toolbar">
                <div class="example-tools justify-content-center">
                </div>
            </div> --}}
        </div>
        <!--begin::Form-->
        <form class="form " action="{{ route('konular.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="card-body row">
                <div class="form-group col-md-6">
                    <label>Başlık</label>
                    <input type="text" class="form-control form-control-lg" placeholder="Başlık Gir" name="baslik" />
                </div>
                <div class="form-group col-md-6">
                    <label>Resim</label>
                    <input type="file" class="form-control form-control-lg" placeholder="resim ekle" name="resim" />
                </div>
                {{-- <div class="form-group col-md-6">
                    <label class="col-3 col-form-label">Durum</label>
                    <div class="col-3">
                        <span class="switch switch-lg switch-icon">
                            <label>
                                <input type="checkbox" id="toogles" checked name="durum" value="1" />
                                <span></span>
                            </label>
                        </span>
                    </div>
                </div> --}}

                <div class="form-group col-md-6">
                    <label for="exampleSelectl">Kategori</label>
                    <select class="form-control form-control-lg" id="exampleSelectl" name="kategori">
                        @foreach($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->baslik }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card card-custom">
                <div class="card-header">
                    <h3 for="exampleSelectl">Yazı</h3>
                </div>
                <div class="card-body">
                    <div class="tinymce">
                        <textarea id="kt-tinymce-4" name="yazi" class="tox-target">
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success mr-2">Kaydet</button>
                <button type="reset" onclick="location.href=('{{ Route('konular.index') }}')"
                    class="btn btn-secondary">Geri</button>
            </div>
        </form>
    </div>
</div>

<script>
    var demos = function () {
        tinymce.init({
            selector: '#yazi',
            language: 'tr_TR',
            toolbar: ['styleselect fontselect fontsizeselect',
                'undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify',
                'bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code'
            ],
            plugins: 'advlist autolink link image lists charmap print preview code'
        });
    }

</script>
@endsection
