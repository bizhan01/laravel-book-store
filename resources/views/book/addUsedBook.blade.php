@extends('layouts.master')
@section('content')

<div class="content-area py-1">
	<div class="container-fluid">
		<h4>افزودن کتاب های مستعمل</h4>
		<div class="box box-block bg-white">
			<h5>فورم ثبت کتاب:</h5>
			<!-- <p class="font-90 text-muted mb-1">Use <code>data-mask</code> to the input element.</p> -->
			@include('layouts.errors')

			<form method="post" action="{{ route('addBook') }}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="product_type" value="2">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>اسم کتاب<span style="color: red">*</span></label>
							<input type="text" class="form-control" name="product_name" placeholder="اسم کتاب" required>
							<span class="font-90 text-muted"></span>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>نویسنده<span style="color: red">*</span></label>
							<input type="text" class="form-control" name="author" placeholder="نویسنده" required>
							<span class="font-90 text-muted"></span>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>نسخه</label>
							<input type="number" class="form-control" name="edition" placeholder="نسخه" >
							<span class="font-90 text-muted"></span>
						</div>
					</div>
				</div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>انتشارات</label>
              <input type="text" class="form-control" name="publisher" placeholder="انتشارات" >
              <span class="font-90 text-muted"></span>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label>تاریخ نشر (چاپ)</label>
              <input type="date" class="form-control" name="publish_date" placeholder="تاریخ نشر (چاپ)" >
              <span class="font-90 text-muted"></span>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label>ISBN</label>
              <input type="number" class="form-control" name="ISBN" placeholder="ISBN" >
              <span class="font-90 text-muted"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>کتگوری<span style="color: red">*</span></label>
							<select class="form-control" name="category" required>
                <option value="">انتخاب کنید</option>
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
              <input type="number" class="form-control" name="quantity" placeholder="تعداد" required>
              <span class="font-90 text-muted"></span>
            </div>
          </div>

					<div class="col-md-4">
            <div class="form-group">
              <label>قیمت<span style="color: red">*</span></label>
              <input type="number" class="form-control" name="price" placeholder="قیمت" required>
              <span class="font-90 text-muted"></span>
            </div>
          </div>
        </div>

				<div class="row">
					<div class="col-md-12">
						<label>عکس </label>
				     <input type="file" name="image" id="input-file-now" class="dropify" />
					</div>
				</div>

				<br>
				<div class="row">
					<div class="col-md-12">
						<button type="submit" class="btn btn-outline-success mb-0-25 waves-effect waves-light">
							<i class="ti-save"></i>
							<span>ذخیره</span>
						</button>
						<button type="reset" class="btn btn-outline-danger mb-0-25 waves-effect waves-light">
							<i class="ti-loop"></i>
							<span>لغو</span>
						</button>
					</div>
				</div>
			</form>

		</div>
	</div>
</div>


@endsection
