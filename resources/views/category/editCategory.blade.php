@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
      <nav class="navbar navbar-light bg-white b-a mb-2">
        <center><h3>ویرایش کتگوری</h3></center>
				<form action = "/editCategory/<?php echo $category[0]->id; ?>" method = "post" enctype="multipart/form-data" >
					<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
					<div class="row form-group">
             <div class="col-lg-4 col-md-4 col-sm-4">
               <label  for="Field of Study" style="color:black">کتگوری <span style="color: red">*</span></label>
               <input type="text"  name="title"  value="<?php echo $category[0]->title; ?>" class="form-control" placeholder="کتگوری" required>
             </div>
             <div class="col-lg-8 col-md-8 col-sm-8">
               <label  for="Field of Study" style="color:black">توضیحات</label>
               <input type="text"  name="description"  value="<?php echo $category[0]->description; ?>" class="form-control" placeholder="توضیحات" >
             </div>
          </div>
          <div class="row form-group">
             <div class="col-md-4">
               <input type="submit" name="submit" value="ذخیره" class="btn btn-rounded btn-success " />
								<button type="reset" class="btn btn-rounded btn-warning"><li class="fa fa-remove"> لغو</li></button>
             </div>
          </div>
					@include('layouts.errors')
        </form>
      </nav>
    </div>
  </div>
@endsection
