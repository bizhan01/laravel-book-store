<div class="container">
  <div class="row d-flex no-gutters">
    <div class="col-md-6 col-lg-6 d-flex">
      <div class="img-about img d-flex align-items-stretch">
        <div class="overlay"></div>
        @foreach($latestBook as $lbook)
        <div class="img d-flex align-self-stretch align-items-center" style="background-image:url(uploadedImages/books/{{$lbook->image}});">
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-6 pl-md-5">
      <div class="row justify-content-start pb-3">
        <div class="col-md-12 heading-section ftco-animate" style="text-align: right; margin-right: 10px">
          <h2 class="mb-4">رونمایی کتاب برتر</h2>
          <p>کتاب فروشی البیرونی تلاش دارد که مطایق سلیقه مشتریان گرامی خویش از برترین کتب خویش رونمایی کند</p>
          <ul class="about-info mt-4 px-md-0 px-2">
            <li class="d-flex"><span>اسم کتاب:</span> <span>{{$lbook->book_name}}</span></li>
            <li class="d-flex"><span>نویسنده:</span> <span>{{$lbook->author}}</span></li>
            <li class="d-flex"><span>نسخه:</span> <span>{{$lbook->edition}}</span></li>
            <li class="d-flex"><span>انتشارات:</span> <span>{{$lbook->publisher}}</span></li>
            <li class="d-flex"><span>تاریخ نشر:</span> <span>{{$lbook->publish_date}}</span></li>
            <li class="d-flex"><span>ISBN:</span> <span>{{$lbook->ISBN}}</span></li>
            <li class="d-flex"><span>کتگوری:</span> <span>{{$lbook->category}}</span></li>
          </ul>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
