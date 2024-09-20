@extends('layouts.master')
@section('content')
<!-- Content -->
<br>
<center>
  <div class="col-lg-12">
    <center class="box bg-white" style="padding: 15px; margin-bottom: -6px"><h3>لیست کتاب های جدید</h3></center>
    <div style="margin-bottom: -50px">
      <div class="tab-content ">
        <div class="tab-pane active" id="tab-1" role="tabpanel">
          @include('search.generalSearch');
        </div>
      </div>
    </div>
  </div>
</center>

<div class="row row-sm">
  @foreach($books as $book)
    <div class="col-md-3">
      <div class="box bg-white product product-3">
        <div class="p-img img-cover" style="background-image: url(UploadedImages/books/{{$book->image}});">
          <button type="submit" class="btn btn-info btn-block"><a href="productDetails/{{ $book->id }}"> جزئیات </a></button>
        </div>
        <div class="p-content">
          <div class="clearfix">
            <h5 class="float-xs-left"><a class="text-black" href="#">{{$book->product_name}}</a></h5>
            <div class="p-price float-xs-right">{{$book->price}} <span style="color: blue">افغانی</span></div>
          </div>
          <div class="p-info">{{$book->author}}</div>
        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection
