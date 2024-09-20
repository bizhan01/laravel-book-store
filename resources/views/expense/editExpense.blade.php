@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
			<div class="col-lg-12 box box-block bg-white">
        <h4>ویرایش مصارف</h4>
        <hr>
        <form action = "/editExpense/<?php echo $expense[0]->id; ?>" method = "post" enctype="multipart/form-data" >
          <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
          {{ csrf_field() }}
					<div class="row form-group">
							<div class="col-md-3">
								<label for="fullName" style="color: black">مصرف کننده <span style="color: red">*</span></label>
								<input type="text" name="name" value="<?php echo $expense[0]->name; ?>" class="form-control" placeholder="مصرف کننده" required>
							</div>
							<div class="col-md-3">
								<label for="fullName" style="color: black">کتگوری مصرف <span style="color: red">*</span></label>
								<select class="form-control" name="category" required style="height: 40px">
									<option value="<?php echo $expense[0]->category; ?>"><?php echo $expense[0]->category; ?></option>
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
									 <option value="<?php echo $expense[0]->month; ?>"><?php echo $expense[0]->month; ?></option>
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
								<option value="<?php echo $expense[0]->year; ?>"><?php echo $expense[0]->year; ?></option>
								<?php
									for ($x = 1395; $x <= 1599; $x++) {?>
											<option><?php echo " $x "; ?></option>
								 <?php
									}	?>
							</select>
						</div>
							<div class="col-md-2">
								<label for="fullName" style="color: black">مبلغ <span style="color: red">*</span></label>
								<input type="text" name="amount" id="fn" value="<?php echo $expense[0]->amount; ?>"   class="form-control txt" placeholder="مبلغ"  required>
							</div>

					</div>
          @include('layouts.errors')
         <button type="submit" class="btn btn-success">ذخیره</button>
        <a href="/expense"><button type="reset" class="btn btn-primary">لغو</button> </a>
        <a href="/expense"><button type="button" class="btn btn-default">برگشت</button> </a>
        </form>
      </div>
    </div>
</div>
@endsection
