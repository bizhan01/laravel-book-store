@extends('layouts.master')
@section('content')
<br>
<div class="box bg-white product-view mb-2">
  <div class="box-block">
    <div class="row">
      <div class="col-md-4 col-sm-5">
        <div class="pv-images mb-1 mb-sm-0">
          <div class="mb-1">
            <img class="img-fluid" src="/UploadedImages/books/<?php echo $book[0]->image; ?>" alt="" width="100%">
          </div>
        </div>
      </div>
      <div class="col-md-8 col-sm-7">
        <div class="pv-content">
          <div class="pv-title">
            جزئیات کامل محصول
            <a class="text-danger" href="#"><i class="fa fa-star"></i></a>
          </div>
          <p>
            <ul class="fa-ul" style="font-size: 20px">
              <li><i class="fa fa-circle-o"></i>اسم کتاب: <?php echo $book[0]->product_name; ?></li>
              <li><i class="fa fa-circle-o"></i>نویسنده: <?php echo $book[0]->author; ?></li>
              <li><i class="fa fa-circle-o"></i>نسخه: <?php echo $book[0]->edition; ?></li>
              <li><i class="fa fa-circle-o"></i>انتشارات: <?php echo $book[0]->publisher; ?></li>
              <li><i class="fa fa-circle-o"></i>تاریخ نشر: <?php echo $book[0]->publish_date; ?></li>
              <li><i class="fa fa-circle-o"></i>ISBN: <?php echo $book[0]->ISBN; ?></li>
              <li><i class="fa fa-circle-o"></i>کتگوری: <?php echo $book[0]->category; ?></li>
              <li><i class="fa fa-circle-o"></i>نوعیت:
                @if( $book[0]->product_type == 1)
                   جدید
                 @else
                   مستعمل
                 @endif</li>
              <li><i class="fa fa-circle-o"></i>تعداد: <?php echo $book[0]->quantity; ?></li>
              <li><i class="fa fa-circle-o"></i>قیمت: <?php echo $book[0]->price; ?> <span style="color: blue">افغانی</span></li>
              <li><i class="fa fa-circle-o"></i>مالک: <?php echo $book[0]->name; ?></li>
              <li><i class="fa fa-circle-o" dir="rtl"></i>تلفن: <?php echo $book[0]->phone_number; ?></li>
              <li><i class="fa fa-circle-o"></i>ایمیل: <?php echo $book[0]->email; ?></li>
              <li><i class="fa fa-circle-o"></i>آدرس: <?php echo $book[0]->address; ?></li>
            </ul>
          </p>
        </div>
        <a class="text-primary" href="#"><span class="underline">برگشت</span></a>
      </div>
    </div>
  </div>
</div>
@endsection
