@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
			<!-- ُSuccess Flash Message -->
				@if($success = session('success'))
				<div class="alert alert-success alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
						</button>
						<div>
							<center>
								{{$success}}
								<h5 style="color:#5bda19">فاکتور موفقانه محاسبه گردد و آماده چاپ می باشد</h5>
								@foreach($printSales as $sell)
									<h6> شماره ثبت: {{$sell->id}} </h6>
									<p> <a href="/edit/printMyInvioce/{{ $sell->id }}"  style="display: inline-block; padding: 10px 30px; font-size: 14px; color: #fff; background: #5bda19; border-radius: 40px; text-decoration:none;"> چاپ فاکتور</a></p>
							 @endforeach
							</center>
						</div>
				</div>
				@endif
      <div class="navbar navbar-light bg-white b-a mb-2">
         <center><h3>محاسبه فاکتور</h3></center>
         <hr>
        <form action = "/updateItems/<?php echo $sales[0]->id; ?>" method = "post" enctype="multipart/form-data" >
           <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
           <table class="table table-bordered table-striped mb-2">
              <tr>
                 <th>محصول</th>
                 <th>قیمت</th>
                 <th>تعداد</th>
                 <th>قابل پرداخت</th>
                 <th>ویرایش</th>
                 <th>حذف</th>
              </tr>
                <?php $sum=0; $sum2=0;?>
                @foreach($sales_info as $sInfo)
              <tr>
                 <td>{{$sInfo->book_name}}</td>
                 <td>{{$sInfo->price}}</td>
                 <td>{{$sInfo->product_qty}}</td>
                 <td>{{$sInfo->price * $sInfo->product_qty}}   </td>
                 <td><a href="sellItemShow/{{ $sInfo->id }}" class="fa fa-edit"></a></td>
                 <td><a href="deleteSellItem/{{$sInfo->id }}" onclick='return confirm("حذف شود؟")' class="fa fa-trash" style="color: red"></a></td>
              </tr>
                  <?php $sum += $sInfo->price * $sInfo->product_qty; ?>
                  <?php $sum2 += $sInfo->price * $sInfo->product_qty; ?>
            @endforeach
            <tr>
               <td>
                 <div class="input-daterange input-group">
                    <span class="input-group-addon bg-info b-0 text-white">قیمت کلی</span>
                  </div>
               </td>
               <td colspan="6">
								 <div class="input-daterange input-group">
                    <input type = 'text' readonly name = 'total' class="form-control"   value = '<?php echo $sum; ?>' style="text-align: center"/>
                    <input type = 'hidden' readonly name = 'subTotal' class="form-control"   value = '<?php echo $sum2; ?>' style="text-align: center"/>
                  </div>
               </td>
            </tr>
           </table>
					 <div class="row form-group">
							<div class="col-lg-4 col-md-4 col-sm-4">
								<label  for="Field of Study" style="color:black">مشتری</label>
								<!-- <input type="text"  name="customer_phone" class="form-control" placeholder="مشتری" required> -->
								<select class="form-control" name="user_id" required id='selUser'>
									<option></option>
									@foreach($customers as $customer)
									<option value="{{$customer->id}}">{{$customer->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="col-lg-4 col-md-8 col-sm-8">
								<label  for="Field of Study" style="color:black">وضع تخفیف</label>
								<input type="text"  name="discount" class="form-control txt"  value="0" required>
							</div>
							<div class="col-lg-4 col-md-8 col-sm-8">
								<label  for="Field of Study" style="color:black">پرداخت</label>
								<input type="text"  name="paid" class="form-control txt" value="0"  required>
							</div>
					 </div>
					 <div class="row form-group">
						 <div class="col-lg-4 col-md-8 col-sm-8">
							 <button type="submit" class="btn btn-info label-left  mr-0-5 ">
 								<span class="btn-label"><i class="ti-printer"></i></span>
 							   بعدی
 					 	   </button> &nbsp   &nbsp  &nbsp
			         </form>
							 @foreach($sales as $sell)
								<a href="deleteSell/{{ $sell->id }}" onclick='return confirm("آیا مطمین استید معامله لغو شود؟")'>
								 <button type="button" class="btn btn-danger label-left  mr-0-5 ">
									 <span class="btn-label"><i class="ti-trash"></i></span>
										لغو معامله
								</button>
							 </a>
						 @endforeach
						 </div>
					</div>
      </div>
    </div>
</div>

<!-- Script -->
 <script type="text/javascript" src="{{ asset('../jquery-3.2.1.min.js') }}"></script>
 <script>
 $(document).ready(function(){

		 // Initialize select2
		 $("#selUser").select2();

		 // Read selected option
		 $('#but_read').click(function(){
				 var username = $('#selUser option:selected').text();
				 var userid = $('#selUser').val();

				 $('#result').html("id : " + userid + ", name : " + username);
		 });
 });
 </script>
@endsection
