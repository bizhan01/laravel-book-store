<div class="container">
  <div class="row justify-content-center mb-5 pb-3">
    <div class="col-md-7 heading-section text-center ftco-animate">
      <h2 class="mb-4">تماس باما</h2>
      <p>ما معتقدیم که نظرات، انتقادات و پشنهادات شما برای سازنده است لطف نموده ما را از نظرات نیک تان آگاه سازید</p>
    </div>
  </div>

  <div class="row d-flex contact-info mb-5">
    <div class="col-md-6 col-lg-3 d-flex ftco-animate">
      <div class="align-self-stretch box text-center p-4 bg-light">
        <div class="icon d-flex align-items-center justify-content-center">
          <span class="fa fa-map-marker"></span>
        </div>
        <div>
          <h3 class="mb-4">آدرس</h3>
          <p>کابل، دشت برچی</p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3 d-flex ftco-animate">
      <div class="align-self-stretch box text-center p-4 bg-light">
        <div class="icon d-flex align-items-center justify-content-center">
          <span class="fa fa-phone"></span>
        </div>
        <div>
          <h3 class="mb-4">شماره تماس</h3>
          <p><a href="tel://1234567920">0749840055</a></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3 d-flex ftco-animate">
      <div class="align-self-stretch box text-center p-4 bg-light">
        <div class="icon d-flex align-items-center justify-content-center">
          <span class="fa fa-paper-plane"></span>
        </div>
        <div>
          <h3 class="mb-4">ایمیل آدرس</h3>
          <p><a href="mailto:info@yoursite.com">info@alberoni.com</a></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3 d-flex ftco-animate">
      <div class="align-self-stretch box text-center p-4 bg-light">
        <div class="icon d-flex align-items-center justify-content-center">
          <span class="fa fa-globe"></span>
        </div>
        <div>
          <h3 class="mb-4">وب سایت</h3>
          <p><a href="#">www.alberoni.com</a></p>
        </div>
      </div>
    </div>
  </div>

  <div class="row no-gutters block-9">
    <div class="col-md-12 order-md-last d-flex">
        <form method="post" action="{{ route('sendMessage') }}" class="bg-light p-4 p-md-5 contact-form">
          @csrf
        <div class="form-group">
          <input type="text" name="name" class="form-control" placeholder="اسم شما">
        </div>
        <div class="form-group">
          <input type="text" name="email" class="form-control" placeholder="ایمیل آدرس شما">
        </div>
        <div class="form-group">
          <input type="text" name="subject" class="form-control" placeholder="موضوع">
        </div>
        <div class="form-group">
          <textarea name="message" id=""  cols="30" rows="7" class="form-control" placeholder="پیام..."></textarea>
        </div>
        <div class="form-group">
          <input type="submit" name="submit" value="ارسال" class="btn btn-primary py-3 px-5">
        </div>
      </form>

    </div>

    <div class="col-md-6 d-flex">
      <div id="map" class="map"></div>
      <!-- <div class="img" style="background-image: url(images/about.jpg);"></div> -->
    </div>
  </div>
</div>
