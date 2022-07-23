@extends('layouts.index')
@section('title')

@endsection
@section('content')
<div class="col-md-8">
    <div class="post-mediums">
        @if(!empty($anasayfakonular))
            @foreach($anasayfakonular as $i=>$konu  )
                <?php $konus =\App\Models\Begeniler::where('konu_id',$konu->id)->get(); ?>
                <?php $begenid =\App\Models\Begeniler::where('konu_id',$konu->id)->Where('user_id',1)->first(); ?>
                {{-- {{ dd($begenid) }} --}}
                <div class="row post-medium">
                    <div class="col-md-5">
                        <div class="row konuresim"><img src="{{ $konu->resim }}" alt="{{ $konu->baslik }}" /></div>
                    </div>
                    <div class="col-md-7">
                        <div class="post-item">
                            <div class="medium-post-box clearfix">
                                <div class="pm-top-info clearfix">
                                    <div class="pull-left">
                                        <a href="#">{{ $konu->kategoriler->baslik }}</a>
                                    </div>
                                    <div class="post-item-social">
                                        {{-- <a href="#" class="quick-read"><i class="fa fa-eye"></i></a> --}}
                                        <a href="#" tabindex="0" role="button" data-toggle="popover"
                                            data-trigger="focus" data-placement="bottom"
                                            data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>"
                                            class="pis-share"><i class="fa fa-share-alt"></i></a>

                                        <a href="#!" class="bbuton @if(!empty($begenid))@if($begenid->durum==1) lower @endif @endif" onclick="begen($(this).attr('idkonu'))"

                                            idkonu="{{ $konu->id }}">

                                            <i class="fa fa-heart"></i>
                                            <input type="text" id="s3" hidden @if(!empty($begenid)) value="0" @else value="1" @endif>
                                            <input type="text" id="s1" hidden value="{{ $konus->count() }}">

                                            <span id="s2"></span>

                                        </a>
                                    </div>
                                </div>
                                <div id="veri"></div>
                                <div class="post-item-paragraph">
                                    <h2><a
                                            href="{{ route('pages.konu.detay',[Str::slug($konu->baslik),$konu->id]) }}">{{ $konu->baslik }}
                                        </a></h2>
                                    <p class="ellipsis-readmore">{{ Str::limit($konu->yazi,100) }}<a
                                            class="more"
                                            href="{{ route('pages.konu.detay',[Str::slug($konu->baslik),$konu->id]) }}">&nbsp;
                                            detail »</a></p>
                                </div>
                                <div class="pm-bottom-info clearfix">
                                    <div class="pull-left">
                                        {{ $konu->created_at->diffForHumans() }}   •   <a href="#">#hastag</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection

<style>
    .lower i,
    .lower span {
        color: #000000;
    }

</style>
{{-- beğeni butonu için ajax kodu --}}
<script>
       function begen(idkonu) {
        var nesne = $('#s3').val();

        if(nesne == "1"){
           
            $.ajax({
                type: "GET",
                url: "{{ route('begeni') }}",
                data: {
                    'idkonu': idkonu,
                    'durum' : 1
                },
                datatype: "html",
                success: function (result) {
                    if ($('#veri').text() == "Beğenildi") {
                        $('#veri').text("Beğen")
                    } else {
                        // $(".bbuton").toggleClass('lower')
                        // if (Number.sayi1 == Number.sayi2) {
                        //     $(".bbuton span").text(sayi1-1)
                        // }
                        // else{
                        //     $(".bbuton span").text(sayi1+1)
                        // }

                    }
                }
            });
       
                }else{	
                    $.ajax({
                        type: "GET",
                        url: "{{ route('begeni') }}",
                        data: {
                            'idkonu': idkonu,
                            'durum' : 0
                        },
                        datatype: "html",
                        success: function (result) {
                            if ($('#veri').text() == "Beğenildi") {
                                $('#veri').text("Beğen")
                            } else {
                                // $(".bbuton").toggleClass('lower')
                                // if (Number.sayi1 == Number.sayi2) {
                                //     $(".bbuton span").text(sayi1-1)
                                // }
                                // else{
                                //     $(".bbuton span").text(sayi1+1)
                                // }

                            }
                        }
                    });
                }
    };

    // function begen(idkonu) {
    //     console.log(idkonu);
    //     var sayi1= Number($("#s1").val());
    //     var sayi2= Number($("#s2").val());
    //     $.ajax({
    //         type: "GET",
    //         url: "{{ route('begeni') }}",
    //         data: {
    //             'idkonu': idkonu
    //         },
    //         datatype: "html",
    //         success: function (result) {
    //             if ($('#veri').text() == "Beğenildi") {
    //                 $('#veri').text("Beğen")
    //             } else {
    //                 $(".bbuton").toggleClass('lower')
    //                 if (Number.sayi1 == Number.sayi2) {
    //                     $(".bbuton span").text(sayi1-1)
    //                 }
    //                 else{
    //                     $(".bbuton span").text(sayi1+1)
    //                 }
                    
    //             }
    //         }
    //     });
    // };

</script>


{{-- \Request::ip(); --}}
