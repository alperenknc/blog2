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
                                {!! $konulardetay->yazi !!}
                            </div>

                            <div class="post-item-info no-border clearfix">
                                <p class="post-tags">
                                    <a href="#">fashion</a>
                                    <a href="#">culture</a>
                                    <a href="#">art</a>
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

                                        onclick="begen($(this).attr('idkonu'))" idkonu="{{ $konulardetay->id }}"> <i class="fa fa-heart"></i>
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

                                <div class="comment-item">
                                    <a class="comment-photo" href="#">
                                        <img src="assets/img/profil_photo-05.png" alt="" />
                                    </a>
                                    <div class="comment-body">
                                        <h6 class="comment-heading">Matthew L. Fisher   •   <span class="comment-date">2
                                                days ago</span></h6>
                                        <p class="comment-text">I am about like you. First: paper and after: photoshop
                                            (sometime).</p>
                                        <a href="#" class="comment-reply active-comment"><i class="reply-icon"></i>
                                            Reply</a>

                                        <div class="comment-form">
                                            <form>
                                                <textarea class="comment-textarea"
                                                    placeholder="Reply to Lauren Bonk"></textarea>
                                                <input class="comment-input" placeholder="Name" type="text" />
                                                <input class="comment-input" placeholder="or Email" type="text" />
                                                <button class="comment-submit">Post Comment</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="comment-item">
                                    <a class="comment-photo" href="#">
                                        <img src="{{ asset('assets/img/profil_photo-05.png') }}"
                                            alt="" />
                                    </a>
                                    <div class="comment-body">
                                        <h6 class="comment-heading">Lauren Bonk   •   <span class="comment-date">2 days
                                                ago</span></h6>
                                        <p class="comment-text"> mesaj icverik</p>
                                        <a href="#" class="comment-reply"><i class="reply-icon"></i> Reply</a>
                                    </div>
                                </div>


                                <div class="comment-form main-comment-form">
                                    <form>
                                        <textarea class="comment-textarea" placeholder="Leave a comment..."></textarea>
                                        <div class="at-focus">
                                            <input class="comment-input" placeholder="Name" type="text" />
                                            <input class="comment-input" placeholder="or Email" type="text" />
                                            <button class="comment-submit">Post Comment</button>
                                        </div>
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