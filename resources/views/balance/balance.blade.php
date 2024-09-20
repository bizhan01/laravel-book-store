@extends('layouts.master')
@section('content')
<script src="js/jquery.min.js"> </script>
<script src="js/math.js"> </script><br>
<center> <h3>صورت حساب (بیلانس)</h3> </center>
  <!-- Content -->
  <div class="content-area py-1">
    <div class="container-fluid">
      <div class="col-lg-12 col-md-12 col-sm-12 box box-block bg-white">

        <!-- date Start orders. -->
        <div class="">
          <p class="font-90 text-muted mb-1">به اساس تاریخ میتوانید بیلانس مالی را ببینید.</p>
          <div class="row">
            <div class="col-md-4">
              <h6>از تاریخ</h6>
                <input type="date" class="form-control from" required>
            </div>
            <div class="col-md-4">
              <h6>تا تاریخ</h6>
              <input class="form-control to" type="date" value="{{date('Y-m-d')}}" required>
            </div>
            <div class="col-md-4">
              <h6>&nbsp;</h6>
              <a href="">
                <button class="btn btn-success btn-block"  id="btnGetOrderByDate">
                  <a href="" class="text-black">نمایش</a>
                </button>
              </a>
            </div>
          </div>
        </div><hr>
        <!-- date End -->
      </div>
    </div>
  </div>


  <!-- sells -->
  <div class="content-area py-1">
    <div class="container-fluid">
      <div class="col-lg-12 col-md-12 col-sm-12 box box-block bg-white">
        <center><h4>لیست فروشات</h4></center>
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
              <td style="color: green">{{$sell->paid}}</td>
              <td style="color: red">{{$rest = $payable - $sell->paid }}</td>
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
                <th colspan="1" style="color: red"><?php echo $e; ?></th>
              </tr>
            </tfoot>
          </tbody>
        </table>
      </div>
    </div>
  </div><!-- Content -->


  <!-- expenses  -->
  <div class="content-area py-1">
    <div class="container-fluid">
      <div class="box col-lg-12 col-md-12 col-sm-12 box-block bg-white">
        <center><h4>لیست مصارف</h4></center>
        <!-- Archive Start -->
          <!-- Archive End -->
        <table class="table table-warning  table-striped table-bordered dataTable" id="table-1">
          <thead>
            <tr>
              <th>تاریخ پرداخت</th>
  						<th>مصرف کننده</th>
  						<th>کتگوری</th>
              <th>ماه</th>
              <th>پرداخت</th>
            </tr>
          </thead>
          <tbody>
            <?php $expenseTotal=0; ?>
            @foreach($expenses as $expense)
            <tr>
              <td>{{$expense->created_at}}</td>
              <td>{{$expense->name}}</td>
              <td>{{$expense->category}}</td>
              <td>{{$expense->month}}-{{$expense->year}}</td>
              <td>{{$expense->amount}}</td>
            </tr>
            <?php $expenseTotal += $expense->amount; ?>
            @endforeach
            <tfoot>
              <tr>
                <th colspan="4">جمله مصارف</th>
                <th colspan="1" ><?php echo $expenseTotal; ?></th>
              </tr>
            </tfoot>
          </tbody>
        </table>
      </div>
    </div>
  </div>



<div class="container">
  <div class="row row-md">
    <div class="col-lg-4">
      <div class="box box-block tile tile-2 bg-success mb-2">
        <div class="t-icon right"><i class="ti-bar-chart"></i></div>
        <div class="t-content">
          <h1 class="mb-1" dir="ltr" style="text-align: right"><?php echo $netTotal = $d ?></h1><br>
        </div>
      </div>
    </div>



    <div class="col-lg-4">
      <div class="box box-block tile tile-2 bg-danger mb-2">
        <div class="t-icon right"><i class="fa fa-money"></i></div>
        <div class="t-content">
          <h1 class="mb-1" dir="ltr" style="text-align: right"><?php echo $expenseTotal; ?></h1><br>
        </div>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="box box-block tile tile-2 bg-primary mb-2">
        <div class="t-icon right"><i class="fa fa-balance-scale"></i></div>
        <div class="t-content">
          <h1 class="mb-1" dir="ltr" style="text-align: right">
            <?php
            $c = $netTotal - $expenseTotal;
            echo $c;
           ?>
          </h1><br>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="{{ asset('../vendors/jquery/jquery-1.12.3.min.js') }}"></script>
<script type="text/javascript">


  $(document).on('click','#btnGetOrderByDate',function(e){
    e.preventDefault();
    var from = $('.from').val();
    var to = $('.to').val();
    if (from.indexOf('/') > -1) {
      from = from.replace(/\//g,'-');
    }
    if (to.indexOf('/',to) > -1) {
      var to = to.replace(/\//g,'-');
    }
    if (from.length > 0 && to.length > 0) {
      window.location.href = '<?= url('blancess') ?>'+'/'+from+'/'+to;
    }else{
      alert('لطفا تاریخ ها را انتخاب کنید');
    }
  });
</script>


@endsection
