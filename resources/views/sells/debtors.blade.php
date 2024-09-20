@extends('layouts.master')
@section('content')
<div class="content-area py-1">
    <div class="container-fluid">
    <div class="box box-block bg-white">
      <center><h3>لیست قرضداران</h3></center>
        <h5 class="mb-1">صورت حساب مشتریان</h5>
        <table class="table table-striped table-bordered dataTable" id="table-2">
            <thead>
                <tr>
                    <th>شماره</th>
                    <th>اسم</th>
                    <th>شماره تماس </th>
                    <th>جمله خرید</th>
                    <th>تخفیف</th>
                    <th>جمله پرداخت</th>
                    <th>بیلانس</th>
                    <!-- <th>عملیات</th> -->
                </tr>
            </thead>
            <tbody>
                <?php $total = 0?>
                @foreach($transactions as $key => $transaction)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $transaction->name}} {{ $transaction->lastName}}</td>
                        <td>{{ $transaction->phone}}</td>
                        <td>{{ $transaction->buy_tot }}</td>
                        <td>{{ $transaction->dis_tot }}</td>
                        <td>{{ $transaction->pay_tot }}</td>
                        <td style="direction: ltr; text-align: right; color: red">
                            <?php
                                $buy_tot = $transaction->buy_tot;
                                $dis_tot = $transaction->dis_tot;
                                $pay_tot = $transaction->pay_tot;
                                $sum = $buy_tot - $dis_tot - $pay_tot;
                                $total += $sum;
                                echo $sum;
                            ?>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                  <th colspan="5">جمله</th>
                  <th style="background-color: yellow">{{ $total }}</th>
                </tr>
            </tfoot>
        </table>
    </div>
  </div>
</div>
@endsection
