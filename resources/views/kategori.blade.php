@extends('layouts.index')
@section('title')
Kategoriler
@endsection
@section('content')
<div class=" col-md-8">
    <div class="row masonry masonry-gallery isotopeContainer">
        @if(!empty($konukategori))
        @foreach($konukategori as $item)
        <div class=" col-md-6 col-sm-6 mg-item people art">
            <div>
                <span class="mg-banner">
                    <img src="{{ asset($item->resim) }}" style="height:100%;width:100%;" alt="{{ $item->baslik }}">
                    {{-- <span class="banner-icon with-background">
                        <a href="#"><i class="fa fa-heart"></i></a>
                    </span> --}}
                </span>
                <div class="mg-content">
                    <a  href="{{ route('pages.kategoriler.detay',[Str::slug($item->baslik),$item->id]) }}">
                        <h5>
                            <span>
                            {{ $item->baslik }}
                            </span>
                        </h5>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection


