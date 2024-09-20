<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Product;
use DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
      $books = Product::where('product_type', 3)->latest()->get();
      return view('Product.products', compact('books',));
    }


    public function newProduct(){
      return view('Product.addProduct');
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
            'product_type'=>'required',
            'product_name'=>'required',
            'author'=>'nullable',
            'edition'=>'nullable',
            'publisher'=>'nullable',
            'publish_date'=>'nullable',
            'ISBN'=>'nullable',
            'category'=>'nullable',
            'quantity'=>'required',
            'price'=>'required',
            'image' => 'image|mimes:jpeg,jpeg,png,jpg,gif|max:1999'
        ]);
        if($image = $request->file('image')){
          $new_name =rand() . '.' . $image-> getClientOriginalExtension();
          $image -> move(public_path("UploadedImages/books"), $new_name);
        }
        else {
          $new_name = 'logo.png';
        }
          Product::create([
              'user_id' => Auth::user()->id,
              'product_type' => request('product_type'),
              'product_name' => request('product_name'),
              'author' => request('author'),
              'edition' => request('edition'),
              'publisher' => request('publisher'),
              'publish_date' => request('publish_date'),
              'ISBN' => request('ISBN'),
              'category' => request('category'),
              'type' => request('type'),
              'quantity' => request('quantity'),
              'price' => request('price'),
              'image' => $new_name,
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

          public function details($id)
          {
            $product = DB::table('products as pro')
              ->rightJoin('users as usr', 'usr.id', '=', 'pro.user_id')
              ->where('pro.id', $id)
              ->get();

            // $product = DB::select('select * from products where id = ?',[$id]);
            return view('product.details',['product'=>$product]);
        }



        public function show($id) {
         $product = DB::select('select * from products where id = ?',[$id]);
         return view('product.editProduct',['product'=>$product]);
      }



      public function edit(Request $request,$id) {
          $user_id = $request->input('user_id');
          $product_type = $request->input('product_type');
          $product_name = $request->input('product_name');
          $author = $request->input('author');
          $edition = $request->input('edition');
          $publisher = $request->input('publisher');
          $publish_date = $request->input('publish_date');
          $ISBN = $request->input('ISBN');
          $category = $request->input('category');
          $quantity = $request->input('quantity');
          $price = $request->input('price');

          if($image = $request->file('image')){
            $new_name =rand() . '.' . $image-> getClientOriginalExtension();
            $image -> move("UploadedImages/books", $new_name);
          }
          else {
            $new_name = $request->input('image');
          };

          DB::update('update products set user_id = ? where id = ?',[$user_id, $id]);
          DB::update('update products set product_type = ? where id = ?',[$product_type, $id]);
          DB::update('update products set product_name = ? where id = ?',[$product_name, $id]);
          DB::update('update products set author = ? where id = ?',[$author, $id]);
          DB::update('update products set edition = ? where id = ?',[$edition, $id]);
          DB::update('update products set publisher = ? where id = ?',[$publisher, $id]);
          DB::update('update products set publish_date = ? where id = ?',[$publish_date, $id]);
          DB::update('update products set ISBN = ? where id = ?',[$ISBN, $id]);
          DB::update('update products set category = ? where id = ?',[$category, $id]);
          DB::update('update products set quantity = ? where id = ?',[$quantity, $id]);
          DB::update('update products set price = ? where id = ?',[$price, $id]);
          DB::update('update products set image = ? where id = ?',[$new_name, $id]);
          return redirect('/profile');
      }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     public function destroy($id) {
     DB::delete('delete from products where id = ?',[$id]);
     return back();
  }
}
