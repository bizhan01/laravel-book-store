<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Sell;
use App\User;
use DB;

class BalanceController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function blancess($from='', $to='') {
        if ($from == '' && $to == '') {

      $sales = DB::table('sells')

            ->where('user_id','!=', 0)
            ->whereDate('created_at', Carbon::today())
            ->orderBy('created_at')
            ->get();



            $expenses = DB::table('expenses')
                ->whereDate('created_at', Carbon::today())
                ->orderBy('created_at')
                ->get();


        }
        else {
            $sales = DB::table('sells')
               ->where('user_id','!=', 0)
                ->whereBetween('created_at', [$from, $to])
                ->orderBy('id', 'desc')
                ->get();


            $expenses = DB::table('expenses')
                ->whereBetween('created_at',[$from, $to])
                ->orderBy('created_at')
                ->get();

        }
        return view('balance.balance',
         compact('sales',  'expenses', ));
    }

}
