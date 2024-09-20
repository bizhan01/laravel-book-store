@extends('layouts.master')
@section('content')
<!-- Content -->
  <div class="content-area py-1">
    <div class="container-fluid">
      <nav class="navbar navbar-light bg-white b-a mb-2">
        <center><h3>ویرایش رکورد</h3></center>
        <form action = "/updateBook/<?php echo $book[0]->id; ?>" method = "post" enctype="multipart/form-data" >
          <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
          <input type="hidden" name="user_id" value="<?php echo $book[0]->user_id; ?>">
          <input type="hidden" name="product_type" value="<?php echo $book[0]->product_type; ?>">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>اسم کتاب<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="product_name" value="<?php echo $book[0]->product_name; ?>" placeholder="اسم کتاب" required>
                <span class="font-90 text-muted"></span>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>نویسنده<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="author" value="<?php echo $book[0]->author; ?>" placeholder="نویسنده" required>
                <span class="font-90 text-muted"></span>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>نسخه</label>
                <input type="number" class="form-control" name="edition" value="<?php echo $book[0]->edition; ?>" placeholder="نسخه" >
                <span class="font-90 text-muted"></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>انتشارات</label>
                <input type="text" class="form-control" name="publisher" value="<?php echo $book[0]->publisher; ?>" placeholder="انتشارات" >
                <span class="font-90 text-muted"></span>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>تاریخ نشر (چاپ)</label>
                <input type="date" class="form-control" name="publish_date" value="<?php echo $book[0]->publish_date; ?>" placeholder="تاریخ نشر (چاپ)" >
                <span class="font-90 text-muted"></span>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>ISBN</label>
                <input type="number" class="form-control" name="ISBN" value="<?php echo $book[0]->ISBN; ?>" placeholder="ISBN" >
                <span class="font-90 text-muted"></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>کتگوری<span style="color: red">*</span></label>
                <select class="form-control" name="category" required>
                  <option value="<?php echo $book[0]->category; ?>"><?php echo $book[0]->category; ?></option>
  								@foreach($categories as $category)
                  <option>{{$category->title}}</option>
  								@endforeach
                </select>
                <span class="font-90 text-muted"></span>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>تعداد<span style="color: red">*</span></label>
                <input type="number" class="form-control" name="quantity" value="<?php echo $book[0]->quantity; ?>" placeholder="تعداد" required>
                <span class="font-90 text-muted"></span>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>قیمت<span style="color: red">*</span></label>
                <input type="number" class="form-control" name="price" value="<?php echo $book[0]->price; ?>" placeholder="قیمت" required>
                <span class="font-90 text-muted"></span>
              </div>
            </div>
          </div>

        <div class="row form-group">
          <div class="col-md-12">
            <label  style="color: black">تصویر</label>
            <input type="hidden" name="image" value="<?php echo $book[0]->image; ?>">
            <input type="file" name="image" id="input-file-now-custom-1" class="dropify" data-default-file="/UploadedImages/books/<?php echo $book[0]->image; ?>" />
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
