@extends('layouts.master')
@section('content')
<!-- Content -->
  <div class="content-area py-1">
    <div class="container-fluid">
      <nav class="navbar navbar-light bg-white b-a mb-2">
        <center><h3>ویرایش رکورد</h3></center>
        <form action = "/updateProduct/<?php echo $product[0]->id; ?>" method = "post" enctype="multipart/form-data" >
          <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
          <input type="hidden" name="user_id" value="<?php echo $product[0]->user_id; ?>">
          <input type="hidden" name="product_type" value="<?php echo $product[0]->product_type; ?>">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>اسم کتاب<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="product_name" value="<?php echo $product[0]->product_name; ?>" placeholder="اسم کتاب" required>
                <span class="font-90 text-muted"></span>
              </div>
            </div>
              <input type="hidden"  name="author" value="<?php echo $product[0]->author; ?>" >
              <input type="hidden"  name="edition" value="<?php echo $product[0]->edition; ?>" >
              <input type="hidden"  name="publisher" value="<?php echo $product[0]->publisher; ?>">
              <input type="hidden"  name="publish_date" value="<?php echo $product[0]->publish_date; ?>">
              <input type="hidden"  name="ISBN" value="<?php echo $product[0]->ISBN; ?>">

            <div class="col-md-4">
              <div class="form-group">
                <label>تعداد<span style="color: red">*</span></label>
                <input type="number" class="form-control" name="quantity" value="<?php echo $product[0]->quantity; ?>" placeholder="تعداد" required>
                <span class="font-90 text-muted"></span>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>قیمت<span style="color: red">*</span></label>
                <input type="number" class="form-control" name="price" value="<?php echo $product[0]->price; ?>" placeholder="قیمت" required>
                <span class="font-90 text-muted"></span>
              </div>
            </div>
          </div>

        <div class="row form-group">
          <div class="col-md-12">
            <label  style="color: black">تصویر</label>
            <input type="hidden" name="image" value="<?php echo $product[0]->image; ?>">
            <input type="file" name="image" id="input-file-now-custom-1" class="dropify" data-default-file="/UploadedImages/books/<?php echo $product[0]->image; ?>" />
          </div>
        </div>

				 <div class="row form-group">
					 <div class="col-md-6">
						 <input type="submit" name="submit" value="ذخیره" class="btn btn-success ">
						 <input type="reset"  value="لغو" class="btn btn-warning ">
					 </div>
				</div>
			 @include('layouts.errors')
        </form>
      </nav>
    </div>
  </div>
@endsection
