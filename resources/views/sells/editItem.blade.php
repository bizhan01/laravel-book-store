@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
      <nav class="navbar navbar-light bg-white b-a mb-2">
        <center><h3>ویرایش محصول</h3></center><hr>
				<form action = "/editItems/sellItemUpdate/<?php echo $sInfo[0]->id; ?>" method = "post" enctype="multipart/form-data" >
					<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
          <div class="row form-group">
              <input type="hidden" name="user_id" value="<?php echo $sInfo[0]->user_id; ?>">
              <input type="hidden" name="sell_id" value="<?php echo $sInfo[0]->sell_id; ?>">
              <div class="col-lg-2"></div>
             <div class="col-lg-4 col-md-4 col-sm-4">
               <label  for="Field of Study" style="color:black"> اسم محصول <span style="color: red">*</span></label>
               <select class="form-control" name="product_id" required style="height: 40px">
                 @foreach($pro_info as $product)
                   <option value="<?php echo $sInfo[0]->product_id; ?>">{{$product->book_name}} &nbsp &nbsp &nbsp{{$product->price}} افغانی </option>
                 @endforeach
                 @foreach($products as $product)
                   <option value="{{$product->id}}" >{{$product->book_name}} &nbsp &nbsp &nbsp{{$product->price}} افغانی</option>
                 @endforeach
               </select>
             </div>
             <div class="col-lg-4 col-md-4 col-sm-4">
               <label  for="Field of Study" style="color:black">تعداد</label>
               <input type="text"  name="product_qty" value="<?php echo $sInfo[0]->product_qty; ?>" class="form-control txt" placeholder="کد محصول" required>
             </div>
          </div>
          <div class="col-lg-2"></div>
          <div class="row form-group">
             <div class="col-md-4">
                <input type="submit" name="submit" value="ذخیره" class="btn btn-rounded btn-success " />
								<button type="reset" class="btn btn-rounded btn-warning"><li class="fa fa-remove"> لغو</li></button> &nbsp
								@foreach($sales as $sell)
							  <a href="/editItems/{{ $sell->id }}">برگشت</a>
								@endforeach
             </div>
          </div>
					@include('layouts.errors')
        </form>
      </nav>
    </div>
  </div>
@endsection
