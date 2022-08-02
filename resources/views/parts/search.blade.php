<li class="title">SUBJECKT</li>
@foreach($sonuckonular as $item)
        <li><a href="{{ route('pages.konu.detay',[Str::slug($item->baslik),$item->id]) }}">{{Str::limit($item->baslik,50)}}</a><i class="line"></i></li>
@endforeach
<br>
<br>
<li class="title">CATEGORY</li>
@foreach($sonuckategori as $item)
        <li class="bar-tags"> <a href="{{ route('pages.kategoriler.detay',[Str::slug($item->baslik),$item->id]) }}">{{Str::limit($item->baslik,50)}}</a></li>
@endforeach
