@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
			<div class="col-lg-12 box box-block bg-white">
				<div class="alert alert-danger-fill alert-dismissible fade in" role="alert">
					<center><br>
					<form action = "/updateUserStatus/<?php echo $user[0]->id; ?>" method ="post" enctype="multipart/form-data" >
						<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
						<input type="hidden" name="name" value="<?php echo $user[0]->name; ?>">
						<input type="hidden" name="email" value="<?php echo $user[0]->email; ?>">
						<input type="hidden" name="isAdmin" value="1">
						<input type="hidden" name="address" value="<?php echo $user[0]->address; ?>">
						<input type="hidden" name="phone_number" value="<?php echo $user[0]->phone_number; ?>">
						<input type="hidden" name="status" value="0">
						<input type="hidden" name="profileImage" value="<?php echo $user[0]->profileImage; ?>">
						<img style="height: 70px" src="/UploadedImages/<?php echo $user[0]->profileImage; ?>" alt="" />
						<h3><?php echo $user[0]->name; ?></h3>
						<strong>آیا مطمین استید کاربر فوق غیرفعال گردد؟</strong><br></br>
						<input type="submit" name="submit" value="تائید غیرفعال سازی" class="btn btn-rounded btn-warning">
					</form>
					@include('layouts.errors')
				</center>
				</div>
      </div>
   </div>
</div>
@endsection
