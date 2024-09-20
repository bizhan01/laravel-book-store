@extends('layouts.master')
@section('content')
<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="row row-md mb-1">
			<div class="col-lg-2 col-md-2 col-sm-2"></div>
      <div class="col-md-8">
        <div class="box bg-info user-1">
            <div class="box box-block tile tile-2 bg-info mb-2">
              <div class="t-icon right"><i class="ti-shopping-cart-full"></i></div>
              <div class="t-content">
                <div class="container-fluid">
                  <div class="row text-xs-center">
                    <div>
                      <img src="\img\logo\logo.png" alt=""  height="100px"/><br>
                      <h4 style="color: #f4a030">Al-Beroni Online Bookstore<br>
                      <span style="color: #066f92">کتاب فروشی البیرونی</span></h4>
                    </div>
                  </div>
                </div>
                <h5 class="mb-1">مدیریت فروشات و محاسبه</h5><br>
                 <img src="/UploadedImages/{{Auth::user()->profileImage}}" style="width: 40px; height: 40px;" class="img img-circle"> <br></br>
              </div>
                <div class="u-content">
                  <h5><a class="text-black" href="#">{{ Auth::user()->name }}</a></h5>
                  <h6 class="text-uppercase">فروشنده</h6> <br>
                  <div class="text-xs-center pb-0-5">
                    <!-- <form method="POST" action="{{route('newSell')}}" > -->
                     {{ csrf_field() }}
                     <input type="hidden" name="user_id" value="0">
                     <input type="hidden" name="total" >
                     <input type="hidden" name="discount" >
                     <input type="hidden" name="paid" >
                     <input type="hidden" name="status" >
                     <button class="btn btn-lg btn-primary btn-rounded mr-0-5 fa fa-shopping-cart" style="font-size: 30px"> &nbsp اجرای فروش جدید</button>
                     <br></br>
                       @include('layouts.errors')
                  <!-- </form> -->
                  </div>
                </div>
              </div>
                <div class="u-counters">
                  <div class="row no-gutter">
                    <div class="col-xs-12 uc-item">
                      <a class="text-black" href="#">
                        <strong>تاریخ</strong> <br>
                        <strong><?php echo date('Y-m-d') ?></strong>
                      </a>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
