<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Advertisement;
use App\Product;
use DB;

class AdvertisementController extends Controller
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
      $advertisements = Product::where('product_type', 2)->latest()->get();
      return view('advertisement.advertisementList', compact('advertisements',));
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
            'image' => 'image|mimes:jpeg,jpeg,png,jpg,gif|max:1999'
        ]);
        if($image = $request->file('image')){
          $new_name =rand() . '.' . $image-> getClientOriginalExtension();
          $image -> move(public_path("UploadedImages/adv"), $new_name);
        }
        else {
          $new_name = 'about.png';
        }
          Advertisement::create([
              'user_id' => Auth::user()->id,
              'image' => $new_name,
              'created_at'=>carbon::now(),
              'updated_at'=>carbon::now(),

            ]);
            try {
             session()->flash('successAdv', 'آگاهی شما موافقانه دریافت شد');
             return back();
             } catch(Exception $ex) {
             session()->flash('failed', 'خطا! دوباره کوشش کنید');
             return back();
           }
    }



        public function show($id) {
         $bio = DB::select('select * from Biographies where id = ?',[$id]);
         return view('admin.about.editBio',['bio'=>$bio]);
      }



      public function edit(Request $request,$id) {
         $name = $request->input('name');
         $motto = $request->input('motto');
         $biography = $request->input('biography');

         if($image = $request->file('image')){
           $new_name =rand() . '.' . $image-> getClientOriginalExtension();
           $image -> move("UploadedImages", $new_name);
         }
         else {
           $new_name = $request->input('image');
         };

         DB::update('update biographies set name = ? where id = ?',[$name,$id]);
         DB::update('update biographies set motto = ? where id = ?',[$motto,$id]);
         DB::update('update biographies set biography = ? where id = ?',[$biography,$id]);
         DB::update('update biographies set image = ? where id = ?',[$new_name,$id]);
         return redirect('/bio');
      }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     public function destroy($id) {
     DB::delete('delete from advertisements where id = ?',[$id]);
     return back();
  }
}
