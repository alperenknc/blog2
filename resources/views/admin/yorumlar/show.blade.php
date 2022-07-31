@extends('admin.layouts.pages')
@section('title')
Yorumlar
@endsection
@section('content')
<div class="container">
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="flaticon2-favourite text-primary"></i>
                </span>
                <h3 class="card-label">Yorumlar</h3>
            </div>
            {{-- <div class="card-toolbar">
                <!--begin::Button-->
                <a href=""
                    class="btn btn-primary font-weight-bolder">
                    <i class="la la-plus"></i>Yeni Ekle</a>
                <!--end::Button-->
            </div> --}}
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-checkables" id="kt_datatables"
                style="margin-top: 13px !important">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Konu</th>
                        <th>Kullanıcı</th>
                        <th>Mesaj</th>
                        <th>Tarih</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($yorumlar as $count=> $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->konuid->baslik }}</td>
                            <td>{{ $item->userid->name }}</td>
                            <td>{{ Str::limit(strip_tags($item->mesaj),100) }}</td>
                            <td>{{ $item->created_at->diffForHumans() }}</td>
                            <td class="child col-md-2" colspan="10">
                                <ul data-dtr-index="0" class="dtr-details">
                                    <li style="display: flex!important; justify-content: space-between;">
                                         <div class="col-3" style="display: flex!important">
                                          <span class="switch switch-sm switch-icon">
                                           <label>
                                            <input type="checkbox" class="switch" yorum_id="{{ $item->id }}"
                                            @if($item->durum==1)
                                                checked
                                            @endif
                                            name="select" />
                                            <span></span>
                                           </label>
                                          </span>
                                         </div>
                                        </div>
                                        <a href="{{ route('delete.yorum',$item->id) }}"
                                            class="btn btn-sm btn-clean btn-icon" style="display: flex!important" title="Delete">
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
<script>
    $(function() {
      $('.switch').change(function() {
        id = $(this)[0].getAttribute('yorum_id');
        statu=$(this).prop('checked');
        $.get("{{ route('switchy') }}", {id:id,statu:statu}, function(data,status){
            console.log(data);
        })
      })
    })
  </script>
{{-- $("#myCheckBox").prop("checked", false); --}}
@endsection
