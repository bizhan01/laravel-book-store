@extends('layouts.master')
@section('content')
<div class="content-area pb-1">
	<div class="profile-header mb-1">
		<div class="profile-header-cover img-cover" style="background-image: url(img/photos-1/4.jpg);"></div>
		<div class="profile-header-counters clearfix">
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 col-md-3">
				<div class="card profile-card">
					<div class="profile-avatar">
						<img src="{{ asset('UploadedImages').'/'.Auth::user()->profileImage }}" alt="">
					</div>
					<div class="card-block">
						<h4 class="mb-0-25">{{ Auth::user()->name }}</h4>
						<!-- <div class="text-muted mb-1">اسم مکتب</div> -->
					</div>
					<ul class="list-group">
						<a class="list-group-item" href="#">
							<i class="ti-worlds mr-0-5"></i>
							<span>وضیعت:</span>
							<span>
								@if(auth()->user()->status == 1)
									فعال
								@elseif(auth()->user()->status == 0)
									غیرفعال
								@else
									ادمین
								@endif
							</span>
						</a>
					</ul>
					<ul class="list-group">
						<a class="list-group-item" href="#">
							<i class="ti-worlds mr-0-5"></i>
							<span>شماره تماس:</span>
							<span>{{Auth::user()->phone_number}}</span>
						</a>
					</ul>
					<ul class="list-group">
						<a class="list-group-item" href="#">
							<i class="ti-worlds mr-0-5"></i>
							<span>نام کاربری:</span>
							<span>{{Auth::user()->email}}</span>
						</a>
					</ul>
					<ul class="list-group">
						<a class="list-group-item" href="#">
							<i class="ti-worlds mr-0-5"></i>
							<span>آدرس:</span>
							<span>{{Auth::user()->address}}</span>
						</a>
					</ul>
				</div>
				<!-- Who to follow Start-->
				<div class="card">
					<div class="card-header text-uppercase"><b>Who to follow</b></div>
					<div class="items-list">
						<div class="il-item">
							<a class="text-black" href="#">
								<div class="media">
									<div class="media-left">
										<div class="avatar box-48">
											<img class="b-a-radius-circle" src="img/avatars/1.jpg" alt="">
											<i class="status bg-success bottom right"></i>
										</div>
									</div>
									<div class="media-body">
										<h6 class="media-heading">John Doe</h6>
										<span class="text-muted">Software Engineer</span>
									</div>
								</div>
								<div class="il-icon"><i class="fa fa-angle-right"></i></div>
							</a>
						</div>
						<div class="il-item">
							<a class="text-black" href="#">
								<div class="media">
									<div class="media-left">
										<div class="avatar box-48">
											<img class="b-a-radius-circle" src="img/avatars/2.jpg" alt="">
											<i class="status bg-danger bottom right"></i>
										</div>
									</div>
									<div class="media-body">
										<h6 class="media-heading">John Doe</h6>
										<span class="text-muted">Software Engineer</span>
									</div>
								</div>
								<div class="il-icon"><i class="fa fa-angle-right"></i></div>
							</a>
						</div>
						<div class="il-item">
							<a class="text-black" href="#">
								<div class="media">
									<div class="media-left">
										<div class="avatar box-48">
											<img class="b-a-radius-circle" src="img/avatars/3.jpg" alt="">
											<i class="status bg-secondary bottom right"></i>
										</div>
									</div>
									<div class="media-body">
										<h6 class="media-heading">John Doe</h6>
										<span class="text-muted">Software Engineer</span>
									</div>
								</div>
								<div class="il-icon"><i class="fa fa-angle-right"></i></div>
							</a>
						</div>
					</div>
					<div class="card-block">
						<button type="submit" class="btn btn-primary btn-block">Show more</button>
					</div>
				</div>
				<!-- Who to follow End-->
			</div>

			<div class="col-sm-8 col-md-9">
				<div>
  					@include('layouts.errors')
				</div>

				<div class="card mb-0">
					<ul class="nav nav-tabs nav-tabs-2 profile-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#stream" role="tab">ویرایش اطلاعات</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#photos" role="tab">تغییر عکس</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#change-password" role="tab">تغییر گذرواژه</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="stream" role="tabpanel">
							<form method="post" action="{{ route('updateNameUser') }}">
								@csrf
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
									<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
										<label for="name">اسم</label>
										<input type="name" name="name" class="form-control" value="{{Auth::user()->name}}">
									</div>
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
									<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
										<label for="name">شماره تماس</label>
										<input type="name" name="phone_number" class="form-control" value="{{Auth::user()->phone_number}}">
									</div>
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
									<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
										<label for="name">آدرس</label>
										<input type="name" name="address" class="form-control" value="{{Auth::user()->address}}">
									</div>
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
									<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
										<label>&nbsp;</label>
										<input type="submit" class="btn btn-success form-control" value="ذخیره">
									</div>
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
								</div>
							</form>
						</div>
						<div class="tab-pane card-block" id="photos" role="tabpanel">
							<div class="gallery-2 row">
								<form method="post" action="{{ route('updateUserImage') }}" enctype="multipart/form-data">
									@csrf
									<div class="col-md-3 col-sm-3"></div>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<div class="g-item">
											<div>
                    		<input type="file" name="image" id="input-file-now" class="dropify" required/>
                    		<input type="submit" class="btn btn-success form-control" value="ذخیره">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="tab-pane card-block" id="change-password" role="tabpanel">
							<form method="post" action="{{ route('updateUserPass') }}">
								@csrf
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
									<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
										<label>گذروارژه قبلی</label>
										<input type="password" name="current-password" class="form-control">
									</div>
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
									<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
										<label>گذرواژه جدید</label>
										<input type="password" name="new-password" class="form-control">
									</div>
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
									<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
										<label>تکرار گذرواژه ی جدید</label>
										<input type="password" name="confirm_password" class="form-control">
									</div>
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
									<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
										<label>&nbsp;</label>
										<input type="submit" class="btn btn-success form-control" value="ذخیره">
									</div>
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
								</div>
							</form>
						</div>
					</div>
				</div><br>

				<div class="card mb-0">
					<div class="tab-content">
							<!-- Books section Start-->
								<div class="gallery-2 row">
									<div class="col-lg-1"></div><button class="col-lg-10 btn btn-rounded bg-dropbox" style="margin: 15px">کتاب های من</button>
									@foreach($books as $book)
									<div class="col-md-4 col-sm-6 col-xs-6">
										<div class="g-item">
											<a href="/UploadedImages/books/{{$book->image}}">
												<img src="/UploadedImages/books/{{$book->image}}" alt="" width="100%" height="250px">
											</a>
											<div class="g-item-overlay clearfix">
												<h5>{{$book->product_name}}</h5>
											</div>
										</div>
										<div class="g-item-overlay clearfix" style="background-color:#e8ebf0">
											<div class="float-xs-left" >
												<a href="editBook/{{ $book->id }}" style="color:green"> <i class="fa fa-edit mr-0-5"></i></a>
												<a href="deleteBook/{{ $book->id }}" onclick='return confirm("آیا مطمین استید حذف شود؟")'><i class="ti-trash mr-0-5" style="color:red"></i></a>
											</div>
											<div class="float-xs-right">
												<a href="details/{{ $book->id }}">	<i class="ti-info mr-0-5"></i></a>
											</div>
										</div><br>
									</div>
									@endforeach
								</div>	<br>
							<!-- Books section End-->

							<!-- products section Start-->
								<div class="gallery-2 row">
									<div class="col-lg-1"></div><button class="col-lg-10 btn btn-rounded bg-dropbox" style="margin: 15px">کتاب های من</button>
									@foreach($products as $product)
									<div class="col-md-4 col-sm-6 col-xs-6">
										<div class="g-item">
											<a href="/UploadedImages/books/{{$product->image}}">
												<img src="/UploadedImages/books/{{$product->image}}" alt="" width="100%" height="250px">
											</a>
											<div class="g-item-overlay clearfix">
												<h5>{{$product->product_name}}</h5>
											</div>
										</div>
										<div class="g-item-overlay clearfix" style="background-color:#e8ebf0">
											<div class="float-xs-left" >
												<a href="editProduct/{{ $product->id }}" style="color:green"> <i class="fa fa-edit mr-0-5"></i></a>
												<a href="deleteProduct/{{ $product->id }}" onclick='return confirm("آیا مطمین استید حذف شود؟")'><i class="ti-trash mr-0-5" style="color:red"></i></a>
											</div>
											<div class="float-xs-right">
												<a href="productDetails/{{ $product->id }}">	<i class="ti-info mr-0-5"></i></a>
											</div>
										</div><br>
									</div>
									@endforeach
								</div>	<br>
							<!-- Products section End-->

							<!-- Advertisements section Start-->
							<div class="gallery-2 row">
								<div class="col-lg-1"></div><button class="col-lg-10 btn btn-rounded bg-dropbox" style="margin: 15px">آگاهی های تجارتی</button>
								@foreach($advertisements as $adv)
								<div class="col-md-4 col-sm-6 col-xs-6">
									<div class="g-item">
										<a href="/UploadedImages/adv/{{$adv->image}}">
											<img src="/UploadedImages/adv/{{$adv->image}}" alt="" width="100%" height="250px">
										</a>
										<div class="g-item-overlay clearfix" style="color:yellow">
											<i class="ti-heart mr-0-5"></i> 105 &nbsp &nbsp
											<div class="float-xs-left" style="color:green">
												<i class="ti-heart mr-0-5"></i> 105
											</div>
											<div class="float-xs-right">
											 <a href="deleteAdvertisement/{{ $adv->id }}" onclick='return confirm("آیا مطمین استید حذف شود؟")'><i class="ti-trash mr-0-5" style="color:red"></i></a>
											</div>
										</div>
									</div>
								</div>
								@endforeach
							</div>	<br>
						<!-- Advertisements section End-->


						</div>
					</div>
				</div>
			</div>
	</div>
</div>
@endsection
