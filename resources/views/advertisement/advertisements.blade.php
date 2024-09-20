@foreach($advertisements as $adv)
<div class="box  post post-5 img-cover" style="background-image: url(/UploadedImages/books/{{$adv->image}});">
  <div class="p-content">
    <a href="details/{{ $adv->id }}"><span class="tag tag-purple">نمایش آگاهی</span></a>
    <div class="p-info clearfix">
      <div class="float-xs-left">
        <a class="text-white" href="#"><i class="fa  fa-thumbs-up"></i>57</a>
      </div>
      <div class="float-xs-right">
        <a class="text-white" href="#"><i class="fa fa-thumbs-down"></i>8</a>
      </div>
    </div>
  </div>
</div>
@endforeach
