@extends('layouts.master')
@section('content')
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="box box-block bg-white">
      <center><h3>آمار موجودی کتب</h3></center>
      <h5 class="mb-1">نمایش اطلاعات</h5>
      <table class="table table-striped table-bordered dataTable" id="table-1">
        <thead>
          <tr>
            <th>آی دی</th>
            <th>اسم محصول</th>
            <th>کتگوری</th>
            <th>نویسنده</th>
            <th>قیمت</th>
            <th>نوعیت</th>
            <th>تعداد خرید</th>
            <th>تعداد فروش</th>
            <th>تعداد موجود</th>
          </tr>
        </thead>
        <tbody>
            <?php $sum=0; ?>
          @foreach($products as $key => $product)
              <tr>
                 <td>{{$product->id}}</td>
                 <td>{{$product->book_name}}</td>
                 <td>{{$product->category}}</td>
                 <td>{{$product->author}}</td>
                 <td>{{$product->price}}</td>
                 <td>
                   @if($product->type == 1)
                     جدید
                   @else
                     مستعمل
                   @endif
                 </td>
                 <td>{{$product->quantity }}</td>
                 <td>{{$product->buy_tot }}</td>
                 <td style="direction: ltr; text-align: right">{{$remain = $product->quantity - $product->buy_tot}}</td>
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
