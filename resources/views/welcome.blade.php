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
	          <li class="nav-item"><a href="#home-section" class="nav-link"><span>خانه</span></a></li>
            <li class="nav-item"><a href="#projects-section" class="nav-link"><span>کتاب ها</span></a></li>
	          <li class="nav-item"><a href="#about-section" class="nav-link"><span>رونمایی</span></a></li>
	          <li class="nav-item"><a href="#chapter-section" class="nav-link"><span>خدمات</span></a></li>
	          <li class="nav-item"><a href="#testimonial-section" class="nav-link"><span>دیدگاه</span></a></li>
	          <li class="nav-item"><a href="#author-section" class="nav-link"><span>درباره</span></a></li>
	          <li class="nav-item"><a href="#contact-section" class="nav-link"><span>تماس</span></a></li>
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

	  <section class="hero-wrap js-fullheight" >
      @include('web.home');
    </section>

    <section class="ftco-section ftco-no-pb ftco-partner">
      @include('web.partner')
    </section>


    <section class="ftco-section ftco-project" id="projects-section">
      <div class="container">
        <div class="row no-gutters justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading">کتاب</span>
            <h2 class="mb-4">کتاب های ما</h2>
          </div>
        </div>
        @include('web.books');
      </div>
    </section>

    <section class="ftco-about img ftco-section" id="about-section">
      @include('web.about');
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="section-counter">
    	@include('web.counter');
    </section>

    <section class="ftco-section ftco-no-pb ftco-no-pt" id="chapter-section">
      @include('web.services');
    </section>

    <section class="ftco-section testimony-section ftco-no-pb" id="testimonial-section">
      @include('web.vision');
    </section>

		<section class="ftco-about img ftco-section ftco-no-pt ftco-no-pb" id="author-section">
    @include('web.author');
    </section>

    <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
      @include('web.contact');
    </section>


    <footer class="ftco-footer ftco-section" style="text-align: right">
      @include('web.footer');
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
