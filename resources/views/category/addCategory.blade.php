@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
      <nav class="navbar navbar-light bg-white b-a mb-2">
				<center><h3>اضافه نمودن کتگوری جدید</h3></center>
				<form method="POST" action="{{route('addCategory')}}" enctype="multipart/form-data">
           {{ csrf_field() }}
           <div class="row form-group">
              <div class="col-lg-4 col-md-4 col-sm-4">
                <label  for="Field of Study" style="color:black">کتگوری <span style="color: red">*</span></label>
                <input type="text"  name="title" class="form-control" placeholder="کتگوری" required>
              </div>
              <div class="col-lg-8 col-md-8 col-sm-8">
                <label  for="Field of Study" style="color:black">توضیحات</label>
                <input type="text"  name="description" class="form-control" placeholder="توضیحات" >
              </div>
           </div>
           <div class="row form-group">
              <div class="col-md-4">
                <input type="submit" name="submit" value="ذخیره" class="btn btn-success " />
              </div>
           </div>
           @include('layouts.errors')
        </form>
      </nav>
    </div>
  </div>


<!-- Content -->
<div class="content-area py-1">
  <div class="container-fluid">
   <div class="col-lg-12 box box-block bg-white">
     <center><h3>لیست کتگوری ها</h3></center>
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th colspan="2" >کتگوری</th>
            <th colspan="5" >توضیحات</th>
            <th>ویرایش</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          @foreach($categories as $category)
          <tr>
            <td colspan="2">{{$category->title}}</td>
            <td colspan="5">{{$category->description}}</td>
            <td>
              <a class="text-success" href="editCategory/{{ $category->id }}"><i class="fa fa-edit btn btn-rounded btn-success"></i></a>
            </td>
            <td>
                <a class="text-danger" href="deleteCategory/{{ $category->id }}" onclick='return confirm("حذف شود؟")'><i class="fa fa-trash btn btn-rounded btn-danger"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
