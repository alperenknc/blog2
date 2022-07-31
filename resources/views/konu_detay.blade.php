@extends('layouts.sayfa')
@section('title')

@endsection
@section('content')
<div class="col-md-8 contenticerik">
    <div class="post-fluid">
        <div class="container-fluid">
            <div class="row post-items">
                <div class="post-item-banner">
                    <a href="{{ asset($konulardetay->resim) }}" data-fancybox="">
                        <img src="{{ asset($konulardetay->resim) }}" alt="{{ $konulardetay->baslik }}" />
                    </a>
                </div>
                <div class="col-md-12 nopadding">
                    <div class="post-item-paragraph sayfaicerik">
                        <div class="post-item post-item-detail">
                            <div class="post-item-paragraph">
                                <h1>{{ $konulardetay->baslik }}</h1>
                                <div>{!! $konulardetay->yazi !!}</div>
                            </div>

                            <div class="post-item-info no-border clearfix">
                                <p class="post-tags">
                                    <a href="#">{{ $konulardetay->kategoriler->baslik }}</a>
                                </p>
                                <div class="post-item-social" style="display: flex; flex-wrap: nowrap; flex-direction: row;">
									<div style="margin-right: 1rem">
										{{ $konulardetay->created_at->diffForHumans() }}
									</div>
                                    {{-- <a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus"
                                        data-placement="top"
                                        data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>"
                                        class="pis-share"><i class="fa fa-share-alt"></i> 12</a> --}}
                                    <a href="#!"
                                        class="bbuton numara-{{ $konulardetay->id }} {{ !empty($begeniyapan)? $begeniyapan->durum==1 ? "lower" :"" :" "}}"
                                        @if(Auth::check()) onclick="begen($(this).attr('idkonu'))" @else data-toggle="modal" data-target="#login-form" class="modal-form" @endif
                                        idkonu="{{ $konulardetay->id }}"> <i class="fa fa-heart"></i>
                                        [ <span id="begeniislem"> {{ $begenilercount->count() }} </span> ]
                                        
                                    </a>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="comment-box">
                            <a class="btn btn-golden" href="#">Leave a comment</a>
                            <div class="comment-tab">
                                <a href="#" class="comment-info">Comments (28)</a>
                                <i class="i">|</i>
                                <a href="#" class="comment-info"><i class="fa fa-comments"></i> Show all</a>
                            </div>

                            <div class="comment-block">

                                 @foreach($yorumlar as $yorum)
                                 <div class="comment-item">
                                    <a class="comment-photo" href="#">
                                        <img src="{{ asset('assets/img/profil_photo-05.png') }}"
                                            alt="" />
                                    </a>
                                    <div class="comment-body">
                                        <h6 class="comment-heading">{{ $yorum->userid->name }}   •   <span class="comment-date">
                                            {{  $yorum->created_at->diffForHumans() }}</span></h6>
                                        <p class="comment-text"> {!! $yorum->mesaj !!}</p>
                                    </div>
                                </div>
                                 @endforeach
                                
                                <div class="comment-form main-comment-form" style="padding-top: 1rem;">
                                    <form action="{{ route('yorum') }}" method="POST">
                                        @csrf
                                        <textarea class="comment-textarea"placeholder="Leave a comment..." name="mesaj" @if(!Auth::check()) data-toggle="modal" data-target="#login-form" class="modal-form" readonly="yes"@endif></textarea>
                                        @if(Auth::check())
                                        <div class="at-focus">
                                            <input name="konu_id" value="{{ $konulardetay->id }}" hidden type="text" />
                                            <input class="comment-input" placeholder="Name"  value="{{ Auth::user()->name }}" disabled type="text" />
                                            <input class="comment-input" placeholder="or Email" value="{{ Auth::user()->email }}" disabled type="email" />
                                            <button type="submit" class="comment-submit">Post Comment</button>
                                        </div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

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