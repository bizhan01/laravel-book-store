<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Message;
use DB;


class MessageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      $contacts= Message::latest()->get();
      return view('contacts.contact', compact('contacts',));
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
         'email'=>'required',
         'subject'=>'required',
         'message'=>'required',

    ]);
      Message::create([
          'name' => request('name'),
          'email' => request('email'),
          'subject' => request('subject'),
          'message' => request('message'),
          'created_at'=>carbon::now(),
          'updated_at'=>carbon::now(),
        ]);

        try {
         session()->flash('success', 'متشکریم، پیام شما موافقانه دریافت شد.');
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
     DB::delete('delete from messages where id = ?',[$id]);
     return back();
   }
}
