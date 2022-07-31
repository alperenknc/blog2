@extends('layouts.index')
@section('title')

@endsection
@section('content')

<div class="col-md-8">
    <div class="post-mediums">
        @if(!empty($anasayfakonular))
            @foreach($anasayfakonular as $i=>$konu  )
                <?php $konus =\App\Models\Begeniler::where('konu_id',$konu->id)->get(); ?>
                <?php $begeniler =\App\Models\Begeniler::where('konu_id',$konu->id)->get(); ?>
                @if(Auth::check())  <?php $begeni =\App\Models\Begeniler::where('konu_id',$konu->id)->where('user_id',Auth::user()->id)->first(); ?> @endif
                <div class="row post-medium">
                    <div class="col-md-5">
                        <div class="row konuresim"><img src="{{ $konu->resim }}" alt="{{ $konu->baslik }}"
                                style="height: 100%;width:100%" /></div>
                    </div>
                    <div class="col-md-7">
                        <div class="post-item">
                            <div class="medium-post-box clearfix">
                                <div class="pm-top-info clearfix">
                                    <div class="pull-left">
                                        <a href="#">{{ $konu->kategoriler->baslik }}</a>
                                    </div>
                                    <div class="post-item-social">
                                        <a href="#" tabindex="0" role="button" data-toggle="popover"
                                            data-trigger="focus" data-placement="bottom"
                                            data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>"
                                            class="pis-share"><i class="fa fa-share-alt"></i></a>
                                        
                                            <a href="#!"  class="bbuton numara-{{ $konu->id }} {{ !empty($begeni)? $begeni->durum==1 ? "lower" :"" :" " }}"
                                            @if(Auth::check() ) onclick=" begen($(this).attr('idkonu'))" @else data-toggle="modal" data-target="#login-form" class="modal-form" @endif
                                            idkonu="{{ $konu->id }}">
                                            <i class="fa fa-heart"></i>
                                            [ <span id="begeniislem"> {{ $begeniler->count() }} </span> ]
                                        </a>

                                    </div>
                                </div>
                                <div id="veri"></div>
                                <div class="post-item-paragraph">
                                    <h2><a
                                            href="{{ route('pages.konu.detay',[Str::slug($konu->baslik),$konu->id]) }}">{{ Str::limit($konu->baslik,50) }}</a>
                                    </h2>
                                    <p class="ellipsis-readmore">{!! Str::limit(strip_tags($konu->yazi),100) !!}
                                        <a class="more" href="{{ route('pages.konu.detay',[Str::slug($konu->baslik),$konu->id]) }}">
                                            &nbsp; detail »
                                        </a>
                                    </p>
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
        $.ajax({
            type: "GET",
            url: "{{ route('begeni') }}",
            data: {
                'idkonu': idkonu,
            },
            datatype: "html",
            success: function (response) {
                var durum = response.durum
                if (durum == "0") {
                    console.log("Beğeni Ekle" + response.konu)
                    $(".numara-" + response.konu).addClass('lower')
                    $(".numara-" + response.konu + " #begeniislem").text(response.taplamb)
                } else {
                    console.log("Beğeni Silindi" + response.konu)
                    $(".numara-" + response.konu).removeClass('lower')
                    $(".numara-" + response.konu + " #begeniislem").text(response.taplamb)
                }
            }
        });
    };

</script>


{{-- \Request::ip(); --}}
