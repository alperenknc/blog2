@extends('layouts.index')
@section('title')

@endsection
@section('content')
<div class="col-md-8">
    <div class="post-mediums">
        @if(!empty($anasayfakonular))
        @foreach($anasayfakonular as $i=>$konu  )
        <input type="text"hidden value="{{ $konus =\App\Models\Begeniler::where('konu_id',$konu->id)->get(); }} ">
        <div class="row post-medium">
            <div class="col-md-5">
                <div class="row konuresim"><img src="{{ $konu->resim }}" alt="{{ $konu->baslik }}" /></div>
            </div>
            <div class="col-md-7">
                <div class="post-item">
                    <div class="medium-post-box clearfix">
                        <div class="pm-top-info clearfix">
                            <div class="pull-left">
                                <a href="#">{{  $konu->kategoriler->baslik }}</a>
                            </div>
                            <div class="post-item-social">
                                <a href="#" class="quick-read"><i class="fa fa-eye"></i></a>
                                <a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>" class="pis-share"><i class="fa fa-share-alt"></i></a>
                                <a href="#!"class="bbuton " onclick="begen($(this).attr('idkonu'))" idkonu="{{ $konu->id }}"><i class="fa fa-heart"></i><span>
                                 
                                {{ $konus->count() }}  
                                </span></a>
                            </div>
                        </div>
                        <div id="veri"></div>
                        <div class="post-item-paragraph">
                            <h2><a href="#">{{ $konu->baslik }} </a></h2>
                            <p class="ellipsis-readmore">{{ Str::limit($konu->yazi,100) }}<a class="more" href="{{ route('pages.konu.detay',[Str::slug($konu->baslik),$konu->id]) }}">&nbsp; detail »</a></p>
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
    .lower i,.lower span{
        color: #000000;}

</style>
{{-- beğeni butonu için ajax kodu --}}
<script>

        function begen(idkonu){
            console.log(idkonu);
         $.ajax({ 
          type: "GET",
          url: "{{ route('begeni') }}",
          data: { 'idkonu':idkonu  },      
          datatype:"html", 
          success: function (result) {
            if($('#veri').text() == "Beğenildi"){
                $('#veri').text("Beğen")
            }
            else{
                $(".bbuton").toggleClass('lower');
            }
          }
        });
      };
  </script>
  

  {{-- \Request::ip(); --}}