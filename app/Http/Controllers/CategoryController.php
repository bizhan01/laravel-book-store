<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Category;
use DB;


class CategoryController extends Controller
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
      $categories = Category::latest()->get();
      return view('category.addCategory', compact('categories',));
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
            'title'=>'required',
            'description'=>'nullable',

    ]);
      Category::create([
          'title' => request('title'),
          'description' => request('description'),
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
       $category = DB::select('select * from categories where id = ?',[$id]);
       return view('category.editCategory',['category'=>$category]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     public function edit(Request $request,$id) {
        $title = $request->input('title');
        $description = $request->input('description');

        DB::update('update categories set title = ? where id = ?',[$title,$id]);
        DB::update('update categories set description = ? where id = ?',[$description,$id]);
        return redirect('/category');
     }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     public function destroy($id) {
     DB::delete('delete from categories where id = ?',[$id]);
     return back();
   }

}
