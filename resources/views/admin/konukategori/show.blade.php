@extends('admin.layouts.pages')
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/bs-3.3.7/jq-2.2.4/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-html5-1.3.1/b-print-1.3.1/r-2.1.1/rg-1.0.0/datatables.min.css" />

<script type="text/javascript"
    src="https://cdn.datatables.net/v/bs-3.3.7/jq-2.2.4/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-html5-1.3.1/b-print-1.3.1/r-2.1.1/rg-1.0.0/datatables.min.js">
</script>
@section('content')
<div class="container">
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon2-favourite text-primary"></i>
                </span>
                <h3 class="card-label">Konu Kategorileri</h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                <a href="{{ route('konu-kategori.create') }}"
                    class="btn btn-primary font-weight-bolder">
                    <i class="la la-plus"></i>Yeni Ekle</a>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-checkables" id="kt_datatables"
                style="margin-top: 13px !important">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Başlık</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kategoriler as $kategori)
                        <tr>
                            <td>{{ $kategori->id }}</td>
                            <td>{{ $kategori->baslik }}</td>
                            <td class="child col-md-2" colspan="10">
                                <ul data-dtr-index="0" class="dtr-details">
                                    <li>
                                        <a href="{{ route('konu-kategori.edit',$kategori->id) }}"
                                            class="btn btn-sm btn-clean btn-icon" title="Edit details">
                                            <i class="la la-edit"></i>
                                        </a>
                                        <a href="{{ route('delete.konukategori',$kategori->id) }}" class="btn btn-sm btn-clean btn-icon" title="Delete">
                                            <i class="la la-trash"></i>
                                        </a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </div>
    </div>
</div>

@endsection
