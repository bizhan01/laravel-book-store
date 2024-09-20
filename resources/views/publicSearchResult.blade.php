<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <title>البیرونی</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <link rel="stylesheet" href="{{ asset('../vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="web/css/animate.css">

    <link rel="stylesheet" href="web/css/owl.carousel.min.css">
    <link rel="stylesheet" href="web/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="web/css/magnific-popup.css">

    <link rel="stylesheet" href="web/css/flaticon.css">
    <link rel="stylesheet" href="web/css/style.css">
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">البیرونی<span>.</span></a>
	      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> مینو
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav nav ml-auto">
	          <li class="nav-item"><a href="/" class="nav-link"><span>خانه</span></a></li>
            <li class="nav-item"><a href="#projects-section" class="nav-link"><span>کتاب ها</span></a></li>
	        </ul>
	      </div>
        @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">پنل کاری</a>
                    @else
                        <a href="{{ route('login') }}">ورود</li></a> &nbsp  &nbsp

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">پیوستن</a>
                        @endif
                    @endauth
                </div>
            @endif
	    </div>
	  </nav>

    <section class="ftco-section ftco-project" id="projects-section">
      <div class="container">
        @include('publicSearch');
        <div class="row">
          @foreach($details as $book)
          <div class="col-md-3">
            <div class="project img ftco-animate d-flex justify-content-center align-items-end" style="background-image: url(uploadedImages/books/{{$book->image}});">
              <div class="overlay"></div>
              <div class="text p-4" style="text-align: right">
                <h3><a href="details/{{ $book->id }}">{{$book->book_name}}</a></h3>
                <span style="font-size: 15px">{{$book->author}}</span>
                <span style="font-size: 15px;">
                  @if( $book->type == 1)
                     <button type="button" class="btn btn-success btn-sm float-left">جدید</button>
                   @else
                     <button type="button" class="btn btn-warning btn-sm float-left">مستعمل</button>
                   @endif
                </span>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>





    <footer class="ftco-footer ftco-section" style="text-align: right">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">درباره</h2>
              <p>البیرونی برند معتبر و اندگار در عرصه کتاب فروشی میباشد </p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
	              <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
	              <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">لینک ها</h2>
              <ul class="list-unstyled">
                <li><a href="#"></span>خانه</a></li>
                <li><a href="#"></span>کتاب</a></li>
                <li><a href="#"></span>خدمات</a></li>
                <li><a href="#"></span>درباره</a></li>
                <li><a href="#"></span>تماس باما</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">خدمات</h2>
              <ul class="list-unstyled">
                <li><a href="#"></span>فروشات</a></li>
                <li><a href="#"></span>انتشارات</a></li>
                <li><a href="#"></span>ویرایش</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">راه های ارتباطی</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon fa fa-map-marker"></span><span class="text">کابل، دشت برچی</span></li>
	                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon fa fa-paper-plane"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
      </div>
    </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="web/js/jquery.min.js"></script>
  <script src="web/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="web/js/popper.min.js"></script>
  <script src="web/js/bootstrap.min.js"></script>
  <script src="web/js/jquery.easing.1.3.js"></script>
  <script src="web/js/jquery.waypoints.min.js"></script>
  <script src="web/js/jquery.stellar.min.js"></script>
  <script src="web/js/owl.carousel.min.js"></script>
  <script src="web/js/jquery.magnific-popup.min.js"></script>
  <script src="web/js/jquery.animateNumber.min.js"></script>
  <script src="web/js/scrollax.min.js"></script>
  <script src="web/https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="web/js/google-map.js"></script>

  <script src="web/js/main.js"></script>

  </body>
</html>
