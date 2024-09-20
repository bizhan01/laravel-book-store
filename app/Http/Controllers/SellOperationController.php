<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Sell;
use App\User;
use DB;

class SellOperationController extends Controller
{
    public function index() {
      $sales = DB::select('select * from sells');
      $printSales= sell::latest()
      ->orderByRaw('(id)desc LIMIT 1')
      ->get();
      return view('seller.addDiscount',['sales'=>$sales], compact('printSales'));
   }


   public function show($id) {
     $sales = DB::select('select * from sells where id = ?',[$id]);

     $sales_info = DB::table('sells as sel')
          ->rightJoin('sell_items as si', 'sel.id', '=', 'si.sell_id')
          ->rightJoin('books as pro', 'si.product_id', '=', 'pro.id')
          ->select('si.*', 'pro.book_name as book_name', 'pro.price as price', )
          ->where('sel.id', $id)
          ->get();
    $customers = User::latest()->get();

    $printSales= sell::latest()
    ->orderByRaw('(id)desc LIMIT 1')
    ->get();

    return view('sells.editSales',['sales'=>$sales], compact('sales_info', 'customers', 'printSales'));
   }



   public function edit(Request $request,$id) {
     $user_id = $request->input('user_id');
     $total = $request->input('total');
     $discount = $request->input('discount');
     $paid = $request->input('paid');
     $status= $request->input('status');

     DB::update('update sells set user_id = ? where id = ?',[$user_id, $id]);
     DB::update('update sells set total = ? where id = ?',[$total, $id]);
     DB::update('update sells set discount = ? where id = ?',[$discount, $id]);
     DB::update('update sells set paid = ? where id = ?',[$paid, $id]);
     DB::update('update sells set status = ? where id = ?',[$status, $id]);

    //  return redirect('/print');
       try {
       session()->flash('success', 'علمیات موافقانه انجام شد');
       return back();
       } catch(Exception $ex) {
       session()->flash('failed', 'خطا! دوباره کوشش کنید');
       return route('edititem');
     }
   }



   public function printInvioce(Request $request,$id)
   {
     $sales= sell::latest()
      ->where('id', $id)
     ->get();

     $sales_info = DB::table('sells as sel')
          ->rightJoin('sell_items as si', 'sel.id', '=', 'si.sell_id')
          ->rightJoin('books as pro', 'si.product_id', '=', 'pro.id')
          ->where('sel.id', $id)
          ->get();

      $cst_info = DB::table('sells as sel')
           ->rightJoin('users as cst', 'sel.user_id', '=', 'cst.id')
           ->where('sel.id', $id)
           ->get();


     return view('sells.invioce', compact('sales_info', 'sales', 'cst_info'));
   }

   public function transactionDetails(Request $request,$id)
   {
     $sales_info = DB::table('sells as sel')
          ->rightJoin('sell_items as si', 'sel.id', '=', 'si.sell_id')
          ->rightJoin('users as ur', 'si.user_id', '=', 'ur.id')
          ->rightJoin('products as pro', 'si.product_id', '=', 'pro.id')
          ->where('sel.id', $id)
          ->get();

     return view('admin.transactionDetails', compact('sales_info'));
   }




}
