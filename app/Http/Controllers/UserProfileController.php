<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use DB;



class UserProfileController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function profile() {
        if (Auth::check()){
        $userid = Auth::user()->id;
      }
      $books = DB::table('products')->where('user_id', $userid)->where('product_type', 1)->latest()->get();
      $products = DB::table('products')->where('user_id', $userid)->where('product_type', 3)->latest()->get();
      $advertisements = DB::table('advertisements')->where('user_id', $userid)->latest()->get();
    	return view('systemUsers.profile.profile', compact( 'books', 'products', 'advertisements'));
    }

    public function updateNameUser(Request $req) {
    	$name = $req->name;
    	$phone_number = $req->phone_number;
    	$address = $req->address;
	    try {
	    	DB::update('update users set name = ? where id = ?',[$name, Auth::user()->id]);
	    	DB::update('update users set phone_number = ? where id = ?',[$phone_number, Auth::user()->id]);
	    	DB::update('update users set address = ? where id = ?',[$address, Auth::user()->id]);
	    	return back()->with('success', 'عملیات موفقانه اجرا شد.');
	    } catch (Exception $e) {
	    	return back()->whit('failed', 'خطا رخ داده لطفا دوباره کوشش کنید');
	    }
	    return redirect('back')->with();
    }

    public function updateUserImage(Request $req) {
        $this->validate($req, [
            'image' => 'image|mimes:jpeg,jpeg,png,jpg,gif|max:1999'
        ]);
    	if($image = $req->file('image')){
	    	$new_name =rand() . '.' . $image-> getClientOriginalExtension();
	    	$image -> move("UploadedImages", $new_name);
	    }
	    try {
    		$old_image_name = DB::table('users')->select('profileImage')->where('id', Auth::user()->id)->get();
      		DB::update('update users set profileImage = ? where id = ?',[$new_name, Auth::user()->id]);
	    	$image_path = "/UploadedImages/".$old_image_name;
			if(File::exists($image_path)) {
			    File::delete($image_path);
			}
	    	return back()->with('success', 'عکس تان تبدیل شد.');
	    } catch (Exception $e) {
	    	return back()->whit('failed', 'خطا رخ داده لطفا دوباره کوشش کنید');
	    }
	    return redirect('back');
    }

    public function updateUserPass(Request $req) {
    	if (!(Hash::check($req->get('current-password'), Auth::user()->password))) {
        	return redirect()->back()->with("failed","پسورد قدیمی تان را اشتباه وارد کردید");
    	}

        if(strcmp($req->get('current-password'), $req->get('new-password')) == 0){
            return redirect()->back()->with("failed","پسورد قبلی و فعلی تان یکسان میباشد لطفا دوباره سعی کنید.");
        }

       	$this->validate($req, [
			'current-password' => 'required',
            'new-password' => 'required|string|min:6',
            'confirm_password' => 'required|same:new-password',
       	],[
			'current-password.required' => 'فیلد پسورد قدیمی را نباید خالی بگذارید.',
            'new-password.required' 	=> 'فیلد پسورد جدید نباید خالی باشد.',
            'new-password.string' 		=> 'از string استفاده کنید',
            'new-password.min' 		=> 'پسورد تان نباید از شش حرف کمتر باشد.',
            'confirm_password.same' 	=> 'پسورد جدید با تکرار پسورد مطابقت ندارد.',
            'confirm_password.required' 	=> 'فیلد تکرار پسورد الزامی است/',
       	]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($req->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","پسورد تان موفقانه تغییر کرد. !");
    }
}
