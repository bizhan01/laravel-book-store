<!DOCTYPE html>
<html lang="en" dir="rtl">

<!-- Mirrored from big-bang-studio.com/neptune/neptune-rtl/pages-invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Jan 2017 11:18:53 GMT -->
<head>
		<!-- Meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Title -->
		<title>چاپ بیل</title>

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('../vendors/bootstrap4-rtl/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('../vendors/themify-icons/themify-icons.css') }}">
		<link rel="stylesheet" href="{{ asset('../vendors/font-awesome/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('../vendors/animate.css/animate.min.css') }}">
		<link rel="stylesheet" href="{{ asset('../vendors/jscrollpane/jquery.jscrollpane.css') }}">
		<link rel="stylesheet" href="{{ asset('../vendors/waves/waves.min.css') }}">
		<link rel="stylesheet" href="{{ asset('../vendors/switchery/dist/switchery.min.css') }}">

		<!-- Neptune CSS -->
		<link rel="stylesheet" href="css/core.css">

	</head>
	<body class="fixed-sidebar fixed-header skin-default">

		<div class="wrapper">
			<!-- Preloader -->
			<div class="preloader"></div>
			<!-- Sidebar -->
			<div class="site-overlay"></div>
			<div class="">
				<!-- Content -->
				<div class="content-area py-1">
					<div class="container-fluid">
						<center>
							<img src="\img\logo\logo.png" height="60px" alt="" /><br>
							<h4 style="color: #f4a030">Al-Beroni Online Bookstore</h4>
							<h4 style="color: #26abd7 "><span></span>کتاب فروشی البیرونی</h4>
							<h4><span></span>مدیریت فروشات و محاسبه</h4>
							<h4><span></span>فاکتور فروش</h4>
						</center>
						<div class="card">

							<div class="card-header clearfix">

								<h5 class="float-xs-left mb-0" style="direction: ltr"><span></span>
									@foreach($sales as $sale)
									{{$sale->bill_number}}
									@endforeach
									 :نمبر فاکتور</h5>

								<div class="float-xs-right"><?php echo date('Y-M-D') ?></div>
							</div>
							<div class="card-block">
								<div class="row mb-2">
									<div class="col-sm-8 col-xs-6">
										<strong><span></span>کتاب فروشی البیرونی</strong>
										<p><span></span>تلفن: 0786713264 - 0202572234<br>
									       </span> تلفن: 0782156254 - 0731494651<br>
											آدرس: کابل، دشت برچی، ایستگاه شفاخانه
										</p>
									</div>
									<strong><span></span>از انتخاب شما تشکر</strong>
									<p class="text-muted mb-0">این فاکتور بعد از چاپ قابل مسترد نمیباشد<br>لطفا مارا از انتقادات و پشنهادات تان آگاه سازید</p>
								</div>
									@foreach($cst_info as $sell)
										<h6><span></span> اسم مشتری: {{$sell->name}} </h6>
									@endforeach
								<table class="table table-bordered table-striped mb-2">
									<thead>
										<tr>
											<th><span></span>اسم جنس</th>
											<th><span></span>قیمت</th>
											<th><span></span>تعداد</th>
											<th><span></span>قیمت کلی</th>
										</tr>
									</thead>
									<tbody>
									@foreach($sales_info as $sell)
										<tr>
                      <td><span></span>{{$sell->book_name}}</td>
                      <td>{{$sell->price}}</td>
                      <td>{{$sell->product_qty}}</td>
                      <td>{{$sell->price * $sell->product_qty}}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<div class="row">
									<div class="col-lg-6">
										<div class="col-sm-4 col-xs-6">
											<div class="clearfix mb-0-25">
												<strong class="float-xs-left">امضاء مشتری</strong>
											</div>
										</div>
												<strong class="float-xs-left">امضاء و مهر فروشنده</strong>
									</div>

									<div class="col-lg-6">

										<div class="text-xs-right">
											<div class="mb-0-5"><span></span>قیمت کلی: {{$sell->total}} افغانی</div>
											<div class="mb-0-5"><span></span>  تخفیف: <span>{{$sell->discount}} افغانی</span>
										</div>

											<strong><span></span>
												قابل پرداخت:
												<?php
														$payable = $sell->total - $sell->discount;
														print ("$payable");
												 ?> افغانی
											</strong>
											<br>
											<strong>
												رسید:
												{{$sell->paid}}
												افغانی
											</strong>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer clearfix">
                <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light">
  							<button type="button" class="btn btn-info hidden-print label-left float-xs-right mr-0-5">
									<span class="btn-label"><i class="ti-printer"></i></span>
									چاپ بیل
								</button>
								</a>
									<a href="/sales"><button type="button" class="btn-warning hidden-print" name="button" >برگشت</button></a>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

		<!-- Vendor JS -->
		<script type="text/javascript" src="{{ asset('../vendors/jquery/jquery-1.12.3.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/tether/js/tether.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/bootstrap4-rtl/js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/detectmobilebrowser/detectmobilebrowser.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/jscrollpane/jquery.mousewheel.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/jscrollpane/mwheelIntent.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/jscrollpane/jquery.jscrollpane.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/jquery-fullscreen-plugin/jquery.fullscreen-min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/waves/waves.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('../vendors/switchery/dist/switchery.min.js') }}"></script>

		<!-- Neptune JS -->
		<script type="text/javascript" src="js/app.js"></script>
		<script type="text/javascript" src="js/demo.js"></script>
	</body>


<!-- Mirrored from big-bang-studio.com/neptune/neptune-rtl/pages-invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Jan 2017 11:18:53 GMT -->
</html>
