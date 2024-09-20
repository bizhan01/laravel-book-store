<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Carbon\Carbon;
use App\User;
use DB;

class UserOperationController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function userList()
    {
      $users = DB::table('users')->where('isAdmin', 1)->where('status', 1) ->get();
      return view('systemUsers.userList', compact('users'));
    }

    public function blockList()
    {
      $users = DB::table('users')->where('isAdmin', 1)->where('status', 0) ->get();
      return view('systemUsers.blockList', compact('users'));
    }



    public function show($id) {
      $user = DB::select('select * from users where id = ?',[$id]);
     return view('systemUsers.block',['user'=>$user]);
    }

    public function unBlock($id) {
      $user = DB::select('select * from users where id = ?',[$id]);
     return view('systemUsers.unBlock',['user'=>$user]);
    }




    public function edit(Request $request,$id) {
      $name = $request->input('name');
      $email = $request->input('email');
      $isAdmin = $request->input('isAdmin');
      $address = $request->input('address');
      $phone_number= $request->input('phone_number');
      $status= $request->input('status');
      $profileImage= $request->input('profileImage');

      DB::update('update users set name = ? where id = ?',[$name, $id]);
      DB::update('update users set email = ? where id = ?',[$email, $id]);
      DB::update('update users set isAdmin = ? where id = ?',[$isAdmin, $id]);
      DB::update('update users set address = ? where id = ?',[$address, $id]);
      DB::update('update users set phone_number = ? where id = ?',[$phone_number, $id]);
      DB::update('update users set status = ? where id = ?',[$status, $id]);
      DB::update('update users set profileImage = ? where id = ?',[$profileImage, $id]);
      return redirect('/userList');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     public function destroy($id) {
       DB::delete('delete from users where id = ?',[$id]);
       return back();
    }
}
