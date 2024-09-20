@extends('layouts.master')
@section('content')
<!-- sells -->
<div class="content-area py-1">
  <div class="container-fluid">
    <div class="col-lg-12 col-md-12 col-sm-12 box box-block bg-white">
      <center><h4>لیست فروشات</h4></center>
      <h5 class="mb-1">برای دیدن جزئیات هر معامله بر روی شماره آن کلیک کنید</h5>
      <table class="table table-striped table-bordered dataTable" id="table-2">
        <thead>
          <tr>
            <th>شماره</th>
            <th>تاریخ</th>
            <th>قیمت کلی</th>
            <th>تخفیف</th>
            <th>قابل پرداخت</th>
            <th>رسید</th>
            <th>باقی</th>
            <th>حذف</th>
          </tr>
        </thead>
        <tbody>
          <?php $a=0; $b=0; $c=0; $d=0; $e=0; ?>
          @foreach($sales as $sell)
          <tr>
            <td><a href="printMyInvioce/{{ $sell->id }}">{{$sell->id}}</a></td>
            <td>{{$sell->created_at}}</td>
            <td>{{$sell->total}}</td>
            <td>{{$sell->discount}}</td>
            <td>
              <?php
                  $payable = $sell->total - $sell->discount;
                  print ("$payable");
               ?>
            </td>
            <td>{{$sell->paid}}</td>
            <td>{{$rest = $payable - $sell->paid }}</td>
            <td class="with-sub <?php if (Auth::user()->isAdmin == '1'): ?>
              <?php echo 'hide' ?>
              <?php endif ?>">
              <a href="deleteSell/{{ $sell->id }}" onclick='return confirm("حذف شود؟")' class="fa fa-trash" style="color: red"></a>
            </td>
          </tr>
          <?php $a += $sell->total;?>
          <?php $b += $sell->discount; ?>
          <?php $c += $payable; ?>
          <?php $d += $sell->paid; ?>
          <?php $e += $rest; ?>
          @endforeach
          <tfoot>
            <tr>
              <th colspan="2">جمله عواید</th>
              <th colspan="1"><?php echo $a; ?></th>
              <th colspan="1"><?php echo $b; ?></th>
              <th colspan="1"><?php echo $c; ?></th>
              <th colspan="1"  style="background-color: yellow"><?php echo $d; ?></th>
              <th colspan="2"><?php echo $e; ?></th>
            </tr>
          </tfoot>
        </tbody>
      </table>
    </div>
  </div>
</div><!-- Content -->
@endsection
