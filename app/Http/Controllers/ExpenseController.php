<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Expense;
use DB;


class ExpenseController extends Controller
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

    public function index(){
      $expenses = Expense::latest()->get();
      return view('expense.expense', compact('expenses',));
    }


    public function expenses($from='', $to='') {
      if ($from=='' && $to=='') {
        $expenses = DB::table('expenses')
          ->whereDate('created_at', Carbon::today())
          ->orderBy('created_at')
          ->get();
      } else {
        $expenses = DB::table('expenses')
          ->whereBetween('created_at',[$from, $to])
          ->orderBy('created_at')
          ->get();
      }
      return view('expense.expense', compact('expenses'));
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
            'name'=>'required',
            'category'=>'required',
            'month' => 'required',
            'year' =>'required',
            'amount' =>'required',

        ]);

          Expense::create([
              'name' => request('name'),
              'category' => request('category'),
              'month' => request('month'),
              'year' => request('year'),
              'amount' => request('amount'),
              'created_at'=>carbon::now(),
              'updated_at'=>carbon::now(),

            ]);

        try {
         session()->flash('success', 'عملیات موافقانه اجرا شد ');
         return back();
         } catch(Exception $ex) {
         session()->flash('failed', 'خطا! دوباره کوشش کنید');
         return back();
       }
    }



        public function show($id) {
         $expense = DB::select('select * from expenses where id = ?',[$id]);
         return view('expense.editExpense',['expense'=>$expense]);
      }


      /**
       * Show the form for editing the specified resource.
       *
       * @param  \App\Task  $task
       * @return \Illuminate\Http\Response
       */
       public function edit(Request $request,$id) {
          $name = $request->input('name');
          $category = $request->input('category');
          $month = $request->input('month');
          $year = $request->input('year');
          $amount = $request->input('amount');

          DB::update('update expenses set name = ? where id = ?',[$name, $id]);
          DB::update('update expenses set category = ? where id = ?',[$category, $id]);
          DB::update('update expenses set month = ? where id = ?',[$month, $id]);
          DB::update('update expenses set year = ? where id = ?',[$year, $id]);
          DB::update('update expenses set amount = ? where id = ?',[$amount, $id]);
          return redirect('/expense');
       }


       public function printExpense(Request $request, $id)
         {
           $expenses = DB::table('expenses')
                 ->where('id', $id)
                 ->get();
           return view('expense.invioce', compact('expenses'));
         }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     public function destroy($id) {
     DB::delete('delete from expenses where id = ?',[$id]);
     return back();
   }
}
