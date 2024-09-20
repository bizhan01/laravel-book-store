<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Advertisement;
use App\Book;
use DB;

class SearchController extends Controller
{
        public function search()
      {
        $advertisements= Advertisement::latest()->get();

        $q = Input::get ( 'q' );
        if($q != ""){
          $book = Book::where ( 'book_name', 'LIKE', '%' . $q . '%' )->orWhere( 'author', 'LIKE', '%' . $q . '%' )->orWhere( 'category', 'LIKE', '%' . $q . '%' )->get ();
          if (count ( $book ) > 0)
            return view ( 'searchResult', compact('advertisements') )->withDetails ( $book )->withQuery ( $q );
          else
            return view ( 'searchResult', compact('advertisements') )->withMessage ( 'No Details found. Try to search again !' );
        }

        return view ( 'searchResult', compact('advertisements') )->withMessage ( 'No Details found. Try to search again !' );

      }

}
