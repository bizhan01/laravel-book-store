<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Sell;
use App\User;
use DB;


class SellController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      $sales= Sell::where('total','!=', Null)->latest()->get();

      $sale_numbers = sell::latest()
      ->orderByRaw('(id)desc LIMIT 1')
      ->get();
      return view('sells.sells', compact('sales', 'sale_numbers'));
    }



    public function salesList()
    {
     $sales= Sell::
      where('total','!=', Null)
      ->where('total','!=', Null)
      ->where('discount','!=', Null)
      ->get();

      return view('sells.salesList', compact('sales'));
    }


    public function revenues()
    {
     $sales= Sell::
      where('total','!=', Null)
      ->where('total','!=', Null)
      ->where('discount','!=', Null)
      ->get();

      return view('sells.revenues', compact('sales'));
    }


    public function debtor()
    {
      $transactions = DB::table('sells as pr')
            ->rightJoin('customers as sup', 'pr.customer_phone', 'sup.phone')
            ->select(["customer_phone as customer_phone", DB::raw("SUM(total) as buy_tot"), DB::raw("SUM(discount) as dis_tot"), DB::raw("SUM(paid) as pay_tot"), 'sup.*'])
            ->groupBy('customer_phone')
            ->get();
      return view('seller.debtors',[  'transactions' => $transactions]);
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate(request(),[
            'user_id'=>'nullable',
            'total'=>'nullable',
            'discount'=>'nullable',
            'paid'=>'nullable',
            'status'=>'nullable',

    ]);
      Sell::create([
          'user_id' => request('user_id'),
          'total' => request('total'),
          'discount' => request('discount'),
          'paid' => request('paid'),
          'status' => request('status'),
          'created_at'=>carbon::now(),
          'updated_at'=>carbon::now(),
        ]);

        return redirect('salesDetails');
    }




    public function info()
    {
      $customers = Customer::latest()->get();

       return view('seller.editSales', campact('customers'));
    }

    public function show($id) {

     $users = DB::select('select * from sells where id = ?',[$id]);

     return view('seller.editSales',['sell'=>$sell, 'customers'=>$customers]);
  }



    public function edit(Request $request,$id) {
     $customer_phone = $request->input('customer_phone');
     $subTotal = $request->input('subTotal');
     $total = $request->input('total');
     $discount = $request->input('discount');
     $paid = $request->input('paid');
     $paid = $request->input('description');

     DB::update('update sells set customer_phone = ? where id = ?',[$customer_phone, $id]);
     DB::update('update sells set total = ? where id = ?',[$total, $id]);
     DB::update('update sells set subTotal = ? where id = ?',[$subTotal, $id]);
     DB::update('update sells set discount = ? where id = ?',[$discount, $id]);
     DB::update('update sells set paid = ? where id = ?',[$paid, $id]);
     DB::update('update sells set description = ? where id = ?',[$description, $id]);
     return redirect('/');
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     public function destroy($id) {
       DB::delete('delete from sells where id = ?',[$id]);
       return redirect('/salesList');
    }
}
