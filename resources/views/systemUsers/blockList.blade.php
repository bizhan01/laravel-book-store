@extends('layouts.master')
@section('content')
<!-- Content -->
	<div class="content-area py-1">
		<div class="container-fluid">
			<div class="col-lg-12 box box-block bg-white">
        <!-- Content -->
        <div class="content-area py-1">
          <div class="container-fluid">
            <div class="box box-block bg-white">
              <center><h4>لیست کاربران بلاک شده</h4> </center>
              <h6 class="mb-1">نمایش اطلاعات</h6>
              <table class="table table-striped table-bordered dataTable">
                <thead>
                  <tr>
                    <th>شماره</th>
                    <th>عکس</th>
                    <th>اسم کامل</th>
                    <th>ایمیل</th>
                    <th>فعال سازی</th>
                    <th>حذف</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <tr>
                    <td>{{$user->id}}</td>
                    <td><a href="/UploadedImages/{{$user->profileImage}}"><img style="height: 30px" src="UploadedImages/{{$user->profileImage}}" alt="" /> </a></td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><a href = 'unBlockUser/{{ $user->id }}'  title="فعال سازی"> <i class="fa fa-check text-success"></i></a></td>
                    <td><a href = 'delete/{{ $user->id }}' onclick='return confirm("حذف شود؟")' title="حذف"> <i class="fa fa-trash text-danger"></i></a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
   </div>
</div>
@endsection
