<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Book;
use App\Product;
use App\Category;
use DB;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
      $categories = Category::latest()->get();
      return view('book.addNewBook', compact('categories',));
    }

    public function addUsedBook(){
      $categories = Category::latest()->get();
      return view('book.addUsedBook', compact('categories',));
    }

    public function newBooks(){
      $books = Product::where('product_type', 1)->latest()->get();
      return view('book.newBooks', compact('books',));
    }

    public function usedBooks(){
      $books = Product::where('product_type', 2)->latest()->get();
      return view('book.usedBooks', compact('books',));
    }


    public function inventory()
      {
        // $products = Product::latest()->get();
        $products = DB::table('sell_items as pr')
              ->rightJoin('books as sup', 'sup.id', 'pr.product_id')
              ->select(["product_id as product_id", DB::raw("SUM(product_qty) as buy_tot"), 'sup.*'])
              ->groupBy('sup.id')
              ->get();

        return view('book.inventory', [  'products' => $products]);
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
            'author'=>'required',
            'edition'=>'nullable',
            'publisher'=>'nullable',
            'publish_date'=>'nullable',
            'ISBN'=>'nullable',
            'category'=>'required',
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
            $book = DB::table('products as pro')
              ->rightJoin('users as usr', 'usr.id', '=', 'pro.user_id')
              ->where('pro.id', $id)
              ->get();

            // $book = DB::select('select * from products where id = ?',[$id]);
            return view('book.details',['book'=>$book]);
        }



        public function show($id) {
         $book = DB::select('select * from products where id = ?',[$id]);
         $categories = Category::latest()->get();
         return view('book.editBook',['book'=>$book], compact('categories',));
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
