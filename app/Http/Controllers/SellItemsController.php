<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Sell;
use App\Sell_Items;
use App\Book;
use DB;


class SellItemsController extends Controller
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
        $sell_id= sell::latest()
        ->orderByRaw('(id)desc LIMIT 1')
        ->get();

        $books = Book::latest()->get();

        $sales= sell::latest()
        ->orderByRaw('(id)desc LIMIT 1')
        ->get();

       return view('sells.salesDetails', compact('sell_id', 'books', 'sales'));
    }


    /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(Request $request) {
        $user_id = $request->user_id;
        $sell_id = $request->sell_id;
        $product_id = $request->product_id;
        $product_qty = $request->product_qty;


            for($i = 0; $i < count($user_id); $i++){

             $salesItem = DB::table('sell_items')->where('user_id', $user_id)->get();

              if($salesItem) {
                $this->validate(request(),[
               'id' => 'unique',
               'sell_id' => 'required',
               'product_id' => 'nullable',
               'product_qty' =>'required',
           ]);
             Sell_Items::create([
              'user_id' => $user_id[$i],
              'sell_id' => $sell_id[$i],
              'product_id' => $product_id[$i],
              'product_qty' => $product_qty[$i],
              'created_at'=>carbon::now(),
              'updated_at'=>carbon::now(),
             ]);
           }else{
                    return redirect('/addDiscount');
             }
           }

           try {
           session()->flash('success', 'علمیات موافقانه انجام شد');
           return back();
           } catch(Exception $ex) {
           session()->flash('failed', 'خطا! دوباره کوشش کنید');
           return back();
         }

       }


       public function show($id) {
         $pro_info = DB::table('sell_items as si')
              ->rightJoin('books as pro', 'pro.id', '=', 'si.product_id')
              ->where('si.id', $id)
              ->get();

          $products = Book::latest()->get();
          $sInfo = DB::select('select * from sell_items where id = ?',[$id]);

          $sales= sell::latest()
          ->orderByRaw('(id)desc LIMIT 1')
          ->get();
      return view('sells.editItem',['sInfo'=>$sInfo], compact('products', 'pro_info', 'sales'));
     }



       public function edit(Request $request,$id) {
        $user_id = $request->input('user_id');
        $sell_id = $request->input('sell_id');
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        DB::update('update sell_items set user_id = ? where id = ?',[$user_id, $id]);
        DB::update('update sell_items set sell_id = ? where id = ?',[$sell_id, $id]);
        DB::update('update sell_items set product_id = ? where id = ?',[$product_id, $id]);
        DB::update('update sell_items set product_qty = ? where id = ?',[$product_qty, $id]);

        try {
         session()->flash('success', 'عملیات موافقانه اجرا شد ');
         return back();
         } catch(Exception $ex) {
         session()->flash('failed', 'خطا! دوباره کوشش کنید');
         return back();
       }
     }



       /**
        * Remove the specified resource from storage.
        *
        * @param  \App\Task  $task
        * @return \Illuminate\Http\Response
        */
        public function destroy($id) {
          DB::delete('delete from sell_items where id = ?',[$id]);
          return back();
       }

}
