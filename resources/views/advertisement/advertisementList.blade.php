@extends('layouts.master')
@section('content')
<!-- Advertisements section Start-->
<div class="gallery-2 row" style="margin: 15px">
  <div class="col-lg-1"></div><button class="col-lg-10 btn btn-rounded bg-dropbox" style="margin: 15px">آگاهی های تجارتی</button>
  @foreach($advertisements as $adv)
  <div class="col-md-4 col-sm-6 col-xs-6">
    <div class="g-item">
      <a href="/UploadedImages/books/{{$adv->image}}">
        <img src="/UploadedImages/books/{{$adv->image}}" alt="" width="100%" height="250px">
      </a>
      <div class="g-item-overlay clearfix" style="color:yellow">
        <i class="ti-heart mr-0-5"></i> 105 &nbsp &nbsp
        <div class="float-xs-left" style="color:green">
          <i class="ti-heart mr-0-5"></i> 105
        </div>
        <div class="float-xs-right">
         <a href="productDetails/{{ $adv->id }}"><i class="ti-info mr-0-5" style="color:blue"></i></a>
        </div>
      </div>
    </div><br>
  </div>
  @endforeach
</div>
@endsection
