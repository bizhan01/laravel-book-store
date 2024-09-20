@extends('layouts.master')
@section('content')
<div>
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
			<div class="col-lg-12 box box-block bg-white">
        <center> <h4>ثبت مصارف</h4> </center> <br>
        <form method="POST" action="{{route('addExpense')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="row form-group">
              <div class="col-md-3">
                <label for="fullName" style="color: black">اسم کامل کارمند <span style="color: red">*</span></label>
                <input type="text" name="name" value="" class="form-control" placeholder="اسم کامل کارمند" required>
              </div>
							<div class="col-md-3">
                <label for="fullName" style="color: black">کتگوری مصرف <span style="color: red">*</span></label>
                <select class="form-control" name="category" required style="height: 40px">
                	<option value="">انتخاب کنید</option>
                	<option>مواد غذایی</option>
                	<option>کرایه</option>
                	<option>آب برق</option>
                	<option>خرید اجناس</option>
                	<option>سایر</option>
                </select>
              </div>

              <div class="col-md-2">
                <label for="fullName"  style="color: black">ماه <span style="color: red">*</span></label>
								<select class="form-control" name="month" required style="height: 40px">
									 <option value="">انتخاب کنید</option>
									 <option>حمل</option>
									 <option>ثور</option>
									 <option>جوزا</option>
									 <option>سرطان</option>
									 <option>اسد</option>
									 <option>سنبله</option>
									 <option>میزان</option>
									 <option>عقرب</option>
									 <option>قوس</option>
									 <option>جدی</option>
									 <option>دلو</option>
									 <option>حوت</option>
							 </select>
              </div>

							<div class="col-md-2">
								<label for="profession" style="color: black">سال <span style="color: red">*</span></label>
								<select class="form-control" name="year" required style="height: 40px">
									<option value=""></option>
									<?php
										for ($x = 1395; $x <= 1599; $x++) {?>
												<option><?php echo " $x "; ?></option>
									 <?php
										}	?>
								</select>
							</div>
              <div class="col-md-2">
                <label for="fullName" style="color: black">مبلغ <span style="color: red">*</span></label>
								<input type="text" name="amount" value="" id="fn" class="form-control txt" placeholder="مبلغ"  required>
              </div>

            </div>
            <div class="row form-group">
                <div class="col-md-6">
                    <button type="submit" name="submit" class="btn btn-rounded btn-primary"> <i class="fa fa-save"></i> ذخیره</button>
                </div>
              </div>
          @include('layouts.errors')
        </form>
    </div>
	</div>
  </div>
</div>

<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box col-lg-12 col-md-12 col-sm-12 box-block bg-white">
			  <center><h4 class="mb-1">لیست مصارف</h4></center>
        <!-- date Start -->
        <div class="">
          <p class="font-90 text-muted mb-1">به اساس تاریخ میتوانید مصارف را ببینید.</p>
          <div class="row">
            <div class="col-md-4">
              <h6>از تاریخ</h6>
                <input type="date" name="from" class="form-control from" value="{{old('from')}}" required>
            </div>
            <div class="col-md-4">
              <h6>تا تاریخ</h6>
              <input class="form-control to" name="to" type="date" required>
            </div>
            <div class="col-md-4">
              <h6>&nbsp;</h6>
              <a href="">
                <button class="btn btn-success btn-block"  id="btnGetOrderByDate">
                  <a href="" class="text-black">نمایش</a>
                </button>
              </a>
            </div>
          </div>
        </div><hr>
        <!-- date End -->

      <table class=" table  table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>تاریخ پرداخت</th>
						<th>اسم</th>
						<th>کتگوری</th>
            <th>ماه</th>
            <th>پرداخت</th>
            <th>پرنت</th>
            <th class="<?php if (Auth::user()->isAdmin == '1'): ?>
            <?php echo 'hide' ?>
          <?php endif ?>"></th>
          </tr>
        </thead>
        <tbody>
          <?php $sum=0; ?>
          @foreach($expenses as $expense)
          <tr>
            <td>{{$expense->created_at}}</td>
						<td>{{$expense->name}}</td>
						<td>{{$expense->category}}</td>
            <td>{{$expense->month}} - {{$expense->year}}</td>
            <td>{{$expense->amount}}</td>
            <td><a class="text-primary" href="printExpense/{{ $expense->id }}"><i class="fa fa-print btn btn-rounded btn-primary"></i></a></td>
            <td class="pull-left <?php if (Auth::user()->isAdmin == '1'): ?>
            <?php echo 'hide' ?>
          	<?php endif ?>" style="display: flex; flex-direction: row; justify-content: center;">
						<a class="text-success" href="editExpense/{{ $expense->id }}"><i class="fa fa-edit btn btn-rounded btn-success"></i></a> &nbsp  &nbsp
						<a class="text-danger" href="deleteExpense/{{ $expense->id }}" onclick='return confirm("حذف شود؟")'><i class="fa fa-trash btn btn-rounded btn-danger"></i></a>
            </td>
          </tr>
          <?php $sum += $expense->amount; ?>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="4">جمله مصارف</th>
              <th colspan="3"><?php echo $sum; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div>



<script type="text/javascript" src="{{ asset('../vendors/jquery/jquery-1.12.3.min.js') }}"></script>
<script type="text/javascript">


  $(document).on('click','#btnGetOrderByDate',function(e){
    e.preventDefault();
    var from = $('.from').val();
    var to = $('.to').val();
    if (from.indexOf('/') > -1) {
      from = from.replace(/\//g,'-');
    }
    if (to.indexOf('/',to) > -1) {
      var to = to.replace(/\//g,'-');
    }
    if (from.length > 0 && to.length > 0) {
      window.location.href = '<?= url('expenses') ?>'+'/'+from+'/'+to;
    }else{
      alert('لطفا تارخ ها را انتخاب کنید');
    }
  });
</script>


@endsection
