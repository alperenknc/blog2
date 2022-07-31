@extends('admin.layouts.pages')
@section('title')
Konular
@endsection
@section('content')
<div class="container">
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon2-favourite text-primary"></i>
                </span>
                <h3 class="card-label">Konular</h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                <a href="{{ route('konular.create') }}"
                    class="btn btn-primary font-weight-bolder">
                    <i class="la la-plus"></i>Yeni Ekle</a>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-checkables" id="kt_datatables" style="margin-top: 13px !important">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Başlık</th>
                        <th>Resim</th>
                        <th>Yazı</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($konular as $konu)
                        <tr>
                            <td>{{ $konu->id }}</td>
                            <td>{{ $konu->baslik }}</td>
                            <td><img src="{{ asset($konu->resim) }}" width="100px" alt="{{ $konu->baslik }}"></td>
                            <td>{!!  Str::limit(strip_tags($konu->yazi),100)  !!}</td>
                            <td class="child col-md-2" colspan="10">
                                <ul data-dtr-index="0" class="dtr-details">
                                    <li>
                                        <a href="{{ route('konular.edit',$konu->id) }}"
                                            class="btn btn-sm btn-clean btn-icon" title="Edit details">
                                            <i class="la la-edit"></i>
                                        </a>
                                        <a href="{{ route('delete.konu',$konu->id) }}" class="btn btn-sm btn-clean btn-icon" title="Delete">
                                            <i class="la la-trash"></i>
                                        </a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
