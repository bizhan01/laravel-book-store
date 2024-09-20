<div class="overlay"></div>
<div class="container-fluid px-0">
  <div class="row d-md-flex no-gutters slider-text align-items-center js-fullheight justify-content-end">
    <img class="one-third js-fullheight align-self-end order-md-last img-fluid" src="web/images/undraw_book_lover_mkck.svg" alt="">
    <div class="one-forth d-flex align-items-center ftco-animate js-fullheight">
      <div class="text mt-5" style="text-align: right">
        @if($success = session('success'))
        <div class="single-service-area">
          <div class="course-title d-flex align-items-end">
              <center><span style="font-size: 20px; color: green">{{$success}}</span></center>
            </div>
        </div>
        @endif
        <span class="subheading">کتاب فروشی البیرونی</span>
        <h1>البیرونی برند معتبر و ماندگار</h1>
        <p>سپاس بی کران خداوند بزرگ و بی همتای را که هستی مان بخشید و به طریق علم و دانش رهنمون مان شد و به همنشینی رهروان علم و دانش مفتخرمان نمود و خوشه چینی از علم و معرفت را روزی مان ساخت . و سلام و درود بر محمد وآل محمد و خاندان پاک او  طاهران معصوم و هم آنان که وجودمان وامدار وجود شان است.</p>
        <p><a href="{{ route('register') }}" class="btn btn-primary py-3 px-4">همین امروز باما بپیوندید</a></p>
      </div>
    </div>
  </div>
</div>
